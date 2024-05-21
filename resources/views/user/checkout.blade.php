<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="display-orders">
        @php
            $cart_grand_total = 0;
        @endphp
        @if ($carts->isNotEmpty())
            @foreach ($carts as $cart)
                @php
                    $cart_total_price = ($cart['price'] * $cart['quantity']);
                    $cart_grand_total += $cart_total_price;
                @endphp
                <p> <?= $cart['name']; ?> <span>(<?= '$'.$cart['price'].'/- x '. $cart['quantity']; ?>)</span> </p>
            @endforeach
        @else
            <p class="empty">your cart is empty!</p>
        @endif
        
        <div class="grand-total">grand total : <span>$<?= $cart_grand_total; ?>/-</span></div>
     </section>
     
     <section class="checkout-orders">
     
        <form action="" method="POST">
     
           <h3>place your order</h3>
     
           <div class="flex">
              <div class="inputBox">
                 <span>your name :</span>
                 <input type="text" name="name" placeholder="enter your name" class="box" required>
              </div>
              <div class="inputBox">
                 <span>your number :</span>
                 <input type="number" name="number" placeholder="enter your number" class="box" required>
              </div>
              <div class="inputBox">
                 <span>your email :</span>
                 <input type="email" name="email" placeholder="enter your email" class="box" required>
              </div>
              <div class="inputBox">
                 <span>payment method :</span>
                 <select name="method" class="box" required>
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paytm">paytm</option>
                    <option value="paypal">paypal</option>
                 </select>
              </div>
              <div class="inputBox">
                 <span>address line 01 :</span>
                 <input type="text" name="flat" placeholder="e.g. flat number" class="box" required>
              </div>
              <div class="inputBox">
                 <span>address line 02 :</span>
                 <input type="text" name="street" placeholder="e.g. street name" class="box" required>
              </div>
              <div class="inputBox">
                 <span>city :</span>
                 <input type="text" name="city" placeholder="e.g. mumbai" class="box" required>
              </div>
              <div class="inputBox">
                 <span>state :</span>
                 <input type="text" name="state" placeholder="e.g. maharashtra" class="box" required>
              </div>
              <div class="inputBox">
                 <span>country :</span>
                 <input type="text" name="country" placeholder="e.g. India" class="box" required>
              </div>
              <div class="inputBox">
                 <span>pin code :</span>
                 <input type="number" min="0" name="pin_code" placeholder="e.g. 123456" class="box" required>
              </div>
           </div>
     
           <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="place order">
     
        </form>
     
     </section>

    <x-slot name="footer">

    </x-slot>
</x-app-layout>