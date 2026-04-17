<template>
    <main>
        <h1>Полезные статьи</h1>
        <section v-for="article in articles" :key="article.id">
            <a :href="'/articles/'+article.id">
                <img :src=article.image>
                <h2>{{article.title}}</h2>
            </a>
        </section>
        <br>
    </main>
</template>

<style lang="scss" scoped>
    section{
        a{
            display: flex;
            align-items: stretch;
            gap:20px;
            width: 100%;
            height: 200px;
            margin-bottom: 16px;
            color:var(--color-black);
            background: var(--color-gray-light);
            border-radius: var(--border-rad);
            text-decoration: none;
            overflow: hidden;

            transition: 0.2s;

            &:hover{
                text-decoration: underline;
                box-shadow: var(--shadow1);
            }
        }
        img{
            width:40%;
            flex-shrink: 0;
            object-fit: cover;
            object-position: left;
            border-radius: var(--border-rad) 0 0 var(--border-rad);
        }
        h2{
            width:50%;
            align-self: center;
            margin: 0 20px 0 0;
        }
    }
</style>

<script setup>
import { ref, onMounted } from 'vue'

const articles = ref([])

onMounted(() => {
    fetch('/api/articles').then(res => res.json()).then(data => {
        articles.value = data
    })
})
</script>