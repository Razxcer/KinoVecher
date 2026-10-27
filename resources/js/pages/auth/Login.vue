<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Авторизация" />
    <MainLayout>
        <div class="wrapper">

            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="auth-block">
                <h3 class="title">Войдите в аккаунт</h3>
                <div class="grid gap-6">
                    
                    <div class="grid gap-2">
                        <Label for="email" class="label">Электронная почта</Label>
                        <Input
                            id="email"
                            type="email"
                            class="input-text"
                            required
                            autofocus
                            tabindex="1"
                            autocomplete="email"
                            v-model="form.email"
                            placeholder="email@example.com"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <div class="flex items-center justify-between">
                            <Label for="password" class="label">Пароль</Label>
                            <!-- <TextLink v-if="canResetPassword"  :href="route('password.request')" class="text-sm" tabindex="5"> Forgot password? </TextLink> -->
                        </div>
                        <Input
                            id="password"
                            type="password"
                            class="input-text"
                            required
                            tabindex="2"
                            autocomplete="current-password"
                            v-model="form.password"
                            placeholder="Пароль"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- <div class="flex items-center justify-between" tabindex="3">
                        <Label for="remember" class="flex items-center space-x-3">
                            <Checkbox id="remember" v-model:checked="form.remember" tabindex="4" />
                            <span>Запомнить меня</span>
                        </Label>
                    </div> -->

                    <Button type="submit" class="mt-4 w-full input-button"  tabindex="4" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Войти
                    </Button>
                </div>

                <div class="already-login-label p-2 flex justify-around text-sm ">
                    <p class="pr-5">Ещё нет аккаунта?</p>
                    <TextLink :href="route('register')" class="underline underline-offset-4 " style="color: var(--kino-white); text-decoration-color: var(--kino-white);">Создать</TextLink>
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
        url('/KatalogFilms-blur.jpg');

        width: 100%;
        height: 1400px;

        background-size: cover, 100% 80%;
        background-repeat: repeat;

        animation: bg-move 100s linear infinite;

        display: flex;
        justify-content: center;
        z-index: 1;
    }

    .auth-block{
    width: 600px;
    height: min-content;
    margin-top: calc((100vh / 2) - (500px / 2)  - 30px);
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