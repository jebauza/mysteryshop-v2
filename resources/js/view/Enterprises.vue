<template>
    <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <div v-if="enterprieses.data.length" class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="e in enterprieses.data" :key="e.id">
                                <td v-text="e.name"></td>
                                <td v-text="e.address"></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div v-else class="alert alert-warning text-center">
                    No hay elementos
                </div>

                <pagination v-if="enterprieses.data.length" :limit="5" :data="enterprieses" @pagination-change-page="getEnterprises"></pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</template>

<script>

export default {

    created() {
        this.getEnterprises();
    },

    data() {
        return {
            enterprieses: {data:[]}
        }
    },

    methods: {
        getEnterprises(page = 1){
            let url = '/api/enterprises?page=' + page;
            axios.get(url)
            .then(response => {
                this.enterprieses = response.data
            })
            .catch(err => {
                console.error(err);
            })
        },
    },

}
</script>
