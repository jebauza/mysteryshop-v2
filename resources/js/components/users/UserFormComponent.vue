<template>
    <div class="modal fade" id="modalFormUser">
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
                                <label class="col-sm-2 control-label">Surname</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="SurName"
                                           :class="errors.surname ? 'is-invalid':''"
                                           v-model="form.surname">
                                    <span v-if="errors.surname" class="invalid-feedback">{{errors.surname[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" :class="errors.email ? 'is-invalid':''"
                                           placeholder="Email" v-model="form.email">
                                    <span v-if="errors.email" class="invalid-feedback">{{errors.email[0]}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" @click="closeForm">Cancelar</button>
                    <a v-if="action==='update'" @click="updateUser" class="btn btn-primary">Guardar</a>
                    <a v-else @click="createUser" class="btn btn-primary">Guardar</a>
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
        name: "UserFormComponent",
        data() {
            return {
                errorMessage: '',
                title: '',
                action: '',
                form: {
                    id: '',
                    name: '',
                    surname: '',
                    email: ''
                },
                errors: []
            }
        },
        methods: {
            showForm(action, user = null) {
                this.clearForm();
                this.action = action;
                this.title = action === 'update' ? 'Edit' : 'Create';
                if (user) {
                    this.form = {
                        id: user.id,
                        name: user.name,
                        surname: user.surname,
                        email: user.email
                    }
                }
                $('#modalFormUser').modal({backdrop: 'static', keyboard: false,'show':true})
            },
            createUser() {
                let url = `cmsapi/users`;
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
            updateUser() {
                let url = `cmsapi/users/${this.form.id}`;
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
                    surname: '',
                    email: ''
                };
                this.errors = []
            },
            closeForm() {
                this.clearForm()
                $('#modalFormUser').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
