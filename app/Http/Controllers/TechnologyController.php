<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\About;
use App\Achievements;
use App\Committee;
use App\Datebook;
use App\Http\Controllers\Controller;
use App\Team;
use App\Technologyteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller {
    //团队介绍
    public function index(Request $request) {

        $data['teamfirst'] = Committee::where('type',0)->get();
        $data['teamsecend'] = Committee::where('type',1)->get();
        $data['aboutinfo'] = About::first();
        return view('technology.index', ['data' => $data]);
    }
    public function indexDetail(Request $request){
        if($request->has('id')){
            $id = $request->input('id');
            $data['info'] = Committee::find($id);
            $data['aboutinfo'] = About::first();
            return view('technology.indexDetail',['data'=>$data]);
        }
        return $this->index();
    }
    public function team(Request $request) {

        $data['team'] = Technologyteam::orderBy('created_at','desc')
            ->paginate(10);
        $data['aboutinfo'] = About::first();
        return view('technology.team', ['data' => $data]);
    }
    public function achievements(){
        $data['achievements'] = Achievements::orderBy('created_at','desc')
            ->paginate(10);
        $data['aboutinfo'] = About::first();
        return view('technology.achievement', ['data' => $data]);
    }
    public function teamDetail(Request $request){
        if($request->has('id')){
            $id = $request->input('id');
            $data['detail'] = Technologyteam::find($id);
            //还原新闻中的图片
            $images = $data['detail']->picture;
            if($images !=null){
                $imageTemp = explode(';',$images);
                array_pop($imageTemp);
                $imagesArray = [];
                foreach ($imageTemp as $item){
                    $imagesArray[] = explode('@',$item);
                }
                $baseUrl = substr($imagesArray[0][0],0,-1);
                $imagesArray[0][0] = substr($imagesArray[0][0],-1);
                foreach ($imagesArray as $item){
                    $imageurl = $baseUrl.$item[1];
                    $replace = "<div class='news-image'><img src='".$imageurl."'/></div>";
                    $data['detail']->content = str_replace('[图片'.$item[0].']',$replace,$data['detail']->content);
                }
            }
            $data['aboutinfo'] = About::first();
            return view('technology.teamDetail',['data'=>$data]);
        }
        return $this->team();
    }
    public function achievementsDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Achievements::find($id);
            //还原新闻中的图片
            $images = $data['detail']->picture;
            if($images !=null){
                $imageTemp = explode(';',$images);
                array_pop($imageTemp);
                $imagesArray = [];
                foreach ($imageTemp as $item){
                    $imagesArray[] = explode('@',$item);
                }
                $baseUrl = substr($imagesArray[0][0],0,-1);
                $imagesArray[0][0] = substr($imagesArray[0][0],-1);
                foreach ($imagesArray as $item){
                    $imageurl = $baseUrl.$item[1];
                    $replace = "<div class='news-image'><img src='".$imageurl."'/></div>";
                    $data['detail']->content = str_replace('[图片'.$item[0].']',$replace,$data['detail']->content);
                }
            }
            $data['aboutinfo'] = About::first();
            return view('technology.achievementDetail',['data'=>$data]);
        }
        return $this->achievements();
    }

}
