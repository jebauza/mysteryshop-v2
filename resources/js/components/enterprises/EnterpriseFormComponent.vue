<template>
    <div class="modal fade" id="modalFormEnterprise">
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
                                    <input type="text" class="form-control" placeholder="Address"
                                           :class="errors.address ? 'is-invalid':''"
                                           v-model="form.address">
                                    <span v-if="errors.address" class="invalid-feedback">{{errors.address[0]}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" @click="closeForm">Cancelar</button>
                    <a v-if="action==='update'" @click="updateEnterprise" class="btn btn-primary">Guardar</a>
                    <a v-else @click="createEnterprise" class="btn btn-primary">Guardar</a>
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
        name: "EnterpriseFormComponent",
        data() {
            return {
                errorMessage: '',
                title: '',
                action: '',
                form: {
                    id: '',
                    name: '',
                    address: '',
                },
                errors: []
            }
        },
        methods: {
            showForm(action, enterprise = null) {
                this.clearForm();
                this.action = action;
                this.title = action === 'update' ? 'Edit' : 'Create';
                if (enterprise) {
                    this.form = {
                        id: enterprise.id,
                        name: enterprise.name,
                        address: enterprise.address,
                    }
                }
                $('#modalFormEnterprise').modal({backdrop: 'static', keyboard: false,'show':true})
            },
            createEnterprise() {
                let url = `cmsapi/enterprises`;
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
            updateEnterprise() {
                let url = `cmsapi/enterprises/${this.form.id}`;
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
                    address: '',
                };
                this.errors = []
            },
            closeForm() {
                this.clearForm()
                $('#modalFormEnterprise').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
