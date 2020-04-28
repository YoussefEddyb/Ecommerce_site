<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.css'>

	<title>Admin</title>
	<style>
		body {
			opacity: 0;
		}
		.tb1{
			width: 50% !important;
			float: right !important;
		}
        .c3-line, .c3-focused {stroke-width: 3px !important;}
        .c3-bar {stroke: white !important; stroke-width: 1;}
        .c3 text { font-size: 12px; color: grey;}
        .tick line {stroke: white;}
        .c3-axis path {stroke: grey;}
        .c3-circle { opacity: 1 !important; }
	</style>
	<link href="{{asset('backend/css/classic.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link rel="shortcut icon" href="{{asset('frontend/ico/favicon.png')}}">
	<!-- END SETTINGS -->
</head>

<body>
	<div class="wrapper">
		<nav class="sidebar">
			<div class="sidebar-content ">
			<a class="sidebar-brand" href="{{url("/admin")}}">
				<i class="fas fa-shopping-cart text-primary"></i>
          <span class="align-middle">YOUED</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header" style="background: #47bac1 !important;">
						<h4 class="text-dark">
						<i class="align-middle mr-2" data-feather="layers"></i><span class="align-middle">Menu</span>
						</h4>
					</li>
					<li class="sidebar-item">
                    <a class="sidebar-link" href="{{Route("categorie.index")}}">
					<i class="align-middle mr-2 fas fa-fw fa-sitemap"></i> <span class="align-middle">Catégories</span>
					</a>
					</li>
					<li class="sidebar-item">
					<a class="sidebar-link" href="{{Route("fournisseur.index")}}">
					<i class="align-middle mr-2 fas fa-fw fa-user-friends"></i> <span class="align-middle">Fournisseurs</span>
					</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{Route("produit.index")}}">
						<i class="align-middle mr-2 fas fa-fw fa-shopping-bag"></i> <span class="align-middle">Produits</span>
						</a>
                    </li>
                    @if(Auth::user()->admin)
					<li class="sidebar-item">
							<a class="sidebar-link" href="{{Route("user.index")}}">
							<i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">Employées</span>
							</a>
                    </li>
                    @endif
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{Route("commande.index")}}">
						<i class="align-middle mr-2 fas fa-fw fa-shopping-cart"></i> <span class="align-middle">Commmandes</span>
						</a>
				    </li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{Route("messager.index")}}">
						<i class="align-middle mr-2 fas fa-fw fa-users-cog"></i> <span class="align-middle">Messagers</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a href="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle mr-2 fas fa-fw fa-file-import"></i>
                            <span class="align-middle">Imports</span>
                        </a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse">
							<li class="sidebar-item"><a class="sidebar-link" href="{{Route("import.indexC")}}">Imports Catégories</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{Route("import.index")}}">Imports Produits</a></li>
						</ul>
					</li>
                    {{-- <li class="sidebar-item">
							<a class="sidebar-link" href="{{Route("chart.index")}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart align-middle">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                    <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                </svg>
                            <span class="align-middle">Charts</span>
							</a>
                    </li> --}}
                    @if(Auth::user()->admin)
                    <li class="sidebar-item">
						<a href="#dashboard" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle mr-2 fas fa-fw fa-cogs"></i>
                            <span class="align-middle">Paramétres</span>
                        </a>
						<ul id="dashboard" class="sidebar-dropdown list-unstyled collapse">
							<li class="sidebar-item"><a class="sidebar-link" href="{{Route("admin.slider")}}">Silders</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{Route("admin.contact")}}">Configuration</a></li>
						</ul>
                    </li>
                    @endif
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
              				</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                				<img src="{{asset('storage/'.Auth::user()->photo)}}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood" />
                				 <span class="text-dark">{{ Auth::user()->nom_employe." ".Auth::user()->prenom_employe }}</span>
              				</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('employe.edit', ['id' => Auth::user()->id])}}">
									<i class="align-middle mr-2 fas fa-fw fa-cogs"></i><span class="align-middle">Profile</span>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<i class="align-middle mr-2 fas fa-fw fa-lock"></i><span class="align-middle">Déconnexion</span>
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
                            </li>
						</li>
					</ul>
				</div>
            </nav>
            {{-- Mon contenu --}}

            @yield('content')

            {{-- fin contenu --}}
		</div>
	</div>

			@yield('javascript')
			<script src="{{asset('backend/js/app.js')}}"></script>
			<script src="{{asset('js/toastr.min.js') }}"></script>
			<script src="{{asset('js/alert.js')}}" ></script>
			<script src="{{asset('js/bootstrap.min.js')}}" ></script>

			@if(session('success'))
			<script>
			toastr.success('{{ session('success') }}')
			</script>
			@endif

			@if(session('warning'))
			<script>
			toastr.warning('{{ session('warning') }}')
			</script>
			@endif

			@if(session('info'))
			<script>
			toastr.info('{{ session('info') }}')
			</script>
			@endif
</body>
</html>

