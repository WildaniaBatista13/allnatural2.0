<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <section class="search-form">

        <form action="{{ route('product.search') }}" method="GET">
            
           <input type="text" class="box" name="query" placeholder="search products...">
           {{-- <input type="submit" name="search_btn" value="search" class="btn"> --}}

           <button type="submit" class="btn" >Buscar</button>
        </form>
     
     </section>

     <section class="products" style="padding-top: 0; min-height:100vh;">

        <div class="box-container">
        @if ($txtSearch)
            @if ($products->isNotEmpty())
                @foreach ($products as $product)
                    <form action="{{ route('cart.store') }}" class="box" method="POST">

                    @csrf 
                    <div class="price">$<span><?= $product['price']; ?></span>/-</div>
                    <a href="{{ route('view.page.index',$product) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('/storage/'.$product['image']) }}" alt="">
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
                <p class="empty">No se encontraron resultados!</p>
            @endif
        @endif
        
        </div>
     
     </section>
     <x-slot name="footer">

     </x-slot>
</x-app-layout>