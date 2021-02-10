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
		
		<style>
		    .sectionbutton{
		        display: flex;
		        align-items: center;
		         justify-content: center;
		         flex-direction:column;
		    }
		</style>
	</head>
	<body data-preloader="1">

	
		
		<!-- Header -->
		<div class="header center dark absolute-light sticky">
			<div class="container">
				<!-- Logo -->
				<div class="header-logo">
					<h3><a href="{{ url('/') }}">smh</a></h3>
				</div>
				
				<div class="header-menu-extra">
				     @if (Route::has('login'))
					<ul class="list-inline">
						 @auth
                                
                                <li><a href="{{ url('/configuracion') }}">Configuración</a></li>
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
                               <li><a href="{{ url('/cart/'.  Auth::user()->id ) }}" style="font-size:20px">&nbsp&nbsp&nbsp&nbsp&nbsp<i class="ti-shopping-cart"></i> 	</a>  </li>
                            
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

		<!-- Scroll to top button -->
	
        
        
        
		<!-- Hero section -->
		<div id="home" class="section-fullscreen bg-image parallax" data-bg-src="{{url('/assets/frontend/images/onepage-classic-bg.jpg')}}"  style="background-image: url(https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/images/home-index.jpg)!important;">
			<div class="bg-black-05">
				<div class="container text-center">
					<div class="position-middle">
						<h1 class="display-4 font-weight-thin">WALLAPOP</h1>
							<h3 class=" font-weight-thin">By Sergio Muñoz</h3>
					</div>
					<!-- smoothscroll button -->
					<div class="position-bottom">
						<a class="button-circle button-circle-lg button-circle-outline-white icon-lg" href="#">
							<i class="ti-arrow-down"></i>
						</a>
					</div>
				</div><!-- end container -->
			</div>
		</div>
		<!-- -----------------------------------------------------------------end Hero section  -->
				@if (Route::has('login'))
                			
                						 @auth
                						 		<div class="section sectionbutton">
                                    			    	<div class="row text-center">
                                    						<div class="col-12 ">
                                    							<h2 class="font-weight-normal">Añade un articulo</h2>
                                    						</div>
                                    					</div>
                                    		            <a class="button button-lg button-fancy-1-dark margin-right-10 margin-bottom-10" href="{{ url('producto/create') }}">Añadir</a>
                                    		</div>
								 @else
								 
								   @endif
                             @endauth
		
		
	<!-- Products section -->
		<div class="section">
			<div class="container">
				<!-- Products -->
				<div class="row col-spacing-30">
				    
				    
				      @foreach ($productos as $producto)
					<!-- Product box 1 -->
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="product-box">
							<div class="product-img">
								<!-- Product IMG -->
								<a class="product-img-link" >
									<img src="data:image/png;base64,{{ $producto->foto }}" alt="">
								</a>
								<!-- Badge (left) -->
								<div class="product-badge-left">
									<span>{{ $producto->uso }}</span>
								</div>
								<!-- Badge (right) -->
								<div class="product-badge-right red">
									<span>{{ $producto->estado }}</span>
								</div>
								
								@if (Route::has('login'))
                			
                						 @auth
                						 	<div class="add-to-cart">
								            
								
            									<a href="{{ url('frontend/producto/' . $producto->id) }}">Ver y comprar</a>
            								</div>
								 @else
								 
								   @endif
                             @endauth
								
							</div>
							<div class="product-title">
								<!-- Product Title -->
								<h6 class="font-weight-medium"><a>{{ $producto->user->name }}</a></h6>
								<h6 class="font-weight-medium"><a>{{ $producto->nombre }}</a></h6>
								<!-- Product Price -->
								<div class="price">
									
									<span>{{ $producto->precio }} €</span>
								</div>
							</div>
						</div>
					</div>
					 @endforeach
					
				</div><!-- end row -->
				<!-- Pagination -->
				<div class="text-center margin-top-50">
					<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link" href="#">«</a></li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">»</a></li>
						</ul>
					</nav>
				</div>
			</div><!-- end container -->
		</div>
		<!-- end Products section -->

	
		<!-- Services section -->
	

		<!-- Google Maps section -->
		<div class="section padding-top-0">
			<div class="container">
				<div id="map1" class="gmap gmap-md" data-latitude="51.513569" data-longitude="-0.123443"></div>
			</div><!-- end container -->
		</div>
		<!-- end Google Maps section -->

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
	
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUma4oJ7_6VbfGNdUYdv6VQ0Ph07Fz0k8"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/plugins.js"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/js/functions.min.js"></script>
	</body>
</html>