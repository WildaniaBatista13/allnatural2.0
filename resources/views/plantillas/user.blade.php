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
        <h1>Usuarios {{ $type }}</h1>
        
        <table width="100">
            <thead>
                <tr>
                    <th>Id</th>
                    
                    <th>Nombre</th>
                    <th>Email</th>
                    {{-- <th>Imagen</th> --}}
                    <th>Tipo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>
                        <img
                            src="{{ asset('/storage/'.$item->image) }}"
                        >
                    </td> --}}
                    <td>{{ $item->user_type }}</td>
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