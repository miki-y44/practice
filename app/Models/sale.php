<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    
    protected $fillable = ['product_id','created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }    
}

