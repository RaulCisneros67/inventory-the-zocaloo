@extends('layouts.app')

@section('title', 'Edit')

@section('content')

<center>

    <div class="form-row m-15 " >
        <center><img src="{!! asset('img/const.png') !!} " alt="" width="20%" height="20%" /></center>
        </div>

<form enctype="multipart/form-data" action="{{ route('actualizarProduc.item', $product->id) }}" method="POST"
class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
@csrf
@method('put')

<h2 class="text-2xl text-center py-4 mb-4 font-semibold">
    Editar producto {{ $product->id}}

</h2>
<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Imagen" name="file" type="file">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Producto" name="producto" value="{{ $product->Producto }}">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Clave" name="clave" value="{{ $product->Clave }}">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Unidades" name="unidades" value="{{ $product->Unidades }}">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Marca" name="marca" value="{{ $product->Marca }}">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Precio" name="precio" value="{{ $product->precio }}">

<button type="submit" class="my-3 w-full bg-green-500 p-2 font-semibold
rounded text-white hover:bg-green-600">Añadir</button>

</form>

@endsection
</center>
