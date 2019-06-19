$(document).ready(function(){
    $('.tree-permissoes .check').change(function(e){
        var val = $(this).prop('checked');
        $(this).parent().parent().siblings('.collapse').find('.check').prop('checked', val);
        e.preventDefault();
    });
});