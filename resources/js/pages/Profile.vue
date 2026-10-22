<script setup lang="ts">
    import MainLayout from '@/layouts/MainLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Профиль" />
    <MainLayout>
        <Link href="/logout" method="post" as="button" class="btn">
            Выйти
        </Link>
    </MainLayout>
</template>

<style scoped>
    
</style>