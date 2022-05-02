<template>
  <div>
      <table>
          <tr>
              <td>Id </td>
              <td>Name </td>
              <td>Description </td>
              <td>Tools </td>
            </tr>
           <tr v-for="product in products" :key="product.id">
               <td> {{product.id}} </td>
               <td> {{product.name}} </td>
               <td> {{product.description}} </td>
               <td> 
                    <router-link :to="{name: 'edit', params: {id: [product.id] }}" class="btn btn-primary">Edit</router-link>     
                    <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
              </td>
           </tr>    
      </table>
</div>  
</template>

<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        created() {
            this.axios
            .get('http://127.0.0.1:8000/api/products/')
            .then(resourse => {
                this.products = resourse.data
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