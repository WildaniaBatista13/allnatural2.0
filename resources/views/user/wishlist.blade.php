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
            <form action="" method="POST" class="box">
            <a href="wishlist.php?delete=<?= $wish['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from wishlist?');"></a>
            <a href="view_page.php?pid=<?= $wish['pid']; ?>" class="fas fa-eye"></a>
            <img src="uploaded_img/<?= $wish['image']; ?>" alt="">
            <div class="name"><?= $wish['name']; ?></div>
            <div class="price">$<?= $wish['price']; ?>/-</div>
            <input type="number" min="1" value="1" class="qty" name="p_qty">
            <input type="hidden" name="pid" value="<?= $wish['pid']; ?>">
            <input type="hidden" name="p_name" value="<?= $wish['name']; ?>">
            <input type="hidden" name="p_price" value="<?= $wish['price']; ?>">
            <input type="hidden" name="p_image" value="<?= $wish['image']; ?>">
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
           <a href="shop.php" class="option-btn">continue comprandog</a>
           <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>">delete all</a>
        </div>
     
     </section>
     <x-slot name="footer">

     </x-slot>
</x-app-layout>