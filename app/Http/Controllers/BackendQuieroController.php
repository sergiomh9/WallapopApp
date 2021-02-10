<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiero;
use App\Models\Producto;
use App\Models\User;

class BackendQuieroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $quieros = Quiero::all();
         return view('backend.quiero.index', ['quieros'=>$quieros] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $quieros = Quiero::all();
         $users = User::all();
         $productos = Producto::all();
         return view('backend.quiero.create', ['quieros' => $quieros, 'users'=> $users, 'productos'=> $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect('backend/quiero')->with($response);
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
         $quiero = Quiero::find($id);
          $users = User::all();
        $productos = Producto::all();
        return view('backend.quiero.edit', ['quiero'=>$quiero, 'users'=> $users, 'productos'=> $productos] );
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
        $quiero = Quiero::find($id);
        try {
            $result = $quiero->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $quiero->id];
            return redirect('backend/quiero')->with($response);
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
         $quiero = Quiero::find($id);
        $id = $quiero->id;
         
        try {
            $result = $quiero->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/quiero')->with($response);
    }
}
