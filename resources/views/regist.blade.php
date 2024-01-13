@extends('layouts.product_app')

@section('title','商品新規登録画面')

@section('content')
    <div class='container'>
        <h1>{{ __('商品新規登録画面')}}</h1>
            <div class = "view-group">
                <form action="{{route('submit')}}" method="post" enctype="multipart/form-data" onsubmit="return fmConfirm()">
                    @csrf

                    <div class="form-group">
                        <label for="product_name">商品名<span>*</span></label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}">
                        @if($errors->has('product_name'))
                            <p>{{$errors->first('product_name')}}</p>
                        @endif        
                    </div>

                    <div class="form-group">
                        <label for="company_id">メーカー名<span>*</span></label>
                        <select class="form-control" id="company_id" name="company_id" value="{{old('company_id')}}">
                                <option value="" selected disabled></option>
                            @foreach($companies as $company)   
                                <option value='{{$company->id}}'>{{$company->company_name}}</option>
                            @endforeach     
                        </select> 
                        @if($errors->has('company_id'))
                            <p>{{$errors->first('company_id')}}</p>
                        @endif  
                    </div>          

                    <div class="form-group">
                        <label for="price">価格<span>*</span></label>
                        <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
                        @if($errors->has('price'))
                            <p>{{$errors->first('price')}}</p>
                        @endif        
                
                    </div>

                    <div class="form-group">
                        <label for="stock">在庫数<span>*</span></label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock')}}">
                        @if($errors->has('stock'))
                            <p>{{$errors->first('stock')}}</p>
                        @endif        
                    </div>

                    <div class="form-group">
                        <label for="comment">コメント</label>
                        <textarea class="form-control" id="comment" name="comment">{{old('comment')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="img_path">商品画像</label>
                        <input type="file" class="form-control" id="img_path" name="img_path" accept="image/png, image/jpeg, image/jpg" value="{{old('img_path')}}">
                    </div>
                    
                    <div class="btn">
                        <button type="submit" id="registbtn" class="regist" >新規登録</button>
                        <a href="{{ route('product_view')}}" type="button" class="back-2">戻る</a>
                    </div>            
                </form>
            </div>
            
    </div>      
    
@endsection          