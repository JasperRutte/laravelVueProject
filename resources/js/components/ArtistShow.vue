<template>
    <div v-if="hasLoaded">
        <h1>{{artist.naam}}</h1>
        <p>genre: {{artist.genre}}</p>
        <p>bandleden: {{artist.bandleden}}</p>


        <button class="btn-primary" @click="removeArtist">delete</button>

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
                console.log(response.data);
                this.hasLoaded = true
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        removeArtist(){
            axios.delete(`../api/artistinfo/${this.$route.params.id}`)
                .then(response => {
                    console.log(`Deleted post with ID ${postIdToDelete}`);
                })
                .catch(error => {
                    console.log("failed")
                    console.error(error);
                });
            }
        }
};


</script>
