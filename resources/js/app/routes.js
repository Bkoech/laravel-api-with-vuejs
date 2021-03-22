import Veu from 'vue';
import VueRouter from 'vue-router';
import Home from "./Home";
import Login from "./Login";
import Dashboard from "./Dashboard";
import CreateProduct from "./components/products/CreateProduct";
import ListProducts from "./components/products/ListProducts";
import EditProduct from "./components/products/EditProduct";

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
    },
    //Products
    {
        name: 'products',
        path: '/products',
        component: ListProducts
    },
    //Products
    {
        name: 'product.create',
        path: '/products/create',
        component: CreateProduct
    },
    {
        name: 'product.edit',
        path: '/product/edit/:id',
        component: EditProduct
    }
]
