<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Kyslik\ColumnSortable\Sortable;


class product extends Model
{
    use HasFactory;  
    use Sortable;

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
    public function sales()
    {
        return $this->hasMany(Sale::class);
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
    public function scopeKagenPriceFilter($query,string $price1=null)
    {
        if(!$price1){
        return $query;
        }
        return $query->where ('price','>=',$price1);
    }
    public function scopeJougenPriceFilter($query,string $price2=null)
    {
        if(!$price2){
        return $query;
        }
        return $query->where ('price','<=',$price2);
    }


    public function scopekagenStockFilter($query,string $stock1=null)
    {
        if(!$stock1){
            return $query;
        }
        return $query->where('stock','>=', $stock1);
    }
    public function scopejougenStockFilter($query,string $stock2=null)    
    {    
        if(!$stock2){
            return $query;
        }
        return $query->where('stock','<=',$stock2);
    }
}



