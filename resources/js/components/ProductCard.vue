<template>
    <div class="container">
        <button @click="addToCart(article)"><img src="../../assets/img/Cart-Plus.svg" alt="Добавить в корзину"></button>
        
        <a :href="'/product/'+article">
            <div class="bg-img-section" :style="{ backgroundImage: 'url(' + image1 + ')' }"></div>
            <span class="art">Артикул: {{ article }}</span> <br>
            <span class="name">{{ name }}</span> <br>
            <span class="price">{{ price }} ₽<span v-if="price_old" class="price_old">{{price_old}} ₽</span></span> <br>
            <div class="stars-section">
                <img v-if="rating==0" src="../../assets/img/stars_collection/stars0.svg" alt="Рейтинг 0">
                <img v-if="rating==1" src="../../assets/img/stars_collection/stars1.svg" alt="Рейтинг 1">
                <img v-if="rating==2" src="../../assets/img/stars_collection/stars2.svg" alt="Рейтинг 2">
                <img v-if="rating==3" src="../../assets/img/stars_collection/stars3.svg" alt="Рейтинг 3">
                <img v-if="rating==4" src="../../assets/img/stars_collection/stars4.svg" alt="Рейтинг 4">
                <img v-if="rating==5" src="../../assets/img/stars_collection/stars5.svg" alt="Рейтинг 5">
                ({{ feedbacks_num }})
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
        background: var(--color-gray);
        border: none;
        border-radius: var(--border-radmin);
        width: 40px;
        height: 40px;
        transition: 0.2s;

        &:hover{
            background: var(--color-black);
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
    .price_old{
        font-size: 20px;
        text-decoration: line-through;
        color: var(--color-gray);
        margin-left: 10px;
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
    const props = defineProps({
        article:String,
        name:String,
        price:Number,
        price_old:Number,
        rating:Number,
        feedbacks_num: Number,
        image1:String,
        hit:Number,
        for_order:Number,
        sale:Number,
        empty:Number
    })

    function addToCart(x){
        alert('Добавлено в козину!');
    }
</script>