<template>
    <Header></Header>
    <div class="top-filled"></div>

    <main>
        <h1>Наши магазины</h1>

        <h2>Центральный магазин</h2>
        <div class="info-map">
            <div>
                <h3>Магазин «Ручеек»</h3>
                <p>
                    пр-т Строителей, д.19 <br>
                    Тел.: 8 (4922) 77-95-88<br><br>
                    Режим работы:<br>
                    пн-пт: 09:00 – 19:00<br>
                    сб-вс: 09:00 – 17:00<br>
                </p>
            </div>
            <iframe src="https://yandex.ru/map-widget/v1/-/CCG3Z-IO" height="300" frameborder="1" allowfullscreen="true"></iframe>
        </div>
        
        <br><br>
        <h2>Филиалы</h2>
        <div class="info-map">
            <div>
                <h3>ОТК «Тандем»</h3>
                <p>
                    ул. Куйбышева, д. 26ж, корпус Запад, секция ЗА 1-1/1<br>
                    Тел.: 8 (4922) 77-95-88<br><br>
                    Режим работы:<br>
                    пн-сб: 09:00 – 19:00<br>
                    вс: 09:00 – 17:00<br>
                </p>
            </div>
            <iframe src="https://yandex.ru/map-widget/v1/-/CCG~aLjY" height="300" frameborder="1" allowfullscreen="true"></iframe>
        </div>

        <div class="info-map">
            <div>
                <h3>ТЦ «Славянский Базар»</h3>
                <p>
                    ул. Батурина, д. 28, 1-й этаж, секция 1<br>
                    Тел.: 8 (4922) 77-95-88<br><br>
                    Режим работы:<br>
                    пн-пт: 10:00 – 19:00<br>
                    сб: 10:00 - 17:00<br>
                    вс: 10:00 - 16:00<br>
                </p>
            </div>
            <iframe src="https://yandex.ru/map-widget/v1/-/CCG~iJiI" height="300" frameborder="1" allowfullscreen="true"></iframe>
        </div>
    </main>
    <Footer></Footer>
</template>


<script setup>
    import Header from "../components/Header.vue"
    import Footer from "../components/Footer.vue";
</script>