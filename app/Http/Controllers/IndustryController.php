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
use App\Fund;
use App\Hatch;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Policy;
use App\Team;
use App\Technologyteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller {
    //产业动态
    public function index() {

        $data['data'] = Industry::orderBy('created_at','desc')
            ->paginate(10);

        return view('industry.index', ['data' => $data]);
    }
    public function indexDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Industry::find($id);
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
            return view('industry.detail',['data'=>$data]);
        }
        return $this->index();
    }
    //政策聚焦
    public function policy() {

        $data['data'] = Policy::orderBy('created_at','desc')
            ->paginate(10);

        return view('industry.policy', ['data' => $data]);
    }
    public function policyDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Policy::find($id);
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
            return view('industry.policyDetail',['data'=>$data]);
        }
        return $this->policy();
    }
    //孵化培育
    public function hatch() {

        $data['data'] = Hatch::orderBy('created_at','desc')
            ->paginate(10);

        return view('industry.hatch', ['data' => $data]);
    }
    public function hatchDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Hatch::find($id);
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
            return view('industry.hatchDetail',['data'=>$data]);
        }
        return $this->hatch();
    }
    //投资与基金
    public function fund() {

        $data['data'] = Fund::orderBy('created_at','desc')
            ->paginate(10);

        return view('industry.fund', ['data' => $data]);
    }
    public function fundDetail(Request $request){
        if($request->has('nid')){
            $id = $request->input('nid');
            $data['detail'] = Fund::find($id);
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
            return view('industry.fundDetail',['data'=>$data]);
        }
        return $this->fund();
    }

}
