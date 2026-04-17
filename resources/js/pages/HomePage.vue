<template>
    <br>
    <main>
        <section class="top-img-section">
            <div class="top-img-section-element" :class="{ active: currentSlide === 0 }">
                <img src="../../assets/img/home_page/minimainslider1.jpg">
                <div>
                    <p>При покупке фильтра в магазинах «Ручеек» скидка 20% на монтаж</p>
                    <ButtonA text="Перейти в каталог" href="/catalog"></ButtonA>
                </div>
            </div>
            <div class="top-img-section-element" :class="{ active: currentSlide === 1 }">
                <img src="../../assets/img/home_page/minimainslider2.jpg">
                <div>
                    <p>Команда профессионалов</p>
                    <ButtonA text="Перейти в услуги" href="/service"></ButtonA>
                </div>
            </div>
            <div class="top-img-section-element" :class="{ active: currentSlide === 2 }">
                <img src="../../assets/img/home_page/minimainslider3.jpg">
                <div>
                    <p>Доставка по Владимиру и области</p>
                    <ButtonA text="Перейти в каталог" href="/catalog"></ButtonA>
                </div>
            </div>
            <div class="top-img-section-element" :class="{ active: currentSlide === 3 }">
                <img src="../../assets/img/home_page/minimainslider5.jpg">
                <div>
                    <p>Собственная лаборатория для анализа воды </p>
                    <ButtonA text="Больше информаци" href="/analysis"></ButtonA>
                </div>
            </div>
            <div class="top-img-section-element" :class="{ active: currentSlide === 4 }">
                <img src="../../assets/img/home_page/minimainslider6.jpg">
                <div>
                    <p>Сервисный центр по ремонту и обслуживанию водоочистителей любой сложности</p>
                    <ButtonA text="Перейти в услуги" href="/service"></ButtonA>
                </div>
            </div>
        </section>

        <br>
        <h2>Популярные товары</h2>
        <section class="products-section">
            <ProductCard
                v-for="product in products_hit"
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
            <NextCard href="/about"></NextCard>
        </section>

        <br>
        <h2>Товары со скидкой</h2>
        <section class="products-section">
            <ProductCard
                v-for="product in products_sale"
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
            <NextCard href="/about"></NextCard>
        </section>

        <br>
        <h2>Посмотрите все товары в каталоге</h2>
        <ButtonA href="/catalog" text="Перейти в каталог" />

        <br><br>
        <section class="podbor-info-section">
            <div class="left">
                <img src="../../assets/img/home_page/assorti.jpg">
            </div>
            <div class="right">
                <h3>Нужна помощь в подборе системы очистки воды из скважины или колодца?</h3>
                <p>Воспользуйтесь нашим удобным онлайн-сервисом.
                    Заполните анкету, прикрепите протокол вашего анализа воды.
                    Мы подоберём для вас самые эффективные и доступные бытовые фильтры для воды, а также установки коттеджной и промышленной водоподготовки.<br>
                    <b>Наша цель - сделать вашу воду качественной!</b>
                </p>
                <ButtonA text="Создать заявку" href="https://b24-g392mp.bitrix24.site/crm_form_rb4bu/"></ButtonA>
                <br>
            </div>
        </section>

        <br>
        <h2>Наши преимущества</h2>
        <section class="advantages-section">
            <div>
                <img src="../../assets/img/home_page/dost1.svg">
                <span>Работаем напрямую с заводами производителями</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost2.svg">
                <span>Квалифицированная помощь в подборе необходимого товара</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost3.svg">
                <span>Профессиональное обслуживание и ремонт оборудования, качественный монтаж под ключ с гарантией</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost4.svg">
                <span>Самый большой выбор приборов и систем очистки во Владимире</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost5.svg">
                <span>Полный спектр запчастей и расходных материалов в наличии</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost6.svg">
                <span>Опыт в сфере водоподготовки с 2001 года</span>
            </div>
            <div>
                <img src="../../assets/img/home_page/dost7.svg">
                <span>Команда профессионалов</span>
            </div>
        </section>

        <br>
        <section class="end-section">
            <div>
                <h3>Уважаемые гости нашего сайта!</h3>
                <p>
                    От своего имени и от имени дружной команды профессионалов компании «Водный мир» я рад приветствовать вас на нашем сайте.
                    <br><br>
                    Магазины «Ручеек» - это высококачественное бытовое и промышленное оборудование для очистки воды, подобранное нашими опытными сотрудниками. Мы работаем в этой сфере с 2001 года и регулярно проходим обучение на заводах-изготовителях «Аквафор» и «Гейзер». Наша цель - найти оптимальное решение для каждого потребителя, используя исключительно индивидуальный подход к его требованиям.
                    <br><br>
                </p>
            </div>
            <img src="../../assets/img/home_page/director.png">
        </section>
    </main>
</template>

<style lang="scss" scoped>
    .top-img-section{
        position: relative;
        margin: auto;
        background: var(--color-gray-light);
        border-radius: var(--border-rad);
        overflow: hidden;
        aspect-ratio: 16/5;

        .top-img-section-element{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
            z-index: 0;
            display: flex;
            align-items: center;

            &.active{
                opacity: 1;
                z-index: 1;
            }

            img{
                width: 40%;
                height: 100%;
                object-fit: cover;
                border-radius: var(--border-rad) 0 0 var(--border-rad);
            }

            div{
                width: 60%;
                display: flex;
                flex-direction: column;
                gap:10px;
                padding:0 50px;

                p{
                    font-size: 24px;
                    margin:0;
                }
            }
        }
    }

    .products-section{
        display: flex;
        flex-wrap: wrap;
        gap:10px;
    }

    .podbor-info-section{
        display: flex;
        background: var(--color-gray-light);
        border-radius: var(--border-rad);

        .left{
            width: 45%;
            border-radius: var(--border-rad) 0 0 var(--border-rad);
            overflow: hidden;

            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
            }
        }
        .right{
            width: 45%;
            margin: auto;
        }
    }

    .end-section{
        display: flex;
        flex-wrap: nowrap;

        img{
            align-self: end;
            width: 20%;
        }
    }
</style>

<script setup>
    import ButtonA from "../components/ButtonA.vue"
    import NextCard from "../components/NextCard.vue";
    import ProductCard from "../components/ProductCard.vue";
    import { ref, onMounted, onBeforeUnmount } from 'vue'

    const products_hit = ref([])
    const products_sale = ref([])
    const currentSlide = ref(0)
    const totalSlides = 5
    const slideInterval = ref(null)

    onMounted(() => {
        fetch('/api/products/hit_limit').then(res => res.json()).then(data => {
            products_hit.value = data
        })
        fetch('/api/products/sale_limit').then(res => res.json()).then(data => {
            products_sale.value = data
        })
        startSlideShow()
    })

    onBeforeUnmount(() => {
        if (slideInterval.value) {
            clearInterval(slideInterval.value)
        }
    })

    const nextSlide = () => {
        currentSlide.value = (currentSlide.value + 1) % totalSlides
    }

    const startSlideShow = () => {
        slideInterval.value = setInterval(() => {
            nextSlide()
        }, 4000)
    }
</script>