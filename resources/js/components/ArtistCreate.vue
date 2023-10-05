<template>
    <br><button id="artist" class="btn btn-primary" @click="createPlatenmaatschappijArtist('artist')">create artist</button> <br>
    <button id="platenmaatschappij" class="btn btn-primary" @click="createPlatenmaatschappijArtist('platenmaatschappij')">create platenmaatschappij</button>

    <router-link to="App">create platenmaatschappij</router-link>

    <div v-if="createArtist">
        <form @submit.prevent="submitForm">
            <h1>Maak een artiest aan</h1>

            <label ref="form" for="naam">naam</label>
            <input v-model="artist.naam" type="text" id="naam" class="form-control" name="naam">


            <label for="bandleden">bandleden</label>
            <input v-model="artist.bandleden" type="text" id="naam" class="form-control" name="naam">


            <label for="genre">Genre:</label><br>

            <input v-model="artist.genre" type="radio" id="rock" name="genre" value="Rock" >
            <label for="rock">Rock</label><br>

            <input v-model="artist.genre" type="radio" id="pop" name="genre" value="Pop">
            <label for="pop">Pop</label><br>

            <input v-model="artist.genre" type="radio" id="metal" name="genre" value="Metal">
            <label for="metal">Metal</label><br>

            <input v-model="artist.genre" type="radio" id="dnb" name="genre" value="D 'n B" >
            <label for="dnb">D'n B</label><br>

            <input v-model="artist.genre" type="radio" id="rap" name="genre" value="rap" >
            <label for="dnb">Rap</label><br>

            <div class="row mt-2">
                <div class="control-group col-12 text-center">
                    <button type="submit" id="btn-submit" class="col-8 btn btn-success">
                        Create artist
                    </button>
                </div>
            </div>
        </form>
    </div>


    <div v-else-if="createPlatenmaatschappij">
        <form >
            <p>dwadawdaw</p>
        </form>
    </div>


</template>

<script>
import axios from "axios";

export default {
    name: 'ArtistCreate',
    data() {
        return {
            artistCreate: false,
            artist: {
                naam: "",
                bandleden: "",
                genre: "",
            },
            errors: {

            },
            createPlatenmaatschappij: false,
            createArtist: false,
        };
    },
    methods: {
        submitForm() {
            axios.post('/api/artistinfo/create', this.artist)
                .then(response => {
                    console.log("success")
                    console.log(this.artist)
                    this.artist.naam = "";
                    this.artist.bandleden = "";
                    this.artist.genre = "";
                    // Handle success or redirection here
                })
                .catch(error => {
                    // console.log("test")
                    console.log("failed")
                    console.log(this.artist)
                    console.error(error.response.data.message);
                    // Handle errors here
                });
        },
        createPlatenmaatschappijArtist(artist) {
            if (artist === "platenmaatschappij") {
                this.createPlatenmaatschappij = true
                this.createArtist = false
            } else if (artist === "artist") {
                this.createPlatenmaatschappij = false
                this.createArtist = true
            }
        },
    },
};

</script>

<style lang="scss" scoped>

</style>
