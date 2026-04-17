<template>
    <main>
        <h2>Регистрация</h2>

        <form @submit.prevent="register">
            <input type="text" placeholder="Имя" v-model="name" required>
            <input type="email" placeholder="E-Mail" v-model="email" required>
            <input type="text" placeholder="Номер телефона" v-model="phone" required>
            <input type="password" placeholder="Пароль (минимум 6 символов)" v-model="password" required>
            <input type="password" placeholder="Повторите пароль" v-model="passwordConfirm" required>

            <ButtonUi text="Зарегистрироваться" type="submit" />
        </form>

        <a href="/login">Уже есть аккаунт? Войдите!</a>

        <p v-if="error" class="error">{{ error }}</p>
        <p v-if="success" class="success">{{ success }}</p>

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

        a{
            margin-top: 5px;
            color: var(--color-gray);
            text-decoration:none;

            &:hover{
                text-decoration: underline;
            }
        }

        .error{
            color: var(--color-orange);
            margin-top: 10px;
        }

        .success{
            color: var(--color-green);
            margin-top: 10px;
        }
    }
</style>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import ButtonUi from '../components/ButtonUi.vue'

const router = useRouter()

const name = ref('')
const email = ref('')
const phone = ref('')
const password = ref('')
const passwordConfirm = ref('')

const error = ref('')
const success = ref('')

const register = async () => {
    error.value = ''
    success.value = ''

    if (password.value !== passwordConfirm.value) {
        error.value = 'Пароли не совпадают'
        return
    }

    try {
        await axios.get('/sanctum/csrf-cookie')

        await axios.post('/api/register', {
            name: name.value,
            email: email.value,
            phone: phone.value,
            password: password.value,
            password_confirmation: passwordConfirm.value
        })

        success.value = 'Регистрация успешна!'

        setTimeout(() => {
            router.push(route.query.redirect || '/')
        }, 1000)

    } catch (e) {
        error.value = e.response?.data?.error || 'Ошибка регистрации'
    }
}
</script>