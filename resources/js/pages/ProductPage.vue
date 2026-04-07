<template>
    <Header></Header>
    <div class="top-filled"></div>

    <main>
    <div v-if="loading" class="empty-product-container">
        Загрузка...
    </div>

    <div v-else-if="error" class="empty-product-container">
        <h1>Нет такого товара.</h1>
        <ButtonA 
            href="/"
            text="На главную страницу"
        />
    </div>
    
    <div v-else>
        <h1>{{product.name}}</h1>
        <section class="productpage-img-btn-container">
            <div class="photo-section">
                <!-- Галерея изображений -->
                <div class="gallery">
                    <!-- Большое изображение -->
                    <div class="gallery-main">
                        <img :src="images[currentIndex]" alt="Фото товара">
                    </div>
                    
                    <!-- Навигация и миниатюры -->
                    <div class="gallery-controls">
                        <button class="gallery-arrow gallery-arrow-left" @click="prevImage" :disabled="currentIndex === 0">
                            &#8249;
                        </button>
                        
                        <div class="gallery-thumbnails">
                            <div 
                                v-for="(img, index) in images" 
                                :key="index"
                                class="gallery-thumbnail"
                                :class="{ active: index === currentIndex }"
                                @click="currentIndex = index"
                            >
                                <img :src="img" alt="Миниатюра {{ index + 1 }}">
                            </div>
                        </div>
                        
                        <button class="gallery-arrow gallery-arrow-right" @click="nextImage" :disabled="currentIndex === images.length - 1">
                            &#8250;
                        </button>
                    </div>
                </div>
            </div>
            <div class="btn-section">
                <ButtonA></ButtonA>
                <p>{{product.price}}</p>

            </div>
        </section>
        <p>{{product.description}}</p>
    </div>
    </main>

    <Footer></Footer>
</template>


<script setup>
    import { ref, onMounted, computed } from 'vue'
    import { useRoute } from 'vue-router'
    import axios from 'axios'

    import Header from "../components/Header.vue"
    import Footer from "../components/Footer.vue"
    import ButtonA from "../components/ButtonA.vue"

    const error = ref(false)
    const loading = ref(true)
    const product = ref(null)
    const route = useRoute()
    const currentIndex = ref(0)

    // Вычисляемое свойство для получения массива изображений
    const images = computed(() => {
        if (!product.value) return []
        
        const imgs = []
        for (let i = 1; i <= 15; i++) {
            const key = `image${i}`
            if (product.value[key]) {
                imgs.push(product.value[key])
            }
        }
        return imgs
    })

    // Функции навигации
    const prevImage = () => {
        if (currentIndex.value > 0) {
            currentIndex.value--
        }
    }

    const nextImage = () => {
        if (currentIndex.value < images.value.length - 1) {
            currentIndex.value++
        }
    }

    // Сброс индекса при загрузке нового продукта
    onMounted(async () => {
      try {
          const response = await axios.get(`/api/products/${route.params.id}`)
          product.value = response.data
      } catch (e) {
          error.value = true
      } finally {
          loading.value = false
      }
    })
</script>
