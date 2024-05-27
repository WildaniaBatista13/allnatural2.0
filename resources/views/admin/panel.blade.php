<x-app-layout>

   <x-slot name="headerad">

   </x-slot>

    <section class="dashboard">

        <h1 class="title">Dashboard</h1>
     
        <div class="box-container">
     
           <div class="box">
           <?php
              $total_pendings = $orders->where('payment_status','pendiente')->count();
              
           ?>
           <h3>$<?= $total_pendings; ?>/-</h3>
           <p>Pendientes</p>
           <a href="{{ route('order.admin.index', ['type' => 'admin','state'=>'pendiente']) }}" class="btn">Ver órdenes</a>
           </div>
     
           <div class="box">
           <?php
              $total_completed = $orders->where('payment_status','completado')->count();
              
           ?>
           <h3>$<?= $total_completed; ?>/-</h3>
           <p>Órdenes completadas</p>
           <a href="{{ route('order.admin.index', ['type' => 'admin','state'=>'completado']) }}" class="btn">Ver órdenes</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_orders = $orders->count();
           ?>
           <h3><?= $number_of_orders; ?></h3>
           <p>Pedidos realizados</p>
           <a href="{{ route('order.admin.index', ['type' => 'admin']) }}" class="btn">Ver órdenes</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_products = $products->count();
           ?>
           <h3><?= $number_of_products; ?></h3>
           <p>Productos añadidos</p>
           <a href="{{ route('product.index') }}" class="btn">Ver productos</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_users = $users->where('user_type','user')->count();
           ?>
           <h3><?= $number_of_users; ?></h3>
           <p>Total de usuarios</p>
           <a href="{{ route('user.admin.index','user') }}" class="btn">Ver cuentas</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_admins = $users->where('user_type','admin')->count();
           ?>
           <h3><?= $number_of_admins; ?></h3>
           <p>Total de admins</p>
           <a href="{{ route('user.admin.index','admin') }}" class="btn">Ver cuentas</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_accounts = $users->count();
           ?>
           <h3><?= $number_of_accounts; ?></h3>
           <p>Total de cuentas</p>
           <a href="{{ route('user.admin.index') }}" class="btn">Ver cuentas</a>
           </div>
     
           <div class="box">
           <?php
              
              $number_of_messages = $messages->count();


           ?>
           <h3><?= $number_of_messages; ?></h3>
           <p>Total de mensajes</p>
           <a href="{{ route('message.admin.index',['type'=>'admin']) }}" class="btn">Ver mensajes</a>
           </div>
     
        </div>
     
     </section>
     <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>