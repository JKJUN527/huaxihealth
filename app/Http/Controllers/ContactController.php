<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers;

use App\About;
use App\Http\Controllers\Controller;
use App\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller {
    //人才招聘
    public function index() {

        $data['data'] = Recruit::orderBy('created_at','desc')
            ->paginate(10);

        return view('contact.index', ['data' => $data]);
    }
    //联系方式
    public function form() {

        $data['detail'] = About::first();
        //还原新闻中的图片
        $images = $data['detail']->contact_picture;
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
                $data['detail']->contact_content = str_replace('[图片'.$item[0].']',$replace,$data['detail']->contact_content);
            }
        }
        return view('contact.form',['data'=>$data]);
    }
    public function indexDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Recruit::find($id);
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
            return view('contact.detail',['data'=>$data]);
        }
        return $this->index();
    }

}
