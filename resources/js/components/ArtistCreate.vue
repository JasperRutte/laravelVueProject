<template>
    <br><button id="artist" class="btn btn-primary" @click="createPlatenmaatschappijArtist('artist')">create artist</button> <br>
    <button id="platenmaatschappij" class="btn btn-primary" @click="createPlatenmaatschappijArtist('platenmaatschappij')">create platenmaatschappij</button>

    <router-link to="App">create platenmaatschappij</router-link>

    <div v-if="createArtist">
        <form @submit.prevent="submitArtist">
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
        <form @submit.prevent="submitPlatenmaatschappij">
            <input type="text" v-model="platenmaatschappij.naam">
            <div class="control-group col-3 text-center">
                <button type="submit" id="btn-submit" class="col-8 btn btn-success">
                    Create platenmaatschappij
                </button>
            </div>
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
            platenmaatschappij : {
              naam: ""
            },
            errors: {

            },
            createPlatenmaatschappij: false,
            createArtist: false,
        };
    },
    methods: {
        submitArtist() {
            axios.post('/api/artistinfo/create', this.artist)
                .then(response => {
                    this.artist.naam = "";
                    this.artist.bandleden = "";
                    this.artist.genre = "";
                })
                .catch(error => {
                    console.error(error.response.data.message);
                });
        },
        submitPlatenmaatschappij(){
            axios.post('/api/platenmaatschappijen/create', this.platenmaatschappij)
                .then(response => {
                    this.platenmaatschappij.naam = "";
                })
                .catch(error => {
                    console.log(error.response.data.message)
                })
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
