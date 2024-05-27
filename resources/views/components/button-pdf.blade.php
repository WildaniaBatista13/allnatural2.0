<div class="flex justify-end mt-4 mb-6" style="margin:1rem 7rem">
    <form action="{{ $ruta }}" method="POST" style="border: none;
    box-shadow: none;">
        @csrf
        <input type="submit" value="Reporte PDF" style="height: 5rem;border-radius:10px;line-height: 4rem;font-size:1.5rem;cursor:pointer" class="bg-red-500 text-white py-2 px-4 rounded">
        
    </form>
    
</div>