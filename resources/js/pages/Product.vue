<template>
    <div>
    
    <h1>Каталог</h1>
    
    <div v-for="product in products" :key="product.article">
    
      <h3>
        <router-link :to="'/product/' + product.article">
          {{ product.name }}
        </router-link>
      </h3>
    
      <p>{{ product.price }} ₽</p>
    
      <button @click="addToCart(product)">
        В корзину
      </button>
    
    </div>
    
    </div>
    </template>
    
    <script>
    export default {
    
    data(){
    return{
    products:[]
    }
    },
    
    mounted(){
    fetch('/api/products')
    .then(r=>r.json())
    .then(data=>{
      this.products = data
    })
    },
    
    methods:{
    addToCart(product){
    
    fetch('/api/cart/add',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body: JSON.stringify({
        user_id: 1,
        product_article: product.article,
        quantity: 1
      })
    })
    
    .then(()=> alert('Добавлено в корзину'))
    
    }
    }
    
    }
    </script>