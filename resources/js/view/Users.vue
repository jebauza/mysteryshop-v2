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
              <div class="card-body">
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
