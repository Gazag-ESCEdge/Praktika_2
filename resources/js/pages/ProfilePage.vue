<template>
    <main>
        <h1>Добро пожаловать, {{ user.name }}</h1>

        <form @submit.prevent="updateProfile">
            <h2>Изменение данных пользователя</h2>

            <div>
            <label>Имя пользователя<br>
                <input v-model="form.name" type="text" placeholder="Имя" required />
            </label>

            <label>E-mail <br>
                <input
                    v-model="form.email"
                    type="email"
                    placeholder="Email"
                    required
                />
            </label>

            <label>Телефон <br>
                <input
                    v-model="form.phone"
                    type="text"
                    placeholder="Телефон"
                    required
                />
            </label>

            <label>Старый пароль <br>
                <input
                    v-model="form.password"
                    type="password"
                    placeholder="Новый пароль"
                />
            </label>
            <label>Новый пароль <br>
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    placeholder="Повторите пароль"
                />
            </label>
            </div>

            <div class="buttons-container">
                <ButtonUi text="Сохранить" type="submit" />
                <ButtonUi
                    text="Выйти из аккаунта"
                    color="2"
                    @click="logout()"
                ></ButtonUi>
            </div>

            <span v-if="error" class="error">{{ error }}</span>
            <span v-if="success">{{ success }}</span>
        </form>

        <h2>Мои заказы</h2>


        <h2>Мои отзывы</h2>

        <br><br>
    </main>
</template>

<style lang="scss" scoped>
    form{
        background: var(--color-gray-light);
        padding: 16px;
        border-radius: var(--border-rad);
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;

        div{
            display: flex;
            flex-wrap: wrap;
            gap:10px;
        }

        input{
            padding-left: 5px;
            box-sizing: border-box;
            border-radius: var(--border-radmin);
            border: 1px solid var(--color-gray);
            height: 40px;
        }

        span{
            margin-top:16px;
        }

        .buttons-container{
            margin-top:16px;
        }
    }

    .error{
        color: var(--color-orange);
    }
</style>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import ButtonUi from "../components/ButtonUi.vue";

const router = useRouter();

const user = ref({});
const form = ref({
    name: "",
    email: "",
    phone: "",
    password: "",
    password_confirmation: "",
});

const error = ref("");
const success = ref("");

onMounted(async () => {
    try {
        const response = await axios.get("/api/user");
        user.value = response.data;

        form.value.name = user.value.name;
        form.value.email = user.value.email;
        form.value.phone = user.value.phone;
    } catch (e) {
        router.push("/login");
    }
});

const updateProfile = async () => {
    error.value = "";
    success.value = "";

    try {
        await axios.put("/api/user", form.value);

        success.value = "Данные обновлены";

        form.value.password = "";
        form.value.password_confirmation = "";
    } catch (e) {
        if (e.response?.data?.errors) {
            let error_obj = Object.values(e.response.data.errors).flat().join(", ");

            if (error_obj == "validation.confirmed") {
                error.value = "Пароли не совпадают!";
            }
            else if (error_obj == "validation.min.string") {
                error.value = "Пароль слишком короткий!";
            } else {
                error.value = error_obj;
            }
        } else {
            error.value = "Ошибка обновления";
        }
    }
};

const logout = async () => {
    await axios.post("/api/logout");
    router.push("/");
};
</script>
