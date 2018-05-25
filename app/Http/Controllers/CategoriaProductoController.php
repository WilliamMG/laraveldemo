<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categoriaproducto = CategoriaProducto::latest()->paginate($perPage);
        } else {
            $categoriaproducto = CategoriaProducto::latest()->paginate($perPage);
        }

        return view('admin.categoria-producto.index', compact('categoriaproducto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categoria-producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        CategoriaProducto::create($requestData);

        return redirect('admin/categoria-producto')->with('flash_message', 'CategoriaProducto added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $categoriaproducto = CategoriaProducto::findOrFail($id);

        return view('admin.categoria-producto.show', compact('categoriaproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categoriaproducto = CategoriaProducto::findOrFail($id);

        return view('admin.categoria-producto.edit', compact('categoriaproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $categoriaproducto = CategoriaProducto::findOrFail($id);
        $categoriaproducto->update($requestData);

        return redirect('admin/categoria-producto')->with('flash_message', 'CategoriaProducto updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CategoriaProducto::destroy($id);

        return redirect('admin/categoria-producto')->with('flash_message', 'CategoriaProducto deleted!');
    }
}
