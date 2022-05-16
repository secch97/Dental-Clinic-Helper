$(document).ready(function(){
    $('.btn.btn-sm.btn-danger.waves-effect').click(function(e){
        e.preventDefault();
        if(! confirm("Esta seguro")){
            return false;
        }

    });
});