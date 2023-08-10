@extends('layouts.app')

@section('content')
<div class="form-row m-15 " >
    <center><img src="{!! asset('img/logo1.png') !!} " alt="" width="45%" height="40%" /></center>
    </div>

<h1>Bienvenido al sistema de ventas ferreteria el Zocalo</h1>
<h2>Ferreteria el Zocalo</h2>

    <div class="bg-green">
        <form action="{{route('products.index')}}" method="get">
            <div class="form-row m-10">
                    <input type="text" class="
                    form-control
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="texto" value="{{$texto}}" placeholder="Nombre Producto">


                    <input class="bg-green-500 hover:bg-green-700  py-2 px-4 text-white  rounded"  value="Buscar"type="submit" class="myButton">



            </div>


            </div>


        </form>
        <body class="bg-gray-100 py-12 px-6 text-gray-800">


        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green overflow-hidden shadow-xl sm:rounded-lg">

        <table class="table-auto w-full">
          <thead>
            <tr class="bg-green-500 text-black">
              <th class="w-20 py-4 ...">Id</th>
              <th class="w-20 py-4 ...">Imagen</th>
              <th class="w-1/8 py-4 ...">Producto</th>
              <th class="w-1/8 py-4 ...">Clave</th>
              <th class="w-1/16 py-4 ...">Cantidad
              </th>
              <th class="w-1/16 py-4 ...">Marca</th>
              <th class="w-1/16 py-4 ...">Precio</th>
              <th class="w-1/16 py-4 ...">Agregar</th>
              <th class="w-28 py-4 ...">Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($products as $row)


            <tr class="bg-green-50">
            <td class="border border-green-800">{{$row->id}}</td>

              <td class="border border-green-800"><img class="ImagenProducto" src="{{ $row->Imagen }}"></td>
              <td class="p-3 text-center border border-green-800">{{ $row->Producto }}</td>
              <td class="p-3 text-center border border-green-800">{{ $row->Clave }}</td>
              <td class="p-3 text-center border border-green-800">{{ $row->Unidades }}</td>
              <td class="p-3 text-center border border-green-800">{{ $row->Marca }}</td>
              <td class="p-3 text-center border border-green-800">{{ $row->precio }}</td>
              <td class="p-3 text-center border border-green-800"> <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="hidden" name="producto_id" value="{{$row->id}}">

                @if($row->Unidades >=1)

                <input type="number" name="UnidadesSelect" min="1" value="1">

                <input type="submit" name="btn"  class="btn btn-success" value="Agregar">
                @else
                <p>Sin Unidades</p>
                @endif
            </form></td>


               <form action="{{ route('eliminar.item', $row->id) }}" method="POST">
                   @csrf
                   @method('delete')
                   <td class="p-3 border border-green-800">
                   <button class="bg-red-500 text-white px-3 py-1 rounded-sm">
                <i class="fas fa-trash"></i></button>
               </form>

                <a href="{{route('editProduct.item', $row->id )}}" class="bg-green-500
                     text-white px-3 py-1 rounded-sm"><i class="fas fa-pen"></i></button>
              </td>
            </tr>
            @endforeach


          </tbody>

          <div class="my-3">
          {{$products->links()}}

          </div>
        </table>
    </div>

@endsection
