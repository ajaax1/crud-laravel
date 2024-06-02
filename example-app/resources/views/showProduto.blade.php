<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="bg-stone-300 h-dvh w-screen p-10 flex items-center flex-col">
    <div class="mb-5">
        <button id="btn_produtos"
            class="border border-black p-1 bg-stone-600 hover:bg-stone-500 transition delay-150 duration-300 ease-in-out text-white"><a href="/">VOLTAR</a></button>
    </div>
    <h1>PRODUTO</h1>
    <form action="{{ route('produto.update', $produto->id) }}" method="POST" class="flex flex-col gap-2">
        @csrf
        @method('PUT')
            <input value="{{$produto->nome}}" type="text" class="placeholder:text-black border border-black" name="nome" id="nome"
                placeholder="{{$produto->nome}}">
            <input value="{{$produto->descricao}}" type="text" class="placeholder:text-black border border-black" name="descricao" id="descricao"
                placeholder="{{$produto->descricao}}">
            <input value="{{$produto->preco}}" type="text" class="placeholder:text-black border border-black" name="preco" id="preco"
                placeholder="{{$produto->preco}}">
            <input disabled value="{{$produto->fornecedor->id}}" type="text" class="placeholder:text-black border border-black" name="fornecedor_id" id="fornecedor"
                placeholder="{{$produto->fornecedor->nome}}">
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
</div>
