<template>
    <div class="card card-info">
        <div v-if="!loaded" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-header">
            <h4 class="card-title font-weight-bold">Establishment
                <span v-show="establishments.total" class="right badge badge-dark">{{ establishments.total }}</span>
            </h4>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <button id="show-modal" class="btn btn-primary btn-sm pull-right" @click="showForm('add')">Add
            </button>
            <establishment-form-component @loadData="getEstablishments(1)" ref="formEstablishment"></establishment-form-component>
            <establishment-details-component ref="detailsEstablishment"></establishment-details-component>
            <div v-if="establishments.data.length || !loaded" class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Client</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <establishment-item-component
                        v-for="item in establishments.data"
                        v-bind:establishment="item"
                        v-bind:key="item.id"
                        @loadData="getEstablishments(1)"
                        @details="showDetails(item)"
                        @updateEstablishment="showForm('update',item)">
                    </establishment-item-component>
                    </tbody>
                </table>
                <pagination :limit="5" :data="establishments" @pagination-change-page="getEstablishments"></pagination>
            </div>
            <div v-else class="alert alert-warning text-center">
                No hay ningún elemento para mostrar
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</template>
<script>
    import EstablishmentDetailsComponent from "./EstablishmentDetailsComponent";
    import EstablishmentFormComponent from "./EstablishmentFormComponent";
    import EstablishmentItemComponent from "./EstablishmentItemComponent";

    export default {
        components: {EstablishmentFormComponent, EstablishmentDetailsComponent, EstablishmentItemComponent},
        mounted() {
            this.getEstablishments()
        },

        data() {
            return {
                establishments: {data: []},
                loaded: false,
                showAdd: false,
            }
        },

        methods: {
            getEstablishments(page = 1) {
                this.loaded = false;
                let url = '/cmsapi/establishments?page=' + page;
                axios.get(url)
                    .then(response => {
                        this.establishments = response.data
                        this.loaded = true;
                    })
                    .catch(err => {
                        console.error(err);
                    })
            },
            showForm(action, establishment = null) {
                this.$refs.formEstablishment.showForm(action, establishment)
            },
            showDetails(item) {
                console.log(22222)
                this.$refs.detailsEstablishment.openDetails(item)
            },
        }
    }
</script>
