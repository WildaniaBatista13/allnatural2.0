<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orden de Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details h2 {
            color: #555;
        }
        .order-details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Orden de Pedido</h1>
        <div class="order-details">
            <h2>Detalles del Cliente</h2>
            <p><strong>Nombre:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Dirección:</strong> {{ $order->address }}</p>
            <p><strong>Teléfono:</strong> {{ $order->number }}</p>
        </div>
        <div class="order-details">
            <h2>Detalles de la Orden</h2>
            <p><strong>Orden ID:</strong> {{ $order->id }}</p>
            <p><strong>Fecha:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    
                </tr>
            </thead>
            <tbody>
                @php
                    $items=explode(',',$order->total_products);

                @endphp
                @foreach ($items as $item)
                <tr>
                    
                    @php
                        $item_data=explode('(',$item);

                        $cantidad=explode(')',$item_data[1]);
                    @endphp
                    <td>{{ $item_data[0] }}</td>
                    <td>{{ $cantidad[0] }}</td>
                </tr>
                @endforeach
                
                <tr>
                    <td colspan="1" class="total">Total</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>