<x-app-layout>
   <x-slot name="header">

   </x-slot>

<section class="p-category">

   <a href="{{ route('category.index',['name'=>'fruits']) }}">Líneas Capilares</a>
   <a href="{{ route('category.index',['name'=>'vegitables']) }}">Línea Infantil</a>
   <a href="{{ route('category.index',['name'=>'fish']) }}">Línea Masculina</a>
   <a href="{{ route('category.index',['name'=>'meat']) }}">Catalogo</a>
</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">
   @if ($products->isNotEmpty())
      @foreach ($products as $product)
      <form action="{{ route('cart.store') }}" class="box" method="POST">

         @csrf 
         <div class="price">$<span>{{ $product['price'] }}</span>/-</div>
         <a href="{{ route('view.page.index',$product) }}" class="fas fa-eye"></a>
         <img src="{{ asset('/storage/'.$product['image']) }}" alt="">
         <div class="name">{{ $product['name'] }}</div>
         <input type="hidden" name="pid" value="<?= $product['id']; ?>">
         <input type="hidden" name="name" value="<?= $product['name']; ?>">
         <input type="hidden" name="price" value="<?= $product['price']; ?>">
         <input type="hidden" name="image" value="<?= $product['image']; ?>">
         <input type="number" min="1" value="1" name="quantity" class="qty">
         <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
         <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>
      @endforeach
   @else
      <p class="empty">no products added yet!</p>
   @endif
   

   </div>

</section>

<x-slot name="footer">

</x-slot>
</x-app-layout>
