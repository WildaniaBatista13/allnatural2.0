<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="shopping-cart">

        <h1 class="title">productos añadidos</h1>
     
        <div class="box-container">
     
        <?php
           $grand_total = 0;
           
        ?>
        @if($carts->isNotEmpty())
            @foreach ($carts as $cart)
            <form action="{{ route('cart.update',$cart) }}" method="POST" class="box">
                @csrf
                @method('PUT')
            <a href="{{ route('cart.destroy',$cart) }}" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
            <a href="view_page.php?pid=<?= $cart->pid; ?>" class="fas fa-eye"></a>
            <img src="{{ asset('/storage/'.$cart['image']) }}" alt="">
            <div class="name"><?= $cart->name; ?></div>
            <div class="price">$<?= $cart->price; ?>/-</div>
            <input type="hidden" name="id" value="<?= $cart->id; ?>">
            <div class="flex-btn">
                <input type="number" min="1" value="<?= $cart->quantity; ?>" class="qty" name="quantity">
                <input type="submit" value="update" name="update_qty" class="option-btn">
            </div>
            <div class="sub-total"> sub total : <span>$<?= $sub_total = ($cart->price * $cart->quantity); ?>/-</span> </div>
            </form>
            <?php
            $grand_total += $sub_total;
            
            ?>
            @endforeach
        @else

            <p class="empty">your cart is empty</p>

        @endif
        </div>
     
        <div class="cart-total">
           <p> total : <span>$<?= $grand_total; ?>/-</span></p>
           <a href="{{ route('shop.index') }}" class="option-btn">continue comprando</a>
           <a href="{{ route('cart.destroy') }}" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>">delete all</a>
           <a href="{{ route('checkout.index') }}" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
        </div>
     
     </section>
     <x-slot name="footer">

     </x-slot>
</x-app-layout>