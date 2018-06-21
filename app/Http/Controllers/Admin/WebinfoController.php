<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class WebinfoController extends Controller {
    //显示网站信息
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $data = array();
        $data['webinfo'] = About::orderBy('updated_at', 'desc')
            ->take(1)
            ->get();
        return $data;
    }

    public function setPhone(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->tel = $request->input('tel');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }
    public function setFax(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->fax = $request->input('fax');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }
    public function setCode(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->postcode = $request->input('code');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }

    public function setEmail(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->email = $request->input('email');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }

    public function setAddress(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->address = $request->input('address');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }

    public function setContent(Request $request) {
    $uid = AdminAuthController::getUid();
    if ($uid == 0) {
        return redirect('admin/login');
    }

    $webinfo = About::find(1);
    $webinfo->ebrief = $request->input('content');

    if ($webinfo->save()) {
        $data['status'] = 200;
    } else {
        $data['status'] = 400;
        $data['msg'] = "设置失败";
    }

    return $data;
    }
    public function setLink(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $webinfo = About::find(1);
        $webinfo->link = $request->input('link');

        if ($webinfo->save()) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['msg'] = "设置失败";
        }

        return $data;
    }

    //修改网站信息
    public function setWebinfo(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
//        if($request->has('webinfo')){
//            $data = $request->input('webinfo');
        $webinfo = About::findfirst();
        $webinfo->uid = 1;//登陆获取
        $webinfo->tel = $request->input('tel');
        $webinfo->email = $request->input('email');
        $webinfo->address = $request->input('address');
        $webinfo->class = $request->input('class');
        $webinfo->content = $request->input('content');
        $webinfo->work_time = $request->input('work_time');
        if ($webinfo->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
            return $data;
//                return redirect()->back()->with('success','操作成功');
        }
        $data['status'] = 400;
        $data['msg'] = "操作失败";
        return $data;
//        return redirect()->back()->with('success','操作成功');
    }
    public function message(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['message'] = Message::orderBy('created_at','desc')->paginate(20);
        return view('admin.message', ["data" => $data]);
    }
    public function messageDetail(Request $request){
        $data = array();
        if($request->has('id')){
            $id = $request->input('id');
            $data['message'] = Message::find($id);
        }
        return $data;
    }
    public function messageDel(Request $request){
        $data = array();
        $data['status'] = 400;
        if($request->has('id')){
            $id = $request->input('id');
            $data['message'] = Message::where('id',$id)
                ->delete();
            $data['status'] = 200;
        }
        return $data;
    }
}
