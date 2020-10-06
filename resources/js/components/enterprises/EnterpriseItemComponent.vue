<template>
    <tr>
        <td>{{enterprise.name}}</td>
        <td>{{enterprise.address}}</td>
        <td>
            <a href="#"><i class="text-primary fa fa-eye" @click="$emit('details')"></i></a>
            <a class="text-success fa fa-pen" @click="$emit('updateEnterprise')"></a>
            <a class="text-danger fa fa-trash" @click="deleteEnterprise(enterprise.id)" ></a>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "EnterpriseItemComponent",
        props: ['enterprise'],
        data(){
            return {
            }
        },
        methods:{
            deleteEnterprise(item) {
                this.$confirm("Are you sure do you want delete this item?","Question","question").then(() => {
                    let url = `/cmsapi/enterprises/${item}`;
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
