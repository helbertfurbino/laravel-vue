<?php

namespace App\Http\Controllers;

use App\Dto\ClienteDto;
use App\Http\Requests\Produto\ProdutoFormRequest;
use App\Models\Produto;
use App\Repository\ProdutoRepository;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProdutosController extends Controller
{
    private $clienteDto;
    private $produtoRepository;

    public function __construct()
    {
        $this->clienteDto = new ClienteDto;
        $this->produtoRepository = new ProdutoRepository;
    }

    private function populateClienteDto($request)
    {
        $this->clienteDto->setNome($request->nome);
        $this->clienteDto->setPreco($request->preco);

        return $this->clienteDto;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::get();

        return inertia::render('Produtos/Index', [
            'produtos' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Produtos/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoFormRequest $request)
    {
        try {
            $clienteDto = $this->populateClienteDto($request);

            $this->produtoRepository->create($clienteDto);

            return redirect()->route('produtos.index')->with('message', 'Produto criado com sucesso.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('produtos.create')->with('message', "Não foi possível criar o produto");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return inertia::render('Produtos/Show', [
            'produto' => $produto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return inertia::render('Produtos/Edit', [
            'produto' => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoFormRequest $request, Produto $produto)
    {
        try {

            $clienteDto = $this->populateClienteDto($request);

            $this->produtoRepository->update($clienteDto, $produto->id);

            return redirect()->route('produtos.index')->with('message', 'Produto atualizado com sucesso.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('message', 'Não foi possível atualizar o produto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('message', 'Produto excluído com sucesso.');
    }
}
