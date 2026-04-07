<template>
    <div>
    
    <h1>Корзина</h1>
    
    <div v-for="item in cart" :key="item.id">
      {{item.product.name}} — {{item.quantity}}
    </div>
    
    <button @click="createOrder">Оформить заказ</button>
    
    </div>
    </template>
    
    <script>
    export default {
    
    data(){
    return{
    cart: []
    }
    },
    
    mounted(){
    fetch('/api/cart/1')
    .then(res => res.json())
    .then(data => {
        this.cart = data
    })
    },
    
    methods: {
    createOrder() {
    
    const orderData = {
      user_id: 1,
      price: 3000,
      items: this.cart.map(item => ({
        article: item.product_article,
        quantity: item.quantity
      }))
    }
    
    fetch('/api/orders', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(orderData)
    })
    .then(res => res.json())
    .then(data => {
      console.log('Заказ создан', data)
    })
    
    }
    
    }
    
    }
    </script>