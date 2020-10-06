<template>
    <div class="modal fade" id="modalChangePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change password</h4>
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
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" v-model="form.password"
                                           :class="errors.password ? 'is-invalid':''">
                                    <span v-if="errors.password" class="invalid-feedback">{{errors.password[0]}}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Repeat password</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="SurName"
                                           :class="errors.surname ? 'is-invalid':''"
                                           v-model="form.surname">
                                    <span v-if="errors.surname" class="invalid-feedback">{{errors.surname[0]}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" @click="closeForm">Cancel</button>
                    <a  @click="updateUser" class="btn btn-primary">Save</a>
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
        name: "UserSetPasswordComponent",
        data() {
            return {
                errorMessage: '',
                form: {
                    id: '',
                    password: '',
                    password_confirm: '',
                },
                errors: []
            }
        },
        methods: {
            showForm( user = null) {
                this.clearForm();
                if (user) {
                    this.form.id = user.id;
                }
                $('#modalChangePassword').modal({backdrop: 'static', keyboard: false,'show':true})
            },
            updateUser() {
                let url = `cmsapi/users/${this.form.id}`;
                axios.put(url, this.form)
                    .then(response => {
                        this.closeForm();
                        this.$alert("the password has been changed", "Information", "success")
                        this.$emit('loadData')
                    })
                    .catch(error => {
                        this.errorMessage = error.response.data.message;
                        this.errors = error.response.data.errors;
                    });
            },
            clearForm() {
                this.errorMessage = '';
                this.form = {
                    id: '',
                    password: '',
                    password_confirm: ''
                };
                this.errors = []
            },
            closeForm() {
                this.clearForm()
                $('#modalChangePassword').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
