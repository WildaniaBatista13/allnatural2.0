<x-app-layout>
   <x-slot name="header">

   </x-slot>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">
   @if ($orders->isNotEmpty())
      @foreach ($orders as $order)
      <div class="box">
         <p> placed on : <span>{{ $order['placed_on'] }}</span> </p>
         <p> name : <span>{{ $order['name'] }}</span> </p>
         <p> number : <span>{{ $order['number'] }}</span> </p>
         <p> email : <span>{{ $order['email'] }}</span> </p>
         <p> address : <span>{{ $order['address'] }}</span> </p>
         <p> payment method : <span>{{ $order['method'] }}</span> </p>
         <p> your orders : <span>{{ $order['total_products'] }}</span> </p>
         <p> total price : <span>$ {{ $order['total_price'] }}/-</span> </p>
         <p> payment status : <span style="color: {{ $order['payment_status'] == 'pending' ? 'red' : 'green' }}">{{ $order['payment_status'] }}</span> </p>
      </div>
      @endforeach
   @else
      <p class="empty">no orders placed yet!</p>
   @endif
   

   </div>

</section>

<x-slot name="footer">

</x-slot>

</x-app-layout>
