
@push('scripts')
    <script type='text/javascript'>
        $(document).ready(function() {
            $("#btn_assinar").click(function(){
                var form = $(this).parent();
                swal({
                    title: 'Assinatura',
                    text: 'Informe sua senha para assinar este registro',
                    input: 'password',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: "btn btn-success btn-fill",
                    cancelButtonClass: "btn btn-danger btn-fill",
                    buttonsStyling: false
                }).then(function(result) {
                    if(result.value){
                        console.log(result);
                        $('#password').val(result.value);
                        form.submit();
                    }else{
                        swal({
                            title: 'Cancelado',
                            text: 'O registro não será assinado!',
                            type: 'error',
                            confirmButtonClass: "btn btn-info btn-fill",
                            buttonsStyling: false
                        });
                    }
                });
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.css') }}" />
@endpush
<form method="post" action="{{route('sistema.assinatura.assinar')}}">
    @csrf
    <input type="hidden" name="registro_id" value="{{$result->id}}">
    <input type="hidden" name="user_id" value="{{$logged_user->id}}">
    <input type="hidden" name="referencia" value={{$referencia}}>
    <input type="hidden" name="password" value="" id="password">
    <input type="hidden" name="route_return" value="{{$route_return}}">
    <a href="javascript:void(0)" id="btn_assinar" class="btn btn-info" data-toggle="tooltip" data-placement="top" data-original-title="Assinar"><i class="zmdi zmdi-check"></i></a>
</form>