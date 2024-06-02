<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Http\Requests\StorefornecedorRequest;
use App\Http\Requests\UpdatefornecedorRequest;

class FornecedorController extends Controller
{
    private $fornecedor;
    public function __construct(Fornecedor $fornecedor) {
        $this->fornecedor = $fornecedor;
    }
    public function index()
    {
        $fornecedores = $this->fornecedor->all();
        return view('home', compact('fornecedores'));
    }

    public function store(StorefornecedorRequest $request)
    {
        $this->fornecedor->create($request->all());
        return redirect()->route('home')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function show($id)
    {
        $fornecedor = $this->fornecedor->find($id);
        return view('showFornecedor', compact('fornecedor'));
    }

    public function update(UpdatefornecedorRequest $request,$id)
    {
        $this->fornecedor->find($id)->update($request->all());
        return redirect()->route('fornecedor.show', $id)->with('success', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->fornecedor->find($id)->delete();
        return redirect()->route('home')->with('success', 'Fornecedor deletado com sucesso!');
    }
}
