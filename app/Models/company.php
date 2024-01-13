<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class company extends Model
{

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getcompanyList(){
        $compamies = DB::table('companies')->get();
        return $compamies;
    }
    
   

    
}
