<template>
<div>
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="'/'">Home</router-link></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <router-link class="btn btn-info btn-sm" :to="'/'">
                            <i class="fas fa-plus-square"></i> Nuevo Usuario
                        </router-link>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Criterio de Busqueda</h3>
                            </div>

                            <div class="card-body">
                                <form role="form">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div v-if="users.data.length" class="table-responsive">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="user in users.data" :key="user.id">
                                                <td>{{user.name}}</td>
                                                <td>{{user.surname}}</td>
                                                <td>{{user.email}}</td>
                                                <td>
                                                    <a href="#"><i class="text-primary fa fa-eye"></i></a>
                                                    <a class="text-success fa fa-pen"></a>
                                                    <a class="text-danger fa fa-trash"></a>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div v-else class="alert alert-warning text-center">
                                        No hay elementos
                                    </div>

                                    <pagination v-if="users.data.length" class="pt-4"
                                        :limit="5"
                                        :data="users"
                                        @pagination-change-page="getUsers">
                                    </pagination>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    Footer
                </div>
            </div>
        </section>

</div>
</template>
<script>
    export default {

        mounted(){
            this.getUsers()
        },

        data(){
            return {
                users: {data: []},
            }
        },

        methods:{
            getUsers(page=1) {
                let url = '/api/users?page=' + page;

                axios.get(url)
                .then(response => {
                    this.users = response.data
                })
                .catch(err => {
                    console.error(err);
                });
            },
        },
    }
</script>
