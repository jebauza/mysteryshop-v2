<template>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

              </div>


                <div class="card-body">
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
                                    <a class="text-danger fa fa-trash" v-on:click="clientSelected=client.id;deleteClients"></a>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
  <!--   <div class="col-md-8">
        <h1>Estas en Users</h1>
        <example-component></example-component>
    </div> -->
</template>
<script>
    export default {

        mounted(){
            this.getClients()
        },

        data(){
            return {
                clientSelected:'',
                clients: {data: []},
            }
        },
        methods:{
            getClients(page=1) {
                let url = '/cmsapi/clients?page=' + page;

                axios.get(url)
                .then(response => {
                    this.clients = response.data
                })
                .catch(err => {
                    console.error(err);
                });
            },
            deleteClients: function(event) {
                alert(this.clientSelected)
                console.log(2222,client)
                let url = '/api/clients/'+client ;

                axios.delete(url)
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(err => {
                        console.error(err);
                    });
            },

        }
    }
</script>
