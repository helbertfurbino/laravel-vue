<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <Link class="navbar-brand" :href="route('home')">
            CRUD - Laravel + Vues JS + Inertia
            </Link>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link
                              :href="route('produtos.index')"
                              class="nav-link">
                        Produtos
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
