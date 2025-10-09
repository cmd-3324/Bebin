<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\ChartService;
use App\Models\BebinUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MangeController extends Controller
{

//     public function strema_video($id) {
//     if (1==1) {
//         $video = collect($this->videos)->firstWhere('id', (int)$id);

//         if (!$video) {
//             abort(404, 'Video not found');
//         }
//         $restrictionerror = "Nana";
//         // Filter related videos (exclude current video)
//         $relatedVideos = collect($this->videos)
//             ->where('id', '!=', (int)$id)
//             ->values()
//             ->all();

//         return view("video-card-display", [
//             "video" => $video,
//             "relatedVideos" => $relatedVideos,
//             'restrictionerror' =>$restrictionerror,
//         ]);
//     }

// }
//chart method name her  :uploadVideo
public function upload(Request $request)
{
    // Check if file exists
    if (!$request->hasFile('video')) {
        return back()->with('error', 'Please select a video file');
    }

    $file = $request->file('video');

    // Validate file type and size (increased to 100MB = 104857600 bytes)
    $request->validate([
        'video' => 'required|file|mimes:mp4,mov,avi,mkv,webm|max:104857600'
    ]);

    // Upload using ChartService
    $path = ChartService::uploadVideo($file);

    if ($path) {
        return back()->with('success', 'Video uploaded successfully! File: ' . $file->getClientOriginalName());
    } else {
        return back()->with('error', 'Failed to upload video');
    }
}

public function sendme(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string'
    ]);
    //Random 5-d code :


//"Name: {$validated['name']}\r\n" "Email: {$validated['email']}\r\n\r\n"
    try {

        Mail::send([], [], function ($message) use ($validated) {
            $verificationCode = random_int(100000, 999999);
            $text =  "Message:\r\n{$validated['message']}\r\n Your code is : $verificationCode";

            $message->to('programmers378@gmail.com')
                    ->subject("Dear:{$validated['name']}")
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->replyTo($validated['email'], $validated['name'])
                    ->text($text); // ✅ plain text only
        });

        return redirect()
            ->back()
            ->with('successmessage', '✅ Message sent successfully!');
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->with('errormessage', '❌ Failed to send: ' . $e->getMessage());
    }
}

// START: Rewritten sendCode method

 // ✅ UPDATED sendCode (AJAX-friendly)

public function sendCode(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $email = $request->email;

    $attemptKey = "code_attempts:{$email}";
    $blockKey = "code_blocked:{$email}";
    $codeKey = "verification_code:{$email}";

    // Check if user is blocked
    if (Cache::has($blockKey)) {
        $secondsLeft = Cache::get($blockKey) - time();
        return response()->json([
            'success' => false,
            'blocked' => true,
            'secondsLeft' => max($secondsLeft, 1),
            'message' => "❌ Maximum 3 attempts reached. Wait {$secondsLeft}s before retrying."
        ]);
    }

    // Atomically increment attempts
    $attempts = Cache::increment($attemptKey);

    if ($attempts === 1) {
        Cache::put($attemptKey, 1, now()->addMinutes(1)); // first attempt expiration
    }

    // Block user if attempts exceed 3
    if ($attempts > 3) {
        $cooldown = 30;
        Cache::put($blockKey, time() + $cooldown, now()->addSeconds($cooldown));
        Cache::forget($attemptKey);

        return response()->json([
            'success' => false,
            'blocked' => true,
            'secondsLeft' => $cooldown,
            'message' => "❌ Maximum 3 attempts reached. Wait {$cooldown}s before retrying."
        ]);
    }

    // Generate 6-digit verification code
    $code = random_int(100000, 999999);
    Cache::put($codeKey, $code, now()->addMinutes(1));

    // Send email
    try {
        Mail::raw("Your verification code is: {$code}", function ($msg) use ($email) {
            $msg->to($email)->subject('Your Verification Code');
        });

        return response()->json([
            'success' => true,
            'blocked' => false,
            'secondsLeft' => 60
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'blocked' => false,
            'message' => '❌ Failed to send code: ' . $e->getMessage()
        ]);
    }
}

    // Verify code and register user
    public function verifyCode(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'code' => 'required|digits:6',
        ]);

        $codeKey = "verification_code:{$request->email}";
        $storedCode = Cache::get($codeKey);

        if (!$storedCode || $storedCode != $request->code) {
            return back()
                ->withErrors(['code' => 'Invalid or expired code.'])
                ->withInput($request->only('UserName', 'email'));
        }

        $user = BebinUsers::create([
            'UserName' => $request->UserName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        // Clean cache after successful registration
        Cache::forget($codeKey);
        Cache::forget("code_attempts:{$request->email}");
        Cache::forget("code_blocked:{$request->email}");

        return redirect()->route('home');
    }
    // END: Rewritten verifyCode method
}
