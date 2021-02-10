<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Quiero;
use App\Models\Contacto;
use DB;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $productos = Producto::all();
        
                             
         $users = User::all();
         $categorias = Categoria::all();
         return view('frontend.index', ['productos'=>$productos], ['users'=>$users], ['categorias'=>$categorias]);
    }
    
    public function indexlogged()
    {
        $productos = Producto::all();
         $idLogged = auth()->user()->id;
        
         $count=DB::select( "SELECT COUNT(*) as count FROM quieros
                            where iduser = $idLogged
                            ");
                            
          $users = User::all();
         $categorias = Categoria::all();
        return view('frontend.indexlog', ['productos' => $productos, 'count'=>$count], ['users'=>$users], ['categorias'=>$categorias]);
    }
    
    
    
      public function cart($id)
    {
        
        $quiero = DB::select("select quieros.id as idquieros, quieros.iduser, quieros.idproducto, productos.id, productos.iduser, productos.idcategoria, productos.nombre, productos.descripcion, productos.uso, productos.precio, productos.fecha, productos.estado, productos.foto, users.id, users.name from quieros,productos, users where quieros.iduser = $id AND quieros.idproducto = productos.id and quieros.iduser = users.id");
        $vendido = 'Vendido';
        
         $producto = Producto::find($id);
        return view('frontend.cart', ['quiero' => $quiero ,'vendido' =>  $vendido]);
    }
    
    
    
    
    
     public function showProducto( User $user,  $id)
    {
    
        $producto = Producto::find($id);
        $vendido = 'Vendido';
        
        
        $contactos = DB::select("select * from productos, contacto, users where productos.id = contacto.idproducto and contacto.idproducto = $id and contacto.iduser2 = users.id");
       
        return view('frontend.producto', ['producto' => $producto], ['contactos'=>$contactos ,'vendido' =>  $vendido]);
      
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $productos = Producto::all();
         $users = User::all();
         $categorias = Categoria::all();
         return view('frontend.create', ['productos' => $productos, 'users'=> $users, 'categorias'=> $categorias]);
    }
    
    
    
        public function createContact(Request $request, $id)
        {
            $object = new Contacto($request->all());
         
        try {
            
            $result = $object->save();
            
        } catch(\Exception $e) {
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return back();
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        
         $producto = new Producto($request->all());
       
        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
           
            $file = $request->file('foto');
            $path = $file->getRealPath();
            $foto = file_get_contents($path);
            $base64 = base64_encode($foto);
            $producto->foto = $base64;
        }
        // dd($object);
        try {
            $result = $producto->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($producto->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $producto->id];
            return redirect('/home')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    
     public function addcart(Request $request)
    {
       
         $object = new Quiero($request->all());
          
        // dd($object);
        try {
            
            $result = $object->save();
            
        } catch(\Exception $e) {
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('/home')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idquiero)
    {
         $producto = Producto::find($id);
        
        
        try {
            $result = $producto->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $producto->id];
             //return redirect('/')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
        
        
        $quiero = Quiero::find($idquiero);
        
        //$idquiero = $idquiero;
        try {
            $result = $quiero->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $idquiero];
        //return redirect('/')->with($response);
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiero = Quiero::find($id);
        $id = $quiero->id;
         
        try {
            $result = $quiero->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return back();
    }
}
