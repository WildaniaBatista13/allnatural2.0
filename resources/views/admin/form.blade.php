<form action="{{ $action  }}" method="POST" enctype="multipart/form-data">
    @csrf 
        
    @method($method)
    <?php
    //dd($data);
    ?>
   <div class="flex">
      <div class="inputBox">
      <input type="text" value="{{ old('name', $data->name) }}" name="name" class="box" required placeholder="Ingresar nombre del producto">
      <select name="category" class="box" required>
         <option value="" {{ $data->category==""??'selected' }} disabled>Seleccionar categoría</option>
            <option {{ $data->category=="vegitables"??'selected' }} value="vegitables">Líneas Capilares</option>
            <option {{ $data->category=="fruits"??'selected' }}  value="fruits">Línea Infantil</option>
            <option {{ $data->category=="meat"??'selected' }}  value="meat">Línea Masculina</option>
            <option {{ $data->category=="fish"??'selected' }}  value="fish">Catálogo</option>
      </select>
      </div>
      <div class="inputBox">
      <input type="number" value="{{ old('price', $data->price) }}" min="0" name="price" class="box" required placeholder="Ingresar precio del producto">
      <input type="file" value="{{ old('image', $data->image) }}" name="image" {{ !$update??'required' }} class="box" accept="image/jpg, image/jpeg, image/png">
      </div>
   </div>
   <textarea name="details" class="box" required placeholder="Ingresar detalles del producto" cols="30" rows="10">{{ old('details', $data->details) }}</textarea>

   @if ($update)
    <div class="flex-btn">
        <input type="submit" class="btn" value="{{ $submit }}" name="add_product">
        <a href="{{ route('product.index') }}" class="option-btn">Regresar</a>
    </div>
   @else
   <input type="submit" class="btn" value="{{ $submit }}" name="add_product">
   @endif

   
</form>