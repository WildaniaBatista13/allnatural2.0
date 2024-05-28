<x-app-layout>
    <x-slot name="headerad">

    </x-slot>

    <section class="placed-orders">

        <h1 class="title">Pedidos realizados</h1>
        
        <x-button-pdf ruta="{{ route('order.admin.pdf',['type'=>$state]) }}"></x-button-pdf>

        <div class="box-container">

            
     
           
        @if ($orders->isNotEmpty())
           @foreach ($orders as $order)
           <div class="box">
              <p> ID usuario : <span><?= $order['user_id']; ?></span> </p>
              <p> Realizado el : <span><?= $order['placed_on']; ?></span> </p>
              <p> Nombre : <span><?= $order['name']; ?></span> </p>
              <p> Correo : <span><?= $order['email']; ?></span> </p>
              <p> Número : <span><?= $order['number']; ?></span> </p>
              <p> Dirección : <span><?= $order['address']; ?></span> </p>
              <p> Total de productos : <span><?= $order['total_products']; ?></span> </p>
              <p> Monto total : <span>$<?= $order['total_price']; ?>/-</span> </p>
              <p> Método de pago : <span><?= $order['method']; ?></span> </p>
              <form action="{{ route('order.update',$order) }}" method="POST">
                @csrf 
                @method('PUT')

                 <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                 <select name="payment_status" class="drop-down">
                    <option value="" selected disabled><?= $order['payment_status']; ?></option>
                    <option value="pendiente">Pendiente</option>
                    <option value="completado">Completado</option>
                 </select>
                 <div class="flex-btn">
                    <input type="submit" name="update_order" class="option-btn" value="Actualizar">
                </form>
                    
                    <form action="{{ route('order.admin.destroy',$order) }}" method="POST">
                        @csrf 
        
                        <input type="submit" class="delete-btn" value="Borrar">
        
                    </form>

                    <!----<a href="admin_orders.php?delete=<?= $order['id']; ?>" class="delete-btn" onclick="return confirm('¿Borrar esta orden?');">Borrar</a>---->
                 </div>
              
           </div>
           @endforeach
        @else
            <p class="empty">¡Ningún pedido realizado!</p>
        @endif
           
        </div>
     
     </section>

    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>