@extends('layouts.app')

@section('title', 'Create')

@section('content')

<div class="form-row m-15 " >
    <center><img src="{!! asset('img/const.png') !!} " alt="" width="20%" height="20%" /></center>
    </div>

<center>

<form action="{{ route('products.create') }}" method="POST" enctype="multipart/form-data"
class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
@csrf

<h2 class="text-2xl text-center py-4 mb-4 font-semibold">Crear </h2>

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Imagen" name="file" type="file">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Producto" name="producto">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Clave" name="clave">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Unidades" name="unidades">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Marca" name="marca">

<input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
placeholder="Precio" name="precio">

<button type="submit" class="my-3 w-full bg-green-500 p-2 font-semibold
rounded text-white hover:bg-green-600">Añadir</button>

</form>

@endsection
</center>
