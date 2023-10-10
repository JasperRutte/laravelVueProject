<template>
    <p>{{artist.naam}}</p>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    artist: "",

    mounted() {

        console.log(this.$route)
        // artistinfo/{artist}/edit
        axios.get(`/api/platenmaatschappijen/`+this.$route.params.id+`/edit`)
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

    }
}

</script>
