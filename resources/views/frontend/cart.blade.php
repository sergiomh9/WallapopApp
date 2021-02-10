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
					 
					 
		<div class="header center dark absolute-light sticky">
			<div class="container" >
				<!-- Logo -->
				<div class="header-logo">
					<h3><a href="{{ url('/home') }}" style="color:black!important">smh</a></h3>
				</div>
				
				<div class="header-menu-extra">
				     @if (Route::has('login'))
					<ul class="list-inline">
						 @auth
                                <li><a href="{{ url('/home') }}" style="color:black!important">Home</a></li>
                                <li>
                                <a  href="#" role="button" style="color:black!important" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                </li>
                                <li>
                                    <a  href="{{ route('logout') }}" style="color:black!important"
                                       onclick="event.preventDefault(); 
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               </li>
                                @else
                                <li><a href="{{ route('login') }}" style="color:black!important">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" style="color:black!important">Register</a></li>
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
		
		
		
		
		
		
		<div class="section-lg">
			<div class="container">
				<div class="row">
					<div class="col-12 col-xl-10 offset-xl-1">
						<table class="table cart-table">
							<thead>
								<tr>
									<th scope="col"></th>
									<th scope="col"></th>
									<th scope="col">Producto</th>
									<th scope="col">Precio</th>
									<th scope="col">Estado</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
							 @foreach ($quiero as $quiero)
								<tr>
									<th scope="row">
												<a href="{{ url('delete/'. $quiero->idquieros ) }}">x</a>
											
									<td class="product-thumbnail">
										<a ><img src="data:image/png;base64,{{ $quiero->foto }}" alt=""></a>
									</td>
									<td>{{ $quiero->nombre }}</td>
									<td>{{ $quiero->precio }} €</td>
									<td>{{ $quiero->estado }}</td>
									<td>
									<form role="form" action="{{ url('buy/'. $quiero->idproducto .'/'. $quiero->idquieros ) }}" method="post" id="createproductoForm" enctype="multipart/form-data" class="product-quantity margin-top-30">
                						    @csrf
                							<input type="text" maxlength="1000" minlength="1" required class="form-control" id="estado" placeholder="estado" name="estado" value="Vendido" style="display:none">
                							
                								@if($quiero->estado != $vendido)
												<button class="button button-md button-dark" type="submit">Comprar</button>
												@else
												<td><h5 style="color:red">sold out</h5></td>
												@endif
												
                						</form>
									</td>
								</tr>
								 @endforeach
								 
							</tbody>
						
						</table>
							@if(empty($quiero)) 
								<h6 class="font-weight-normal" style="text-align:center; margin-top:50px">No hay productos en el carrito</h6>
							@endif
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

	
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUma4oJ7_6VbfGNdUYdv6VQ0Ph07Fz0k8"></script>
		<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/plugins/plugins.js"></script>
		<script src="https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/js/functions.min.js"></script>
	</body>
</html>