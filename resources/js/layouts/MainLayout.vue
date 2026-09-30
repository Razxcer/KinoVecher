<script setup>
import TheHeader from '@/components/TheHeader.vue';


</script>

<template>
    <TheHeader/>
    <main class="main">
        <slot />
    </main>
    
</template>

<style>
.main{
    margin-top: 60px;
}
</style>