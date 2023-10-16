<template>
    <form v-if="hasLoaded">
        <div v-if="errors" class="alert alert-danger" role="alert">
            Please fill in the form and use the correct symbols
        </div>
        <input type="text" name="naam" v-model="platenmaatschappij.naam">
    </form>
    <br><button class="btn btn-success" @click="UpdatePlatenmaatschappij">Update</button>
    <button class="btn btn-danger" @click="deletePlatenmaatschappij">delete</button>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return{
            hasLoaded: false,
            errors: false,
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
                console.log("test")
                axios.put(`/api/platenmaatschappijen/` + this.$route.params.id + `/edit`, this.platenmaatschappij)
                    .then(response => {
                        this.$router.push('/ArtistList');
                    })
                    .catch(error => {
                        this.errors = true
                        console.log(error)
                    })
            }
        },
        deletePlatenmaatschappij() {
            if (confirm("Are you sure???")){
                console.log("True")
                axios.delete(`/api/platenmaatschappijen/` + this.$route.params.id)
                    .then(response => {
                        this.$router.push('/ArtistList');
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
    }
}

</script>
