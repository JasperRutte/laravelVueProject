<template>
    <div v-if="hasLoaded">
        <h1>{{artist.naam}}</h1>
        <p>genre: {{artist.genre}}</p>
        <p>bandleden: {{artist.bandleden}}</p>

        <router-link class="btn btn-success" :to="'../ArtistEdit/'+ artist.id">Edit</router-link>
        <button class="btn btn-danger" @click="removeArtist">delete</button>
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
            artist: null,
            errors: null
        }
    },
    mounted() {
        console.log(this.$route)
        axios.get(`/api/artistinfo/`+this.$route.params.id)
            .then(response => {
                this.artist = response.data.item;
                console.log(this.artist)
                console.log(response.data);
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
