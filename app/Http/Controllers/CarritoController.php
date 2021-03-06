<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index(){
        $cartItems = ordenes::all();
        $user=Auth::user()->id;
        $puntos = Auth::user()->puntos;
        $date=Carbon::today();
        $ordenes=DB::table('ordenes')
                 ->select('ordenes.*','productos.id as producto','productos.categoria','productos.nombre','productos.nombre',
                 'productos.precio','productos.inventario','productos.inventario_back','productos.imagen','productos.descripcion_arte',
                 'productos.obra','productos.autor','productos.medidas','productos.material_arte',
                 'productos.modelo_reloj','productos.correa','productos.modelo_ropa','productos.color',
                 'productos.modelo_joyeria','productos.material_joyeria','productos.descripcion_vuelos',
                 'productos.fecha_inicio','productos.fecha_final','productos.estatus','productos.genero_reloj',DB::raw('(productos.precio * ordenes.cantidad_comprada) as total'))
                ->join('productos','productos.id','=','ordenes.id_producto')
                ->where('ordenes.id_usuario',$user)
                ->where('folio',"=",NULL)
                ->whereDate('ordenes.created_at',$date)
                ->get();
        $total = $ordenes->sum('total');
        $cantidad_esperada = $puntos-$total;
        $folio = ordenes::max('folio')+1;
        // var_dump($ordenes);die;
        return view('cart.cart',compact('ordenes',"total","folio","date","cantidad_esperada"));
    }

    public function store(Request $request){
        $validation = $request->all();
        $orden = ordenes::create($validation);
        return response()->json("El producto se agrego al carrito");
    }

    public function update(Request $request,$carrito){
        $producto = ordenes::find($carrito);
        $update = $producto->update($request->all());
        return $update;
    }


}
