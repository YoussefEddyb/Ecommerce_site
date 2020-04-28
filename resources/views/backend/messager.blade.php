@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Liste Des Messagers</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Messagers</h5>
                                            </div>
                                            <div class="card-body">


<!-- BEGIN  modal -->
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#sizedModalLg">
<i class="align-middle mr-2 fas fa-fw fa-plus-square"></i><span class="align-middle">Ajouter</span>
</button>
<div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ajouter Messager</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </div>
        <div class="modal-body m-3">
        <form action="{{Route("messager.store")}}" method="post" id="frm">
                    @csrf
                        <div class="form-group">
                            <label class="form-label">Nom de messager</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="tel" class="form-control" data-mask="00-00 00 00 00">
                            <span class="font-13 text-danger">Exemple "xx-xx xx xx xx"</span>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            <button form="frm" type="submit" class="btn btn-success">Enregistrer</button>
        </div>
    </div>
</div>
</div>
<!-- END  modal -->
<table id="datatables-buttons" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>Id</th>
<th>Nom de catégorie</th>
<th>Téléphone</th>
<th>Modifier</th>
<th>Bloquer</th>
</tr>
</thead>
<tbody>
@php $cnt=1; @endphp
@foreach($messagers as $message)
<tr>
<input type="hidden" id="idmr{{$cnt}}" value="{{ $message->id }}">
<input type="hidden" id="namemr{{$cnt}}" value="{{ $message->nom_message }}">
<input type="hidden" id="telmr{{$cnt}}" value="{{ $message->telephone }}">
<td>{{ $message->id }}</td>
<td>{{ $message->nom_message }}</td>
<td>{{ $message->telephone }}</td>
<td>
<button class="btn btn-warning btn-sm" type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})">
<i class="fas fa-edit"></i> Modifier
</button>     
</td>
<td>
<form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('messager.destroy', ['id' => $message->id]) }}" method="post">
@csrf 
@method('delete')
<button class="btn btn-danger btn-sm" onclick="del({{$cnt}});" id="sup{{$cnt}}">
<i class="fa fa-trash"></i> Bloquer
</button>
</form> 
</td>
</tr>
@php $cnt++; @endphp
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="card-body">
</div>
</div>
</div>
</div>

</div>
</main>

<div class="modal fade" id="sizedModalLg1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Messager</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body m-3">
            <form action="{{Route("messager.update")}}" method="post" id="frm1">
                        @csrf
                            <input type="hidden" id="id_m" name="id">
                            <div class="form-group">
                                <label class="form-label">Nom de messager</label>
                                <input type="text" id="name_m" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" id="tel_m" name="tel" class="form-control" data-mask="00-00 00 00 00">
                                <span class="font-13 text-danger">Exemple "xx-xx xx xx xx"</span>
                            </div>
                        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                <button form="frm1" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<!-- END  modal -->
@stop

@section('javascript')
<script>
function del(id)
{
    Swal.fire({
        title: 'Êtes-vous sûr de vouloir bloquer cette élément ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Annuler',
        confirmButtonText: 'Oui'
        }).then((result) => {
        if (result.value) {
        document.getElementById('fr'+id).submit();
        }
        })
}
function modifier(params) {
                $('#id_m').val($('#idmr'+params).val());
                $('#name_m').val($('#namemr'+params).val());
                $('#tel_m').val($('#telmr'+params).val());

                $('#sizedModalLg1').modal();
 }
</script>

@stop