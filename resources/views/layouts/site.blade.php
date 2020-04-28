<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic page needs
	============================================ -->
	<title>YOUED</title>
	<meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />

	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- Favicon
	============================================ -->
    <link rel="shortcut icon" href="{{asset('frontend/ico/favicon.png')}}">
	<!-- Google web fonts
	============================================ -->
    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> --}}
	<!-- Libs CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/css/bootstrap.min.css') }}">
	<link href="{{ asset('frontend/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/themecss/lib.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
	<!-- Theme CSS
	============================================ -->
   	<link href="{{ asset('frontend/css/themecss/so_megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/themecss/so-categories.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/footer4.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/header3.css') }}" rel="stylesheet">
	<link id="color_scheme" href="{{ asset('frontend/css/home3.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

	<style type="text/css">
		.pnr
		{
			font-size: 20px;
		    font-weight: bold;
		    padding: 10px;
        }
            @media (min-width: 768px) {
                .omb_row-sm-offset-3 div:first-child[class*="col-"] {
                    margin-left: 25%;
                }
            }

            .omb_login{
                width:100%;
                margin-bottom:80px;
                background-color:#fff;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
              transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            }

            .omb_login .omb_authTitle {
                text-align: center;
                line-height: 300%;
            }

            .omb_login .omb_socialButtons a {
                color: white; // In yourUse @body-bg
                opacity:0.9;
            }
            .omb_login .omb_socialButtons a:hover {
                color: white;
                opacity:1;
            }
            .omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
            .omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
            .omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


            .omb_login .omb_loginOr {
                position: relative;
                font-size: 1.5em;
                color: #aaa;
                margin-top: 1em;
                margin-bottom: 1em;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
            .omb_login .omb_loginOr .omb_hrOr {
                background-color: #cdcdcd;
                height: 1px;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            .omb_login .omb_loginOr .omb_spanOr {
                display: block;
                position: absolute;
                left: 50%;
                top: -0.6em;
                margin-left: -1.5em;
                background-color: white;
                width: 3em;
                text-align: center;
            }

            .omb_login .omb_loginForm .input-group.i {
                width: 2em;
            }
            .omb_login .omb_loginForm  .help-block {
                color: red;
            }


            @media (min-width: 768px) {
                .omb_login .omb_forgotPwd {
                    margin-top:10px;
                 }
            }
	</style>
</head>

<body class="common-home res layout-home3" style="background-image: url('{{asset('frontend/image/bd1.png')}}')">
    <div id="wrapper" class="wrapper-full banners-effect-8">
	<!-- Header Container  -->
	<header id="header" class=" variantleft type_3">
	<!-- Header Top -->
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="header-top-left form-inline col-lg-6 col-md-5 col-sm-6 compact-hidden hidden-sm ">
                    @if(!Auth::guard('client')->check())
					<div class="form-group navbar-welcome " >
					Bienvenue sur le marché
					<a href="{{route('site.inscription')}}">
						<strong>Rejoignez gratuitement</strong></a> ou <a href="{{route('site.connexion')}}">
						<strong>Se connecter</strong></a>
                    </div>
                    @endif
				</div>
				<div class="header-top-right collapsed-block text-right col-lg-6 col-md-7 col-sm-12 col-xs-12 compact-hidden">
					<div class="tabBlock" id="TabBlock-1">
						<ul class="top-link list-inline">
                            @if(Auth::guard('client')->check())
							<li class="account btn-group" id="my_account">
								<a href="#" title="Mon compte" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">{{Auth::guard('client')->user()->nom_client.' '.Auth::guard('client')->user()->prenom_client}}</span> <span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu ">
									<li><a href="{{ route('client.profile') }}"><i class="fa fa-user"></i> Mon Profile</a></li>
									<li><a href="{{ route('client.deconnexion') }}"><i class="fa fa-pencil-square-o"></i> Déconnexion</a></li>
								</ul>
                            </li>
                            @else
							<li class="account btn-group" id="my_account">
								<a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">COMPTE</span> <span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu ">
									<li><a href="{{ route('site.inscription') }}"><i class="fa fa-user"></i> CRÉER UN COMPTE</a></li>
									<li><a href="{{ route('site.connexion') }}"><i class="fa fa-pencil-square-o"></i> SE CONNECTER</a></li>
								</ul>
                            </li>
                            @endif
						</ul>
						<div class="form-group languages-block ">
							<form action="" method="post" enctype="multipart/form-data" id="bt-language">
								<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<img src="{{ asset('frontend/image/demo/flags/mar.png') }}" alt="arabe" title="arabe">
									<span class="hidden-xs">Arabe</span>
									<span class="fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu">
									<li> <a href="#"> <img class="image_flag" src="{{asset('frontend/image/demo/flags/mar.png')}}" alt="Arabe" title="Arabe" /> Arabe </a> </li>
									<li><a href="#"><img class="image_flag" src="{{asset('frontend/image/demo/flags/us.png')}}" alt="Anglais" title="Anglais" /> Anglais </a></li>
									<li> <a href="#"> <img class="image_flag" src="{{asset('frontend/image/demo/flags/fr.png')}}" alt="Français" title="Français" /> Français </a> </li>
								</ul>
							</form>
						</div>

						<div class="form-group currencies-block">
							<form action="" method="post" enctype="multipart/form-data" id="currency">
								<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<span class="icon icon-credit "></span> Dirham <span class="fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu btn-xs">
									<li> <a href="#">(MAD)&nbsp;Dirham</a></li>
									<li> <a href="#">(€)&nbsp;Euro</a></li>
									<li> <a href="#">($)&nbsp;US Dollar	</a></li>
								</ul>
							</form>
                        </div>
                        <div class="form-group currencies-block" style="background:#f7b867;">
                        <a class="btn btn-xs dropdown-toggle" href="{{route('backend.index')}}"><i class="fa fa-pencil-square-o"></i> <span class="hidden-xs">Admin</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Header Top -->

	<!-- Header center -->
	<div class="header-center left">
		<div class="container">
			<div class="row">
				<!-- Logo -->
				<div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
				<a href="{{route('site.index')}}">
					<img src="{{asset('storage/'.$param->logo)}}" style="width: 187px;height: 50px;"/>
				</a>
				</div>
				<!-- //end Logo -->

				<!-- Main Menu -->
				<div class="header-bottom-right  collapsed-block col-md-6 col-sm-8 col-xs-6 ">
					<h5 class="tabBlockTitle visible-xs"><i class="fa fa-search"></i> Search <a class="expander " href="#sosearchpro"><i class="fa fa-angle-down"></i></a></h5>
					<div id="sosearchpro" class="col-sm-7 search-pro tabBlock">
                    <form action="{{route('site.search')}}" method="post">
                        @csrf
							<div id="search0" class="search input-group">
								<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Cherchez par le nom de produit" name="search">
								<span class="input-group-btn">
								<button type="submit" class="button-search btn btn-primary" name="submit_search">
                                    <i class="fa fa-search"></i>
                                </button>
								</span>
							</div>
						</form>
					</div>
				</div>
				<!-- //end Search -->
				<!-- //Main Menu -->

				<!-- Secondary menu -->
				<div class="col-md-2 col-sm-3 col-xs-12 shopping_cart pull-right">
                    <!--cart-->
                        <a class="btn btn-success btn-sm" href="{{ route('site.panier') }}" style="margin: 5px;padding: 8px;border-radius: 20px;">
                            <i class="fa fa-shopping-cart"></i> Panier
                            <span class="badge badge-light">{{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span>
                        </a>
					{{-- <div id="cart" class=" btn-group btn-shopping-cart">
						<a class="top_cart dropdown-toggle" style="color:#ffffff;" href="{{ route('site.panier') }}">
						<i class="fa fa-cart-plus fa-3x"></i>
						<span class="pnr">Panier</span>
						</a>
					</div> --}}
                    <!--//cart-->
				</div>
			</div>

		</div>
	</div>
	<!-- //Header center -->

	<!-- Navbar switcher -->
	<!-- //end Navbar switcher -->
	</header>
<!-- //Header Container  -->

    @yield('content')

<!-- Footer Container -->
<footer class="footer-container type_footer4">
		<section class="footer-center">
			<div class=" container">
				<div class="row">
					<div class="col-sm-6 col-md-4 box-information">
						<div class="module clearfix">
							<h3 class="modtitle">Qui sommes-nous</h3>
							<div class="modcontent">
								<div class="footer-logo">
								<img src="{{asset('storage/'.$param->logo)}}" style="width: 300px;height: 80px;">
								</div>
								<p>{{$param->description}}</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 collapsed-block ">
							<div class="module clearfix">
								<h3 class="modtitle">Contactez nous	</h3>
								<div class="modcontent">
									<ul class="contact-address">
										<li><span class="fa fa-map-marker"></span> {{$param->adresse}}</li>
										<li><span class="fa fa-envelope-o"></span> E-mail: <a href="#"> {{$param->email}}</a></li>
										<li><span class="fa fa-phone">&nbsp;</span> téléphone: {{$param->telephone}} <br>Fixe: {{$param->fax}} </li>
									</ul>
								</div>
							</div>
					</div>
					<div class="col-sm-6 col-md-4 collapsed-block ">
						<div class="module clearfix">
							<h3 class="modtitle">Facebook</h3>
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fventes.achat%2F&tabs=timeline&width=285&height=200&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId"
							 width="285" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
							  allowTransparency="true" allow="encrypted-media"></iframe>
						</div>
					</div>
					<hr class="footer-lines no-margin-bottom">
				</div>
			</div>
		</section>
		<!-- Footer Bottom Container -->
		<div class="footer-bottom-block ">
			<div class=" container">
				<div class="row">
					<div class="col-sm-5 copyright-text"> © 2019 Youed. Tous les droits sont réservés. </div>
					<div class="col-sm-7">
							<div class="block-payment text-right">
								{{-- <img src="image/demo/content/payment.png" alt="payment" title="payment" > --}}
							</div>
					</div>
					<!--Back To Top-->
					<div class="back-to-top"><i class="fa fa-angle-up"></i><span> Haut </span></div>
				</div>
			</div>
		</div>
		<!-- /Footer Bottom Container -->
</footer>
<!-- //end Footer Container -->

<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{asset('frontend/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/themejs/libs.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/unveil/jquery.unveil.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/datetimepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
<!-- Theme files
============================================ -->
<script type="text/javascript" src="{{asset('frontend/js/themejs/application.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/themejs/homepage.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/themejs/addtocart.js')}}"></script>

@yield('javascript')
@yield('style')
<script src="{{ asset('js/toastr.min.js') }}"></script>

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
