<template>
    <a :href="href">
        {{ text }}
    </a>
</template>


<style scoped>
    a{
        height: 40px;
        min-width: 182px;
        max-width: 300px;
        padding: 0 10px;
        color: var(--color-white);
        display: flex;
        background: var(--color-green);
        text-decoration: none;
        align-items: center;
        justify-content: center;
        border-radius: var(--border-radmin);

        transition: 0.2s;
    }

    a:hover{
        background: var(--color-green-hover);
    }
</style>


<script setup>
    const props = defineProps({
        href:String,
        text:String,
        type:Number
    })
</script>