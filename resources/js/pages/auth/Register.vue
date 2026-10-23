<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Регистрация" />
    <MainLayout>
        <div class="wrapper">
                <form @submit.prevent="submit" class="auth-block">
                    <h3 class="title">Создайте аккаунт</h3>
                    <div class="grid gap-4">
                        <div class="grid gap-2">
                            <Label for="name" class="label">Имя пользователя</Label>
                            <Input id="name" class="input-text" type="text" required autofocus tabindex="1" autocomplete="name" v-model="form.name" placeholder="Имя"/>
                            <InputError :message="form.errors.name" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="email" class="label">Электронная почта</Label>
                            <Input id="email" type="email" class="input-text" required tabindex="2" autocomplete="email" v-model="form.email" placeholder="email@example.com" />
                            <InputError :message="form.errors.email" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="password" class="label">Пароль</Label>
                            <Input
                                id="password"
                                type="password"
                                class="input-text"
                                required
                                tabindex="3"
                                autocomplete="new-password"
                                v-model="form.password"
                                placeholder="Пароль"
                            />
                            <InputError :message="form.errors.password" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="password_confirmation" class="label">Повторите пароль</Label>
                            <Input
                                id="password_confirmation"
                                type="password"
                                class="input-text"
                                required
                                tabindex="4"
                                autocomplete="new-password"
                                v-model="form.password_confirmation"
                                placeholder="Повторите пароль"
                            />
                            <InputError :message="form.errors.password_confirmation" />
                        </div>

                        <Button type="submit" class="mt-2 w-full input-button" style="background-color: var(--kino-red); color: var(--kino-white);" tabindex="5" :disabled="form.processing">
                            <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                            Создать аккаунт
                        </Button>

                        <div class="text-sm already-login-label flex justify-around pb-3">
                            <p>Уже есть аккаунт?</p>
                            <TextLink :href="route('login')" class="underline underline-offset-4 " style="color: var(--kino-white); text-decoration-color: var(--kino-white);" tabindex="6">Войти</TextLink>
                        </div>
                    </div>

                    
                </form>
        </div>
    </MainLayout>
</template>

<style scoped>
    @keyframes bg-move {
        0% {
        background-position: 0px 0px;
        }
        100%{
        background-position: 0px -1000px;
        }
    }

    .wrapper{
        background-image: linear-gradient(135deg, rgba(20, 20, 20, 0.8) 0%, rgba(20, 20, 20, 0.8) 100%),
        url('./../../../../public/KatalogFilms.jpg');

        width: 100%;
        height: 1400px;

        background-size: cover, 50% 100%;
        background-repeat: repeat;

        animation: bg-move 100s linear infinite;

        display: flex;
        justify-content: center;
        z-index: 1;
    }

    .auth-block{
    width: 600px;
    height: min-content;
    margin-top: calc((100vh / 2) - (500px / 2) - 60px);
    background-color: rgba(150, 150, 150, 0.85);
    border-radius: 1.5em;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .title{
    width: 100%;
    text-align: center;
    font-size: 30px;
    margin: 15px 0;
    color: var(--kino-black);
    font-weight: bold;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
  }

  .label{
    font-size: 16px;
    color: var(--kino-white);
  }

  .input-text{
    border-radius: 10px;
    color: var(--kino-white);
    font-size: 16px;
    background-color: #565656;
  }

  .input-button{
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 2px 2px 5px #565656;
    background-color: #b30000c7; 
    color: var(--kino-white);
  }

  .input-button:hover{
    transform: scale(1.15);
    transition: 0.3s;
  }

  .already-login-label{
    color: var(--kino-black);
    font-weight: 500;
  }


</style>
