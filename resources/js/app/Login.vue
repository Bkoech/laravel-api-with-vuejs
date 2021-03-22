<template>
    <div v-if="loading">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="login" v-else>
        <form autocomplete="off" @submit.prevent="login" method="post">
            <div class="form-group row">
                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="text" id="email_address" class="form-control" v-model="credentials.email" required
                           autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                    <input type="password" id="password" class="form-control" v-model="credentials.password">
                </div>
            </div>

            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Login</button>

            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Login",
        data() {
            return {
                credentials: {
                    email: '',
                    password: ''
                },
                loading: true,
            }

        },
        // mounted() {
        //     if(this.$store.state.token !== ''){
        //         axios.post('/api/checkToken', {token : this.$store.state.token})
        //         .then(res => {
        //             this.loading = false;
        //             if(res.data.success){
        //                 this.$router.push('/dashboard');
        //             } else {
        //                 if(!res.data.success){
        //                     this.$store.commit('setToken',res.data.token);
        //                 }
        //             }
        //         })
        //         .catch(err => {
        //             this.loading = false;
        //             // this.$store.commit('clearToken');
        //         })
        //     } else {
        //         this.loading = false;
        //     }
        // },
        methods: {
            login() {
                axios.post('/api/login', this.credentials)
                    .then(res => {
                        if (res.data.success) {
                         //store token
                            this.$store.commit('setToken',res.data.token)
                            console.log(res.data);
                        }
                    })
                    .catch(er => {
                        console.log('Error!')
                    })
            }
        },
        methods: {
            login() {
                // get the redirect object
                var redirect = this.$auth.redirect()
                var app = this
                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password
                    },
                    success: function () {
                        // handle redirection
                        app.success = true
                        const redirectTo = 'dashboard'
                        this.$router.push({name: redirectTo})
                    },
                    error: function () {
                        app.has_error = true
                        app.error = res.response.data.error
                    },
                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>

<style scoped>

    .login {
        justify-content: center;
        background-color: #fff;
        border: 1px solid #eee;
        padding: 10px;
        margin: 50px auto;
        width: 600px;
    }

    form {
        padding: 30px 10px;
    }

</style>
