@extends('layouts.back')

@section('content')
<main class="content">
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Paramètres</h1>
            <div class="row">
                <div class="col-md-9 col-xl-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Information public</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="inputUsername">Nom</label>
                                                <input type="text" class="form-control" name="name" id="inputUsername" value="{{ $user->nom_employe}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUserprenom">Prénom</label>
                                                    <input type="text" name="prenom" class="form-control" id="inputUserprenom" value="{{ $user->prenom_employe}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUsername">Notes</label>
                                                    <textarea rows="2" class="form-control" id="inputBio">{{ $user->notes}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <img id="blah" src="{{asset('storage/'.$user->photo)}}" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                    <div class="mt-2">
                                                        <input type="file" class="btn btn-primary" onchange="readURL(this);">
                                                    </div>
                                                    <small class="text-danger">Type des images(png,jpg)</small>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                            <div class="card-header">
                            <h5 class="card-title mb-0">Information privé</h5>
                            </div>
                            <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fonction">Fonction</label>
                                        <input type="text" class="form-control" name="fonction" id="fonction" value="{{ $user->fonction}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="titrec">Titre de courtoisie</label>
                                        <input type="text" class="form-control" name="titrec" id="titrec" value="{{ $user->titre_courtoisie}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="daten">Date de naissance</label>
                                            <input type="date" class="form-control" name="daten" id="daten" value="{{ $user->date_naissance}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="date_em">Date d'embauche</label>
                                            <input type="date" class="form-control" name="date_em" id="date_em" value="{{ $user->date_embauche}}">
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="adresse">Adresse</label>
                                            <input type="text" class="form-control" name="adresse" id="adresse" value="{{ $user->adresse}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $user->email}}">
                                        </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Téléphone</label>
                                        <input type="text" value="{{ $user->tel_domicile}}" name="tel" class="form-control" data-mask="00 00000000">
                                        <span class="font-13 text-danger">Exemple "xx-xxxxxxxx"</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <label for="codepost">Code postal</label>
                                            <input type="text" class="form-control" name="codepost" id="codepost" value="{{ $user->code_postal}}" data-mask="00000">
                                            <span class="font-13 text-danger">Exemple "xxxxx"</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="form-label">Pays</label>
                                         <select name="country_id" id="input-country" class="form-control">
                                                <option value=""> --- Choisir un pays --- </option>
                                                <option value="Maroc">Maroc</option>
                                                <option value="France">France</option>
                                                <option value="Algérie">Algérie</option>
                                                <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Région</label>
                                         <select name="reg_id" id="input-zone" class="form-control">
                                                <option value=""> --- Choisir une région --- </option>
                                                <option value="Fès-Meknés">Fès-Meknés</option>
                                                <option value="Casablanca-settat">Casablanca-settat</option>
                                                <option value="Rabat-salé">Rabat-salé</option> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ville</label>
                                        <select name="city" id="input-city" class="form-control">
                                                <option value=""> --- Choisir une Ville --- </option>
                                                <option value="Fès">Fès</option>
                                                <option value="Casablanca">Casablanca</option>
                                                <option value="Rabat">Rabat</option>
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </form>
                            </div>
                            </div>
                            <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Modification de mot de passe</h5>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="oldpassword">Mot de passe actuel</label>
                                            <input type="password" class="form-control" id="oldpassword">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">mot de passe</label>
                                                <input type="password" name="password" class="form-control" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="cpassword">Confrimation de mot de passe</label>
                                                <input type="password" name="cpassword" class="form-control" id="cpassword">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>
</main>

@stop

@section('javascript')
<script src="{{asset('js/jquery.min.js')}}" ></script>
<script type="text/javascript">

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@stop