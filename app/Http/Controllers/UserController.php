<?php

namespace App\Http\Controllers;

use App\Score;
use App\Share;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $score = 0;
        if (Auth::check()) {
            $score = Score::where('user_id', Auth::user()->id)->first();
            if ($score) {
                $score = $score->score;
            } else {
                $score = 0;
            }
        }
        $leaders = Score::orderBy('score', 'desc')->limit(10)->get();
        return view('users.index', compact('score', 'leaders'));
    }
    public function save(Request $request)
    {
        if (!Auth::check()) {
            return false;
        }
        $findResult = Score::where('user_id', Auth::user()->id)->first();
        if ($findResult) {
            if ($findResult->score < $request->input('total')) {
                $findResult->score = $request->input('total');
                $findResult->save();
                return "ok";
            }
            return 'success';
        } else {
            $score = new Score();
            $score->score = $request->input('total');
            $score->user_id = Auth::user()->id;
            $score->save();
        }
        return "ok";
    }
    public function export(Request $request)
    {
        $image = $request->input('image');
        $filteredData=substr($image, strpos($image, ","));
        $unencodedData=base64_decode($filteredData);
        $time = microtime(true);

        file_put_contents('images/share/'.$time.'.png', $unencodedData);
        return url('/images/share/'.$time.'.png');
    }
}
