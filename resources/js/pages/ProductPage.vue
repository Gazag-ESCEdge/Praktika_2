<template>
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
    
    <div v-else class="long-text">
        <br>
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
            <div class="btn-info-section">
                <h1>{{product.name}}</h1>
                <span class="price">{{product.price}} ₽</span><span v-if="product.price_old" class="price_old">{{product.price_old}} ₽</span><br>
                <div class="dopinfo-section">
                    <span v-if="product.hit">Хит</span>
                    <span v-if="product.for_order">На заказ</span>
                    <span v-if="product.sale">Скидка</span>
                    <span v-if="product.empty" class="empty-orange">Товара нет</span>
                </div>
                <a href="#">Бренд: 
                    <span v-if="product.brand">{{product.brand}}</span>
                    <span v-else=>Без бренда</span>
                </a><br>
                <span class="art">Артикул: {{product.article}}</span><br>
                
                <a href="#feedbacks"><div class="stars-section">
                    <img v-if="product.rating==0" src="../../assets/img/stars_collection/stars0.svg" alt="Рейтинг 0">
                    <img v-if="product.rating==1" src="../../assets/img/stars_collection/stars1.svg" alt="Рейтинг 1">
                    <img v-if="product.rating==2" src="../../assets/img/stars_collection/stars2.svg" alt="Рейтинг 2">
                    <img v-if="product.rating==3" src="../../assets/img/stars_collection/stars3.svg" alt="Рейтинг 3">
                    <img v-if="product.rating==4" src="../../assets/img/stars_collection/stars4.svg" alt="Рейтинг 4">
                    <img v-if="product.rating==5" src="../../assets/img/stars_collection/stars5.svg" alt="Рейтинг 5">
                    ({{ product.feedbacks_num }})
                </div></a>

                <div class="btn-section" v-if="!product.empty">
                    <ButtonUi text="Добавить в коpзину" color="3" @click="addToCart(article)"/>
                    <ButtonUi text="Заказать сейчас"/>
                </div>
                <div class="btn-section clmn" v-else>
                    <span>Товара нет в наличии. Позвоните по номеру <a href="tel:84922779588">8(4922)77-95-88</a>, чтобы заказать.</span>
                    <ButtonA class="ButtonA" href="tel:84922779588" text="Позвонить"/>
                </div>

                <br>
                <a class="category" href="#">Категория: {{product.article}}</a>
            </div>
        </section>

        <div v-if="product.description">
            <h2>Описание</h2>
            <p><div v-html="product.description"></div></p>
        </div>

        <div v-if="product.complect">
            <h2>Комплектация</h2>
            <p><div v-html="product.complect"></div></p>
        </div>

        <div v-if="product.character">
            <h2>Характеристики</h2>
            <p><div v-html="product.character"></div></p>
        </div>

        <div id="feedbacks">
            <h2>Отзывы</h2>  
            <form @submit.prevent="submitFeedback">
                <div class="stars-input">
                    Оцените товар:
                    <span 
                        v-for="star in 5" 
                        :key="star"
                        class="star"
                        @click="rating = star"
                        @mouseover="hoverRating = star"
                        @mouseleave="hoverRating = 0"
                        :class="{ active: star <= (hoverRating || rating) }"
                    >
                        ★
                    </span>
                    <span v-if="rating > 0" class="rating-value">{{ rating }}/5</span>
                </div>
                <textarea 
                    maxlength="500"
                    v-model="feedbackText" 
                    placeholder="Оставьте отзыв здесь" 
                    id="textarea" 
                    required
                ></textarea>
                <div class="btn-section">
                    <ButtonUi 
                        text="Отправить" 
                        type="submit" 
                        :color="isFormValid ? '1' : '4'"
                        :disabled="!isFormValid"
                    />
                    <ButtonUi text="Очистить" color="2" type="button" @click="resetForm"/>
                </div>
            </form>
            <div v-if="feedbacks.length === 0" class="empty-feedbacks">
                На этот товар пока нет отзывов.
            </div>
            
            <div v-else class="feedbacks-list">
                <div v-for="feedback in feedbacks" :key="feedback.id" class="feedback-item">
                    <div class="feedback-header">
                        <b class="feedback-author">{{ feedback.user?.name || 'Аноним' }}</b>
                        <span class="feedback-date">{{ new Date(feedback.created_at).toLocaleDateString('ru-RU') }}</span>
                        <div class="feedback-stars">
                            <img v-if="feedback.rating==0" src="../../assets/img/stars_collection/stars0.svg" alt="Рейтинг 0">
                            <img v-if="feedback.rating==1" src="../../assets/img/stars_collection/stars1.svg" alt="Рейтинг 1">
                            <img v-if="feedback.rating==2" src="../../assets/img/stars_collection/stars2.svg" alt="Рейтинг 2">
                            <img v-if="feedback.rating==3" src="../../assets/img/stars_collection/stars3.svg" alt="Рейтинг 3">
                            <img v-if="feedback.rating==4" src="../../assets/img/stars_collection/stars4.svg" alt="Рейтинг 4">
                            <img v-if="feedback.rating==5" src="../../assets/img/stars_collection/stars5.svg" alt="Рейтинг 5">
                        </div>
                    </div>
                    <hr>
                    <div class="review-text">{{ feedback.text }}</div>
                </div>
            </div>
        </div>

        <br>
    </div>
    </main>
</template>


<script setup>
    import { ref, onMounted, computed } from 'vue'
    import { useRoute } from 'vue-router'

    import ButtonUi from "../components/ButtonUi.vue"
    import ButtonA from "../components/ButtonA.vue"

    const error = ref(false)
    const loading = ref(true)
    const product = ref(null)
    const feedbacks = ref([])
    const route = useRoute()
    const currentIndex = ref(0)
    
    // Форма отзыва
    const rating = ref(0)
    const hoverRating = ref(0)
    const feedbackText = ref('')

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

    const isFormValid = computed(() => {
        return rating.value > 0 && feedbackText.value.trim().length > 0
    })

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

    onMounted(async () => {
      try {
          const response = await axios.get(`/api/products/${route.params.id}`)
          product.value = response.data
          const feedbacksResponse = await axios.get(`/api/feedbacks/${product.value.article}`)
          feedbacks.value = feedbacksResponse.data
      } catch (e) {
          error.value = true
      } finally {
          loading.value = false
      }
    })

    function addToCart(x){
        alert('Добавлено в корзину!');
    }

    async function submitFeedback() {
        if (!feedbackText.value.trim()) return
        
        if (rating.value === 0) {
            alert('Пожалуйста, поставьте оценку товару от 1 до 5 звёзд')
            return
        }
        
        try {
            await axios.post('/api/feedbacks', {
                article: product.value.article,
                text: feedbackText.value,
                rating: rating.value
            })
            
            // Обновляем список отзывов
            const feedbacksResponse = await axios.get(`/api/feedbacks/${product.value.article}`)
            feedbacks.value = feedbacksResponse.data
            
            resetForm()
            alert('Отзыв успешно отправлен!')
        } catch (e) {
            alert('Ошибка при отправке отзыва')
        }
    }

    function resetForm() {
        feedbackText.value = ''
        rating.value = 0
        hoverRating.value = 0
    }
</script>


<style lang="scss" scoped>
    .productpage-img-btn-container{
        display: flex;
        justify-content: space-between;

        .photo-section{
            width: 45%;
        }

        .btn-info-section{
            width: 50%;

            h1{
                margin-top: 0;
            }
            .price{
                font-size: 26px;
            }
            .price_old{
                font-size: 20px;
                color:var(--color-gray);
                text-decoration: line-through;
                margin-left: 10px;
            }
            .dopinfo-section{
                display: flex;
                gap: 5px;
                margin-bottom: 5px;

                span{
                    background: var(--color-green);
                    color:var(--color-white);
                    padding: 2px 10px;
                    border-radius: var(--border-radmin);
                }
                .empty-orange{
                    background: var(--color-orange);
                }
            }
            .art{
                color: var(--color-gray);
            }
            a:not(.ButtonA){
                color: var(--color-black);
                text-decoration: none;

                &:hover{
                    text-decoration: underline;
                }

                .stars-section{
                    display:flex;
                    color: var(--color-gray);
                    margin-top: 10px;
                    margin-bottom: 16px;
                    align-items: center;
                }
            }
        }
        
    }

    .btn-section{
        display: flex;
        gap:10px;
    }
    .clmn{
        flex-direction: column;
    }

    .gallery {
        display: flex;
        flex-direction: column;
        gap: 16px;

        .gallery-main {
            width: 100%;
            height: 400px;
            overflow: hidden;
            border-radius: var(--border-rad);
            box-shadow: var(--shadow1);
            
            img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
        }

        .gallery-controls {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .gallery-arrow {
            width: 36px;
            height: 36px;
            border: none;
            background: var(--color-gray);
            border-radius: var(--border-rad);
            color:var(--color-white);
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            
            &:hover:not(:disabled) {
                background:var(--color-black);
            }
            
            &:disabled {
                opacity: 0.4;
                cursor: not-allowed;
            }
        }

        .gallery-thumbnails {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            flex: 1;
            padding: 4px 0;
            
            &::-webkit-scrollbar {
                height: 4px;
            }
            
            &::-webkit-scrollbar-thumb {
                background-color: #ccc;
                border-radius: 2px;
            }
        }

        .gallery-thumbnail {
            flex-shrink: 0;
            width: 60px;
            height: 60px;
            border-radius: var(--border-rad);
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            
            &:hover {
                border-color: #ccc;
            }
            
            &.active {
                border-color: var(--color-gray);
            }
            
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }

    .long-text{
        white-space: pre-line;
    }
    
    #feedbacks {
        .empty-feedbacks {
            color: var(--color-gray);
            margin-top: 16px;
        }

        .feedbacks-list {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        .feedback-item, form {
            border-radius: var(--border-rad);
            background: var(--color-gray-light);
            padding: 16px;
            
            textarea{
                max-width: 100%;
                min-width: 100%;
                min-height: 100px;
                padding: 16px;
                margin-bottom: 8px;
                box-sizing: border-box;
                border-radius: var(--border-rad);
                border: none;
                box-shadow: var(--shadow1);
                font-family: var(--InterFont);
                font-size: 16px;
            }
            .stars-input {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 8px;
                
                .star {
                    font-size: 28px;
                    cursor: pointer;
                    color: var(--color-gray-light2);
                    transition: all 0.15s ease;
                    
                    &:hover {
                        transform: scale(1.1);
                    }
                    
                    &.active {
                        color: var(--color-gray);
                    }
                }
                
                .rating-value {
                    margin-left: 10px;
                    font-weight: 500;
                    color: var(--color-gray);
                }
            }
            
            .feedback-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 8px;
            }
            
            .feedback-date {
                color: var(--color-gray);
            }
        }
    }
</style>