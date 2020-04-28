@extends('layouts.site')

@section('content')
<div class="main-container container" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 5px wheat;height: 1080px;margin-bottom: 40px;">
		<ul class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Compte</a></li>
			<li><a href="#">Inscription</a></li>
		</ul>

		<div class="row">
			<div id="content" class="col-sm-12">
				<h2 class="title">Créer un compte</h2>
				<p>Si vous avez déjà un compte chez nous, connectez-vous à l'adresse <a href="{{ route('site.connexion') }}">page de connexion</a>.</p>
				<form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix">
					@csrf
					<fieldset id="account">
						<legend>Vos informations personnelles</legend>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-firstname">Prénom</label>
							<div class="col-sm-10">
								<input type="text" name="firstname" value="" placeholder="Prénom" id="input-firstname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-lastname">Nom</label>
							<div class="col-sm-10">
								<input type="text" name="lastname" value="" placeholder="Nom" id="input-lastname" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-telephone">Téléphone</label>
							<div class="col-sm-10">
								<input type="tel" name="telephone" value="" placeholder="Téléphone" id="input-telephone" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-fonction">Fonction</label>
							<div class="col-sm-10">
								<input type="text" name="fonction" value="" placeholder="Fonction" id="input-fonction" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-fax">Fax</label>
							<div class="col-sm-10">
								<input type="text" name="fax" value="" placeholder="Fax" id="input-fax" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-photo">Photo</label>
							<div class="col-sm-10">
								<input type="file" name="photo" value=""  id="input-photo" class="form-control">
							</div>
						</div>
					</fieldset>
					<fieldset id="address">
						<legend>Adresse</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-company">Société</label>
							<div class="col-sm-10">
								<input type="text" name="company" value="" placeholder="Société" id="input-company" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-1">Contact</label>
							<div class="col-sm-10">
								<input type="text" name="address" value="" placeholder="Contact" id="input-address-1" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-postcode">Code postal</label>
							<div class="col-sm-10">
								<input type="text" name="postcode" value="" placeholder="Code postal" id="input-postcode" class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-country">Pays</label>
							<div class="col-sm-10">
								<select name="country_id" id="input-country" class="form-control">
									<option value=""> --- Choisir un pays --- </option>
									<option value="Maroc">Maroc</option>
									<option value="France">France</option>
									<option value="Algérie">Algérie</option>
									<option value="Canada">Canada</option>
								</select>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-zone">Région</label>
							<div class="col-sm-10">
								<select name="zone_id" id="input-zone" class="form-control">
									<option value=""> --- Choisir une région --- </option>
									<option value="Fès-Meknés">Fès-Meknés</option>
									<option value="Casablanca-settat">Casablanca-settat</option>
									<option value="Rabat-salé">Rabat-salé</option>

								</select>
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-zone">Ville</label>
							<div class="col-sm-10">
								<select name="city" id="input-zone" class="form-control">
									<option value=""> --- Choisir une Ville --- </option>
									<option value="Fès">Fès</option>
									<option value="Casablanca">Casablanca</option>
									<option value="Rabat">Rabat</option>

								</select>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Mode de Passe</legend>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-password">Mode de Passe</label>
							<div class="col-sm-10">
								<input type="password" name="password" value="" placeholder="Mode de Passe" id="input-password" class="form-control">
							</div>
						</div>
					</fieldset>
					<div class="buttons">
						<div class="pull-right">
							<input type="submit" value="Enregistrer" class="btn btn-success btn-lg">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
@stop
