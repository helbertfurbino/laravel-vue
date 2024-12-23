<template>

    <Head title="Produtos" />
    <FrontEnd>
        <!-- Container principal -->
        <div class="container my-5">
            <!-- Cabeçalho da página -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Lista de Produtos</h1>
                <Link :href="route('produtos.create')" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Novo Produto
                </Link>
            </div>
            <!-- Tabela de produtos -->
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in produtos" :key="index">
                            <td>{{ item.id }}</td>
                            <td>{{ item.nome }}</td>
                            <td>R$ {{ item.preco }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Ações do Produto">
                                    <Link
                                          :href="route('produtos.show', item.id)"
                                          class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                    </Link>
                                    <Link
                                          :href="route('produtos.edit', item.id)"
                                          class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                    </Link>
                                    <button
                                            @click="deletarProduto(item.id)"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Deletar
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </FrontEnd>
</template>
<script setup>
import FrontEnd from '@/Layouts/FronteEndLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

// Recebe a lista de produtos via props
defineProps({
    produtos: {
        type: Array,
        default: () => []
    }
})

// Form para submissão
const form = useForm({})

// Função de deleção de produto
const deletarProduto = (id) => {
    if (confirm('Deseja realmente deletar este produto?')) {
        const res = form.delete(route('produtos.destroy', id))
        if (res) {
            location.reload()
        }
    }
}
</script>
