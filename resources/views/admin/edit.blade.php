<x-app-layout>
    <x-slot name="headerad">

    </x-slot>

    <section class="add-products">

        <h1 class="title">Actualizar producto</h1>
     
        @include('admin.form', [
            'data' => $data,
            'action' => $action,
            'method' => $method,
            'submit' => $submit
        ])
     
     </section>
     <script src="{{ asset('js/script.js') }}"></script>
</x-app-layout>