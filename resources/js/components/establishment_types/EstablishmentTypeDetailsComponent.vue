<template>
    <div class="modal fade" id="modalEstablishmentTypeDetails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Establishment type Details</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{establishmen_type.name}}</dd>

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
        name: "EstablishmentTypeDetailsComponent",
        data() {
            return {
                establishmen_type: []
            }
        },
        methods: {
            openDetails( establishmen_type) {
                this.establishmen_type = establishmen_type;
                $('#modalEstablishmentTypeDetails').modal({backdrop: 'static', keyboard: false, 'show': true})
            },
            closeModal() {
                $('#modalEstablishmentTypeDetails').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
