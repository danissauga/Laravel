<template>
    <div>
        <table class="table table-striped">
            <tr>
                <th>ID </th>
                <th>Name </th>
                <th>Description </th>
                <th>Actions</th>
            </tr>
            <tr v-for="product in products" :key="product.id">
                <td> {{product.id}} </td>
                <td> {{product.name}} </td>
                <td> {{product.description}} </td>
                <td> 
                    <router-link :to="{name: 'edit', params: {id: product.id} }" class="btn btn-primary">Edit</router-link>
                    <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                </td>
            </tr> 
        </table>
    </div>
</template>

<script>
    export default {
        //apibreziami kintamieji
        data() {
            return  {
                products: [],
            }
        },
        //veiksmas ivyksta kai komponentas uzsikrauna/susikuria
        created() {
            //visu produktu paemimas is duomenu bazes
            this.axios
                .get('http://127.0.0.1:8000/api/products/')
                .then(response => {
                    this.products = response.data
                });
        },
        methods: {
            deleteProduct(id) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/products/${id}`)
                    .then(response => {
                        //ta elementa kuri istriname, panaikinti is lenteles
                        //produktu masyve yra surandamas istrinto elemento numeris
                        // Product::find($id)
                        let i = this.products.map( data => data.id).indexOf(id);
                        this.products.splice(i, 1);
                    });

            }
        }
    }
</script>