<template>
<h1>Maak een artiest aan</h1>

    <form @submit.prevent="submitForm">
        <label for="naam">naam</label>
        <input v-model="artist.naam" type="text" id="naam" class="form-control" name="naam">


<!--        <label for="bandleden">Bandleden</label>-->
<!--        <select v-model="artist.bandleden" name="Bandleden">-->
<!--            <option value="test1">test1</option>-->
<!--            <option value="test2">test2</option>-->
<!--            <option value="test3">test3</option>-->
<!--        </select> <br>-->
        <label for="bandleden">bandleden</label>
        <input v-model="artist.bandleden" type="text" id="naam" class="form-control" name="naam">

<!--        <label for="bandleden">Bandleden</label>-->
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
            }
        };
    },
    methods: {
        submitForm() {
            axios.post('/api/artistinfo/create', this.artist)
                .then(response => {
                    console.log("success")
                    console.log(this.artist)
                    console.log(response.data.message);
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
    },
};

</script>

<style lang="scss" scoped>

</style>
