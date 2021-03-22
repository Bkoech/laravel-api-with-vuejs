<template>
    <div v-if="loading">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="login" v-else>
        <form>
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
                <button type="submit" class="btn btn-primary" @click.prevent="login">Login</button>

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
        mounted() {
            if(this.$store.state.token !== ''){
                axios.post('/api/checkToken', {token : this.$store.state.token})
                .then(res => {
                    if(res){
                        this.loading = false;
                        this.$router.push('/dashboard');
                    }
                })
                .catch(err => {
                    this.loading = false;
                    this.$store.commit('clearToken');
                })
            } else {
                this.loading = false;
            }
        },
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
