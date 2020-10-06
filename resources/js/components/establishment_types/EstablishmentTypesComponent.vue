<template>
    <div class="card card-info">
        <!-- Carga de datos -->
        <div v-if="!loaded" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>

        <div class="card-header">
            <h4 class="card-title font-weight-bold">Establishment types
                <span v-show="establishment_types.total" class="right badge badge-dark">{{ establishment_types.total }}</span>
            </h4>
        </div>

        <div class="card-body">
            <button id="show-modal" class="btn btn-primary btn-sm pull-right" @click="showForm('add')">Add
            </button>
            <establishment-types-form-component @loadData="getEstablishmentTypes(1)" ref="formEstablishmentType"></establishment-types-form-component>
            <establishment-type-details-component ref="detailsEstablishmentType"></establishment-type-details-component>
            <div v-if="establishment_types.data.length || !loaded" class="table-responsive pt-2">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <establishment-type-item-component
                        v-for="item in establishment_types.data"
                        v-bind:establishment_type="item"
                        v-bind:key="item.id"
                        @loadData="getEstablishmentTypes(1)"
                        @details="showDetails(item)"
                        @updateEstablishmentType="showForm('update',item)">
                    </establishment-type-item-component>
                    </tbody>
                </table>
                <pagination :limit="5" :data="establishment_types" @pagination-change-page="getEstablishmentTypes"></pagination>
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
    import EstablishmentTypeDetailsComponent from "./EstablishmentTypeDetailsComponent";
    import EstablishmentTypesFormComponent from "./EstablishmentTypesFormComponent";
    import EstablishmentTypeItemComponent from "./EstablishmentTypeItemComponent";

    export default {
        components: {EstablishmentTypesFormComponent, EstablishmentTypeDetailsComponent, EstablishmentTypeItemComponent},
        mounted() {
            this.getEstablishmentTypes();
        },
        data() {
            return {
                establishment_types: {data: []},
                loaded: false,
                showAdd: false,
            }
        },
        methods: {
            getEstablishmentTypes(page = 1) {
                this.loaded = false;
                let url = '/cmsapi/establishment_types?page=' + page;
                axios.get(url)
                    .then(response => {
                        this.establishment_types = response.data
                        this.loaded = true;
                    })
                    .catch(err => {
                        console.error(err);
                    })
            },
            showForm(action, establishment_type = null) {
                this.$refs.formEstablishmentType.showForm(action, establishment_type)
            },
            showDetails(item) {
                this.$refs.detailsEstablishmentType.openDetails(item)
            },
        },

    }
</script>
