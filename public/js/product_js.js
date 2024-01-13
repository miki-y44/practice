//let registbtn = document.getElementById('registbtn');
//registbtn.addEventListener('click',function(){
    

    
   
function fmConfirm(){  
    if(window.confirm('登録してよろしいですか？')){
        return true;
    }else{
        window.alert('登録をやめました。');
        return false;
    };
};

function dleConfirm(){
    if(window.confirm('本当に削除してよろしいですか？')){
        window.alert('削除しました。');
        return true;
    }else{
        window.alert('削除をやめました。');
        return false;
    };
};

function editConfirm(){
    if(window.confirm('本当に更新してよろしいですか？')){
        return true;
    }else{
        window.alert('更新をやめました。');
        return false;
    };

}

