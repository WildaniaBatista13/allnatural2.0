<link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
<header class="header">

    <div class="flex">
 
       <a href="{{ route('admin.index') }}" class="logo">Admin<span>Panel</span></a>
 
       <nav class="navbar">
       </nav>
 
       <div class="icons">
          <div id="user-btn" class="fas fa-user">
            
          </div>
       </div>
 
       <div class="profile">
          <?php
             
          ?>
          <img style="margin:auto" src="{{ asset('/storage/'.Auth::user()->image) }}" alt="">
          <p>{{ Auth::user()->name }}</p>
          <a href="{{ route('profile.edit') }}" class="btn">Actualizar perfil</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"class="delete-btn">Cerrar sesión</a>
            
        </form>
          

          <div class="flex-btn">
             <a href="{{ route('login') }}" class="option-btn">Ingresar</a>
             <a href="{{ route('register') }}" class="option-btn">Registrarse</a>
          </div>
       </div>
 
    </div>
 
 </header>