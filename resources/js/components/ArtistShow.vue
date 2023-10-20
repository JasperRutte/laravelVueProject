<template>
    <div id="center" class="text-dark">
        <h1>{{artist.naam}}</h1>
        <p>genre: {{artist.genre}}</p>
        <p>bandleden: {{artist.bandleden}}</p>
        <p>platenmaatschappij: {{platenmaatschappij.naam}}</p>



        <router-link class="btn btn-success col-6" :to="'../ArtistEdit/'+ artist.id">Edit</router-link>
        <button class="btn btn-danger col-6" @click="removeArtist">delete</button>
        <router-view></router-view>

    </div>

</template>

<script>
import axios from "axios";

export default {
    name: 'ArtistShow',
    data() {
        return {
            hasLoaded: false,
            artist: [],
            platenmaatschappij: [],
            errors: false
        }

    },
    mounted() {
        axios.get(`/api/artistinfo/`+this.$route.params.id)
            .then(response => {
                this.artist = response.data.item;
                this.platenmaatschappij = response.data.platenmaatschappij;
                this.hasLoaded = true
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {

        removeArtist() {
                if (confirm("Are you sure?")){
                    axios.delete(`/api/artistinfo/${this.$route.params.id}`)
                    .then(response => {
                        console.log("success");
                        this.$router.push("/ArtistList");
                    })
                    .catch(error => {
                        console.log("failed");
                        console.error(error);
                    });
                } else {
                    console.log("Test")
                }

            }
        }
};


</script>
