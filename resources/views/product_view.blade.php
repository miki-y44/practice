<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link href="{{asset('/css/product_css.css')}}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/ajax_js.js') }}"></script>
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
            <h1 class = "titleName">商品一覧画面</h1>
            <div class="search-form">
                <form action ="{{route('product_scope')}}" method = "GET">
                  @csrf
                    <div class= "priceSearch">
                        <div>〇価格検索〇</div>
                        <input type="number"  id="price1" name="price1" placeholder="価格下限">
                        <div class = "kara"> ~ </div>
                        <input type="number"  id="price2" name="price2" placeholder="価格上限">
                    </div>
                    <div class="stockSearch"> 
                        <div>〇在庫検索〇</div>
                        <input type="number"  id="stock1" name="stock1" placeholder="在庫数下限">
                        <div class = "kara"> ~ </div>
                        <input type="number"  id="stock2" name="stock2" placeholder="在庫数上限">
                    </div>
                    <div class="nameSearch">
                        <div>〇名前検索〇</div>
                        <input type="text" class="box" id="keyword" name="keyword" placeholder="検索キーワード">
                         
                        <select aria-label="State" class="box" id="companyId" name="companyId" placeholder="メーカー名" >
                              <option value="" selected disabled>メーカー名</option> 
                            @foreach($companies as $company) 
                              <option value="{{$company->id}}">{{$company->company_name}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="btn-containar">
                        <button type='submit' class="search-btn" id="search-btn" name='search'>検索</button>
                        <a href="{{route('product_view')}}" name="list" class="list">一覧画面へ</a>
                    </div>               
                </form>
                    
            </div>
        </div>    
        <div class = "productlist">

            <table class="product-table">
                <thead class="name">
                    <tr>
                        <th>@sortablelink('id','ID')</th>
                        <th>@sortablelink('img_path','商品画像')</th>
                        <th>@sortablelink('product_name','商品名')</th>
                        <th>@sortablelink('price','価格')</th>
                        <th>@sortablelink('stock','在庫数')</th>
                        <th>@sortablelink('company_name','メーカー名')</th>
                        <th><a href="{{ route('regist')}}"name='regist-btn' class="regist-btn">新規登録</a></th>
                        
                    </tr>
                </thead>        
                <tbody class="product-body">
                    @foreach($products as $product)
                        <tr>
                        
                            <td >{{$product->id}}.</td>
                            <td><img src= "storage/image/{{$product->img_path}}"width="50"height="50" alt="商品画像"></td>
                            <td>{{$product->product_name}}</td>
                            <td>￥{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->company->company_name}}</td>
                            <td class="btns">
                                <a href="{{route('detail',['id'=>$product->id])}}" name="detail-btn" class="detail-btn">詳細</a>
                                
                                <form action="{{route('destroy',$product->id)}}" method="post" >
                                    @csrf
                                   <input data-product_id="{{$product->id}}" type="submit" class="delete-btn" name="delete" value="削除">
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
