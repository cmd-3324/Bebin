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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MangeController extends Controller
{
    protected $videos = [
        [
            'id' => 1,
            'thumbnail' => 'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
            'video_url' => 'https://www.youtube.com/embed/3JZ_D3ELwOQ',
            'title' => 'Mark Ronson - Uptown Funk ft. Bruno Mars',
            'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnjzywWxTAzWzw3v69i6l4Z4cYn_d2mZ1RXYQw=s88-c-k-c0x00ffffff-no-rj',
            'uploader_name' => 'Mark Ronson',
            'views' => '4.7B views',
            'duration' => '4:31',
            'time_passed' => '8 years ago',
            'description' => 'Official video for Uptown Funk by Mark Ronson ft. Bruno Mars.'
        ],
        [
            'id' => 2,
            'thumbnail' => 'https://www.youtube.com/watch?v=L_jWHffIx5E',
            'video_url' => 'https://www.youtube.com/embed/L_jWHffIx5E',
            'title' => 'Smells Like Teen Spirit (Official Video)',
            'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnh4GL-Myfl_K6m2ZvlCwbvckOc5Qxvl3kCd=s88-c-k-c0x00ffffff-no-rj',
            'uploader_name' => 'Nirvana',
            'views' => '1.1B views',
            'duration' => '5:02',
            'time_passed' => '12 years ago',
            'description' => 'Official music video for Smells Like Teen Spirit by Nirvana.'
        ],
        [
            'id' => 3,
            'thumbnail' => 'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
            'video_url' => 'https://www.youtube.com/embed/kJQP7kiw5Fk',
            'title' => 'Luis Fonsi - Despacito ft. Daddy Yankee',
            'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwni0vXvx8IHPqG_mB2m_xxJvcujcVJOQqI-w=s88-c-k-c0x00ffffff-no-rj',
            'uploader_name' => 'Luis Fonsi',
            'views' => '8.9B views',
            'duration' => '4:42',
            'time_passed' => '5 years ago',
            'description' => 'Official video for Despacito by Luis Fonsi ft. Daddy Yankee.'
        ],
        [
            'id' => 4,
            'thumbnail' => 'https://www.youtube.com/watch?v=ktvTqknDobU',
            'video_url' => 'https://www.youtube.com/embed/ktvTqknDobU',
            'title' => 'Imagine Dragons - Radioactive',
            'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwniJOZ7xE1-VyMkqkQ3C1QJ7MY5-Dd3HrUGw=s88-c-k-c0x00ffffff-no-rj',
            'uploader_name' => 'Imagine Dragons',
            'views' => '1.5B views',
            'duration' => '3:06',
            'time_passed' => '10 years ago',
            'description' => 'Official music video for Radioactive by Imagine Dragons.'
        ],
        [
            'id' => 5,
            'thumbnail' => 'https://www.youtube.com/watch?v=fRh_vgS2dFE',
            'video_url' => 'https://www.youtube.com/embed/fRh_vgS2dFE',
            'title' => 'Justin Bieber - Sorry (PURPOSE : The Movement)',
            'uploader_img' => 'https://yt3.ggpht.com/ytc/AAUvwnjqyV6El34gRxPAw2Ny3-EspMwcfNmknJxfq=s88-c-k-c0x00ffffff-no-rj',
            'uploader_name' => 'Justin Bieber',
            'views' => '3.2B views',
            'duration' => '3:20',
            'time_passed' => '7 years ago',
            'description' => 'Official video for Sorry by Justin Bieberhbcvvvvvvvvvvv
cbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv.
cbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
cbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvcbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
cbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
cbvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
'
        ],
    ];

    public function strema_video($id) {
    if (1==1) {
        $video = collect($this->videos)->firstWhere('id', (int)$id);

        if (!$video) {
            abort(404, 'Video not found');
        }
        $restrictionerror = "Nana";
        // Filter related videos (exclude current video)
        $relatedVideos = collect($this->videos)
            ->where('id', '!=', (int)$id)
            ->values()
            ->all();

        return view("video-card-display", [
            "video" => $video,
            "relatedVideos" => $relatedVideos,
            'restrictionerror' =>$restrictionerror,
        ]);
    }

} 
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
    $userEmail = $request->email;

    // Generate and store in cache
    $code = random_int(100000, 999999);
    Cache::put("verification_code:$userEmail", $code, now()->addMinutes(1));

    try {
        Mail::raw("Your verification code is: {$code}", function ($msg) use ($userEmail) {
            $msg->to($userEmail)
                ->subject('Your Email Verification Code');
        });
        session()->put('code_sent_at', time());
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

// ✅ UPDATED verifyCode (used on Register submit)
public function verifyCode(Request $request)
{
    $request->validate([
        'UserName' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'code' => 'required|digits:6',
    ]);
    
    $cacheKey = "verification_code:{$request->email}";
    $storedCode = Cache::get($cacheKey);
    if (!$storedCode || $storedCode != $request->code) {
        return back()->withErrors(['code' => 'Invalid or expired code.'])->
        withInput($request->only('password'));
    }
    $user = BebinUsers::create([
        'UserName' => $request->UserName,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'email_verified_at' => now(),
    ]);
    Auth::login($user);
    // Clear cache + timer
    Cache::forget($cacheKey);
    session()->forget('code_sent_at');

    return redirect()->route('home');
}

    // END: Rewritten verifyCode method
}