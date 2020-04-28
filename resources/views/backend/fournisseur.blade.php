@extends('layouts.back')

@section('content')
<main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Liste Des Fournisseurs</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Fournisseurs</h5>
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
                                <h5 class="modal-title">Ajouter un fournisseur</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </div>
                            <div class="modal-body m-3">
                            <form action="{{Route("fournisseur.store")}}" method="post" id="frm" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="form-label">Nom</label>
                                                <input type="text" name="name" class="form-control" placeholder=" Entrez Nom">
                                            </div>
                                            <div class="form-group">
                                                    <label class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" name="prenom" placeholder="Entrez Prénom">
                                                </div>
                                            <div class="form-group">
                                                <label class="form-label">Société</label>
                                                <input type="text" name="societe" class="form-control" placeholder="Entrez Société">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Contact</label>
                                                <input type="text" name="contact" class="form-control" placeholder="Entrez Contact">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Adresse</label>
                                                <input type="text" name="adresse" class="form-control" placeholder="Entrez Adresse">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Fonction</label>
                                                <input type="text" name="fonction" class="form-control" placeholder="Entrez Fonction">
                                            </div>
                                            <div class="form-group required">
                                                <label class="form-label">Pays</label>
                                                 <select name="country_id" id="input-country" class="form-control">
                                                        <option value=""> --- Choisir un pays --- </option>
                                                        <option value="Maroc">Maroc</option>
                                                        <option value="France">France</option>
                                                        <option value="Algérie">Algérie</option>
                                                        <option value="Canada">Canada</option>
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label class="form-label">Région</label>
                                                 <select name="reg_id" id="input-zone" class="form-control">
                                                        <option value=""> --- Choisir une région --- </option>
                                                        <option value="Fès-Meknés">Fès-Meknés</option>
                                                        <option value="Casablanca-settat">Casablanca-settat</option>
                                                        <option value="Rabat-salé">Rabat-salé</option> 
                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label class="form-label">Ville</label>
                                                <select name="city" id="input-city" class="form-control">
                                                        <option value=""> --- Choisir une Ville --- </option>
                                                        <option value="Fès">Fès</option>
                                                        <option value="Casablanca">Casablanca</option>
                                                        <option value="Rabat">Rabat</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
												<label>Code postal</label>
												<input type="text" name="codepost" class="form-control" data-mask="00000">
												<span class="font-13 text-danger">Exemple "xxxxx"</span>
                                            </div>
                                            <div class="form-group">
												<label>Téléphone</label>
												<input type="text" name="tel" class="form-control" data-mask="00 00000000">
												<span class="font-13 text-danger">Exemple "xx-xxxxxxxx"</span>
                                            </div>
                                            <div class="form-group">
												<label>Faxe</label>
												<input type="text" name="fax" class="form-control" data-mask="00 00000000">
												<span class="font-13 text-danger">Exemple "xx-xxxxxxxx"</span>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">E-mail</label>
                                                <input type="text" class="form-control" name="email" placeholder="Email">
                                                <small class="form-text text-danger">exemple@gmail.com</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Mot de passe</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirmation de mot de passe</label>
                                                <input type="password" class="form-control" name="validation-password-confirmation">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label w-100">Icon de catgorie</label>
                                                <input type="file"  name="photo" >
                                                <small class="form-text  text-danger">type des icons(png,jpg)</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Code Bar</label>
                                                <input type="text" name="codeb" class="form-control">
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
                                                            <th>Nom</th>
                                                            <th>Prénom</th>
                                                            <th>Téléphone</th>
                                                            <th>E-mail</th>
                                                            <th>Detail</th>
                                                            <th>Modifier</th>
                                                            <th>Bloquer</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $cnt=1; @endphp
                                                    @foreach($fournisseurs as $forn)
                                                        <tr>
                                                            <td>{{ $forn->id }}</td>
                                                            <td>
<img src="{{asset('storage/'.$forn->photo)}}" class="img-thumbnail rounded" style="width: 80px;height: 50px;">
                                                            </td>
                                                            <td>{{ $forn->nom_fournisseur }}</td>
                                                            <td>{{ $forn->prenom_fournisseur }}</td>
                                                            <td>{{ $forn->telephone }}</td>
                                                            <td>{{ $forn->email }}</td>
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
                                                            <form id="fr{{$cnt}}" onsubmit="return false;" action="{{ route('fournisseur.destroy', ['id' => $forn->id]) }}" method="post">
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
@stop

@section('javascript')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script>
    $(function() {
        // Initialize validation
        $("#frm").validate({
            rules: {
                "email": {
                    required: true,
                    email: true
                },
                "password": {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
                "validation-password-confirmation": {
                    required: true,
                    minlength: 8,
                    equalTo: "input[name=\"password\"]"
                }
            },
        		// Errors
				errorPlacement: function errorPlacement(error, element) {
					var $parent = $(element).parents(".form-group");
					// Do not duplicate errors
					if ($parent.find(".jquery-validation-error").length) {
						return;
					}
					$parent.append(
						error.addClass("jquery-validation-error small form-text invalid-feedback")
					);
				},
				highlight: function(element) {
					var $el = $(element);
					var $parent = $el.parents(".form-group");
					$el.addClass("is-invalid");
					// Select2 and Tagsinput
					if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
						$el.parent().addClass("is-invalid");
					}
				},
				unhighlight: function(element) {
					$(element).parents(".form-group").find(".is-invalid").removeClass("is-invalid");
				}
        });
    });

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
</script>
@stop