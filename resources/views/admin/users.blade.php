<x-app-layout>
    <x-slot name="headerad"></x-slot>

    <section class="user-accounts">

        <h1 class="title">Cuentas de usuario</h1>
        <x-button-pdf ruta="{{ route('user.admin.pdf',['type'=>$type]) }}"></x-button-pdf>
        <div class="box-container">
            @if ($users->isNotEmpty())
                @foreach ($users as $user)
                    
                    <div class="box" style="">
                        <img style="margin:auto" src="{{ asset('/storage/'.$user['image']) }}" alt="">
                        <p> ID usuario : <span><?= $user['id']; ?></span></p>
                        <p> Usuario : <span><?= $user['name']; ?></span></p>
                        <p> Correo : <span><?= $user['email']; ?></span></p>
                        <p> Tipo de usuario : <span style=" color:<?php if($user['user_type'] == 'admin'){ echo 'orange'; }; ?>"><?= $user['user_type']; ?></span></p>
                        <a href="{{ route('profile.destroy.admin',['user' => $user,'ruta'=>$type]) }}" onclick="return confirm('¿Borrar este usuario?');" class="delete-btn">Borrar</a>
                    </div>
                @endforeach
            @endif
                
        </div>
     
     </section>
</x-app-layout>