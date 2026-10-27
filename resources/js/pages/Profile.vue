<script setup>
    import MainLayout from '@/layouts/MainLayout.vue';
    import { Head, Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';

    const page = usePage();
    const user = computed(() => page.props.auth.user);
    console.log(user)
</script>

<template>
    <Head title="Профиль" />
    <MainLayout>
        <div class="profile-wrapper">
            <div class="profile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="90%" height="90%" fill="var(--kino-black)" style="margin-bottom: 15px;" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </div>
            <p class="login text">
                Пользователь: {{ user.name }}
            </p>
            <p class="timestamp text">
                В числе пользователей с {{ user.created_at.slice(0, 10) + " " + user.created_at.slice(11, 19)}}
            </p>


            <Link href="/logout" method="post" as="button" class="logout-btn">
                Выйти
            </Link>
        </div>
    </MainLayout>
</template>

<style scoped>
    .profile-wrapper{
        display: flex;
        flex-direction: column;
        padding: 60px;
    }

    .profile-icon{
        width: 200px;
        height: 200px;
        background-color: var(--kino-white);
        border-radius: 10em;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
        box-shadow: 2px -2px 7px var(--kino-gray);
    }

    .text{
        font-size: 18px;
        padding: 10px;
    }

    .logout-btn{
        width: 150px;
        height: 35px;
        background-color: var(--kino-gray);
        color: var(--kino-red);
        font-weight: 600;
        border-radius: 1.1em;
        margin: 10px;
    }

</style>