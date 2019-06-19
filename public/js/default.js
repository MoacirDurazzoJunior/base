$(document).ready(function(){
    /***
     * Exibir confirmação na ação de apagar registro
     */
    $('.apagar-registro a').click(function(){
        var form = $(this).parent();
        swal({
            title: 'Você tem certeza?',
            text: 'Deseja realmente apagar o registro?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
            confirmButtonClass: "btn btn-success btn-fill",
            cancelButtonClass: "btn btn-danger btn-fill",
            buttonsStyling: false
        }).then(function(result) {
            if(result.value){
                swal({
                    title: 'Apagado!',
                    text: 'O registro será apagado.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success btn-fill",
                    buttonsStyling: false
                }).then( function(){
                    form.submit();
                });
            }else{
                swal({
                    title: 'Cancelado',
                    text: 'O registro será mantido.',
                    type: 'error',
                    confirmButtonClass: "btn btn-info btn-fill",
                    buttonsStyling: false
                });
            }
        });
    });
    
    $('.dinheiro').mask('###0.00', {reverse: true});
});