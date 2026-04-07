<template>
    <a class="container" :href="href">
        Показать больше
    </a>
</template>


<style scoped>
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--color-gray);
        font-size: 20px;
        width:250px;
        height: 250px;
        margin-bottom: 26px;
        box-shadow: var(--shadow1);
        border-radius: var(--border-rad);
        text-decoration: none;
    }

    .container:hover{
        text-decoration: underline;
    }
</style>


<script setup>
    const props = defineProps({
        href:String
    })
</script>