<?php
use App\Models\Produto;
use App\Models\Fornecedor;
$produtos = Produto::all();
$fornecedores = \App\Models\Fornecedor::all();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-stone-300 h-dvh w-screen p-10 flex items-center flex-col">
        <div class="mb-5">
            <button id="btn_produtos"
                class="border border-black p-1 bg-stone-600 hover:bg-stone-500 transition delay-150 duration-300 ease-in-out text-white">Produtos</button>
            <button id="btn_fornecedores"
                class="border border-black p-1 bg-stone-600 hover:bg-stone-500 transition delay-150 duration-300 ease-in-out text-white">Fornecedores</button>
        </div>
        <div id="produtos" class="flex flex-col p-5 bg-stone-600	drop-shadow-2xl">
            <form action="produto" method="POST" class="flex flex-col gap-2">
                @csrf
                <input type="text" class="placeholder:text-black border border-black" name="nome" id="nome"
                    placeholder="Nome">
                <input type="text" class="placeholder:text-black border border-black" name="descricao" id="descricao"
                    placeholder="Descrição">
                <input type="text" class="placeholder:text-black border border-black" name="preco" id="preco"
                    placeholder="Preço">
                <select name="fornecedor_id" id="">
                    @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                </select>
                <button type="submit"
                    class="border text-white border-white p-1 bg-stone-600 hover:bg-stone-500 transition delay-150 duration-300 ease-in-out">Adicionar</button>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <table class="border-collapse border border-slate-500">
                <thead>
                    <tr>
                        <th class="border p-1 border-bg-white text-white">Codigo</th>
                        <th class="border p-1 border-bg-white text-white">Nome</th>
                        <th class="border p-1 border-bg-white text-white">Descrição</th>
                        <th class="border p-1 border-bg-white text-white">Preço</th>
                        <th class="border p-1 border-bg-white text-white">Fornecedor</th>
                        <th class="border p-1 border-bg-white text-white">OPTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td class="border p-1 border-bg-white text-white">{{ $produto->id }}</td>
                            <td class="border p-1 border-bg-white text-white">{{ $produto->nome }}</td>
                            <td class="border p-1 border-bg-white text-white">{{ $produto->descricao }}</td>
                            <td class="border p-1 border-bg-white text-white">
                                {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="border p-1 border-bg-white text-white">
                                @if (isset($produto->fornecedor->nome))
                                    {{ $produto->fornecedor->nome }}
                                @else
                                    Sem fornecedor
                                @endif
                            </td>
                            <td class="border p-1 border-bg-white text-white">
                                <a href="{{ route('produto.update', $produto->id) }}"
                                    class="border p-1 border-bg-white text-white">Editar</a>
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border p-1 border-bg-white text-white">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div id="fornecedores" class="flex flex-col p-5 bg-stone-600	drop-shadow-2xl hidden">
            <form action="fornecedor" method="POST" class="flex flex-col gap-2">
                @csrf
                <input type="text" class="placeholder:text-black border border-black" name="nome" id="nome"
                    placeholder="Nome">
                <input type="text" class="placeholder:text-black border border-black" name="email" id="email"
                    placeholder="Email">
                <input type="text" class="placeholder:text-black border border-black" name="cnpj" id="cnpj"
                    placeholder="Cnpj">
                <button type="submit"
                    class="border text-white border-white p-1 bg-stone-600 hover:bg-stone-500 transition delay-150 duration-300 ease-in-out">Adicionar</button>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <table class="border-collapse border border-slate-500">
                <thead>
                    <tr>
                        <th class="border p-1 border-bg-white text-white">Codigo</th>
                        <th class="border p-1 border-bg-white text-white">Nome</th>
                        <th class="border p-1 border-bg-white text-white">Email</th>
                        <th class="border p-1 border-bg-white text-white">Cnpj</th>
                        <th class="border p-1 border-bg-white text-white">OPTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td class="border p-1 border-bg-white text-white">{{ $fornecedor->id }}</td>
                            <td class="border p-1 border-bg-white text-white">{{ $fornecedor->nome }}</td>
                            <td class="border p-1 border-bg-white text-white">{{ $fornecedor->email }}</td>
                            <td class="border p-1 border-bg-white text-white">{{ $fornecedor->cnpj }}</td>
                            <td class="border p-1 border-bg-white text-white">
                                <a href="{{ route('fornecedor.update', $fornecedor->id) }}"
                                    class="border p-1 border-bg-white text-white">Editar</a>
                                <form action="{{ route('fornecedor.destroy', $fornecedor->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border p-1 border-bg-white text-white">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>

</html>
<script>
    let fornecedores = document.getElementById('fornecedores');
    let produtos = document.getElementById('produtos');
    let btn_produtos = document.getElementById('btn_produtos');
    let btn_fornecedores = document.getElementById('btn_fornecedores');

    btn_produtos.addEventListener('click', () => {
        produtos.style.display = 'block';
        fornecedores.style.display = 'none';
    });

    btn_fornecedores.addEventListener('click', () => {
        produtos.style.display = 'none';
        fornecedores.style.display = 'block';
    });
</script>
