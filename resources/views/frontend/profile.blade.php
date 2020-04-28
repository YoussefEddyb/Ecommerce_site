@extends('layouts.site')

@section('content')
	<!-- Main Container  -->
	<div class="main-container container" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 5px wheat;height: 1250px;margin-bottom: 40px;">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Compte</a></li>
			<li><a href="{{ route('client.profile') }}">Mon compte</a></li>
		</ul>
		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-12" id="content">
				<h2 class="title">Mon compte</h2>
            <p class="lead">Bienvenue,<strong> {{$client->nom_client .' '. $client->prenom_client}} </strong> - Pour mettre à jour les informations de votre compte.</p>
                <form action="{{ route('client.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" value="{{ $client->id}}" name="id">
					<div class="row">
						<div class="col-sm-6">
							<fieldset id="personal-details">
								<legend>Vos informations personnelles</legend>
                                <div class="form-group required">
                                    <label class="control-label" for="input-firstname">Prénom</label>
                                    <input type="text" name="firstname" value="{{$client->prenom_client}}" id="input-firstname" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-lastname">Nom</label>
                                        <input type="text" name="lastname" value="{{$client->nom_client}}" id="input-lastname" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-email">E-Mail</label>
                                        <input type="email" name="email" value="{{$client->email}}" id="input-email" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-telephone">Téléphone</label>
                                        <input type="tel" name="telephone" value="{{$client->telephone}}" id="input-telephone" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-fonction">Fonction</label>
                                        <input type="text" name="fonction" value="{{$client->fonction}}" id="input-fonction" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-fax">Fax</label>
                                        <input type="text" name="fax" value="{{$client->fax}}" id="input-fax" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="input-photo">Photo</label>
                                    <input type="file" name="photo" id="input-photo" onchange="readURL(this);">
                                    <br>
                                    <img id="blah" src="{{asset('storage/'.$client->photo)}}" width="100" height="100" style="margin: 0;" />
                                </div>
							</fieldset>
							<br>
						</div>
						<div class="col-sm-6">
							<fieldset>
                                <legend>Adresse</legend>
                                <div class="form-group">
                                    <label class="control-label" for="input-company">Société</label>
                                        <input type="text" name="company" value="{{$client->societe}}" id="input-company" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-address-1">Contact</label>
                                        <input type="text" name="address" value="{{$client->contact}}" id="input-address-1" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-postcode">Code postal</label>
                                        <input type="text" name="postcode" value="{{$client->code_postal}}" id="input-postcode" class="form-control">
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-country">Pays</label>
                                        <select name="country_id" id="input-country" class="form-control">
                                            <option value=""> --- Choisir un pays --- </option>
                                            <option value="Maroc">Maroc</option>
                                            <option value="France">France</option>
                                            <option value="Algérie">Algérie</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-zone">Région</label>
                                        <select name="zone_id" id="input-zone" class="form-control">
                                            <option value=""> --- Choisir une région --- </option>
                                            <option value="Fès-Meknés">Fès-Meknés</option>
                                            <option value="Casablanca-settat">Casablanca-settat</option>
                                            <option value="Rabat-salé">Rabat-salé</option>
                                        </select>
                                </div>
                                <div class="form-group required">
                                    <label class="control-label" for="input-zone">Ville</label>
                                        <select name="city" id="input-zone" class="form-control">
                                            <option value=""> --- Choisir une Ville --- </option>
                                            <option value="Fès">Fès</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Rabat">Rabat</option>
                                        </select>
                                </div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
                            <fieldset>
                            <legend>Changer le mot de passe</legend>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Ancien mot de passe</label>
                                <input type="password" class="form-control" id="input-password" value="" name="old_password">
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="input-password" value="" name="new_password">
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">Confirmer le nouveau mot de passe</label>
                                <input type="password" class="form-control" id="input-confirm" value="" name="new_confirm">
                            </div>
							</fieldset>
						</div>
					</div>
					<div class="buttons clearfix">
						<div class="pull-right">
							<input type="submit" class="btn btn-md btn-success" value="Enregistrer">
						</div>
					</div>
				</form>
			</div>
			<!--Middle Part End-->
		</div>
	</div>
	<!-- //Main Container -->
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
