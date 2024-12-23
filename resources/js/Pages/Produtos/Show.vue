<template>

    <Head title="Visualizando Produto" />
    <FrontEnd>
        <div class="container my-5">
            <div class="mb-4">
                <Link
                      :href="route('produtos.index')"
                      class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Voltar
                </Link>
            </div>
            <div class="card shadow border-0">
                <div class="row g-0">
                    <div
                         class="col-md-4 d-flex align-items-center justify-content-center bg-light"
                         style="min-height: 250px;">
                        <i
                           class="bi bi-box-seam display-1 text-secondary"
                           aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title mb-4">
                                Detalhes do Produto
                            </h4>
                            <div class="mb-3">
                                <label
                                       for="nome"
                                       class="form-label fw-semibold text-muted">
                                    Nome do Produto:
                                </label>
                                <div
                                     class="form-control-plaintext fs-5 fw-medium text-dark"
                                     id="nome">
                                    {{ produto.nome }}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label
                                       for="preco"
                                       class="form-label fw-semibold text-muted">
                                    Preço:
                                </label>
                                <div
                                     class="form-control-plaintext fs-4 fw-bold text-success"
                                     id="preco">
                                    R$ {{ produto.preco }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </FrontEnd>
</template>
<script setup>
import FrontEnd from '@/Layouts/FronteEndLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    produto: Object
});
</script>
