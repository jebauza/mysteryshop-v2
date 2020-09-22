<template>
    <div class="modal fade" id="modalUserDetails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Details</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{user.name}}</dd>
                        <dt>Surname</dt>
                        <dd>{{user.surname}}</dd>
                        <dt>Email</dt>
                        <dd>{{user.email}}</dd>
                    </dl>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" @click="closeModal">Close</button>
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
        name: "UserDetailsComponent",
        data() {
            return {
                user: []
            }
        },
        methods: {
            openDetails( user) {
                this.user = user;
                $('#modalUserDetails').modal({backdrop: 'static', keyboard: false, 'show': true})
            },
            closeModal() {
                $('#modalUserDetails').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
