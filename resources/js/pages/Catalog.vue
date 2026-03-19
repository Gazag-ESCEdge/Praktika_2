<template>
    <Header></Header>
    <div>
    <h1>Магазин фильтров воды</h1>
    <p>Чистая вода — залог здоровья 💧</p>
    </div>

    <div>
    <h1>Каталог</h1>
    
    <div v-for="product in products" :key="product.article">
        <h3>{{ product.name }}</h3>
        <p>{{ product.price }} ₽</p>
    </div>
    
    </div>
</template>
    
<script setup>
    import Header from "../components/Header.vue"
</script>

<script>    
    export default {
    data(){
    return{
    products:[]
    }
    },
    mounted(){
    fetch('/api/products')
    .then(res=>res.json())
    .then(data=>{
    this.products=data
    })
    }
    }
</script>