<script setup>
import { Link } from '@inertiajs/vue3';


</script>

<template>
    <header class="header">
        ВАНЯ СДЕЛАЙ ШАПКУ, ЗАЕБАЛ!
        <Link href="/register">Зарегаться</Link>
        <Link href="/login">Войти</Link>
    </header>
</template>

<style scoped>
.header{
    width: 100%;
    height: 60px;
    background-color: var(--kino-gray);

    color: var(--kino-red);
    font-weight: bold;
    text-align: center;
    line-height: 60px;
    font-size: 20px;
    text-shadow: 2px 2px 2px var(--kino-black);
}
</style>