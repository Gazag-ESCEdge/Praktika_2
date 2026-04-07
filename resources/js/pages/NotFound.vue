<template>
    <Header></Header>

    <div class="empty-product-container">
        <h1>Страница не найдена 😢</h1>
        <ButtonA 
            href="/"
            text="На главную страницу"
        />
    </div>

    <Footer></Footer>
</template>

<script setup>
    import Header from "../components/Header.vue"
    import Footer from "../components/Footer.vue"
    import ButtonA from "../components/ButtonA.vue";
</script>