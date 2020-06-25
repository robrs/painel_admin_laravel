<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;


/**
 * Class CategoriaController
 * @package App\Http\Controllers\Backend
 */
class CategoriaController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);

        return view('backend.categoria.index', compact('categorias'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.categoria.create');
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $req)
    {
        $categoria = new Categoria();

        $validate = validator($req->all(), $categoria->rules, [], $categoria->customAttributes);

        if ($validate->fails()) {
            return redirect()->route('categoria.create')->withErrors($validate)->withInput();
        }

        if ($categoria->create($req->all())) {
            return redirect()->route('categorias')->with('success', 'Categoria Cadastrada com sucesso!');
        } else {
            return redirect()->route('categoria.create');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('backend.categoria.update', compact('categoria'));
    }

    /**
     * @param Request $req
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $req, $id)
    {
        $categoria = Categoria::find($id);

        $validate = validator($req->all(), $categoria->rules, [], $categoria->customAttributes);

        if ($validate->fails()) {
            return redirect()->route('categoria.update', $id)->withErrors($validate)->withInput();
        }

        if ($categoria->update($req->all())) {
            return redirect()->route('categorias')->with('success', 'Categoria Atualizada com sucesso!');
        } else {
            return redirect()->route('categoria.update', $id);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Categoria::find($id)->delete();

        return redirect()->route('categorias');

    }
}
