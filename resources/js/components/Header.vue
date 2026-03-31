<template>
    <header class="header" :class="{ hide: isHidden }">
        <div class="header-up">
            <img src="../../assets/img/logo1.svg" alt="Логотип Ручеек">

            <form action="#">
                <input type="text" placeholder="Поиск">
                <button type="submit">
                    <img src="../../assets/img/search.svg" alt="Искать">
                </button>
            </form>

            <div class="cart-profile">
                <div>
                    <a href="/korzina">
                        <img src="../../assets/img/cart.svg" alt="Корзина">
                    </a>
                    Корзина
                </div>

                <div>
                    <a href="/profil">
                        <img src="../../assets/img/user.svg" alt="Профиль">
                    </a>
                    Профиль
                </div>
            </div>
        </div>

        <div class="header-down">
            <nav>
                <router-link to="/">Каталог</router-link>
                <router-link to="/uslugi">Услуги</router-link>
                <router-link to="/magazin">Магазины</router-link>
                <router-link to="/statii">Статьи</router-link>
                <router-link to="/oplata">Оплата</router-link>
                <router-link to="/kontakty">Контакты</router-link>
                <router-link to="/o-kompanii">О компании</router-link>
            </nav>
        </div>
    </header>
</template>

<style lang="scss">
    header{
        background: var(--color-teal);
        position:fixed;
        top:0;
        width: 100%;
        transition: 0.3s;
    }
    .hide{
        transform: translateY(-130px);
    }
    

    .header-up{
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin:0 20px;
        
        img{
            width: 188px;
        }

        form{
            input{
                background: var(--color-white);
                width: 410px;
                height: 42px;
                border:none;
                border-radius: var(--border-rad);
            }
            button{
                position: relative;
                left: -47px;
                bottom: -14px;
                background: var( --color-green);
                width: 45px;
                height: 37px;
                border: none;
                border-radius: var(--border-rad);

                img{
                    width:36px;
                }
            }
        }

        .cart-profile{
            display: flex;
            gap:10px;
            align-self: flex-end;

            div{
                display: flex;
                align-items: center;
                flex-direction: column;
                color: var(--color-white);

                a{  
                    display: flex;
                    align-items: center;
                    width: 50px;
                    height: 50px;
                    background-color: var(--color-white);
                    border-radius: 50%;

                    img{
                        margin:auto;
                        width: 36px;
                    }
                }
            }
        }
    }


    .header-down{
        height: 35px;
    }
    .header-down nav{
        text-align: center;
    }
    .header-down a,
    .header-down .router-link-active,
    .header-down .router-link-exact-active {
        color: var(--color-white);
        text-decoration: none;
        margin: 0 8px;
    }
    .header-down a:hover {
        font-weight: bold;
    }
    .header-down .router-link-active,
    .header-down .router-link-exact-active {
        font-weight: bold;
    }
</style>


<script>
export default {
    data() {
        return {
            lastScroll: 0,
            isHidden: false,
            defaultOffset: 100
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.handleScroll)
    },
    methods: {
        handleScroll() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop
            
            if (currentScroll > this.lastScroll && !this.isHidden && currentScroll > this.defaultOffset) {
                this.isHidden = true
            } else if (currentScroll < this.lastScroll && this.isHidden) {
                this.isHidden = false
            }
            
            this.lastScroll = currentScroll
        }
    }
}
</script>
