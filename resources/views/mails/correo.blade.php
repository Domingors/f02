<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Pedido realizado</title>
</head>
<body>
    <div class="container mx-auto">
        <p>Pedido nº {{ $num }}.</p>
        <div class="bg-gray-50 px-4 py-3 border border-gray-200">
            <div class="bg-white px-4 py-3 border border-gray-200">
                <h2 align="center"><big>Artículos del pedido nº: {{$num}}</big></h2>
                <table class="min-w-full divide-y divide-gray-200" id="lpedis">
                    <thead class="bg-green-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if(isset($artsPedi) && $artsPedi != null)
                            @foreach ($artsPedi as $artPedi)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $artPedi->codigo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $artPedi->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $artPedi->cantidad }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $artPedi->precio }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>