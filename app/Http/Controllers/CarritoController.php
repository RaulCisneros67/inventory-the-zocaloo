<?php

namespace App\Http\Controllers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;






class CarritoController extends Controller
{
    public function index (Request $request){
        $texto=$request->get('texto');
        $products=DB::table('products')
                    ->select('id','Imagen','Producto','Clave','Unidades','Marca','precio','created_at','updated_at')
                    ->where('Producto','LIKE','%'.$texto.'%')
                    ->orWhere('Marca','LIKE','%'.$texto.'%')
                    ->orWhere('Clave','LIKE','%'.$texto.'%')
                    ->orderBy('Producto','asc')
                 ->paginate(100);


                    return view('home', compact('products','texto'));
    }


    public function store (Request $request){
        $producto = Product::find($request->producto_id);
        Cart::add(array(
            'id' => $producto->id,
            'name' => $producto->Producto,
            'price' =>$producto->precio * $request->UnidadesSelect,
            'quantity' => $request->UnidadesSelect,
            'attributes' => array(
                'color' => $producto->Imagen,

            )
        ));
        return back();

    } public function cart(){

        return view('checkout');
    }

    public function destroy(Request $request)
{
    Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
}

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the");


}
public function update(){
     $Datos=Cart::getcontent();

//  dd($Datos);
   foreach($Datos as $Dato){

       // dd( $Dato->quantity);
       $Datillos=Product::find($Dato->id);
       $UnidadesFin=$Datillos->Unidades-$Dato->quantity;
       $Datillos->Unidades=$UnidadesFin;
       $Datillos->save();


     }

     Cart::clear();

return view("checkout");

}


public function eliminarProducto($id) {

    $product = Product::find($id);

    $product->delete();

    return redirect()->route('products.index');

}
public function editProduct($id){

    $product = Product::find($id);

    return view('products.edit', compact('product'));

}

public function actualizarProduc(Request $request, $id){
    $product = Product::findOrFail($id);

    if($request->file==true){
    $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath(),[
        'folder' => "imgZocalo",  ])->getSecurePath();
        $product->Imagen = $uploadedFileUrl;
        $product->save();
    }
        $product->Producto = $request->producto;
        $product->Clave = $request->clave;
        $product->Unidades = $request->unidades;
        $product->Marca = $request->marca;
        $product->precio = $request->precio;

        $product->save();





return redirect()->route('products.index');
    }

    public function agregarProduct(Request $request){


        if($request->file==true){
                $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath(),[
                    'folder' => "imgZocalo",  ])->getSecurePath();
                    $product = new Product();
                    $product->producto = $request->producto;
                    $product->Clave = $request->clave;
                $product->unidades = $request->unidades;
                $product->marca = $request->marca;
                $product->precio = $request->precio;
                $product->Imagen = $uploadedFileUrl;
                $product->save();
        }else{
            $product = new Product();
            $product->producto = $request->producto;
            $product->Clave = $request->clave;
                $product->unidades = $request->unidades;
                $product->marca = $request->marca;
                $product->precio = $request->precio;
                $product->imagen =  "Sin Imagen";
                $product->save();
        }

        return redirect()->route('products.index');



                $product = new Product();



                $product->producto = $request->producto;
                $product->Clave = $request->clave;
                $product->unidades = $request->unidades;
                $product->marca = $request->marca;
                $product->precio = $request->precio;
                $product->Imagen = $uploadedFileUrl;
                $product->save();

                return redirect()->route('products.index');
            }



}
