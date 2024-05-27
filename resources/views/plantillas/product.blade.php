<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
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
        <h1>Productos</h1>
        
        <table width="100">
            <thead>
                <tr>
                    <th>Id</th>
                    {{-- <th>Imagen</th> --}}
                    <th>Nombre</th>
                    <th>Detalles</th>
                    <th>Categoria</th>
                    
                    <th>Precio</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    {{-- <td>
                        <img src="{{ asset('/storage/'.$item->image) }}" height="75px">
                    </td> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->details }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->price }}</td>
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