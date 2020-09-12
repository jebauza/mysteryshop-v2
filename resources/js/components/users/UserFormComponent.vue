<template>
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontal Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" v-on:submit.prevent="CreateUser">
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="Name" v-model="name" value="user.name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="surname" class="col-sm-2 control-label">Surname</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="surname" placeholder="SurName" v-model="surname" value="user.surname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" v-model="email" value="user.name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

</template>

<script>


    export default {
        name: "UserItemComponent",
        props: ['user'],
        data(){
            return {
                name:'',
                surname:'',
                email:''
            }
        },
        methods:{
            CreateUser(item) {
                this.$confirm("Are you sure do you want delete this item?","Question","question").then(() => {
                    let url = `/api/users/${item}`;
                    axios.delete(url)
                        .then(response => {
                            this.$alert("the element have been removed","Information","success" )
                            this.$emit('loadData')
                        })
                        .catch(err => {
                            this.$alert("An error has occurred", "Error", "error")
                            console.error(err);
                        });
                });
            }
        }
    }
</script>

<style scoped>

</style>
