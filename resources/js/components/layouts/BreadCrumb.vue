<template>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li v-for="item in pathArray" class="breadcrumb-item">
                            <router-link :to="'/'+item">{{item}}</router-link>
                        </li>
                        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    mounted() {
        console.log(this.$route.path.split("/"));
    },
    data() {
        return {
            pathArray: this.$route.path.split("/")
        }
    },

}
</script>
