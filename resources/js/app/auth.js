import bearer from '@websanova/vue-auth/src/drivers/auth/bearer'
import axios from '@websanova/vue-auth/src/drivers/http/axios.1.x'
import router from 'vue-router'

const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'Auth',
    tokenStore: ['localStorage'],

    // API endpoints used in Vue Auth.
    loginData: {
        url: 'api/login',
        method: 'POST',
        redirect: '',
        fetchUser: true
    },
    logoutData: {
        url: 'api/logout',
        method: 'POST',
        redirect: '/',
        makeRequest: true
    },
    fetchData: {
        url: 'api/user',
        method: 'GET',
        enabled: true
    },
    refreshData: {
        url: 'api/refresh',
        method: 'GET',
        enabled: true,
        interval: 30
    }
}
export default config
