<x-app-layout>
   <x-slot name="header">

   </x-slot>
   <div class="home-bg">

      <section class="home">

         <div class="content">
            <span>Pureza y Frescura en Cada Producto</span>
            <h3>Nueva línea Infantil</h3>
            <p>Nuestra nueva línea infantil está diseñada para brindar una limpieza suave y nutritiva, dejando el cabello de tus pequeños fresco, suave y radiante.</p>
            <a href="{{ route('category.index',['name'=>'vegitables']) }}" class="btn">nuestros productos</a>
         </div>

      </section>

   </div><br>

   

   <section class="p-category">

      <a href="{{ route('category.index',['name'=>'fruits']) }}">Líneas Capilares</a>
      <a href="{{ route('category.index',['name'=>'vegitables']) }}">Línea Infantil</a>
      <a href="{{ route('category.index',['name'=>'fish']) }}">Línea Masculina</a>
      <a href="{{ route('category.index',['name'=>'meat']) }}">Catalogo</a>
   </section>

   <section class="home-category">

      <h1 class="title">Top 3 de nuestros productos mas vendidos</h1>

      <div class="box-container">

         <div class="box box-1">
            <br><h3>Líneas Capilares</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
           <br> <a href="{{ route('category.index',['name'=>'fruits']) }}" class="btn">comprar</a>
         </div>

         <div class="box box-2">
         <br> <h3>Línea Infantil</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
           <br> <a href="{{ route('category.index',['name'=>'vegitables']) }}" class="btn">comprar</a>
         </div>

         <div class="box box-3">
            <br><h3>Línea Masculina</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
           <br> <a href="{{ route('category.index',['name'=>'fish']) }}" class="btn">comprar</a>
         </div>

         <div class="box box-4">
            <br><h3>Línea Masculina</h3><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p><br>
            <br><a href="{{ route('category.index',['name'=>'fish']) }}" class="btn">catalogo</a>
         </div>

      </div>

   </section><br>

   <br> <div class="custom-bg">

      <section class="custom-home">
  
          <div class="custom-content">
              <h3>Nueva línea Masculina</h3>
              <p>Nuestra nueva línea masculina está diseñada para ofrecer una limpieza profunda y revitalizante, dejando el cabello fresco, fuerte y lleno de vitalidad. Estos productos están formulados con ingredientes naturales que hidratan y nutren el cuero cabelludo, combatiendo la sequedad y la caspa. </p>
           
          </div>
  
      </section>
  
  </div>
{{-- 
   <section class="products">

      <h1 class="title">Ultimos productos</h1>

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

                  <input type="submit" value="Agregar a lista de deseos" class="option-btn" name="add_to_wishlist">
                  
                  <input type="submit" value="Agregar al carrito" class="btn" name="add_to_cart">
               </form>
             @endforeach
         @else
         <p class="empty">Aún no se han añadido productos!</p>
         @endif
         

      </div>

   </section>
   --}}

   <x-slot name="footer">

   </x-slot>
</x-app-layout>
