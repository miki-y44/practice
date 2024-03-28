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
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        })
        //let forData = $(".search-form").serialize();
        
        let inputKeyword = $("#keyword").val();
        let inputPrice1 = $('#price1').val();
        let inputPrice2 = $('#price2').val();
        let inputStock1 = $('#stock1').val();
        let inputStock2 = $('#stock2').val();
        let inputCompanyId = $('#companyId').val();

        $.ajax({
            url:"/vending/public/product_scope/",
            type:"GET",
            data:{keyword:inputKeyword,
                price1:inputPrice1,
                price2:inputPrice2,
                stock1:inputStock1,
                stock2:inputStock2,
                companyId:inputCompanyId},
            dataType:"html"
        })
        .done(function(data){
            let newTable = $(data).find(".product-table");
            $(".product-table").replaceWith(newTable);
            alert('検索結果');
        })
        
    })
})

