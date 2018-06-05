<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Fund;
use App\Hatch;
use App\Http\Controllers\Controller;
use App\Industry;
use App\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller {
    //显示已发布广告,传入pagesize(每页大小)
    //返回data['news']
//列表页显示
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['industry'] = Industry::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.industry', ['data' => $data]);
    }
    public function policyIndex(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['industry'] = Policy::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.policy', ['data' => $data]);
    }
    public function hatchIndex(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['industry'] = Hatch::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.hatch', ['data' => $data]);
    }
    public function fundIndex(Request $request){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['industry'] = Fund::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.fund', ['data' => $data]);
    }
//新增页面显示
    //新增产业动态页面
    public function addIndustryIndex(Request $request) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        if($request->has('type'))
            $data['type'] = $request->input('type');
        else
            $date['type'] = 0;

        return view('admin.addIndustry', ['data' => $data]);
    }
//查询详情
    public function industryDetail(Request $request){
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
                    $data['new'] = Industry::find($nid);
                    break;
                case 1:
                    $data['new'] = Policy::find($nid);
                    break;
                case 2:
                    $data['new'] = Hatch::find($nid);
                    break;
                case 3:
                    $data['new'] = Fund::find($nid);
                    break;
                default:
                    return $data;
            }
        }

        return $data;
    }

//提交数据操作

    //新增动态
    public function addIndustryPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if($request->has('type')){
            $type = $request->input('type');
            switch ($type){
                case 0:
                    $new = new Industry();
                    break;
                case 1:
                    $new = new Policy();
                    break;
                case 2:
                    $new = new Hatch();
                    break;
                case 3:
                    $new = new Fund();
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
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'industry' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('industry')->put($picname, file_get_contents($realPath));
                }
            }
            $new->picture = asset('storage/industry/' . $picfilepath);
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
    function industryDel(Request $request) {
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
                    Industry::where('id', '=', $nid)
                        ->delete();
                    $data['status'] = 200;
                    break;
                case 1:
                    Policy::where('id', '=', $nid)
                        ->delete();
                    $data['status'] = 200;
                    break;
                case 2:
                    Hatch::where('id', '=', $nid)
                        ->delete();
                    $data['status'] = 200;
                    break;
                case 3:
                    Fund::where('id', '=', $nid)
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
