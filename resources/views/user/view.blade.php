<x-app-layout>

    <x-slot name="header">

    </x-slot>

    <section class="quick-view">

        <h1 class="title">Vista rapida</h1>
        
        @if ($products->isNotEmpty())
            @foreach ($products as $product)
                <form action="{{ route('cart.store') }}" class="box" method="POST">

                    @csrf 
                    <div class="price">$<span><?= $product['price']; ?></span>/-</div>
                    
                    <img style="margin: auto;" src="{{ asset('/storage/'.$product['image']) }}" alt="">
                    <div class="name"><?= $product['name']; ?></div>
                    <input type="hidden" name="pid" value="<?= $product['id']; ?>">
                    <input type="hidden" name="name" value="<?= $product['name']; ?>">
                    <input type="hidden" name="price" value="<?= $product['price']; ?>">
                    <input type="hidden" name="image" value="<?= $product['image']; ?>">
                    <input type="number" min="1" value="1" name="quantity" class="qty">

                    <input type="submit" value="Agregar a lista de deseos" class="option-btn" name="add_to_wishlist">
                    
                    <input type="submit" value="Agregar al carrito" class="btn" name="add_to_cart">
                </form>
            @endforeach
        @else
            <p class="empty">Aún no se han añadido productos!</p>
        @endif

     
     </section>

    <x-slot name="footer">

    </x-slot>

</x-app-layout>