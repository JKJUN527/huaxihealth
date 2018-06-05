<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Cooperation;
use App\CoopOut;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CooperationController extends Controller {
    //显示已发布广告,传入pagesize(每页大小)
    //返回data['news']
//列表页显示
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['cooperation'] = Cooperation::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.cooperation', ['data' => $data]);
    }
    public function outIndex(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['cooperation'] = CoopOut::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.cooperationOut', ['data' => $data]);
    }
//新增页面显示
    //新增对外合作页面
    public function addCooperationIndex(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        if($request->has('type'))
            $data['type'] = $request->input('type');
        else
            $date['type'] = 0;

        return view('admin.addCooperation', ['data' => $data]);
    }
//查询详情
    public function cooperationDetail(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('nid')) {
            $nid = $request->input('nid');
        } else
            $nid = 1;
        if($request->has('type')) {
            $type = $request->input('type');
            switch ($type) {
                case 0:
                    $data['new'] = Cooperation::find($nid);
                    break;
                case 1:
                    $data['new'] = CoopOut::find($nid);
                    break;
                default:
                    return $data;
            }
        }

        return $data;
    }

//提交数据操作

    //新增动态
    public function addCooperationPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if($request->has('type')){
            $type = $request->input('type');
            switch ($type){
                case 0:
                    $new = new Cooperation();
                    break;
                case 1:
                    $new = new CoopOut();
                    break;
                default:
                    $data['status'] = 400;
                    $data['msg'] = "type参数错误";
                    return $data;
            }
        }else{
            $data['status'] = 400;
            $data['msg'] = "type参数错误";
            return $data;
        }

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
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'cooperation' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('cooperation')->put($picname, file_get_contents($realPath));
                }
            }
            $new->picture = asset('storage/cooperation/' . $picfilepath);
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

    //删除操作
    function cooperationDel(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id') && $request->has('type')) {
            $nid = $request->input('id');
            $type = $request->input('type');
            switch ($type){
                case 0:
                    Cooperation::where('id', '=', $nid)
                        ->delete();
                    $data['status'] = 200;
                    break;
                case 1:
                    CoopOut::where('id', '=', $nid)
                        ->delete();
                    $data['status'] = 200;
                    break;
                default:
                    $data['status'] = 200;
                    $data['msg'] = "删除失败";
                    break;
            }

        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }

}
