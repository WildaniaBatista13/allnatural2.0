<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="wishlist">

        <h1 class="title">productos añadidos</h1>
     
        <div class="box-container">
     
        <?php
           $grand_total = 0;
           
        ?>

        @if($wishlists->isNotEmpty())
            @foreach ($wishlists as $wish)
            <form action="{{ route('cart.store') }}" method="POST" class="box">
            @csrf
                <a href="wishlist.php?delete=<?= $wish['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"></a>
                <a href="{{ route('view.page.index',$wish) }}" class="fas fa-eye"></a>
                <img src="{{ asset('/storage/'.$wish['image']) }}" alt="">
                <div class="name"><?= $wish['name']; ?></div>
                <div class="price">$<?= $wish['price']; ?>/-</div>
                <input type="number" min="1" value="1" class="qty" name="quantity">
                <input type="hidden" name="pid" value="<?= $wish['pid']; ?>">
                <input type="hidden" name="name" value="<?= $wish['name']; ?>">
                <input type="hidden" name="price" value="<?= $wish['price']; ?>">
                <input type="hidden" name="image" value="<?= $wish['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            <?php
            $grand_total += $wish['price'];
            ?>
            @endforeach
        @else 
            <p class="empty">your wishlist is empty</p>
        @endif

        </div>
     
        <div class="wishlist-total">
           <p> total : <span>$<?= $grand_total; ?>/-</span></p>
           <a href="{{ route('shop.index') }}" class="option-btn">continue comprando</a>
           <a href="{{ route('wishlist.destroy') }}" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>">eliminar todo</a>
        </div>
     
     </section>
     <x-slot name="footer">

     </x-slot>
</x-app-layout>