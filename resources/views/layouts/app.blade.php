<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - products</title>

    <!-- Tailwind CSS Link -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a23e6feb03.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
  <body class="bg-green-200 text-gray-800">

    <nav class="h-16 flex justify-end py-4 px-16">
        <div class="col-sm-3 bg-light">
            @if (count(Cart::getContent()))
                <a href="{{route('cart.checkout')}}">&#128722;  <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
            @endif

        </div>

        <a href="{{ route('products.index') }}" class="border border-green-500
        rounded px-4 pt-1 h10 bg-green text-green-500 font-semibold mx-2">
        Productos</a>

        <a href="/crear" class="text-white rounded px-4 pt-1 h-10 bg-green-500
        font-semibold mx-2 hover:bg-green-600">Crear</a>
    </nav>

      <main class="p-16">
          @yield('content')
      </main>


  </body>
</html>
