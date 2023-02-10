@extends("layouts.app")
@section('content')

@php
           $precioFinal = 0

 @endphp
@if (!Cart::isEmpty())


<table  class="table-auto w-full">
    <thead>
        <tr class="bg-green-500 text-black">
            <th >Accion</th>
            <th >#ID</th>
            <th >Nombre</th>
            <th >Precio</th>
            <th >Cantidad</th>
            <th >Imagen</th>
        </tr>
    </thead>
    <tbody>
        @foreach (Cart::getContent() as $item)
        <tr>
            <th class="p-3 text-center border border-green-800">
                <form method="POST" action="{{route('cart.destroy')}}">
                   @method('DELETE')
                   @csrf
                   <input type="hidden" name="id" value="{{$item->id}}">
                   <button type="submit">&#10060;</button>
               </form>
         </th>
            <th class="p-3 text-center border border-green-800">{{$item->id}}</th>
            <td class="p-3 text-center border border-green-800">{{$item->name}}</td>
            <td class="p-3 text-center border border-green-800">{{$item->price}} @php $precioFinal +=$item->price

            @endphp</td>
            <td class="p-3 text-center border border-green-800">{{$item->quantity}}</td>
            <td class="p-3 text-center border border-green-800 ">
                @foreach ($item->attributes as $key => $attribute)
                <img width="10%" src="{{$attribute}}" alt="">
                @endforeach
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

<div class="text-center mt-8">

    <p class="text-lg x-4 p-4">Precio Final = ${{$precioFinal}}</p>
    <a class="p-2 bg-green-500 items-center" href="{{route("products.update")}}">Terminar</a>

</div>




@else
<div class="text-center mt-8">
<H3 class="text-xl font-bold">No Hay productos en el carrito, revisar el <a href="{{ route('products.index') }}">Catalogo</a></H3>
</div>

@endif






@endsection
