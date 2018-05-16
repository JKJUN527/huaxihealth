<?php
/**
 * Created by PhpStorm.
 * User: JKJUN
 * Date: 2017/7/28
 * Time: 17:15
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Protype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller {

    //显示已添加产品分类
    public function index() {
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['region'] = Protype::all();
        //return $data;
        return view('admin/region', ['data' => $data]);
    }
    //删除、添加产品分类
    public function edit(Request $request, $option) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $resultData = array();

        switch ($option) {
            case 'add':
                if ($request->has('ch_name') && $request->has('en_name')) {
                    $ch_name = $request->input('ch_name');
                    $en_name = $request->input('en_name');
                    $describe = $request->input('describe');

                    //判断是否存在该分类
                    $is_exist = Protype::where('ch_name',$ch_name)
                        ->orwhere('en_name',$en_name)
                        ->count();
                    if($is_exist >=1){
                        $resultData['status'] = 400;
                        $resultData['msg'] = "分类已存在";
                        return $resultData;
                    }
                    $protype = new Protype();
                    $protype->ch_name = $ch_name;
                    $protype->en_name = $en_name;
                    $protype->describe = $describe;

                    if ($protype->save()) {
                        $resultData['status'] = 200;
                    } else {
                        $resultData['status'] = 400;
                        $resultData['msg'] = "添加失败";
                    }
                }
                break;
            case 'delete':
                if ($request->has('rid')) {
                    $data = $request->input('rid');

                    $num = Product::where('type',$data)
                        ->delete();

                    $del = Protype::find($data);
                    $bool = $del->delete();

                    if ($bool) {
                        $resultData['status'] = 200;
                        $resultData['msg'] = "共有".$num."个产品被删除";
                    } else {
                        $resultData['status'] = 400;
                        $resultData['msg'] = "删除失败";
                    }
                }
                break;
            default:
                $resultData['status'] = 400;
                $resultData['msg'] = "无效操作";
                break;
        }

        return $resultData;
    }
    public function productView(){
        $uid = AdminAuthController::getUid();
        if ($uid == 0)
            return view('admin.login');

        $data = DashboardController::getLoginInfo();
        $data['region'] = Protype::all();
        $data['products'] = DB::table('st_product')
            ->leftjoin('st_product_type','st_product.type','st_product_type.id')
            ->select('st_product.id','st_product.ch_name','st_product.en_name','model','cas_code','package','is_urgency','st_product_type.ch_name as typename')
            ->orderBy('st_product.created_at','desc')
            ->paginate(10);
        //return $data;
        return view('admin/products', ['data' => $data]);
    }
    public function productEdit(Request $request, $option) {
        $uid = AdminAuthController::getUid();
        if ($uid == 0) {
            return redirect('admin/login');
        }

        $resultData = array();

        switch ($option) {
            case 'add':
                if ($request->has('ch_name') && $request->has('en_name')) {
                    $ch_name = $request->input('ch_name');
                    $en_name = $request->input('en_name');
                    $model = $request->input('model');
                    $package = $request->input('package');
                    $cas = $request->input('cas');
                    $type = $request->input('type');

                    //判断是否存在该分类
                    $is_exist = Product::where('ch_name',$ch_name)
                        ->orwhere('en_name',$en_name)
                        ->count();
                    if($is_exist >=1){
                        $resultData['status'] = 400;
                        $resultData['msg'] = "产品已存在";
                        return $resultData;
                    }
                    $product = new Product();
                    $product->ch_name = $ch_name;
                    $product->en_name = $en_name;
                    $product->model = $model;
                    $product->package = $package;
                    $product->cas_code = $cas;
                    $product->type = $type;

                    if ($product->save()) {
                        $resultData['status'] = 200;
                    } else {
                        $resultData['status'] = 400;
                        $resultData['msg'] = "添加失败";
                    }
                }
                break;
            case 'delete':
                if ($request->has('rid')) {
                    $data = $request->input('rid');

                    $del = Product::find($data);
                    $bool = $del->delete();

                    if ($bool) {
                        $resultData['status'] = 200;
                    } else {
                        $resultData['status'] = 400;
                        $resultData['msg'] = "删除失败";
                    }
                }
                break;
            case 'urgency':
                if ($request->has('rid')) {
                    $rid = $request->input('rid');
                    $urgency = $request->input('urgency');

                    $data = Product::find($rid);
                    $data->is_urgency = (int)$urgency;

                    if ($data->save()) {
                        $resultData['status'] = 200;
                        $resultData['msg'] = "设置成功";
                        return $resultData;
                        //return redirect()->back()->with('success','设置成功');
                    }
                }
                $resultData['status'] = 400;
                $resultData['msg'] = "设置失败";
                break;
            default:
                $resultData['status'] = 400;
                $resultData['msg'] = "无效操作";
                break;
        }

        return $resultData;
    }
}
