<template>

    <form @submit.prevent="UpdatePlatenmaatschappij()" v-if="hasLoaded">
        <input type="text" name="naam" v-model="platenmaatschappij.naam">
        <br><button type="submit" class="btn btn-success">Update</button>
        <button class="btn btn-danger" @click="deletePlatenmaatschappij()">delete</button>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return{
            hasLoaded: false,
        }
    },

    mounted() {

        axios.get(`/api/platenmaatschappijen/` + this.$route.params.id + `/edit`)
            .then(response => {
                this.platenmaatschappij = response.data.item;
                console.log(response.data);
                this.hasLoaded = true

            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        UpdatePlatenmaatschappij() {
            axios.put(`/api/platenmaatschappijen/` +  this.$route.params.id + `/edit`, this.platenmaatschappij)
                .then(response => {
                    console.log("success")
                    this.$router.push('/ArtistList');
                })
                .catch(error =>{
                    console.log(error)
                })
        },
        deletePlatenmaatschappij() {
            axios.delete(`/api/platenmaatschappijen/` + this.$route.params.id)
                .then(response => {
                    console.log("deleted")
                    this.$router.push('/ArtistList');
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}

</script>
