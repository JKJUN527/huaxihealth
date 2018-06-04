<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Committee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller {
    //显示已发布广告,传入pagesize(每页大小)
    //返回data['news']
    public function index(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['expert'] = Committee::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.technology', ['data' => $data]);
    }
    //新增主任委员界面
    public function addExpertIndex() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();

        return view('admin.addTechnology', ['data' => $data]);
    }
    //新增专家委员
    public function addExpertPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $new = new Committee();//新增委员

        //接收参数
        if($request->hasFile('pic')){
            $pic = $request->file('pic');//取得上传文件信息
            if ($pic->isValid()) {//判断文件是否上传成功
                //扩展名
                $ext1 = $pic->getClientOriginalExtension();
                //临时觉得路径
                $realPath = $pic->getRealPath();
                //生成文件名
                $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'expert' . $ext1;

                $bool = Storage::disk('expert')->put($picname, file_get_contents($realPath));
                $new->photo = asset('storage/expert/' . $picname);
            }
        }
        //保存都数据库
        $new->name = $request->input('name');
        $new->academic_title = $request->input('academic');
        $new->type = $request->input('type');
        $new->education = $request->input('education');
        $new->brief = $request->input('brief');

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
    public function addNotes(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        $notes = new Notes();//新增公告
        $notes->content = $request->input('content');
        if($notes->save()){
            $data['status'] = 200;
            $data['msg'] = "操作成功";
        } else {
            $data['status'] = 400;
            $data['msg'] = "操作失败";
        }
        return $data;
    }

    function delExpert(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $nid = $request->input('id');
            Committee::where('id', '=', $nid)
                ->delete();
            $data['status'] = 200;
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }
    function delNotes(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $id = $request->input('id');
            Notes::where('id', '=', $id)
                ->delete();
            $data['status'] = 200;
            $data['msg'] = "删除成功";
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }

}
