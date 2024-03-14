//console.log('a');
$(function (){

    $(".delete-btn").on("click",function(e){
        e.preventDefault()
        var deleteConfirm = window.confirm('本当に削除してよろしいですか？');
      
        if(deleteConfirm == true){
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            })
            var clickEle = $(this)
            var productID = clickEle.attr('data-product_id');
            $.ajax({
                
                url:"/vending/public/product_view/"+productID,
                type:"POST",
                data:{'id':productID},
                dataType:"text"
            })
            .done(function(){
                clickEle.parents('tr').remove();
                alert('削除しました。');
            })
            .fail(function(){
                alert('削除出来ませんでした。');
            });
        }else{
            window.alert('削除をやめました。')
            return false;
        };
    });
});

$(function(){

    $(".search-btn").on("click",function(e){
        e.preventDefault()
        //$.ajaxSetup({
          //  headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        //})
        //$('.product-table tbody').empty();
        let keyword = $('#keyword').val();
        let price1 = $('#price1').val();
        let price2 = $('#price2').val();
        let stock1 = $('#stock1').val();
        let stock2 = $('#stock2').val();
        let companyId = $('#companyId').val();
        console.log(keyword);
        $.ajax({
                
            url:"/vending/public/product_scope/",
            type:"GET",
            //data:{keyword:keyword,'price1':price1,'price2':price2,'stock1':stock1,'stock2':stock2,'companyId':companyId,},
            data:{keyword:keyword},
            dataType:"json"
        })
        .done(function(data){
            //console.log(data);
        
            $.each(data.products,function(key,value){
                
                let id = value.id;
                let img_path = value.img_path;
                let product_name = value.product_name;
                let price = value.price;
                let stock = value.stock;
                let company_name = value.company_name;
                
                let html = `
                <tr>
                <td>${id}</td>
                <td><img src="${img_path}" alt = "商品画像"></td>
                <td>${product_name}</td>
                <td>${price}</td>
                <td>${stock}</td>
                <td>${company_name}</td>
                            
                </tr> `;
                $(".product-table").append(html);
            })
            
            alert('検索結果');
            console.log(keyword);
        })
        .fail(function(){
            alert('失敗');
        });
    });
});