<template>


</template>

<script>
import axios from "axios";

axios.get('/api//artistinfo/{artist}')
export default {

    name: 'ArtistShow',
    data() {
        return {
            showArtist: false,
        };
    },
};


</script>
