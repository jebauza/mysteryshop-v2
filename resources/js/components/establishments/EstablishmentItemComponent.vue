<template>
    <tr>
        <td>{{establishment.name}}</td>
        <td>{{establishment.address}}</td>
        <td v-if="establishment.type != null">{{establishment.type.name}}</td>
        <td v-else>-</td>
        <td v-if="establishment.client != null">{{establishment.client.name}}</td>
        <td v-else>-</td>
        <td>
            <a href="#"><i class="text-primary fa fa-eye" @click="$emit('details')"></i></a>
            <a class="text-success fa fa-pen" @click="$emit('updateEstablishment')"></a>
            <a class="text-danger fa fa-trash" @click="deleteEstablishment(establishment.id)"></a>
        </td>
    </tr>
</template>

<script>
    export default {
        name: "EstablishmentItemComponent",
        props: ['establishment'],
        data() {
            return {}
        },
        methods: {
            deleteEstablishment(item) {
                this.$confirm("Are you sure do you want delete this item?", "Question", "question").then(() => {
                    let url = `/cmsapi/establishments/${item}`;
                    axios.delete(url)
                        .then(response => {
                            this.$alert("The element have been removed", "Information", "success")
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
