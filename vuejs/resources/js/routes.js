import AllProduct from './components/AllProducts.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';

export const routes = [
    {
        name: 'home',
        path: '/products/',
        component: AllProduct
    },
    {
        name: 'creat',
        path: '/products/',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/products/',
        component: EditProduct
    },

]