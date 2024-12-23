<?php


namespace App\Repository;

use App\Dto\ClienteDto;
use App\Models\Produto;

class ProdutoRepository
{

    public function create(ClienteDto $clienteDto)
    {
        try {
            return Produto::create([
                'nome' => $clienteDto->getNome(),
                'preco' => $clienteDto->getPreco()
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(ClienteDto $clienteDto, $id)
    {
        try {
            return Produto::find($id)->update([
                'nome' => $clienteDto->getNome(),
                'preco' => $clienteDto->getPreco()
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($id)
    {
        return Produto::find($id)->delete();
    }
}
