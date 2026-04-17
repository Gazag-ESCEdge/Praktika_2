<template>
    <main>
        <div v-if="loading" class="empty-product-container">
            Загрузка...
        </div>

        <div v-else-if="error" class="empty-product-container">
            <h1>Нет такой статьи.</h1>
            <ButtonA 
                href="/articles"
                text="Список статей"
            />
        </div>

        <div v-else>
            <br>
            <img :src=article.image>
            <h1>{{article.title}}</h1>
            <div v-html="article.text" class="article-content"></div>
            <br>
        </div>
    </main>
</template>

<style lang="scss" scoped>
    img{
        width: 50%;
        border-radius: var(--border-rad);
    }

    .article-content{
        white-space: pre-wrap;
    }
</style>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
const route = useRoute()

import ButtonA from '../components/ButtonA.vue'
const article = ref(null)
const error = ref(false)
const loading = ref(true)

onMounted(async () => {
    try {
        const response = await axios.get(`/api/articles/${route.params.id}`)
        article.value = response.data
    } catch (e) {
        error.value = true
    } finally {
        loading.value = false
    }
})
</script>