<template>
    <div class="dashboard">
        <div v-if="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div v-else>
            You are logged in
            <br>
            <button class="btn btn-primary" @click="logout">Logout</button>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Dashboard",
        data() {
            return {
                loading: true,
            }

        },
        mounted() {
            if(this.$store.state.token !== ''){
                axios.post('/api/checkToken', {token : this.$store.state.token})
                    .then(res => {
                        if(!res.data.success){
                            this.$store.commit('setToken',res.data.token);
                        }
                        this.loading = false;
                    })
                    .catch(err => {
                        this.loading = false;
                        this.$router.push('/login');
                    })
            } else {
                this.loading = false;
                this.$router.push('/login');
            }
        },
        methods: {
            logout(){
                axios.post('/api/logout', {token : this.$store.state.token})
                    .then(res => {
                        if(res){
                            this.$store.commit('clearToken');
                            this.$router.push('/');
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>
