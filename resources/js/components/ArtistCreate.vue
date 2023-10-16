<template>
    <div class="col-md-12 text-center">
        <br><button class="btn btn-light me-1" @click="selectPlatenmaatschappijArtist('artist')">create artist</button>
        <button class="btn btn-light" @click="selectPlatenmaatschappijArtist('platenmaatschappij')">create platenmaatschappij</button>
    </div>

    <div id="center" v-if="createArtist" class="shadow p-3 mb-5 bg-white shadow p-3 bg-white rounded">
        <div v-if="errors" class="alert alert-danger" role="alert">
            Please fill in all the questions
        </div>
        <form @submit.prevent="submitArtist">
            <h1 class="display">Maak een artiest aan</h1>

            <label ref="form" for="naam">Naam</label>
            <input v-model="artist.naam" type="text" id="naam" class="form-control" name="naam">
            <br>
            <label for="bandleden">Bandleden</label>
            <textarea v-model="artist.bandleden" type="text" id="naam" class="form-control" name="naam"></textarea>
            <br>
            <label for="platenmaatschappij">Platenmaatschappij</label>
            <select class="form-select">
                <option v-for="platenmaatschappij in platenmaatschappijen" :key="platenmaatschappij">{{platenmaatschappij.naam}}</option>
            </select>
            <br>

            <label for="genre">Genre:</label><br>

            <input v-model="artist.genre" type="radio" id="rock" name="genre" value="Rock" class="btn-check">
            <label class="form-check-label btn" for="rock">Rock</label>

            <input v-model="artist.genre" type="radio" id="pop" name="genre" value="Pop" class="btn-check">
            <label class="form-check-label btn" for="pop">Pop</label>

            <input v-model="artist.genre" type="radio" id="metal" name="genre" value="Metal" class="btn-check">
            <label class="form-check-label btn"  for="metal">Metal</label>

            <input v-model="artist.genre" type="radio" id="dnb" name="genre" value="D 'n B" class="btn-check">
            <label class="form-check-label btn" for="dnb">D'n B</label>

            <input v-model="artist.genre" type="radio" id="rap" name="genre" value="rap" class="btn-check">
            <label class="form-check-label btn" for="rap">Rap</label>
<!--            <input v-model="artist.genre" type="radio" id="rock" name="genre" value="Rock" class="btn-check">-->
<!--            <label class="form-check-label btn" for="rock">Rock</label>-->


            <div class="row mt-2">
                <div class="control-group col-12 text-center">
                    <button type="submit" id="btn-submit" class="col-12 btn btn-success btn-block">
                        Create artist
                    </button>
                </div>
            </div>
        </form>
    </div>


    <div id="center" v-else-if="createPlatenmaatschappij" class="shadow p-3 bg-white rounded">
        <div v-if="errors" class="alert alert-danger" role="alert">
            Please fill in all the questions
        </div>
        <form @submit.prevent="submitPlatenmaatschappij">
            <h1>Maak een platenmaatschappij</h1>
            <input type="text" v-model="platenmaatschappij.naam" class="form-control col-2">
                <button type="submit" id="btn-submit" class="col-12 btn btn-success mt-3 btn-block">
                    Create
                </button>
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
            platenmaatschappij: {
                naam: ""
            },
            artist: {
                naam: "",
                bandleden: "",
                genre: "",
            },
            platenmaatschappijen: [],
            errors: false,
            createPlatenmaatschappij: false,
            createArtist: false,
        };
    },
    mounted() {
        axios.get('/api/platenmaatschappijen')
            .then(response => {
                this.platenmaatschappijen = response.data;
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });
    },
    methods: {
        submitArtist() {
            axios.post('/api/artistinfo/create', this.artist)
                .then(response => {
                    this.errors = false
                    this.artist.naam = "";
                    this.artist.bandleden = "";
                    this.artist.genre = "";
                    this.artist.platenmaatschappij = "";
                })
                .catch(error => {
                    this.errors = true;
                    console.error(error.response.data.message);
                });
        },
        submitPlatenmaatschappij(){
            axios.post('/api/platenmaatschappijen/create', this.platenmaatschappij)
                .then(response => {
                    this.errors = false
                    this.platenmaatschappij.naam = "";
                })
                .catch(error => {
                    this.errors = true;
                    alert("error")
                    console.log(error.response.data.message)
                })
        },
        selectPlatenmaatschappijArtist(selection) {
            this.errors = false
            if (selection === "platenmaatschappij") {
                this.createPlatenmaatschappij = true
                this.createArtist = false
            } else if (selection === "artist") {
                this.createPlatenmaatschappij = false
                this.createArtist = true
            }
        },
    },
};

</script>

<style lang="css">
</style>
