<x-app-layout>
   <x-slot name="header">

   </x-slot>

<section class="placed-orders">

   <h1 class="title">Ordenes Realizadas</h1>

   <div class="box-container">
   @if ($orders->isNotEmpty())
      @foreach ($orders as $order)
      <div class="box">
         <p> F. Registro : <span>{{ $order['placed_on'] }}</span> </p>
         <p> Nombre : <span>{{ $order['name'] }}</span> </p>
         <p> Teléfono : <span>{{ $order['number'] }}</span> </p>
         <p> Email : <span>{{ $order['email'] }}</span> </p>
         <p> Dirección : <span>{{ $order['address'] }}</span> </p>
         <p> Metodo de pago : <span>{{ $order['method'] }}</span> </p>
         <p> Productos : <span>{{ $order['total_products'] }}</span> </p>
         <p> Precio total : <span>$ {{ $order['total_price'] }}/-</span> </p>
         <p> Estado : <span style="color: {{ $order['payment_status'] == 'pending' ? 'red' : 'green' }}">{{ $order['payment_status'] }}</span> </p>
      </div>
      @endforeach
   @else
      <p class="empty">Aún no se han añadido ordenes!</p>
   @endif
   

   </div>

</section>

<x-slot name="footer">

</x-slot>

</x-app-layout>
