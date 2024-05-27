<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="display-orders">
        @php
            $name_products = '';
            $cart_grand_total = 0;
        @endphp
        @if ($carts->isNotEmpty())
            @foreach ($carts as $cart)
                @php
                     $name_products.=$cart['name'].' ( '.$cart['quantity'].' ),';
                    $cart_total_price = ($cart['price'] * $cart['quantity']);
                    $cart_grand_total += $cart_total_price;
                @endphp
                <p> <?= $cart['name']; ?> <span>(<?= '$'.$cart['price'].'/- x '. $cart['quantity']; ?>)</span> </p>
            @endforeach
        @else
            <p class="empty">Carrito vacio!</p>
        @endif
        
        <div class="grand-total">grand total : <span>$<?= $cart_grand_total; ?>/-</span></div>
     </section>
     
     <section class="checkout-orders">
     
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
           <h3>Realiza tu orden</h3>
     
           <div class="flex">
              <div class="inputBox">
                 <span>Nombre :</span>
                 <input type="text" name="name" placeholder="enter your name" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Telefono :</span>
                 <input type="number" name="number" placeholder="enter your number" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Email :</span>
                 <input type="email" name="email" placeholder="enter your email" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Metodo de pago :</span>
                 <select name="method" class="box" required>
                    <option value="cash on delivery">Pago contra entrega</option>
                    <option value="credit card">tarjeta de crédito</option>
                    {{-- <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option> --}}
                 </select>
              </div>
              <div class="inputBox">
                 <span>Direccion linea 01 :</span>
                 <input type="text" name="flat" placeholder="e.g. flat number" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Direccion linea 02 :</span>
                 <input type="text" name="street" placeholder="e.g. street name" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Ciudad :</span>
                 <input type="text" name="city" placeholder="e.g. mumbai" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Estado :</span>
                 <input type="text" name="state" placeholder="e.g. maharashtra" class="box" required>
              </div>
              <div class="inputBox">
                 <span>Pais :</span>
                 <input type="text" name="country" placeholder="e.g. India" class="box" required>
              </div>
              <div class="inputBox">
                 <span>pin code :</span>
                 <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" class="box" required>
              </div>
              <input type="hidden" name="total_products" value="{{ substr($name_products,0,-1) }}">

              <input type="hidden" name="total_price" value="{{ $cart_grand_total }}">

           </div>
     
           <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="Realizar pedido">
     
        </form>
        
     </section>
     
    <x-slot name="footer">

    </x-slot>
</x-app-layout>