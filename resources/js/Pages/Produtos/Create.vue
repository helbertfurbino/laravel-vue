<template>

    <Head title="Criar Produto" />
    <FrontEnd>
        <div v-if="$page.props.flash.message" class="alert alert-info  alert-dismissible fade show">
            {{ $page.props.flash.message }}
        </div>
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 mb-0">Criar Produto</h1>
                <Link :href="route('produtos.index')" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
                </Link>
            </div>
            <form @submit.prevent="salvarProduto" class="card p-4 shadow border-0">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label fw-bold">Nome</label>
                        <input
                               type="text"
                               v-model="form.nome"
                               class="form-control"
                               :class="{ 'is-invalid': errors.nome }"
                               id="nome"
                               name="nome" />
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
                               :class="{ 'is-invalid': errors.preco }"
                               id="preco"
                               name="preco" />
                        <div v-if="errors.preco" class="invalid-feedback">
                            {{ errors.preco }}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" :disabled="form.processing">
                    <span v-if="form.processing">Salvando...</span>
                    <span v-else>Salvar</span>
                </button>
            </form>
        </div>
    </FrontEnd>
</template>
<script setup>
import FrontEnd from '@/Layouts/FronteEndLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object
});

const form = useForm({
    nome: '',
    preco: ''
});

const salvarProduto = () => {
    const res = form.post(route('produtos.store'));
    if (res) {
        form.reset();
    }
};
</script>
