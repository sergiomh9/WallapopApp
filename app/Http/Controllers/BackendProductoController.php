<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

class BackendProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
         return view('backend.producto.index', ['productos'=>$productos] );
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
         return view('backend.producto.create', ['productos' => $productos, 'users'=> $users, 'categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
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
            return redirect('backend/producto')->with($response);
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
        $producto = Producto::find($id);
        
        $path = public_path('foto'); // /var/www/html/laraveles/thirdApplication/public/logo
        $files = \File::files($path);
        $foto = 'foto.png';
        foreach($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if($filename == $producto->id) {
                $foto = $file->getFileName();
                break;
            }
        }
        
        
          return view('backend.producto.show', ['producto' => $producto]);
    }
    
    
    
     private function uploadFile(Request $request, $id) {
          
        if($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $file = $request->file('foto'); // $request->logo
            $target = 'foto';
            
            // $fileName = $file->getClientOriginalName();
            // $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); // 1ra forma
            
            $fileExtension = \File::extension($file->getClientOriginalName());
            
            $name = $id . "." . $fileExtension; // date('YmdHis') . $file->getClientOriginalName();
            $file->move($target, $name);
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $producto = Producto::find($id);
          $users = User::all();
        $categorias = Categoria::all();
        return view('backend.producto.edit', ['producto'=>$producto, 'users'=> $users, 'categorias'=> $categorias] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $producto = Producto::find($id);
       
        
        try {
            $result = $producto->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $producto->id];
            return redirect('backend/producto')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $producto = Producto::find($id);
        $id = $producto->id;
        try {
            $result = $producto->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/producto')->with($response);
    }
}
