<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class ProdutoController
 * @package App\Http\Controllers
 */
class ProdutoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin()
    {
        $produtos = Produto::paginate(10);

        return view('backend.produto.admin', compact('produtos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $categorias = Categoria::all();

        return view('backend.produto.create', compact('categorias'));

    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $req)
    {
        $produto = new Produto();

        $attributes = $req->all();

        if (isset($attributes['publicado'])) {
            $attributes['publicado'] = 's';
        } else {
            $attributes['publicado'] = 'n';
        }
        if ($req->hasFile('foto')) {
            $imagem = $req->file('foto');
            $num = sha1(date('YmdHis'));
            $dir = "img/produtos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "foto" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $attributes['foto'] = $dir . "/" . $nomeImagem;
        }

        $validate = validator($attributes, $produto->rules, [], $produto->customAttributes);
        if ($validate->fails()) {
            return redirect()->route('produto.create')->withErrors($validate)->withInput();
        }


        if ($produto->create($attributes)) {
            return redirect()->route('produtos')->with('success', 'Produto Cadastrado com sucesso!');
        } else {
            return redirect()->route('produto.create');
        }


    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return view('backend.produto.update', compact('produto','categorias'));

    }

    /**
     * @param Request $req
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $req, $id)
    {

        $produto = Produto::find($id);

        $attributes = $req->all();

        if (isset($attributes['publicado'])) {
            $attributes['publicado'] = 's';
        } else {
            $attributes['publicado'] = 'n';
        }
        if ($req->hasFile('foto')) {
            $imagem = $req->file('foto');
            $num = sha1(date('YmdHis'));
            $dir = "img/produtos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "foto" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $attributes['foto'] = $dir . "/" . $nomeImagem;
        }

        $validate = validator($attributes, $produto->rules, [], $produto->customAttributes);
        if ($validate->fails()) {
            return redirect()->route('produto.edit', $id)->withErrors($validate)->withInput();
        }


        if ($produto->update($attributes)) {
            return redirect()->route('produtos')->with('success', 'Produto Atualizado com sucesso!');
        } else {
            return redirect()->route('produto.edit', $id);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $produto = Produto::find($id);

        $image_path = $produto->foto;

        if (File::exists($image_path)) {

            File::delete($image_path);
        }

        $produto->delete();

        return redirect()->route('produtos');
    }


}
