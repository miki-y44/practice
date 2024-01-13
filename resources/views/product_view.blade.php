<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="{{asset('/css/product_css.css')}}" rel="stylesheet">
        <title>自動販売機売上管理</title>
    </head>
    <body>
        <header>
           @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
            <div class='top-containar'>
            <h1>商品一覧画面</h1>
            <div class="search">
                <form action ="{{route('product_view')}}" method = "GET">
                  @csrf
                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="検索キーワード">
                    
                    <select class="form-control" id="companyId" name="companyId" value="{{$companyId}}"placeholder="メーカー名" >
                          <option value="" selected disabled>メーカー名</option> 
                        @foreach($companies as $company)  
                          <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach  
                      </select>
                   
                    <button type='submit' class="btn btn-default" name='search'>検索</button>
                </form>
            </div>
        </div>    
        <div class = "productlist">

            <table class="product-table">
                <thead class="name">
                    <tr>
                        <th>ID</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                        <th><a href="{{ route('regist')}}"name='regist-btn' class="regist-btn">新規登録</a></th>
                        
                    </tr>
                </thead>        
                <tbody class="body">
                    @foreach($products as $product)
                        <tr>
                        
                            <td >{{$product->id}}.</td>
                            <td><img src= "storage/image/{{$product->img_path}}"width="50"height="50" alt="商品画像"></td>
                            <td>{{$product->product_name}}</td>
                            <td>￥{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->company->company_name}}</td>
                            <td class="btns">
                                <a href="{{route('detail',['id'=>$product->id])}}?page_id={{$page_id}}" name="detail-btn" class="detail-btn">詳細</a>
                            
                                <form action="{{route('destroy',$product->id)}}" method="post" onsubmit="return dleConfirm()">
                                    @csrf
                                   <button type="submit" class="delete-btn" name="delete">削除</button>
                                </form>   
                            </td>
                    
                        </tr>       
                    @endforeach                    

                </tbody> 
            </table>       
        </div>
        <footer>
            {{$products->links('pagination::bootstrap-4')}}
        </footer>
        <script src="{{ asset('js/product_js.js') }}"></script>
    </body>
</html>
