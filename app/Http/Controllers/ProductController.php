<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;





class ProductController extends Controller
{       
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProduct_view(Request $request)
    {   
        $model = new Company();
        $companies = $model->getcompanyList();
             
        
        
        $products = Product::keywordFilter($request->keyword)
            ->companyIdFilter($request->companyId)
            ->paginate(10)
            ->appends($request->all());
        
        return view('product_view',compact('products','companies'))
                    ->with('page_id',request()->page);
    }
    



//商品登録画面
    public function regist_index(){
        $model = new Company();
        $companies = $model->getcompanyList();
        return view('regist',['companies'=>$companies]);
    }
//商品登録処理
    public function registSubmit(ProductRequest $request)
    {
        DB::beginTransaction();
        
        try{
            $model = new Product();
            $model->registProduct($request);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect(route('regist'));
    }
//商品編集画面   
    public function edit_index($id){
        $product = Product::find($id);
        $model = new Company();
        $companies = $model-> getcompanyList();
        return view('edit',['product'=>$product],['companies'=>$companies])
        ->with('page_id',request()->page_id);
    }
//商品編集処理    
    public function updata(ProductRequest $request,$id)
    {
        $product = Product::find($id);    
        $product -> editProduct($request,$product);
        return redirect()->route('edit',['id'=>$id]);
       
        
        
    }
        
    
//商品詳細画面
    public function detail_index($id){
        $products = Product::with('company')->get();
        $products = Product::find($id);
        return view('detail',['products'=>$products])
        ->with('page_id',request()->page_id);
    }

//削除処理
    public function destroy($id)
    {
        DB::beginTransaction();
        
        try{
            $product = Product::find($id);
            $product->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
        return redirect(route('product_view'))
        ->with('page_id',request()->page_id);
    }    
}    