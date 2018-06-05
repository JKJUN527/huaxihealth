<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Achievements;
use App\Committee;
use App\Http\Controllers\Controller;
use App\Technologyteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller {
    //显示已发布广告,传入pagesize(每页大小)
    //返回data['news']
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['expert'] = Committee::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.technology', ['data' => $data]);
    }
    public function teamIndex() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['team'] = Technologyteam::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.technologyteam', ['data' => $data]);
    }
    public function achievementsIndex() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();
        $data['achievements'] = Achievements::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.achievements', ['data' => $data]);
    }
    //新增主任委员界面
    public function addExpertIndex() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();

        return view('admin.addTechnology', ['data' => $data]);
    }
    //新增科研团队界面
    public function addteamIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();

        return view('admin.addTechTeam', ['data' => $data]);
    }
    //新增科研成果界面
    public function addAchievementsIndex(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');
        $data = DashboardController::getLoginInfo();

        return view('admin.addAchievement', ['data' => $data]);
    }
//查询详情
    public function teamDetail(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('nid')) {
            $nid = $request->input('nid');
        } else
            $nid = 1;
        $data['new'] = Technologyteam::find($nid);

        return $data;
    }
    public function achievementsDetail(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }
        if ($request->has('nid')) {
            $nid = $request->input('nid');
        } else
            $nid = 1;
        $data['new'] = Achievements::find($nid);

        return $data;
    }

//提交数据操作
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
    //新增科研团队
    public function addteamPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $new = new Technologyteam();

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
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'technologyteam' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('technologyteam')->put($picname, file_get_contents($realPath));
                }
            }
            $new->picture = asset('storage/technologyteam/' . $picfilepath);
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
//新增科研成果
    public function addachievementsPost(Request $request) {
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $new = new Achievements();

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
                    $picname = date('Y-m-d-H-i-s') . '-' . uniqid() . 'achievement' . $Item . '.' . $ext1;

                    $picfilepath = $picfilepath . $Item . '@' . $picname . ';';
                    $bool = Storage::disk('achievement')->put($picname, file_get_contents($realPath));
                }
            }
            $new->picture = asset('storage/achievement/' . $picfilepath);
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
    public function teamDel(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $nid = $request->input('id');
            Technologyteam::where('id', '=', $nid)
                ->delete();
            $data['status'] = 200;
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }
    public function achievementsDel(Request $request){
        $data = array();
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        if ($request->has('id')) {
            $nid = $request->input('id');
            Achievements::where('id', '=', $nid)
                ->delete();
            $data['status'] = 200;
        } else {
            $data['status'] = 200;
            $data['msg'] = "删除失败";
        }

        return $data;
    }

}
