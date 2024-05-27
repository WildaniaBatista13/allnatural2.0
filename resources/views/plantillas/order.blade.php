<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orden de Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            table-layout: fixed;
            word-wrap: break-word;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ordenes de Pedidos {{ $type }}</h1>
        
        <table width="100">
            <thead>
                <tr>
                    <th width="5px">Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Direccion</th>
                    <th>Productos</th>
                    <th>Precio Total</th>
                    <th>Metodo de pago</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td width="5px">{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->total_products }}</td>
                    <td>${{ number_format($item->total_price, 2) }}</td>
                    <td>{{ $item->method }}</td>
                    <td>{{ $item->payment_status }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            <p>Generado el: {{ date('d-m-Y') }}</p>
        </footer>
    </div>
</body>
</html>