<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;


class product extends Model
{
    use HasFactory;  

    protected $table = 'products';
    protected $primaryKey = "id";
    protected $fillable=[
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at'
    ];
    //リレーション   
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //テーブル取得
    public function getProductList()
    {
        $products = DB::table('products')->get();
        return $products;
        
    }
    //登録処理
    public function registProduct($data)
    {
        DB::table('products')->insert([
            'company_id'=>$data->company_id,
            'product_name'=>$data->product_name,
            'price'=>$data->price,
            'stock'=>$data->stock,
            'comment'=>$data->comment,
            'img_path'=>$data->img_path,
            'created_at'=>now(),
        ]);
    }

    //編集処理
    public function editProduct($request,$product)
    {
        $result = $product->fill([
            'company_id'=>$request->company_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'comment'=>$request->comment,
            'img_path'=>$request->image,
            'updated_at'=>now(),
        ])->save();
        return $result;
    }
    //検索処理
    public function scopeKeywordFilter($query,string $keyword=null)
    {   
        if(!$keyword){
            return $query;
        }
        return $query->where('product_name', 'LIKE', "%{$keyword}%");
    }
    public function scopeCompanyIdFilter($query,string $companyId=null)
    {
        if(!$companyId){
            return $query;
        }
        return $query->join('companies','products.company_id','=','companies.id')
                      ->select('products.*')
                      ->where('company_id',$companyId);
    }
}



