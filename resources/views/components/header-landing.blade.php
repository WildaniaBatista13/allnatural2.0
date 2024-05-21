

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container-hero">
    <div class="container hero">
        <div class="customer-support">
            <i class="fa-solid fa-headset" style="color: #9F6C3A;"></i>
            <div class="content-customer-support">
                <span class="text">Soporte al cliente</span>
                <span class="number">809-490-6856</span>
            </div>
        </div>

        <div class="container-logo">
            <i class="fa-solid fa-droplet" style="color: #A8EEF1;"></i>
            <h1 class="logo"><a href="/">All Natural</a></h1>
        </div>

        <div class="container-user">
            <i class="fa-solid fa-user"></i>
            <i class="fa-solid fa-basket-shopping"></i>
            <div class="content-shopping-cart">
                <span class="text">Carrito</span>
                <span class="number">(0)</span>
            </div>
        </div>
    </div>
</div>

<header class="header">
    <div class="flex">
        <div class="container-logo">
            <a href="admin_page.php" class="logo"></a>
        </div>

        <nav class="navbar">
           
            <a href="{{ route('home.index') }}">Inicio</a>
            <a href="{{ route('shop.index') }}">Tienda</a>
            <a href="{{ route('order.index') }}">Ordenes</a>
            <a href="{{ route('about.index') }}">Sobre nosotros</a>
            <a href="{{ route('contact.index') }}">Contacto</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            
            <a href="{{ route('search.index') }}" class="fas fa-search"></a>

            <a href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i><span>(0)</span></a>
            <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i><span>(0)</span></a>
        </div>

        <div class="profile">
            <img src="uploaded_img/default_profile_image.jpg" alt="">
            <p>{{ Auth::user()->name }}</p>
            <a href="user_profile_update.php" class="btn">Actualizar Perfil</a>
            

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"class="delete-btn">Cerrar sesión</a>
                
            </form>
            
            <div class="flex-btn">
                <a href="{{ route('login') }}" class="option-btn">Acceder</a>
                <a href="{{ route('register') }}" class="option-btn">Registrarse</a>
            </div>
        </div>
    </div>

    <script
        src="https://kit.fontawesome.com/81581fb069.js"
        crossorigin="anonymous"
    ></script>
</header>