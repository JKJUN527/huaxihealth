<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\About;
use App\Cooperation;
use App\CoopOut;
use App\Http\Controllers\Controller;
use App\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller {
    //显示已发布广告,传入pagesize(每页大小)
    //返回data['news']
//列表页显示
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['contact'] = Recruit::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.contact', ['data' => $data]);
    }
    public function formIndex(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['webinfo'] = About::first();

        return view('admin.contactEdit', ['data' => $data]);
    }
//新增页面显示
    //新增对外合作页面
    public function addContactIndex() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();

        return view('admin.addContact', ['data' => $data]);
    }
//查询详情
    public function contactDetail(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('nid')) {
            $nid = $request->input('nid');
        } else
            $nid = 1;
        $data['new'] = Recruit::find($nid);

        return $data;
    }

//提交数据操作

    //新增动态
    public function addContactPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $new = new Recruit();

        //接收参数
        $picture = $request->input('pictureIndex');
        if($picture != ""){
            $pictures = explode('@', $picture);
            $picfilepath = "";
            foreach ($pictures as $Item) {//对每一个照片进行操作。

                $pic = $request->file('pic' . $Item);//取得上传文件信息
                if ($pic->isValid()) {//判断文件是否上传成功
                    //扩展名
                    $ext1 = $pic->getClientOriginalExtension();
                    //临时觉得路径
                    $realPath = $pic->getRealPath();
                    //生成文件名
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'contact' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('contact')->put($picname, file_get_contents($realPath));
                }
            }
            $new->picture = asset('storage/contact/' . $picfilepath);
        }
        //保存都数据库
        $new->title = $request->input('title');
        $new->content = $request->input('content');
        if ($new->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
            return $data;
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
            return $data;
        }
    }
    //编辑联系我们页面
    public function editContactPost(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $new = About::first();

        //接收参数
        $picture = $request->input('pictureIndex');
        if($picture != ""){
            $pictures = explode('@', $picture);
            $picfilepath = "";
            foreach ($pictures as $Item) {//对每一个照片进行操作。

                $pic = $request->file('pic' . $Item);//取得上传文件信息
                if ($pic->isValid()) {//判断文件是否上传成功
                    //扩展名
                    $ext1 = $pic->getClientOriginalExtension();
                    //临时觉得路径
                    $realPath = $pic->getRealPath();
                    //生成文件名
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'contact' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('contact')->put($picname, file_get_contents($realPath));
                }
            }
            $new->contact_picture = asset('storage/contact/' . $picfilepath);
        }
        //保存都数据库
        $new->contact_content = $request->input('content');
        if ($new->save()) {
            $data['status'] = 200;
            $data['msg'] = "操作成功";
            return $data;
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
            return $data;
        }
    }

    //删除操作
    function contactDel(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $nid = $request->input('id');
            Recruit::where('id', '=', $nid)
                ->delete();
            $data['status'] = 200;
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }

}
