<x-welcome>
  <h2>
    {{__('welcome')}}
  </h2>
<x-welcome />

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
					<strong>${{ $producto->precio }}</strong>
					
                    <button class="add-cart" wire:click="add({{ $producto->id }})">Agregar al Carrito</button>


				</div>
                </div>
			@endforeach

</div>
