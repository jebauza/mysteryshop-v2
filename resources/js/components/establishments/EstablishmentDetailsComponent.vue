<template>
    <div class="modal fade" id="modalEstablishmentDetails">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Establishment Details</h4>
                    <button type="button" class="close" data-dismiss="modal" @click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{establishment.name}}</dd>
                        <dt>Address</dt>
                        <dd>{{establishment.address}}</dd>
                        <dt>Type</dt>
                        <dd v-if="establishment.type != null">{{establishment.type.name}}</dd>
                        <dd v-else>-</dd>
                        <dt>Client</dt>
                        <dd v-if="establishment.client != null">{{establishment.client.name}}</dd>
                        <dd v-else>-</dd>

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
        name: "EstablishmentDetailsComponent",
        data() {
            return {
                establishment: []
            }
        },
        methods: {
            openDetails( establishment) {
                console.log(34567)
                this.establishment = establishment;
                $('#modalEstablishmentDetails').modal({backdrop: 'static', keyboard: false, 'show': true})
            },
            closeModal() {
                $('#modalEstablishmentDetails').modal('hide');
            }
        }
    }
</script>

<style scoped>

</style>
