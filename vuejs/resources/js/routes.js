import AllProduct from './components/AllProduct.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditProduct.vue';

export const routes = [
    {
        name: 'home',
        path: '/products/',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/products/create',
        component: CreateProduct
    },
    {   name: 'edit',
        path: '/products/edit/:id', //{product}
        component: EditProduct
    }
]
