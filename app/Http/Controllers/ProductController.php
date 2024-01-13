<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;





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
        $products = Product::with('company')->get();

        $keyword = $request->input('keyword');
        $companyId=$request->input('companyId');
        
        $query=Product::query();
        
        if(!empty($keyword)){
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }
        
        if(!empty($companyId)){
            $query->join('companies','products.company_id','=','companies.id')
            ->select('products.*')
            ->where('company_id',$companyId);
        }
        
        $products = $query->Paginate(10);
        
        return view('product_view',compact('products','companies','keyword','companyId'))
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
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product_view');
       
    }    


    
    

    


}