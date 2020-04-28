@extends('layouts.site')

@section('content')
	<!-- Block Spotlight1  -->
	<section class="so-spotlight1 ">
		<div class="container">
			<div class="row">
				<div id="yt_header_left" class="col-md-9 col-md-12">
					<div class="slider-container ">
						<div id="so-slideshow" >
							<div class="module ">
								<div class="yt-content-slider yt-content-slider--arrow1"  data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                @foreach ($sliders as $slider)
									<div class="yt-content-slide">
										<a href="#"><img src="{{asset('storage/'.$slider->image)}}" class="img-responsive"></a>
                                    </div>
                                @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="yt_header_right" class="col-md-3 hidden-sm hidden-xs">
					<div class="module">
						<div class="modcontent clearfix">
							<div class="banners">
								<div>
									<a href="#"><img src="{{asset('storage/'.$param->banner_pub)}}" style="height: 422px;" ></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //Block Spotlight1  -->

	<!-- Main Container  -->
	<div class="main-container container">
		<div class="row">
			<div id="content" class="col-md-9 col-md-push-3 col-sm-12 col-xs-12">
		<!--Middle Part Start-->
			<div class="products-category">
				<div class="products-list row grid">
                        @php $cnt=1; @endphp
						@foreach ($produits as $prod)
						<div class="product-layout col-md-4 col-sm-6 col-xs-12 ">
							<div class="product-item-container" style="box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.2);background: white;">
                                <input type="hidden" id="idp{{$cnt}}" value="{{ $prod->id }}">
                                <input type="hidden" id="namep{{$cnt}}" value="{{ $prod->nom_produit }}">
                                <input type="hidden" id="prixu{{$cnt}}" value="{{ $prod->prix_unitaire }}">
                                <input type="hidden" id="photo{{$cnt}}" value="{{ $prod->image }}">
                                <div class="left-block">
									<div class="product-image-container">
										<img src="{{asset('storage/'.$prod->image)}}" class="img-responsive" />
									</div>
								</div>
								<div class="right-block text-center">
									<div class="caption">
									<h4><a href="#">{{$prod->nom_produit}}</a></h4>
										<div class="price">
										<span class="price-new">{{$prod->prix_unitaire}} DH</span>
										</div>
										<div class="button-group">
											<button class="addToCart" type="button" id="detail{{$cnt}}" onclick="detail({{$cnt}});">
												<i class="fa fa-fw fa-eye"></i> <span class="hidden-xs">Détail de produit</span>
											</button>
										</div>
									</div><!-- right block -->
								</div>
							</div>
							<div class="clearfix visible-xs-block"></div>
                        </div>
                        @php $cnt++; @endphp
						@endforeach

					</div>
				</div>
				<!--Middle Part end-->
				<div class="col-md-6 text-center">
					{{ $produits->links() }}
				</div>
			</div>

			<aside class="col-md-3 col-md-pull-9 col-sm-12  content-aside left_column">
				<div class="module aside-verticalmenu">
					<div class="modcontent">
						<div class="sidebar-menu ">
							<div class="responsive so-megamenu ">
								<div class="so-vertical-menu no-gutter compact-hidden">
									<nav class="navbar-default">
										<div class="container-megamenu vertical open">
												<div class="megamenuToogle-wrapper">
													<div class="megamenuToogle-pattern">
														<div class="container">
															Toutes les catégories
														</div>
													</div>
												</div>
											<div class="vertical-wrapper" >
												<div class="megamenu-pattern">
													<div class="container">
														    <ul class="megamenu">
															@foreach ($categories as $cat)
															<li class="item-vertical">
																<p class="close-menu"></p>
                                                            <a href="{{ route('site.filtre', ['id' => $cat->id]) }}" class="clearfix">
																<img src="{{asset('storage/'.$cat->icon)}}" alt="icon">
																<span>{{$cat->nom_categorie}}</span>
																</a>
															</li>
															@endforeach
                                                            </ul>
														</div>
													</div>
												</div>
											</div>
										</nav>
								</div>
							</div>

						</div>

					</div>
				</div>
			</aside>
	</div>
</div>
<!-- //Main Container -->


<div class="modal fade product_view" id="product_view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Détail Produit</h3>
            </div>
            <div class="modal-body">
            <form action="{{route('addToCart')}}" method="post" role="form">
                @csrf
                <div class="row">
                    <input type="hidden" id="id1" name="id">
                    <div class="col-md-4 product_img">
                        <img id="photo_p"  class="img-responsive" width="200">
                    </div>
                    <div class="col-md-8 product_content">
                        <p id="name_p" style="font-size: 20px;font-weight: 600;color:orange;"></p>
                        <h4>Id Produit: <span id="id"></span></h4>
                        <h3 class="label label-success" style="font-size: 100%;">Prix : <span class="cost" id="prix_p"></span> <span class="cost">DH</span></h3>
                        <div class="input-group number-spinner" style="margin-top: 10px;">
                            <span class="input-group-btn data-dwn">
                                <button type="button" class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                            </span>
                            <input type="text"  class="form-control text-center" name="qte" value="1" min="1">
                            <span class="input-group-btn data-up">
                                <button type="button" class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                            </span>
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground" style="margin-top: 10px;">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')

<script>
$(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});

function detail(params) {
                var path="{{asset('storage')}}/"+$('#photo'+params).val();
                $('#id1').val($('#idp'+params).val());
                $('#id').html($('#idp'+params).val());
                $('#name_p').html($('#namep'+params).val());
                $('#prix_p').html($('#prixu'+params).val());
                $("#photo_p").attr('src',path);

                $('#product_view').modal();
 }
</script>

@endsection
