<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="search-form">

        <form action="" method="POST">
           <input type="text" class="box" name="search_box" placeholder="search products...">
           <input type="submit" name="search_btn" value="search" class="btn">
        </form>
     
     </section>

     <section class="products" style="padding-top: 0; min-height:100vh;">

        <div class="box-container">
        @if ($txtSearch)
            @if ($products->isNotEmpty())
                @foreach ($products as $product)
                    <form action="" class="box" method="POST">
                        <div class="price">$<span><?= $product['price']; ?></span>/-</div>
                        <a href="view_page.php?pid=<?= $product['id']; ?>" class="fas fa-eye"></a>
                        <img src="uploaded_img/<?= $product['image']; ?>" alt="">
                        <div class="name"><?= $product['name']; ?></div>
                        <input type="hidden" name="pid" value="<?= $product['id']; ?>">
                        <input type="hidden" name="p_name" value="<?= $product['name']; ?>">
                        <input type="hidden" name="p_price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="p_image" value="<?= $product['image']; ?>">
                        <input type="number" min="1" value="1" name="p_qty" class="qty">
                        <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                        <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                    </form>
                @endforeach
            @else
                <p class="empty">no result found!</p>
            @endif
        @endif
        
        </div>
     
     </section>
     <x-slot name="footer">

     </x-slot>
</x-app-layout>