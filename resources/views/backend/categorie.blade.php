@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Liste Des Catégories</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Catégories</h5>
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
                <h5 class="modal-title">Ajouter catégorie</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body m-3">
            <form action="{{Route("categorie.store")}}" method="post" id="frm" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="form-label">Nom de catégorie</label>
                                <input type="text" name="name" class="form-control" placeholder=" Entrez Nom de catégorie">
                            </div>
                            <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Entrez description de catégorie" rows="5">
                                    </textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Illustration</label>
                                <input type="text" name="illustra" class="form-control" placeholder="Entrez Illustration">
                            </div>
                            <div class="form-group">
                                <label class="form-label w-100">Icon de catgorie</label>
                                <input type="file"  name="icon" >
                                <small class="form-text  text-danger">type des icons(png,jpg)</small>
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
                                                            <th>Icon</th>
                                                            <th>Nom de catégorie</th>
                                                            <th>Description</th>
                                                            <th>Illustration</th>
                                                            <th>Modifier</th>
                                                            <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $cnt=1; @endphp
                                                    @foreach($categories as $cat)
                                                        <tr>
                                                            <td>{{ $cat->id }}</td>
                                                            <td>
<img src="{{asset('storage/'.$cat->icon)}}" class="img-thumbnail rounded" style="width: 80px;height: 50px;">
                                                            </td>
                                                            <input type="hidden" id="idcat{{$cnt}}" value="{{ $cat->id }}">
                                                            <input type="hidden" id="namecat{{$cnt}}" value="{{ $cat->nom_categorie }}">
                                                            <input type="hidden" id="descat{{$cnt}}" value="{{ $cat->description }}">
                                                            <input type="hidden" id="illcat{{$cnt}}" value="{{ $cat->illustration }}">
                                                            <td>{{ $cat->nom_categorie }}</td>
                                                            <td>{{ $cat->description }}</td>
                                                            <td>{{ $cat->illustration }}</td>
                                                            <td>
                                                            <button class="btn btn-warning btn-sm" type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})">
                                                            <i class="fas fa-edit"></i> Modifier
                                                            </button>
                                                            </td>
                                                            <td>
                                                            <form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('categorie.destroy', ['id' => $cat->id]) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm" onclick="del({{$cnt}});" id="sup{{$cnt}}">
                                                                <i class="fa fa-trash"></i> Supprimer
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
{{-- modal modification --}}
<div class="modal fade" id="sizedModalLg1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier catégorie</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body m-3">
                    <form action="{{Route("categorie.update")}}" method="post" id="frm1" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" id="idc" name="id">
                                    <div class="form-group">
                                        <label class="form-label">Nom de catégorie</label>
                                        <input type="text" id="name_m" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" id="desc_m" name="description" rows="5">
                                            </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Illustration</label>
                                        <input type="text" id="illu_m" name="illustra" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label w-100">Icon de catgorie</label>
                                        <input type="file"  name="icon" id="icon_m">
                                        <small class="form-text  text-danger">type des icons(png,jpg)</small>
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
        title: 'Êtes-vous sûr de vouloir Supprimer cette élément ?',
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
                $('#idc').val($('#idcat'+params).val());
                $('#name_m').val($('#namecat'+params).val());
                $('#desc_m').val($('#descat'+params).val());
                $('#illu_m').val($('#illcat'+params).val());

                $('#sizedModalLg1').modal();
 }
</script>

@stop
