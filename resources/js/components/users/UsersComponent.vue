<template>

    <div class="card card-info">
        <!-- Carga de datos -->
        <div v-if="!loaded" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-header">
            <h4 class="card-title font-weight-bold">Users
                <span v-show="users.total" class="right badge badge-dark">{{ users.total }}</span>
            </h4>
        </div>

        <div class="card-body">
            <button id="show-modal" class="btn btn-primary btn-sm pull-right" @click="showForm('add')">Add
            </button>
            <user-form-component @loadData="getUsers(1)" ref="formUser"></user-form-component>
            <user-details-component ref="detailsUser"></user-details-component>
            <div class="table-responsive pt-2" v-if="users.data.length || !loaded">
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
                        v-for="item in users.data"
                        v-bind:user="item"
                        v-bind:key="item.id"
                        @loadData="getUsers(1)"
                        @details="showDetails(item)"
                        @updateUser="showForm('update',item)">
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
    import UserFormComponent from "./UserFormComponent";
    import UserDetailsComponent from "./UserDetailsComponent";

    export default {
        components: {UserDetailsComponent, UserFormComponent, UserItemComponent},
        mounted() {
            this.getUsers()
        },

        data() {
            return {
                users: {data: []},
                loaded: false,
                showAdd: false,
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
            },
            showForm(action, user = null) {
                this.$refs.formUser.showForm(action, user)
            },
            showDetails(user) {
                this.$refs.detailsUser.openDetails(user)
            },
        },
    }
</script>
