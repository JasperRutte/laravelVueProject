<template>
    <div id="center" class="shadow rounded">
        <div class="alert alert-danger" v-if="errorInArtist">Er is een artiest met deze platenmaatschappij</div>
        <form v-if="hasLoaded" >
            <div v-if="errorTypo" class="alert alert-danger" role="alert">
                Please fill in the form and use the correct symbols
            </div>
            <input type="text" name="naam" v-model="platenmaatschappij.naam">
        </form>
        <br><button class="btn btn-success col-6" @click="UpdatePlatenmaatschappij">Update</button>
        <button class="btn btn-danger col-6" @click="deletePlatenmaatschappij">delete</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return{
            hasLoaded: false,
            errorTypo: false,
            errorInArtist: false,
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
            if (confirm("Are you sure")) {
                axios.put(`/api/platenmaatschappijen/` + this.$route.params.id + `/edit`, this.platenmaatschappij)
                    .then(response => {
                        this.$router.push('/ArtistList');
                    })
                    .catch(error => {
                        console.log(error)
                        this.errorTypo = true
                        this.errorInArtist = false
                    })
            }
        },
        deletePlatenmaatschappij() {
            if (confirm("Are you sure???")){
                axios.delete(`/api/platenmaatschappijen/` + this.$route.params.id)
                    .then(response => {
                        this.$router.push('/ArtistList');
                    })
                    .catch(error => {
                        console.log(error)
                        this.errorInArtist = true
                    })
            }
        }
    }
}

</script>

<style>

</style>
