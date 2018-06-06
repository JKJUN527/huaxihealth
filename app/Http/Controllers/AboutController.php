<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\About;
use App\Datebook;
use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller {
    //团队介绍
    public function index(Request $request) {

        $data['webinfo'] = About::select('ebrief')->first();

        return view('about.index', ['data' => $data]);
    }
    public function team(){
        $data['team'] = Team::all();

        return view('about.team', ['data' => $data]);
    }
    public function structure(){
        $data['webinfo'] = About::select('structure')->first();

        return view('about.structure', ['data' => $data]);
    }
    public function datebook(){
        $data['datebook'] = Datebook::where('statue',0)
            ->paginate(12);

        return view('about.datebook', ['data' => $data]);
    }
    public function datebookDetail(Request $request){
        if($request->has('id')){
            $id = $request->input('id');
            $data['detail'] = Datebook::find($id);
//            $content = $data['detail']->content;
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

            return view('about.detail', ['data' => $data]);
        }else{
            return $this->datebook();
        }
    }
    public function development(){
        $data['webinfo'] = About::first();
        if($data['webinfo']->strategy_picture != null){
            $images = $data['webinfo']->strategy_picture;
            $imageTemp = explode(';',$images);
            $imagesArray = [];
            $i=0;
            foreach ($imageTemp as $item){
                if(strlen($item) <=0)
                    break;
                $imagesArray[$i++] = explode('@',$item);
            }
            $baseurl = substr($imagesArray[0][0],0,strlen($imagesArray[0][0])-1);
            $imagesArray[0][0] = str_replace($baseurl,'',$imagesArray[0][0]);
            foreach ($imagesArray as $item){
                $search = "[图片".$item[0]."]";
                $replace = "<div class='news-image'><img src='".$baseurl.$item[1]."'/></div>";
                $data['webinfo']->strategy_content = str_replace($search,$replace,$data['webinfo']->strategy_content);
            }
        }
        return view('about.development', ['data' => $data]);
    }
}
