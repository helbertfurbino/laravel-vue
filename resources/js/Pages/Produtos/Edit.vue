<template>

    <Head title="Editar Produto" />
    <FrontEnd>
         <div v-if="$page.props.flash.message" class="alert alert-info  alert-dismissible fade show">
            {{ $page.props.flash.message }}
        </div>

        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 mb-0">Editar Produto</h1>
                <Link :href="route('produtos.index')" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
                </Link>
            </div>
            <form @submit.prevent="updateProduto" class="card p-4 shadow border-0">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label fw-bold">Nome</label>
                        <input
                               type="text"
                               v-model="form.nome"
                               class="form-control"
                               id="nome"
                               name="nome"
                               :class="{ 'is-invalid': errors.nome }" />
                        <div v-if="errors.nome" class="invalid-feedback">
                            {{ errors.nome }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="preco" class="form-label fw-bold">Preço</label>
                        <input
                               type="number"
                               v-model="form.preco"
                               class="form-control"
                               id="preco"
                               name="preco"
                               :class="{ 'is-invalid': errors.preco }" />
                        <div v-if="errors.preco" class="invalid-feedback">
                            {{ errors.preco }}
                        </div>
                    </div>
                </div>
                <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="form.processing">
                    <span v-if="form.processing">Atualizando...</span>
                    <span v-else>Atualizar</span>
                </button>
            </form>
        </div>
    </FrontEnd>
</template>
<script setup>
import FrontEnd from '@/Layouts/FronteEndLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
    produto: Object
});

const form = useForm({
    nome: props.produto.nome,
    preco: props.produto.preco
});

const updateProduto = () => {
    const res = form.put(route('produtos.update', props.produto.id));
    if (res) {
        form.reset();
    }
};
</script>
