<x-app-layout>
    <x-slot name="headerad">

    </x-slot>

    <section class="add-products">

        <h1 class="title">Añadir nuevo producto</h1>
     
        <x-button-pdf ruta="{{ route('product.admin.pdf') }}"></x-button-pdf>

        @include('admin.form', [
            'data' => $data,
            'action' => $action,
            'method' => $method,
            'submit' => $submit
        ])
     
     </section>
     
     <section class="show-products">
     
        <h1 class="title">Productos añadidos</h1>
     
        <div class="box-container">

            <?php
                //dd($products);
                ?>
        @if ($products->isNotEmpty())
            @foreach ($products as $product)
                <div class="box">
                    <div class="price">$<?= $product['price']; ?>/-</div>
                    <img src="{{ asset('/storage/'.$product['image']) }}" alt="">
                    <div class="name"><?= $product['name']; ?></div>
                    <div class="cat"><?= $product['category']; ?></div>
                    <div class="details"><?= $product['details']; ?></div>
                    <div class="flex-btn">
                    <a href="{{ route('product.edit',$product) }}" class="option-btn">update</a>
                    <a href="{{ route('product.destroy',$product) }}" class="delete-btn" onclick="return confirm('¿Desea eliminar este producto?');">Borrar</a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="empty">¡Ningún producto añadido!</p>
        @endif
        
     
        </div>
     
     </section>
     <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>