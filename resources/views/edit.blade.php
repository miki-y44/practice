@extends('layouts.product_app')

@section('title','商品情報編集画面')

@section('content')
    <div class='container'>
        <h1>商品情報編集画面</h1>

        <div class = "view-group">
            <form action="{{route('updata',['id'=>$product->id])}}" method="post" onsubmit="return editConfirm()">
            
        
                @csrf
                <div class="form-group">
                    <div class="id">ID.</div>
                    <div class="ID" id="id">{{$product->id}}</div>
                </div>
                <div class="form-group">
                    <label for="product_name">商品名<span>*</span></label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}">
                    @if($errors->has('product_name'))
                        <p>{{$errors->first('product_name')}}</p>
                    @endif        
                </div>

                <div class="form-group">
                    <label for="company_id">メーカー名<span>*</span></label>
                    <select class="form-control" id="company_id" name="company_id" value="{{$product->id}}">
                            <option value="" selected disabled></option>
                        @foreach($companies as $company)   
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach     
                    </select> 
                    @if($errors->has('company_id'))
                        <p>{{$errors->first('company_id')}}</p>
                    @endif  
                </div>          

                <div class="form-group">
                    <label for="price">価格<span>*</span></label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
                    @if($errors->has('price'))
                        <p>{{$errors->first('price')}}</p>
                    @endif        
                
                </div>

                <div class="form-group">
                    <label for="stock">在庫数<span>*</span></label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{$product->stock}}">
                    @if($errors->has('stock'))
                        <p>{{$errors->first('stock')}}</p>
                    @endif        
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <input type="textarea" class="form-control" id="comment" name="comment" value="{{$product->comment}}"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">商品画像</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/jpg" value="/vending/public/storage/image/{{$product->img_path}}">
                </div>

                <div class="btn">
                    <button type="submit" class="regist" >更新</button>
                    <a href="{{route('detail',['id'=>$product->id])}}?page_id={{$page_id}}" type="button" class="back-2">戻る</a>
                </div>
            </form>
        </div>
    </div>      
@endsection          