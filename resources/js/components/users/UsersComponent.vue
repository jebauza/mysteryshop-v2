<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

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
                            <user-item-component
                                v-for="user in users.data"
                                v-bind:user="user"
                                v-bind:key="user.id"
                                @loadData="getUsers"
                            ></user-item-component>
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
    import UserItemComponent from './UserItemComponent';
    export default {
        components: {UserItemComponent},
        mounted() {
            this.getUsers()
        },

        data() {
            return {
                users: {data: []},
            }
        },

        methods: {
            getUsers(page = 1) {
                let url = '/cmsapi/users?page=' + page;
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
