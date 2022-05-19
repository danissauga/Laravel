<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/products/create">Create Product</router-link>
                    <a href="#">Antra nuoroda</a>
                </div>
            </div>
        </nav>
        <router-view></router-view> 
    </div>
</template>

<script>
    export default{}
</script>

