<form method="post" action="{{ $link }}" class="apagar-registro">
    @csrf
    @method('DELETE')
    <a href="javascript:void(0)" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Apagar"><i class="zmdi zmdi-delete"></i></a>
</form>
