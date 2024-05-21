<x-app-layout>
   <x-slot name="header">

   </x-slot>
   <div class="home-bg">

      <section class="home">

         <div class="content">
            <span>Pureza y Frescura en Cada Producto</span>
            <h3>Nueva línea Infantil</h3>
            <p>Nuestra nueva línea infantil está diseñada para brindar una limpieza suave y nutritiva, dejando el cabello de tus pequeños fresco, suave y radiante.</p>
            <a href="about.php" class="btn">comprar ahora</a>
         </div>

      </section>

   </div>

   <section class="home-category">

      <h1 class="title">Nuestros Productos</h1>

      <div class="box-container">

         <div class="box box-1">
            <br><h3>Líneas Capilares</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
            <a href="category.php?category=fruits" class="btn">Líneas Capilares</a>
         </div>

         <div class="box box-2">
         <br> <h3>Línea Infantil</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
            <a href="category.php?category=fruits" class="btn">Línea Infantil</a>
         </div>

         <div class="box box-3">
            <br><h3>Línea Masculina</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
            <a href="category.php?category=fruits" class="btn">Línea Masculina</a>
         </div>

         <div class="box box-4">
         <br> <h3>Catalogo</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
            <a href="category.php?category=fruits" class="btn">Catalogo</a>
         </div>

      </div>

   </section>

   <section class="products">

      <h1 class="title">latest products</h1>

      <div class="box-container">
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
