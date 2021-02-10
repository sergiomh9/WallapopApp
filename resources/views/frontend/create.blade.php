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
	    <div class="header center dark absolute-light sticky">
			<div class="container">
				<!-- Logo -->
				<div class="header-logo">
					<h3><a href="{{ url('/home') }}">smh</a></h3>
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
                <div class="bg-image parallax" data-bg-src="{{url('/assets/frontend/images/add-product.jpg')}}"  style="background-image: url(https://informatica.ieszaidinvergeles.org:10015/laraveles/WallapopApp/public/assets/frontend/images/add-product.jpg)!important;">
                			<div class="section-xl bg-black-06 text-center">
                				<div class="container">
                					<h1 class="font-weight-light margin-0">Añade un producto</h1>
                				</div><!-- end container -->
                			</div><!-- end page-title -->
                		</div>
                
                		<!-- Scroll to top button -->
                		<div class="scrolltotop">
                			<a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
                		</div>




<div class="section">
			<div class="container">
				<h3 class="font-weight-normal text-center margin-bottom-50">Formulario</h3>
				<div class="row col-spacing-40">
					<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
	                    <form role="form" action="{{ url('producto/create') }}" method="post" id="createproductoForm" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    
                                    
                                    
                                     <div class="form-group">
                                         
                                         <input type="text" maxlength="1000" minlength="1" required class="form-control" id="iduser" placeholder="iduser" name="iduser" value="{{ Auth::user()->id  }}" style="display:none">
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="idpost">Categoria</label>
                                        
                                        @if(isset($categorias))
                                        <select class="custom-select w-100" name="idcategoria" id="idcategoria" required class="form-control">
                                            <option value="" disabled selected>Select categoria</option>
                                            @foreach($categorias as $categoria)
                                            
                                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                            
                                            @endforeach
                                        </select>
                                        @else
                                            <input type="text" value="{{ $categoria->categoria }}" readonly class="form-control">
                                            <input type="hidden" id="idcategoria" name="idcategoria" value="{{ $categoria->id }}">
                                        @endif
                                        
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                         <label for="text">Nombre</label>
                                         <input type="text" maxlength="1000" minlength="1" required class="form-control" id="nombre" placeholder="nombre" name="nombre" value="{{ old('nombre') }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="text">Descripcion</label>
                                         <input type="text" maxlength="1000" minlength="1" required class="form-control" id="descripcion" placeholder="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                                    </div>
                                     <div class="form-group">
                                         <label for="text">Uso</label>
                                         <input type="text" maxlength="1000" minlength="1" required class="form-control" id="uso" placeholder="uso" name="uso" value="{{ old('uso') }}">
                                    </div>
                                     <div class="form-group">
                                         <label for="text">Precio</label>
                                         <input type="number" maxlength="1000" minlength="1" required class="form-control" id="precio" placeholder="precio" name="precio" value="{{ old('precio') }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="date">Fecha</label>
                                        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
                                    </div>
                                     <div class="form-group">
                                          <label for="idestado">Estado</label>
                                        
                                        <select class="custom-select w-100" name="estado" id="idestado" required class="form-control">
                                             <option value="" disabled selected>Select estado</option>
                                            <option value="Enventa">En venta</option>
                                            <option value="Vendido">Vendido</option>
                                            <option value="Retirado">Retirado</option>
                                            <option value="Censurado">Censurado</option>
                                            <option value="Otros">Otros</option>
                                          
                                        </select>
                                         <!--<label for="text">Estado</label>-->
                                         <!--<input type="text" maxlength="1000" minlength="1" required class="form-control" id="estado" placeholder="estado" name="estado" value="{{ old('estado') }}">-->
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                   </div>
                                   
                                     <button type="submit" class="button button-lg button-fancy-1-dark margin-right-10 margin-bottom-10">Submit</button>
                                </div>
                                <!-- /.card-body -->
                                <br>

                            </form>
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