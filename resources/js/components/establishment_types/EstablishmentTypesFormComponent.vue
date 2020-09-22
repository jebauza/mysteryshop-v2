<template>
    <div class="modal fade" id="modalFormEstablishmenType">
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
        name: "EstablishmenTypeFormComponent",
        data() {
            return {
                errorMessage: '',
                title: '',
                action: '',
                form: {
                    id: '',
                    name: '',
                },
                errors: []
            }
        },
        methods: {
            showForm(action, establishment_type = null) {
                this.clearForm();
                this.action = action;
                this.title = action === 'update' ? 'Edit' : 'Create';
                if (establishment_type) {
                    this.form = {
                        id: establishment_type.id,
                        name: establishment_type.name,
                    }
                }
                $('#modalFormEstablishmenType').modal({backdrop: 'static', keyboard: false,'show':true})
            },
            createEstablishmenType() {
                let url = `cmsapi/establishment_types`;
                axios.post(url, this.form)
                    .then(response => {
                        this.closeForm();
                        this.$alert("the element have been created", "Information", "success")
                        this.$emit('loadData')
                    })
                    .catch(error => {
                        this.errorMessage = error.response.data.message;
                        this.errors = error.response.data.errors;
                    });
            },
            updateEstablishmenType() {
                let url = `cmsapi/establishment_types/${this.form.id}`;
                axios.put(url, this.form)
                    .then(response => {
                        this.closeForm();
                        this.$alert("the element have been updated", "Information", "success")
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
                };
                this.errors = []
            },
            closeForm() {
                this.clearForm()
                $('#modalFormEstablishmenType').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
