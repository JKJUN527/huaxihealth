<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\About;
use App\Datebook;
use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller {
    //团队介绍
    public function index(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['team'] = Team::all();
        //return $data;
        return view('admin.team', ['data' => $data]);
    }
    public function teamAdd(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $team = new Team();
        if($request->hasFile('picture')) {
            $adpic = $request->file('picture');//取得上传文件信息
            if ($adpic->isValid()) {//判断文件是否上传成功
                //扩展名
                $ext = $adpic->getClientOriginalExtension();
                //临时觉得路径
                $realPath = $adpic->getRealPath();
                //生成文件名
                $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'profile' . '.' . $ext;

                $bool = Storage::disk('profile')->put($picname, file_get_contents($realPath));

                $team->picture = asset('storage/profiles/' . $picname);
            }
        }
        $team->name = $request->input('name');
        $team->byname = $request->input('byname');
        $team->type = $request->input('type');
        $team->brief = $request->input('brief');
        if($team->save()){
            $data['status'] = 200;
            $data['msg'] = "新增成功";
        }else{
            $data['status'] = 400;
            $data['msg'] = "新增失败";
        }
        return $data;
    }
    public function teamDel(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0){
            $data['status'] = 400;
            $data['msg'] = "未知错误";
        }
        if($request->has('id')){
            $id = $request->input('id');
            $del = Team::find($id);
            $del->delete();
            $data['status'] = 200;
            $data['msg'] = "删除成功";
        }
        return $data;
    }
    public function structureIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['webinfo'] = About::first();
        //return $data;
        return view('admin.structure', ['data' => $data]);
    }
    public function structureAdd(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $webinfo = About::first();
        if($request->hasFile('picture')) {
            $adpic = $request->file('picture');//取得上传文件信息
            if ($adpic->isValid()) {//判断文件是否上传成功
                //扩展名
                $ext = $adpic->getClientOriginalExtension();
                //临时觉得路径
                $realPath = $adpic->getRealPath();
                //生成文件名
                $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'about' . '.' . $ext;

                $bool = Storage::disk('about')->put($picname, file_get_contents($realPath));

                $webinfo->structure = asset('storage/about/' . $picname);
            }
        }
        if($webinfo->save()){
            $data['status'] = 200;
            $data['msg'] = "新增成功";
        }else{
            $data['status'] = 400;
            $data['msg'] = "新增失败";
        }
        return $data;
    }
    public function datebookIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['datebook'] = Datebook::orderBy('updated_at', 'desc')
            ->paginate(10);
        //return $data;
        return view('admin.datebook', ['data' => $data]);
    }
    public function datebookAddIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
//        $data['datebook'] = Datebook::orderBy('updated_at', 'desc')
//            ->paginate(10);
        //return $data;
        return view('admin.addDatebook', ['data' => $data]);
    }
    public function datebookAdd(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $datebook = new Datebook();

        //接收参数
        $picture = $request->input('pictureIndex');
        if($picture != ""){
            $pictures = explode('@', $picture);
            $picfilepath = "";
            foreach ($pictures as $Item) {//对每一个照片进行操作。
                $pic = $request->file('pic' . $Item);//取得上传文件信息
                if ($pic->isValid()) {//判断文件是否上传成功
                    //取得原文件名
                    $originalName1 = $pic->getClientOriginalName();
                    //扩展名
                    $ext1 = $pic->getClientOriginalExtension();
                    //mimetype
                    $type1 = $pic->getClientMimeType();
                    //临时觉得路径
                    $realPath = $pic->getRealPath();
                    //生成文件名
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'datebook' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('datebook')->put($picname, file_get_contents($realPath));
                }
            }
            $datebook->picture = asset('storage/datebook/' . $picfilepath);
        }
        //保存都数据库
        $datebook->title = $request->input('title');
        $datebook->content = $request->input('content');
        if ($datebook->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
            return $data;
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
            return $data;
        }
    }
    //根据新闻id 返回每个具体的新闻详情
    public function datebookDetail(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('id')) {
            $id = $request->input('id');
        } else
            $id = 1;
        $data['datebook'] = Datebook::find($id);

        return $data;
    }
    function datebookDel(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $nid = $request->input('id');
            Datebook::where('id', '=', $nid)
                ->delete();
            $data['status'] = 200;
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }
        return $data;
    }
    public function strategyIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
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
//        return $data['webinfo']->strategy_content;
        return view('admin.strategy', ['data' => $data]);
    }
    public function addStrategyIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
//        $data['datebook'] = Datebook::orderBy('updated_at', 'desc')
//            ->paginate(10);
        //return $data;
        return view('admin.addStrategy', ['data' => $data]);
    }
    public function strategyAdd(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $webinfo = About::first();

        //接收参数
        $picture = $request->input('pictureIndex');
        if($picture != ""){
            $pictures = explode('@', $picture);
            $picfilepath = "";
            foreach ($pictures as $Item) {//对每一个照片进行操作。
                $pic = $request->file('pic' . $Item);//取得上传文件信息
                if ($pic->isValid()) {//判断文件是否上传成功
                    //取得原文件名
                    $originalName1 = $pic->getClientOriginalName();
                    //扩展名
                    $ext1 = $pic->getClientOriginalExtension();
                    //mimetype
                    $type1 = $pic->getClientMimeType();
                    //临时觉得路径
                    $realPath = $pic->getRealPath();
                    //生成文件名
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'about' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('about')->put($picname, file_get_contents($realPath));
                }
            }
            $webinfo->strategy_picture = asset('storage/about/' . $picfilepath);
        }
        //保存都数据库
        $webinfo->strategy_content = $request->input('content');
        if ($webinfo->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
            return $data;
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
            return $data;
        }
    }


    //发布广告、以及修改广告
    //如果传入广告id，则修改对应广告
    //广告信息域用adsinfo  \ 广告图片域adpic
    public function addAds(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $webinfo = About::first();
        if ($request->hasFile('adpic')) {
            $adpic = $request->file('adpic');//取得上传文件信息
            if ($adpic->isValid()) {//判断文件是否上传成功
                //取得原文件名
                $originalName = $adpic->getClientOriginalName();
                //扩展名
                $ext = $adpic->getClientOriginalExtension();
                //mimetype
                $type = $adpic->getClientMimeType();
                //临时觉得路径
                $realPath = $adpic->getRealPath();
                //生成文件名
                $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'adpic' . '.' . $ext;

                $bool = Storage::disk('adpic')->put($picname, file_get_contents($realPath));

                if($webinfo->picture == "")
                    $webinfo->picture = $request->input('title'). "@" . asset('storage/adpic/' . $picname);
                else
                    $webinfo->picture = $webinfo->picture . ";" . $request->input('title'). "@" . asset('storage/adpic/' . $picname);

            }
            if ($webinfo->save()) {
                $data['status'] = 200;
                $data['msg'] = "新增成功";
            }else{
                $data['status'] = 400;
                $data['msg'] = "新增失败";
            }
        } else {
            $data['status'] = 400;
            $data['msg'] = "发布企业展示需上传图片";
            return $data;
        }
        return $data;
    }
    public function delAd(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0){
            $data['status'] = 400;
            $data['msg'] = "未知错误";
        }
        $webinfo = About::first();
        if($request->has('keyword')){
            $keyword = $request->input('keyword');
            $pics = explode(';', $webinfo->picture);
            $newpics = "";
            foreach ($pics as $k=>$pic){
                if(strpos($pic,$keyword) !== false){
                    unset($pics[$k]);
                }else{
                    if($newpics == "")
                        $newpics = $pic;
                    else
                        $newpics = $newpics . ";" . $pic;
                }
            }
            $webinfo->picture = $newpics;
            if($webinfo->save()){
                $data['status'] = 200;
                $data['msg'] = "删除成功";
            }

        }else{
            $data['msg'] = "参数错误";
        }
    }
    public function addAdView(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        return view('admin.addAds',['data'=>$data]);
    }
}
