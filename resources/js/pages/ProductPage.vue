<template>
    <div v-if="product">
    <h1>{{product.name}}</h1>
    <p>{{product.description}}</p>
    <p>{{product.price}}</p>
    </div>
    </template>
    
    <script>
    export default{
    
    data(){
    return{
    product:null
    }
    },
    
    mounted(){
    fetch('/api/products/'+this.$route.params.id)
    .then(r=>r.json())
    .then(data=>{
    this.product=data
    })
    }
    
    }
    </script>