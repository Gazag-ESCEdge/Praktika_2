<template>
    <main>
        <h1>Каталог товаров</h1>

        <section>
            <ProductCard
                v-for="product in products"
                :key="product.article"
                :article="product.article"
                :name="product.name"
                :price="product.price"
                :price_old="product.price_old"
                :rating="product.rating"
                :feedbacks_num="product.feedbacks_num"
                :image1="product.image1"
                :hit="product.hit"
                :for_order="product.for_order"
                :sale="product.sale"
                :empty="product.empty"
            />
        </section>

    </main>
</template>
    

<style lang="scss" scoped>
    section{
        display: flex;
        flex-wrap: wrap;
        gap:16px;
    }
</style>


<script setup>
    import ProductCard from "../components/ProductCard.vue";
</script>

<script>    
    export default {
        data(){
            return{products:[]}
            },
        mounted(){
            fetch('/api/products').then(res=>res.json()).then(data=>{
                this.products=data
            })
        }
    }
</script>