<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\About;
use App\Cooperation;
use App\Http\Controllers\Controller;
use App\Industry;
use App\News;
use App\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller {
    //团队介绍
    public function index(Request $request) {

        $data['news'] = News::orderBy('created_at','desc')
            ->take(6)
            ->get();
        $data['notes'] = Notes::orderBy('created_at','desc')->get();
        $data['industry'] = Industry::orderBy('created_at','desc')
            ->take(6)
            ->get();
        $data['cooperation'] = Cooperation::orderBy('created_at','desc')
            ->take(6)
            ->get();
        $data['aboutinfo'] = About::first();

        return view('index', ['data' => $data]);
    }
}
