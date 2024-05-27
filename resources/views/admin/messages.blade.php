<x-app-layout>
    <x-slot name="headerad">

    </x-slot>

    <section class="messages">

        <h1 class="title">Mensajes</h1>
     
        <div class="box-container">
     
        @if ($messages->isNotEmpty())
            @foreach ($messages as $message)
            <div class="box">
            <p> ID usuario : <span><?= $message['user_id']; ?></span> </p>
            <p> Nombre : <span><?= $message['name']; ?></span> </p>
            <p> Número : <span><?= $message['number']; ?></span> </p>
            <p> Email : <span><?= $message['email']; ?></span> </p>
            <p> Mensaje : <span><?= $message['message']; ?></span> </p>
            <form action="{{ route('message.destroy',$message) }}" method="GET">
                @csrf 

                <input type="submit" class="delete-btn" value="Borrar">

            </form>
            
            </div>
            @endforeach
        @else
        <p class="empty">¡No tienes mensajes!</p>
        @endif
     
        </div>
     
     </section>

    <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>