<template>
<div>
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Clientes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link :to="'/'">Home</router-link></li>
                            <li class="breadcrumb-item active">Clientes</li>
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
                            <i class="fas fa-plus-square"></i> Nuevo Cliente
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
                                <div v-if="clients.data.length" class="table-responsive">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>N. contract</th>
                                            <th>Enterprise</th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="client in clients.data" :key="client.id">
                                            <td>{{client.name}}</td>
                                            <td>{{client.address}}</td>
                                            <td>{{client.contract}}</td>
                                            <td>{{client.enterprise.name}}</td>
                                            <td>
                                                <a class="text-primary fa fa-eye"></a>
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

                                <pagination v-if="clients.data.length" class="pt-4"
                                    :limit="5"
                                    :data="clients"
                                    @pagination-change-page="getClients">
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
            this.getClients()
        },

        data(){
            return {
                clients: {data: []},
            }
        },
        methods:{
            getClients(page=1) {
                let url = '/api/clients?page=' + page;

                axios.get(url)
                .then(response => {
                    this.clients = response.data
                })
                .catch(err => {
                    console.error(err);
                });
            },
        }
    }
</script>
