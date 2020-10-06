<template>
    <div class="modal fade" id="modalFormEstablishment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="closeForm" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="">
                        <div class="box-body">
                            <div v-if="errorMessage!==''" class="alert alert-danger" role="alert">
                                {{errorMessage}}
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" v-model="form.name"
                                           :class="errors.name ? 'is-invalid':''">
                                    <span v-if="errors.name" class="invalid-feedback">{{errors.name[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Address" v-model="form.address"
                                           :class="errors.address ? 'is-invalid':''">
                                    <span v-if="errors.address" class="invalid-feedback">{{errors.address[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-10">
                                    <select name="client_id" class="form-control"  v-model="form.establishment_type_id" :class="errors.establishment_type_id ? 'is-invalid':''">
                                        <option v-for="type in types" :value="type.id">{{establishment_type_id.name}}</option>
                                    </select>
                                    <span v-if="errors.establishment_type_id" class="invalid-feedback">{{errors.establishment_type_id[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Client</label>
                                <div class="col-sm-10">
                                    <select name="client_id" class="form-control" id="" v-model="form.client_id" :class="errors.client_id ? 'is-invalid':''">
                                        <option v-for="client in clients" value="client.id">{{client.name}}</option>
                                    </select>
                                    <span v-if="errors.client_id" class="invalid-feedback">{{errors.client_id[0]}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" @click="closeForm">Cancelar</button>
                    <a v-if="action==='update'" @click="updateEstablishmenType" class="btn btn-primary">Guardar</a>
                    <a v-else @click="createEstablishmenType" class="btn btn-primary">Guardar</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


</template>

<script>


    export default {
        name: "EstablishmentFormComponent",
        data() {
            return {
                errorMessage: '',
                title: '',
                action: '',
                form: {
                    id: '',
                    name: '',
                    address: '',
                    client_id: '',
                    establishment_type_id: '',
                },
                errors: [],
                clients: [],
                types: [],
            }
        },
        methods: {
            showForm(action, establishment = null) {
                this.clearForm();
                this.action = action;
                this.title = action === 'update' ? 'Edit' : 'Create';
                if (establishment) {
                    this.form = {
                        id: establishment.id,
                        name: establishment.name,
                        address: establishment.address,
                        client_id: establishment.client_id,
                        establishment_type_id: establishment.establishment_type_id,
                    }
                }
                $('#modalFormEstablishment').modal({backdrop: 'static', keyboard: false, 'show': true})
            },
            createEstablishmenType() {
                let url = `cmsapi/establishments`;
                axios.post(url, this.form)
                    .then(response => {
                        this.closeForm();
                        this.$alert("The element have been created", "Information", "success")
                        this.$emit('loadData')
                    })
                    .catch(error => {
                        this.errorMessage = error.response.data.message;
                        this.errors = error.response.data.errors;
                    });
            },
            updateEstablishmenType() {
                console.log(this.form.id,this.form)
                let url = `cmsapi/establishments/${this.form.id}`;
                axios.put(url, this.form)
                    .then(response => {
                        this.closeForm();
                        this.$alert("The element have been updated", "Information", "success")
                        this.$emit('loadData')
                    })
                    .catch(error => {
                        this.errorMessage = error.response.data.message;
                        this.errors = error.response.data.errors;
                    });
            },
            clearForm() {
                this.errorMessage = '';
                this.title = '';
                this.form = {
                    id: '',
                    name: '',
                    address: '',
                    client_id: '',
                    establishment_type_id: '',
                };
                this.errors = []
            },
            closeForm() {
                this.clearForm()
                $('#modalFormEstablishment').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
