<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneratesPDFs;
class OrderController extends Controller
{
    use GeneratesPDFs;
    /**
     * Display a listing of the resource.
     */
    public function index($type=null,$state=null)
    {
        $state=$state;
        if($state!=null){
            $orders=Order::where('payment_status',$state)->get();
        }else{
            $orders=Order::all();
        }
        

        if($type=='admin'){
            return view('admin.orders',compact('orders','state'));
        }else{
            return view('orders',compact('orders'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = $request->user();

        $request=$request->all();

        $request['user_id']=Auth::user()->id;

        $request['address']='flat no. '. $request['flat'] .' '. $request['street'] .' '. $request['city'] .' '. $request['state'] .' '. $request['country'] .' - '. $request['pin_code'];

        $request['placed_on']=date('d-M-Y');

        $request['payment_status']='pendiente';

        $order=Order::create($request);

        $user->carts()->delete();

        //return redirect()->route('order.index');

        // Redirigir al usuario a la visualización del resumen en PDF
        return redirect()->route('order.summary', ['orderId' => $order->id]);

    }

    public function showOrderSummary($orderId)
    {
        $order = Order::findOrFail($orderId);

        return $this->modalPDF('plantillas.checkout', ['order' => $order], 'resumen.pdf');
    }

    public function generatepdf($type=null){

        //downloadPDF($view, $data, $fileName = 'document.pdf')
        if($type!=null){
            $orders = Order::where('payment_status',$type)->get();
            $type=$type.'s';
        }else{
            
            $orders = Order::all();
        }
        

        $name = date('dmY').'_order.pdf';

        return $this->downloadPDF('plantillas.order', ['orders' => $orders,'type'=>$type], $name);
    }

    public function update(Request $request, Order $order)
    {
        //

        $data = $request->all();

        $model = $order;

        $model->update($data);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //

        
        $order->delete();
        

        return redirect()->route('order.index',['type'=>'admin']);
    }
}
