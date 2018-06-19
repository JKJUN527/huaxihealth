<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;


use App\Cooperation;
use App\CoopOut;
use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CooperationController extends Controller {
    //科技研发
    public function index() {

        $data['data'] = Cooperation::orderBy('created_at','desc')
            ->paginate(10);
        $data['aboutinfo'] = About::first();
        return view('cooperation.index', ['data' => $data]);
    }
    public function indexDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Cooperation::find($id);
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
            return view('cooperation.detail',['data'=>$data]);
        }
        return $this->index();
    }
    //对外合作
    public function out() {

        $data['data'] = CoopOut::orderBy('created_at','desc')
            ->paginate(10);
        $data['aboutinfo'] = About::first();
        return view('cooperation.out', ['data' => $data]);
    }
    public function outDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = CoopOut::find($id);
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
            return view('cooperation.outDetail',['data'=>$data]);
        }
        return $this->out();
    }

}
