@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Liste Des Produits</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Produits</h5>
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
                                <h5 class="modal-title">Ajouter Produit</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body m-3">
                            <form action="{{Route("produit.store")}}" method="post" id="frm" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="form-label">Nom de produit</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Catégorie</label>
                                                <select name="category_id" id="category" class="form-control">
                                                    <option value=""> --- Choisir catégorie --- </option>
                                                  @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->nom_categorie }}</option>
                                                  @endforeach
                                                </select>
                                             </div>
                                             <div class="form-group">
                                                <label for="fourn">Fournisseur</label>
                                                <select name="fourn_id" id="fourn" class="form-control">
                                                    <option value=""> --- Choisir fournisseur --- </option>
                                                  @foreach($fournisseurs as $fourn)
                                                    <option value="{{ $fourn->id }}">{{ $fourn->nom_fournisseur." ".$fourn->prenom_fournisseur }}</option>
                                                  @endforeach
                                                </select>
                                             </div>
                                            <div class="form-group">
                                                    <label class="form-label">Quantité par unité</label>
                                                    <input type="number" class="form-control" name="qteu">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Prix unitaire</label>
                                                <input type="number" class="form-control" name="prixunit">
                                            </div>
                                            <div class="form-group">
                                            <label class="form-label">Unités en stock</label>
                                            <input type="number" class="form-control" name="unitS">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Unités commandées</label>
                                                <input type="number" name="untC" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Niveau de réapprovisionnement</label>
                                                <input type="number" name="nivr" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label w-100">Image de produit</label>
                                                <input type="file"  name="photo" >
                                                <small class="form-text  text-danger">type des images(png,jpg)</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Code bar de produit</label>
                                                <input type="text" name="code_b" class="form-control">
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
                                                            <th>Photo</th>
                                                            <th>Nom de produit</th>
                                                            <th>Prix unitaire</th>
                                                            <th>unités en stock</th>
                                                            <th>Détail</th>
                                                            <th>Modifier</th>
                                                            <th>Supprimer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $cnt=1; @endphp
                                                    @foreach($Produits as $prod)
                                                        <tr>
                                                            <td>{{ $prod->id }}</td>
                                                            <td>
<img src="{{asset('storage/'.$prod->image)}}" class="img-thumbnail rounded" style="width: 80px;height: 50px;">
                                                            </td>
                                                            <td>{{ $prod->nom_produit }}</td>
                                                            <td>{{ $prod->prix_unitaire }}</td>
                                                            <td>{{ $prod->unites_stock}}</td>
                                                            <td>
                                                                <a href="#" 
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-eye"></i> Détail
                                                                </a>     
                                                                </td>
                                                            <td>
                                                            <a href="#" 
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> Modifier
                                                            </a>     
                                                            </td>
                                                            <td>
                                                            <form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('produit.destroy', ['id' => $prod->id]) }}" method="post">
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