@extends('layouts.product_app')

@section('title','商品情報詳細画面')

@section('content')
    <div class='container'>
        <div class = row>
            <h1>商品情報詳細画面</h1>
           
                <div class="detail-group">
                    <table class="detail-table">
                        <tr>
                            <th>ID</th>
                            <td>{{$products->id}}.</td>
                        </tr>
                
                        <tr>
                            <th>商品画像</th>
                            <td><img src= "/vending/public/storage/image/{{$products->img_path}}" width="50"height="50" alt="商品画像"></td>
                        </tr>

                        <tr>
                            <th>商品名</th>
                            <td>{{$products->product_name}}</td>
                        </tr>
                    
                        <tr>
                            <th>メーカー名</th>
                            <td>{{$products->company->company_name}}</td>
                        </tr>
                
                        <tr>
                            <th>価格</th>
                            <td>￥{{$products->price}}</td>
                        </tr>
                
                        <tr>
                            <th>在庫数</th>
                            <td>{{$products->stock}}</td>
                        </tr>
                
                        <tr>
                            <th>コメント</th>
                            <td class="comment">{{$products->comment}}</td>
                        </tr>
                    </table>      
             
                    <div class="btn">
                        <a href="{{route('edit',['id'=>$products->id])}}?page_id={{$page_id}}" class="edit" >編集</a>
                        <a href="{{url('/product_view')}}?page={{$page_id}}"type="button" class="back">戻る</a>
                    </div>
                </div>    
        </div>
    </div>      
@endsection          