<!DOCTYPE html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
		.logo{
			height : 100px;
			width : 100px;
		}
		/* CSS para mostrar los productos */
		.productos-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  .producto {
    width: calc(33.33% - 20px);
    margin-bottom: 30px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
  }
  .promo {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #2A9FA2;
    color: #fff;
    padding: 5px;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
  }
  .producto:hover {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  }

  .img-container {
    position: relative;
  }

  .img-container img {
    width: 100%;
    height: auto;
    display: block;
  }


  .info-container {
    padding: 15px;
    text-align: center;
  }

  .info-container h3 {
    margin-top: 0;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
  }

  .info-container strong {
    display: block;
    margin-bottom: 10px;
    font-size: 20px;
    font-weight: bold;
  }

  .rating {
    display: block;
    margin-bottom: 10px;
    font-size: 20px;
    color: #2A9FA2;
  }

  .add-cart {
    display: inline-block;
    padding: 10px 20px;
    background-color: #2A9FA2;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  .add-cart:hover {
    background-color: #fff;
    color: #2A9FA2;
    border: 2px solid #2A9FA2;
  }
	</style>   
<head>
    <meta charset="UTF-8">
    <title>AdvanceShop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    
</head>
	<body>
	
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="/"><img src="https://scontent.fvvi1-1.fna.fbcdn.net/v/t1.15752-9/342650874_943976150279978_1244660785714073715_n.png?_nc_cat=111&ccb=1-7&_nc_sid=ae9488&_nc_ohc=E3GKfjqOBToAX9QVSEI&_nc_ht=scontent.fvvi1-1.fna&oh=03_AdQwIcsWfQ4USU_LywMiihpF7She2Vhe7zAElAy-dOxxVw&oe=646BCDB2" class="logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link" href="/">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('pedidos')}}">Tus Pedidos</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="{{route('carrito')}}">Carrito</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{route('login')}}">Iniciar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	
		<main>
			<div class="jumbotron">
				<div class="container">
					<h1 class="display-4">Bienvenido a AdvanceShop</h1>
					<p class="lead">La mejor tienda online para tus compras</p>
				</div>
			</div>
		</main>

		<div class="productos-container">
			@foreach ($productos as $producto)
				<div class="producto">
				<a href="#">
					<div class="img-container">
					<img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
					<span class="promo">{{ $producto->marca }}</span>
					</div>
				</a>
				<div class="info-container">
					
					<h3>{{$producto->nombproducto }}</h3>
					<strong>${{ $producto->precio }}</strong> @csrf
            <input type="hidden" name="id_producto" value="{{ $producto->id }}">
            <button type="submit" class="add-cart">Añadir al carrito</button>
          
				</div>
				</div>
			@endforeach
		</div>
		
	
</html>