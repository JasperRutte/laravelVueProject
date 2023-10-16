<template>
    <br>
    <form v-if="hasLoaded" id="center">
        <div v-if="errors" class="alert alert-danger" role="alert">
            Please fill in all the questions
        </div>

        <input name="naam" v-model="artist.naam"> <br>
        <input name="bandleden" v-model="artist.bandleden">

        <br><label for="genre">Genre:</label><br>

        <input v-model="artist.genre" type="radio" id="rock" name="genre" value="Rock">
        <label for="rock">Rock</label><br>

        <input v-model="artist.genre" type="radio" id="pop" name="genre" value="Pop">
        <label for="pop">Pop</label><br>

        <input v-model="artist.genre" type="radio" id="metal" name="genre" value="Metal">
        <label for="metal">Metal</label><br>

        <input v-model="artist.genre" type="radio" id="dnb" name="genre" value="D 'n B" >
        <label for="dnb">D'n B</label><br>

        <input v-model="artist.genre" type="radio" id="rap" name="genre" value="rap" >
        <label for="rap">Rap</label><br>
    </form>

    <button type="submit" @click="updateForm" class="btn btn-primary">Update</button>
</template>



<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return {
            hasLoaded: false,
            buttonPressed: false,
            errors: false,
        }
    },
    mounted() {

        console.log(this.$route)
        axios.get(`/api/artistinfo/`+this.$route.params.id+`/edit`)
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
        updateForm() {
            axios.put(`/api/artistinfo/${this.$route.params.id}/edit`, this.artist)
                .then(response => {
                    console.log("success");
                    console.log(this.artist);
                    this.buttonPressed = true;
                    this.$router.push('/ArtistList');
                })
                .catch(error => {
                    this.errors = true
                    console.log("failed")
                    console.log(error)
                })
        }
    }
}


</script>

<style>

</style>
