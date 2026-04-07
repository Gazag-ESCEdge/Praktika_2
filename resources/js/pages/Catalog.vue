<template>
    <Header></Header>
    <div class="top-filled"></div>

    <main>
        <div>
        <h1>Магазин фильтров воды</h1>
        <p>Чистая вода — залог здоровья 💧</p>
        </div>

        <h2>Популярные товары</h2>
        <section>
            <ProductCard
                v-for="product in products"
                :key="product.article"
                :article="product.article"
                :name="product.name"
                :price="product.price"
                :rating="product.rating"
                :reviews_num="product.reviews_num"
                :image1="product.image1"
                :hit="product.hit"
                :for_order="product.for_order"
                :sale="product.sale"
                :empty="product.empty"
            />
        </section>

    </main>

    <Footer></Footer>
</template>
    

<style lang="scss">
    section{
        display: flex;
        flex-wrap: wrap;
        gap:16px;
    }
</style>


<script setup>
    import Header from "../components/Header.vue"
    import Footer from "../components/Footer.vue"
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