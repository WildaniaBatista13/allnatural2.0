<form action="{{ $action route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf 
        
    @method($method)
   <div class="flex">
      <div class="inputBox">
      <input type="text" name="name" class="box" required placeholder="Ingresar nombre del producto">
      <select name="category" class="box" required>
         <option value="" selected disabled>Seleccionar categoría</option>
            <option value="vegitables">Líneas Capilares</option>
            <option value="fruits">Línea Infantil</option>
            <option value="meat">Línea Masculina</option>
            <option value="fish">Catálogo</option>
      </select>
      </div>
      <div class="inputBox">
      <input type="number" min="0" name="price" class="box" required placeholder="Ingresar precio del producto">
      <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
      </div>
   </div>
   <textarea name="details" class="box" required placeholder="Ingresar detalles del producto" cols="30" rows="10"></textarea>
   <input type="submit" class="btn" value="{{ $submit }}" name="add_product">
</form>