<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Http\Requests\StoreprodutoRequest;
use App\Http\Requests\UpdateprodutoRequest;
use Illuminate\Http\Request;
class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }

    public function index()
    {
        $produtos = $this->produto->all();
        return view('home', compact('produtos'));    
    }

    public function store(StoreprodutoRequest $request)
    {
        $this->produto->create($request->all());
        return redirect()->route('home')->with('success', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        $produto = $this->produto->with('fornecedor')->find($id);
        return view('showProduto', compact('produto'));
    }

    public function update(UpdateprodutoRequest $request, $id)
    {
        $this->produto->find($id)->update($request->all());
        return redirect()->route('produto.show', $id)->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(produto $produto, $id)
    {
        $this->produto->find($id)->delete();
        return redirect()->route('home')->with('success', 'Produto deletado com sucesso!');
    }
}
