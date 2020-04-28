<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Ecommerce - Admin</title>
    <link href="{{asset('backend/css/classic.css')}}" rel="stylesheet">
	<!-- BEGIN SETTINGS -->
	<style>
		body {
			opacity: 0;
		}
    </style>
	<!-- END SETTINGS -->
</head>
<body>
	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenue</h1>
							<p class="lead">
								Connectez-vous à votre compte pour continuer
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
<img src="{{asset('backend/img/avatars/user.png')}}" alt="Chris Wood" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Adresse e-mail</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Mot de passe</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Se Connecter</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
<script src="{{asset('backend/js/app.js')}}"></script>
</body>
</html>
