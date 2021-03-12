@extends('ppdf')

@section('content')
    <h2 align="center"><big>Artículos de: {{$nombreUser}}</big></h2>
    <table class="min-w-full divide-y divide-gray-200" id="articulosUser">
        <thead class="bg-green-50 border-b">
            <tr>
                <th style="width:500px">Código</th>
                <th style="width:500px">Descripción</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precios</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tramos</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if($artsUser != null)
                @foreach ($artsUser as $artUser)
                    <tr>
                        <td style="width:500px">{{ $artUser->codigo }}</td>
                        <td style="width:500px">{{ $artUser->descripcion }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $artUser->precio1 }}."-".{{ $artUser->precio2 }}."-".{{ $artUser->precio3 }}."-".{{ $artUser->precio4 }}."-".{{ $artUser->precio5 }}."-".{{ $artUser->precio6 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $artUser->tramo1 }}."-".{{ $artUser->tramo2 }}."-".{{ $artUser->tramo3 }}."-".{{ $artUser->tramo4 }}."-".{{ $artUser->tramo5 }}."-".{{ $artUser->tramo6 }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection