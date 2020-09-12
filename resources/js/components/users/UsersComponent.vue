<template>

    <div class="card card-info">
        <!-- Carga de datos -->
        <div v-if="!loaded" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-header">
            <h4 class="card-title font-weight-bold">Lista de usuarios
                <span v-show="users.total" class="right badge badge-dark">{{ users.total }}</span>
            </h4>
        </div>


        <div class="card-body">

            <!-- filters -->
            <!-- <div v-if="users.data.length  || searches.nif || searches.phone" class="form-row pl-3 align-items-end">

                <div class="col-sm-5 form-group">
                    <label for="nif" >NIF</label>
                    <input type="text" v-model="searches.nif" class="form-control" name="nif" placeholder="NIF">
                </div>
                <div class="col-10 col-sm-5 form-group">
                    <label for="phone" >Teléfono</label>
                    <input type="text" v-model="searches.phone" class="form-control" name="phone" placeholder="Teléfono">
                </div>
                <div class="col-auto form-group">
                    <button @click="deleteFilters()" title="Eliminar Filtros" type="button"
                        class="btn waves-effect waves-light btn-danger float-right">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div> -->

            <!-- table -->
            <div class="table-responsive pt-2" v-if="users.data.length || !loaded">
                <table class="table table-hover text-nowrap">
                    <thead >
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <user-item-component v-for="user in users.data"
                            v-bind:user="user"
                            v-bind:key="user.id"
                            @loadData="getUsers">
                        </user-item-component>
                    </tbody>
                </table>
                <pagination :limit="5" :data="users" @pagination-change-page="getUsers"></pagination>
            </div>
            <div v-else class="alert alert-warning text-center">
                    No hay ningún elemento para mostrar
            </div>
        </div>

        <div class="card-footer">
            Footer
        </div>

    </div>
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
                loaded: false
            }
        },

        methods: {
            getUsers(page = 1) {
                this.loaded = false;
                let url = '/cmsapi/users?page=' + page;
                axios.get(url)
                    .then(response => {
                        this.users = response.data
                        this.loaded = true;
                    })
                    .catch(err => {
                        console.error(err);
                    });
            },
            refreshUsers() {
                this.getUsers(this.users.current_page);
            }
        },
    }
</script>
