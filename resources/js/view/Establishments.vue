<template>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Type</th>
                      <th>Client</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="establishment in establishments" :key="establishment.id">
                      <td>{{establishment.name}}</td>
                      <td>{{establishment.address}}</td>
                      <td>{{establishment.type.name}}</td>
                      <td>{{establishment.client.name}}</td>
                      <td>
                        <a class="text-primary fa fa-eye"></a>    
                        <a class="text-success fa fa-pen"></a>    
                        <a class="text-danger fa fa-trash"></a>    
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</template>
<script>
    export default {
        data(){
            return {
                establishments: [],
            }
        },
        methods:{
            getEstablishments() {
                axios.get('/api/establishments').then(response => {
                    this.establishments = response.data.data
                   
                })
            },
        },
        mounted(){
            this.getEstablishments()
        }
    }
</script>
