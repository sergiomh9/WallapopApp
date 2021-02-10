<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
        <meta name="keywords" content="">
		<title>Mono - Multi-Purpose HTML5 Template</title>
		<!-- Favicon -->
        <link href="{{url('/assets/frontend/images/favicon.png')}}" rel="shortcut icon">
		<!-- CSS -->
		<link href="{{url('/assets/frontend/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/sal/sal.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/css/theme.min.css')}}" rel="stylesheet">
		<!-- Fonts/Icons -->
		<link href="{{url('/assets/frontend/plugins/font-awesome/css/all.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/themify/themify-icons.min.css')}}" rel="stylesheet">
		<link href="{{url('/assets/frontend/plugins/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
	</head>
	<body data-preloader="1">

	

		<!-- Header -->
		<div class="header border-bottom">
			<div class="container">
				<!-- Logo -->
				<div class="header-logo col-7">
					<h3><a href="/home">smh</a></h3>
				</div>
				<div class="header-menu-extra">
				     @if (Route::has('login'))
					<ul class="list-inline">
						 @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                <li>
                                <a  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                </li>
                                <li>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               </li>
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                           
                             @endauth
					</ul>
				</div>
			        @endif
				<!-- Menu Toggle -->
				<button class="header-toggle">
					<span></span>
				</button>
			</div><!-- end container -->
		</div>
		<!-- end Header -->

		<div class="section">
			<div class="container">
				<div class="row col-spacing-50">
					<div class="col-12 col-lg-7" style="background:url(data:image/png;base64,{{ $producto->foto }}); background-position:center center; background-size: contain; background-repeat:no-repeat">
						
						
					</div>
					<div class="col-12 col-lg-5">
						<ul class="list-inline-slash font-small margin-bottom-10">
							<li><a href="#">{{ $producto->categoria->categoria }}</a></li>
						
						</ul>
						<h3 class="font-weight-normal margin-0">{{ $producto->nombre }}</h3>
						<div class="product-price">
							<h5 class="font-weight-light"><ins>{{ $producto->precio }} €</ins></h5>
						</div>
						<p>Subido por {{ $producto->user->name }}</p>
						<form role="form" action="{{ url('producto/cart') }}" method="post" id="createproductoForm" enctype="multipart/form-data" class="product-quantity margin-top-30">
						    @csrf
							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="iduser" placeholder="iduser" name="iduser" value="{{ Auth::user()->id }}"  style="display:none">
							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="idproducto" placeholder="idproducto" name="idproducto" value="{{ $producto->id }}" style="display:none">
							@if($producto->estado != $vendido)
							
							<button class="button button-md button-dark" type="submit">Añadir al carrito</button>
							@else
							<h1  style="color:red">sold out</h1>
							@endif
						</form>
						<div class="margin-top-30">
							<p>{{ $producto->fecha }}</p>
							<a class="button-text-1 margin-top-10" href="#"></a>
						</div>
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div>

		<div class="container">
			<div class="product-info-box">
				<ul class="nav margin-bottom-20">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#specs">Caracteristicas</a>
					</li>
				
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="specs">
						<table class="table">
							<tbody>
								<tr>
									<th scope="row">Autor</th>
									<td>{{ $producto->user->name }}</td>
								</tr>
								<tr>
									<th scope="row">Categoria</th>
									<td>{{ $producto->categoria->categoria }}</td>
								</tr>
								<tr>
									<th scope="row">Uso</th>
									<td>{{ $producto->uso }}</td>
								</tr>
								<tr>
									<th scope="row">Estado</th>
									<td>{{ $producto->estado }} </td>
								</tr>
								<tr>
									<th scope="row">Fecha</th>
									<td>{{ $producto->fecha }} </td>
								</tr>
								<tr>
									<th scope="row">Descripcion</th>
									<td>{{ $producto->descripcion }} </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="additional-info">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
						<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
					</div>
				</div>
			</div>
		</div><!-- end container -->

		<!-- Related Products -->
			<div class="section">
			    <div class="section bg-grey-lighter">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1">
						<h4 class="font-weight-normal margin-bottom-50">Commentarios</h4>
						<!-- Comment box 1 -->
						 @foreach ($contactos as $contacto)
						<div class="comment-box">
							<div class="comment-user-avatar bg-dark">
								<i class="fa fa-user text-white"></i>
							</div>
							<div class="comment-content">
								<span class="comment-time"></span>
								<h6 class="font-weight-normal">{{ $contacto->name }}</h6>
								<p>{{ $contacto->textocontacto }}</p>
							</div>
						</div>
						
						 @endforeach
						 @if(empty($contactos)) 
								<h6 class="font-weight-normal">No hay comentarios</h6>
							@endif
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div>
				
			    </div>
			    
			    
			    
<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1">
						<h4 class="font-weight-normal margin-bottom-50">Escribe un comentario</h4>
						
						            <form role="form" action="{{ url('contact/'. $producto->id ) }}" method="post" id="createproductoForm" enctype="multipart/form-data" class="product-quantity margin-top-30">
                						    @csrf
                							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="iduser1" placeholder="iduser1" name="iduser1" value="{{ $producto->iduser }}" style="display:none">
                							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="iduser2" placeholder="iduser2" name="iduser2" value="{{ Auth::user()->id }}" style="display:none">
                							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="textocontacto" placeholder="idproducto" name="idproducto" value="{{ $producto->id }}" style="display:none">
                							 <textarea minlength="10" class="textocontacto" name="textocontacto" id="textocontacto" placeholder="comentario">{{ old('textocontacto') }}</textarea>
                							<button class="button button-md button-dark" type="submit">Enviar</button>
                						</form>
						<!--<form>-->
						<!--	<div class="form-row">-->
						<!--		<div class="col-12 col-sm-6">-->
						<!--			<input type="text" name="name" placeholder="Name" required="">-->
						<!--		</div>-->
						<!--		<div class="col-12 col-sm-6">-->
						<!--			<input type="email" name="email" placeholder="E-Mail" required="">-->
						<!--		</div>-->
						<!--	</div>-->
						<!--	<textarea name="message" placeholder="Message"></textarea>-->
						<!--	<button class="button button-lg button-outline-grey" type="submit">Post Comment</button>-->
						<!--</form>-->
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div>
		
		
		
		
		
			<footer>
			<div class="section-sm bg-dark">
				<div class="container">
					<div class="row align-items-center col-spacing-10">
						<div class="col-12 col-md-4 order-md-2 text-center">
							<h3 class="margin-0">smh</h3>
						</div>
						<div class="col-12 col-md-4 order-md-3 text-center text-md-right">
							<ul class="list-inline">
									<li><a href="#"><i class=" ti-instagram"></i></a></li>
								<li><a href="#"><i class="ti-twitter"></i></a></li>
							</ul>
						</div>
						<div class="col-12 col-md-4 order-md-1 text-center text-md-left">
							<p>&copy; 2021 FlaTheme, All Rights Reserved.</p>
						</div>
					</div><!-- end row -->
				</div><!-- end container -->
			</div>
		</footer>

		<!-- Scroll to top button -->
		<div class="scrolltotop">
			<a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
		</div>
		<!-- end Scroll to top button -->

		<!-- ***** JAVASCRIPTS ***** -->
	
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUma4oJ7_6VbfGNdUYdv6VQ0Ph07Fz0k8"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/plugins.js"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/js/functions.min.js"></script>
	</body>
</html>