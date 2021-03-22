import Veu from 'vue';
import VueRouter from 'vue-router';
import Home from "./Home";
import Login from "./Login";
import Dashboard from "./Dashboard";

Veu.use(VueRouter);

export const routes = [
    {
        path:'/',
        component:Home,
    },
    {
        path:'/login',
        component:Login,
    },
    {
        path:'/dashboard',
        component:Dashboard,
    }
]
