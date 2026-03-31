<template>
    <footer>
        <div class="footer-up">
            <div class="footer-logo">
                <img src="../../assets/img/logo2.svg" alt="Логотип Ручеек">
            </div>

            <div class="footer-contacts">
                <div class="contact-item">
                    <b>Телефон: </b>
                    <a href="tel:8(4922)77-95-88">8 (4922) 77-95-88</a>
                </div>
                <div class="contact-item">
                    <b>Email: </b>
                    <a href="mailto:mail@vladrucheek.ru">mail@vladrucheek.ru</a>
                </div>
                <div class="contact-item">
                    <b>Адрес: </b>
                    <a href="https://yandex.ru/maps/org/rucheyek/1142369707/">г. Владимир, пр-т Строителей, д. 19</a>
                </div>
            </div>

            <div class="footer-social">
                <a href="#" class="social-link">
                    <img src="../../assets/img/vk_logo_social.svg" alt="Группа ВК">
                </a>
                <a href="#" class="social-link">
                    <img src="../../assets/img/tg_logo_social.svg" alt="Группа ВК">
                </a>
            </div>
        </div>

        <div class="footer-down">
            <nav>
                <router-link to="/">Каталог</router-link>
                <router-link to="/uslugi">Услуги</router-link>
                <router-link to="/magazin">Магазины</router-link>
                <router-link to="/statii">Статьи</router-link>
                <router-link to="/oplata">Оплата</router-link>
                <router-link to="/kontakty">Контакты</router-link>
                <router-link to="/o-kompanii">О компании</router-link>
            </nav>
            <div class="copyright">
                © 2026 Ручеек. Все права защищены.
            </div>
        </div>
    </footer>
</template>


<style lang="scss">
    footer {
        background: var(--color-gray-light);
        margin-top: auto;
    }

    .footer-up {
        padding: 30px 20px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 26px;
        flex-wrap: wrap;

        .footer-logo {
            img {
                width: 188px;
            }
        }

        .footer-contacts {
            display: flex;
            flex-direction: column;
            gap: 10px;

            .contact-item {
                color: var(--color-gray);
                font-size: 14px;

                a {
                    color: var(--color-gray);
                    text-decoration: none;

                    &:hover {
                        text-decoration: underline;
                    }
                }
            }
        }

        .footer-social {
            display: flex;
            gap: 10px;

            img{
                width: 50px;
                border-radius: 50%;
            }
        }
    }

    .footer-down {
        padding: 20px;
        text-align: center;

        nav {
            margin-bottom: 15px;
        }

        a,
        .router-link-active,
        .router-link-exact-active {
            color: var(--color-gray);
            text-decoration: none;
            margin: 0 8px;
            font-size: 14px;
        }

        a:hover {
            font-weight: bold;
        }

        .router-link-active,
        .router-link-exact-active {
            font-weight: bold;
        }

        .copyright {
            color: var(--color-gray);
            font-size: 12px;
            opacity: 0.8;
        }
    }
</style>