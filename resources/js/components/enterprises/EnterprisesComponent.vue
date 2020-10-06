<template>
    <div class="card card-info">
        <!-- Carga de datos -->
        <div v-if="!loaded" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-header">
            <h4 class="card-title font-weight-bold">Enterprises
                <span v-show="enterprieses.total" class="right badge badge-dark">{{ enterprieses.total }}</span>
            </h4>
        </div>

        <div class="card-body">
            <button id="show-modal" class="btn btn-primary btn-sm pull-right" @click="showForm('add')">Add
            </button>
            <enterprise-form-component @loadData="getEnterprises(1)" ref="formEnterprise"></enterprise-form-component>
            <enterprise-details-component ref="detailsEnterprise"></enterprise-details-component>
            <div v-if="enterprieses.data.length || !loaded" class="table-responsive pt-2">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <enterprise-item-component
                        v-for="item in enterprieses.data"
                        v-bind:enterprise="item"
                        v-bind:key="item.id"
                        @loadData="getEnterprises(1)"
                        @details="showDetails(item)"
                        @updateEnterprise="showForm('update',item)">
                    </enterprise-item-component>
                    </tbody>
                </table>
                <pagination :limit="5" :data="enterprieses" @pagination-change-page="getEnterprises"></pagination>
            </div>
            <div v-else class="alert alert-warning text-center">
                No hay ningún elemento para mostrar
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
    </div>
    <!-- /.card -->
</template>

<script>
    import EnterpriseItemComponent from "./EnterpriseItemComponent";
    import EnterpriseDetailsComponent from "./EnterpriseDetailsComponent";
    import EnterpriseFormComponent from "./EnterpriseFormComponent";

    export default {
        components: {EnterpriseFormComponent, EnterpriseDetailsComponent, EnterpriseItemComponent},
        mounted() {
            this.getEnterprises();
        },
        data() {
            return {
                enterprieses: {data: []},
                loaded: false,
                showAdd: false,
            }
        },
        methods: {
            getEnterprises(page = 1) {
                this.loaded = false;
                let url = '/cmsapi/enterprises?page=' + page;
                axios.get(url)
                    .then(response => {
                        this.enterprieses = response.data
                        this.loaded = true;
                    })
                    .catch(err => {
                        console.error(err);
                    })
            },
            showForm(action, enterprise = null) {
                this.$refs.formEnterprise.showForm(action, enterprise)
            },
            showDetails(item) {
                this.$refs.detailsEnterprise.openDetails(item)
            },
        },

    }
</script>
