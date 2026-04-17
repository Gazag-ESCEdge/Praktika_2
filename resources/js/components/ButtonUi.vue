<template>
    <button :href="href" :class="`color-${color}`" type="button">
        {{ text }}
    </button>
</template>


<style scoped>
    button{
        height: 40px;
        min-width: 182px;
        max-width: 300px;
        padding: 0 10px;
        color: var(--color-white);
        display: flex;
        text-decoration: none;
        align-items: center;
        justify-content: center;
        border-radius: var(--border-radmin);
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    button:disabled{
        cursor: not-allowed;
    }

    .color-1 {
        background: var(--color-green);
    }
    .color-1:hover {
        background: var(--color-green-hover);
    }

    .color-2 {
        background: var(--color-orange);
    }
    .color-2:hover {
        background: var(--color-orange-hover);
    }

    .color-3 {
        background: var(--color-gray);
    }
    .color-3:hover {
        background: var(--color-black);
    }

    .color-4 {
        background: var(--color-gray-light2);
    }
</style>


<script setup>
    const props = defineProps({
        href:String,
        text:String,
        color: {
            color: String,
            default: 1
        }
    })
</script>