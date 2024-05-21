<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    //

    public function index(){

        $products=Product::all();

        return view('admin.product',[
            'data' => app(\App\Models\Product::class),
            'action' => route('product.store'),
            'method' => 'POST',
            'submit' => 'Añadir producto',
            'products' => $products,
            'update' => false,
        ]);
    }

    public function store(Request $request){

        $request=$request->all();
        // obtener el nombre del archivo sin la extension

        $file=data_get($request, 'image');

        $folder=Str::lower(class_basename(\App\Models\Product::class));

        $disk = 'public';

        $filename = pathinfo($file->getClientOriginalName(), flags:PATHINFO_FILENAME);

        // extension

        $extension = $file->getClientOriginalExtension();

        // se agrega el tiempo al nombre del archivo

        $filename = $filename.'-'.time().'.'.$extension;

        // subir archivo

        $image= $file->storeAs($folder,$filename,$disk);

        $request['image'] = $image;

        Product::create($request);

        return redirect()->route('product.index');
    }

    public function edit(Product $product){
        return view('admin.edit',[
            'data' => $product,
            'action' => route('product.update',$product),
            'method' => 'PUT',
            'submit' => 'Actualizar producto',
            'update' => true
        ]);
    }

    public function update(Request $request,Product $product){

        $data = $request->all();
        $model = $product;

        if(data_get($data, 'image')){

            
            $disk = 'public';

            Storage::disk($disk)->delete($model->image);

            // obtener el nombre del archivo sin la extension

            $file=data_get($data, 'image');

            $folder=Str::lower(class_basename(\App\Models\Product::class));

            $filename = pathinfo($file->getClientOriginalName(), flags:PATHINFO_FILENAME);

            // extension

            $extension = $file->getClientOriginalExtension();

            // se agrega el tiempo al nombre del archivo

            $filename = $filename.'-'.time().'.'.$extension;

            // subir archivo

            $image= $file->storeAs($folder,$filename,$disk);

            data_set(
                $data,
                'image',
                $image,
            );
        }

        $model->update($data);

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        try {
            $disk = 'public';

            Storage::disk($disk)->delete($product->image);

            $product->delete();

        } catch (\Exception $exception) {

            session()->flash('error',$exception->getMessage());

        }

        return redirect()->route('product.index');
    }
}
