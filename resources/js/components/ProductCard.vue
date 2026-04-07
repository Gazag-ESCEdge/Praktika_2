<template>
    <div class="container">
        <button @click="addToCart(article)"><img src="../../assets/img/Cart-Plus.svg" alt="Добавить в корзину"></button>
        
        <a :href="'/product/'+article">
            <div class="bg-img-section" :style="{ backgroundImage: 'url(' + image1 + ')' }"></div>
            <span class="art">Артикул: {{ article }}</span> <br>
            <span class="name">{{ name }}</span> <br>
            <span class="price">{{ price }}<span> ₽</span></span> <br>
            <div class="stars-section">
                <img :src="starsImage" alt="Рейтинг">
                ({{ reviews_num }})
            </div>
            <div class="dopinfo-section">
                <span v-if="hit">Хит</span>
                <span v-if="for_order">На заказ</span>
                <span v-if="sale">Скидка</span>
                <span v-if="empty" class="empty-orange">Товара нет</span>
            </div>
        </a>
    </div>
</template>


<style lang="scss" scoped>
    .container{
        display: block;
        width:250px;
        position: relative;
        z-index: 0;
        margin-bottom: 26px;

        transition: 0.3s;

        &:hover{
            margin-top: -3px;
        }
    }

    button{
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        justify-content: center;
        background: var(--color-orange);
        border: none;
        border-radius: var(--border-radmin);
        width: 40px;
        height: 40px;
        transition: 0.2s;

        &:hover{
            background: var(--color-orange-hover);
        }
    }
    a{
        color: var(--color-black);
        text-decoration: none;

        &:hover{
            text-decoration: underline;
        }
    }
    .bg-img-section{
        height: 250px;
        border-radius: var(--border-rad);
        box-shadow: var(--shadow1);

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .art{
        color: var(--color-gray);
        font-size: 14px;
        line-height: 80%;
    }
    .name{
        font-size: 16px;
        line-height: 80%;
    }
    .price{
        font-size: 26px;
    }
    .stars-section{
        display:flex;
        color: var(--color-gray);
        margin-top: 0px;
        margin-bottom: 5px;
        align-items: center;
    }
    .dopinfo-section{
        display: flex;
        gap: 5px;

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
</style>


<script setup>
import { computed } from 'vue'

import stars0 from '../../assets/img/stars_collection/stars0.svg'
import stars1 from '../../assets/img/stars_collection/stars1.svg'
import stars2 from '../../assets/img/stars_collection/stars2.svg'
import stars3 from '../../assets/img/stars_collection/stars3.svg'
import stars4 from '../../assets/img/stars_collection/stars4.svg'
import stars5 from '../../assets/img/stars_collection/stars5.svg'

const props = defineProps({
    article:String,
    name:String,
    price:Number,
    rating:Number,
    reviews_num: Number,
    image1:String,
    hit:Number,
    for_order:Number,
    sale:Number,
    empty:Number
})

const starsImage = computed(() => {
    switch (props.rating) {
        case 1:
            return stars1
        case 2:
            return stars2
        case 3:
            return stars3
        case 4:
            return stars4
        case 5:
            return stars5
        default:
            return stars0
    }
})

function addToCart(x){
    alert(x);
}
</script>