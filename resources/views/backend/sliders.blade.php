@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Liste Des Sliders</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Sliders</h5>
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
                <h5 class="modal-title">Ajouter slider</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body m-3">
            <form action="{{Route("admin.store")}}" method="post" id="frm" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="form-label w-100">Image</label>
                                <input type="file"  name="image" >
                                <small class="form-text  text-danger">type des images(png,jpg)</small>
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
                                                            <th>Image</th>
                                                            <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $cnt=1; @endphp
                                                    @foreach($sliders as $slider)
                                                        <tr>
                                                            <td>{{ $slider->id }}</td>
                                                            <td>
<img src="{{asset('storage/'.$slider->image)}}" class="img-thumbnail rounded" style="width: 80px;height: 50px;">
                                                            </td>
                                                            <td>
                                                            <form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('admin.destroy', ['id' => $slider->id]) }}" method="post">
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
</script>

@stop
