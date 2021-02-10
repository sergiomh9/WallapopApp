<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BackendContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $contactos = Contacto::all();
       
        //  $contactos = DB::select("SELECT productos. *, users.name, contacto. *
        //                          FROM productos, users, contacto
        //                          WHERE productos.iduser = users.id
                                
        //                          ");
        // dd($contactos); 
         return view('backend.contacto.index', ['contactos'=>$contactos] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $contactos = Contacto::all();
         $users = User::all();
         $productos = Producto::all();
         return view('backend.contacto.create', ['contactos' => $contactos, 'users'=> $users, 'productos'=> $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $object = new Contacto($request->all());
        // dd($object);
        try {
            
            $result = $object->save();
            
        } catch(\Exception $e) {
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('backend/contacto')->with($response);
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
          $contacto = Contacto::find($id);
       
          return view('backend.contacto.show', ['contacto' => $contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $contacto = Contacto::find($id);
          $users = User::all();
        $productos = Producto::all();
        return view('backend.contacto.edit', ['contacto'=>$contacto, 'users'=> $users, 'productos'=> $productos] );
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
         $contacto = Contacto::find($id);
        try {
            $result = $contacto->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $contacto->id];
            return redirect('backend/contacto')->with($response);
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
        $contacto = Contacto::find($id);
        $id = $contacto->id;
         
        try {
            $result = $contacto->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/contacto')->with($response);
    }
}
