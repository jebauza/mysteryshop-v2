<template>
    <tr>
        <td>{{user.name}}</td>
        <td>{{user.surname}}</td>
        <td>{{user.email}}</td>
        <td>
            <a href="#"><i class="text-primary fa fa-eye"></i></a>
            <a class="text-success fa fa-pen"></a>
            <a class="text-danger fa fa-trash" @click="deleteUser(user.id)" ></a>
        </td>
    </tr>
</template>

<script>


    export default {
        name: "UserItemComponent",
        props: ['user'],
        data(){
            return {

            }
        },
        methods:{
            deleteUser(item) {
                this.$confirm("Are you sure do you want delete this item?","Question","question").then(() => {
                    let url = `/api/users/${item}`;
                    axios.delete(url)
                        .then(response => {
                            this.$alert("the element have been removed","Information","success" )
                            this.$emit('loadUser')
                            this.users = response.data
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
