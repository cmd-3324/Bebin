<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\ChartService;
use App\Models\FavoriteCarPivot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MangeController extends Controller
{
    public $user_id = Auth::user()->UserID;
    public function strema_video() {
        $video = request()->input("videoId");
}
}
