<template>
    <div id="main">
        <header id="header">
            <Menu></Menu>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
<!--    <div>-->
<!--        <div class="navbar">-->
<!--            <div>-->
<!--                <router-link to="/"> Home</router-link>-->
<!--            </div>-->
<!--            <div>-->
<!--                <router-link to="/login"> Login</router-link>-->
<!--            </div>-->
<!--            <div>-->
<!--                <router-link to="/dashboard"> Dashboard</router-link>-->
<!--            </div>-->
<!--        </div>-->
<!--        <router-view></router-view>-->
<!--    </div>-->
</template>

<script>
    import Menu from './components/Menu.vue'
    export default {
        name: "App",
        data() {
            return {
                //
            }
        },
        components: {
            Menu
        }

    }
</script>

<style scoped>
    .navbar {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        border-bottom: 1px solid #eee;
    }

    .navbar div {
        padding: 5px 20px;
    }
</style>
