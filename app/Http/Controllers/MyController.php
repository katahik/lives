<?php

namespace App\Http\Controllers;

use App\Utils\CalcDistance;
use App\Utils\Upload;
use Illuminate\Http\Request;
use App\Live;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\DB;

// CreateLiveで設定したバリデーションをよみこむ
use App\Http\Requests\CreateLive;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
