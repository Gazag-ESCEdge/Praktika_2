<template>
    <main>
        <h2>Войдите в аккаунт</h2>

        <form @submit.prevent="login">
            <input type="email" placeholder="E-Mail" v-model="email" required>
            <input type="password" placeholder="Пароль" v-model="password" required>

            <ButtonUi text="Войти" type="submit" />
        </form>

        <a href="/register">Нет аккаунта? Зарегистрируйтесь!</a>
        
        <p v-if="error" class="error">
            {{ error }}
        </p>
    </main>
</template>

<style lang="scss" scoped>
    main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 70vh;
        align-items: center;
        
        form{
            display: flex;
            flex-direction: column;
            width: 300px;

            input{
                padding-left: 5px;
                background: var(--color-gray-light);
                box-sizing: border-box;
                border-radius: var(--border-radmin);
                border: 1px solid black;
                height: 40px;
                margin-bottom: 10px;
            }
        }

        .error{
            color: var(--color-orange);
            margin-top: 10px;
        }

        a{
            margin-top: 5px;
            color: var(--color-gray);
            text-decoration:none;

            &:hover{
                text-decoration: underline;
            }
        }
    }
</style>

<script setup>
import { ref } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import ButtonUi from '../components/ButtonUi.vue'

const router = useRouter()
const route = useRoute()

const email = ref('')
const password = ref('')
const error = ref('')

const login = async () => {
    error.value = ''

    try {
        await axios.get('/sanctum/csrf-cookie')

        await axios.post('/api/login', {
            email: email.value,
            password: password.value
        })

        router.push(route.query.redirect || '/')

    } catch (e) {
        error.value = e.response?.data?.error || 'Ошибка входа'
    }
}
</script>