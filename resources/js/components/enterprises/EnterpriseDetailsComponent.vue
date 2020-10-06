<template>
    <div class="modal fade" id="modalEnterpriseDetails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enterprise Details</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{enterprise.name}}</dd>
                        <dt>Address</dt>
                        <dd>{{enterprise.address}}</dd>
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
        name: "EnterpriseDetailsComponent",
        data() {
            return {
                enterprise: []
            }
        },
        methods: {
            openDetails( enterprise) {
                this.enterprise = enterprise;
                $('#modalEnterpriseDetails').modal({backdrop: 'static', keyboard: false, 'show': true})
            },
            closeModal() {
                $('#modalEnterpriseDetails').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
