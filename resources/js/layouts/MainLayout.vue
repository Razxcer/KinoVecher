<script setup>
import TheHeader from '@/components/TheHeader.vue';


</script>

<template>
    <TheHeader class="header"/>
    <div class="template">
        <slot/>
    </div>
</template>

<style scoped>
.header{
    position: fixed;
    top: 0;
    left: 0;
}

.template{
    margin-top: 60px;
}
</style>