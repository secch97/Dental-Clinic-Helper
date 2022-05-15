$(document).ready(function(){
    $('.btn.btn-sm.btn-danger.waves-effect').click(function(e){
        e.preventDefault();
      
        var row=$(this).parents('tr');
        var form=$(this).parents('form');
        var url = form.attr('action');


        $.post(url, form.serialize(), function(result){
            row.fadeOut();
            $('#alert').html(result.message);
        }).fail(function(){
            $('#alert').html('¡Aviso! Algo salió mal...');
        });

    });
});