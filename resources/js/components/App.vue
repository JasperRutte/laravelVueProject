<template>

    <router-link to="ArtistList">list</router-link> <br>
    <router-link to="ArtistShow">Show</router-link> <br>
    <router-link to="ArtistCreate">Create</router-link>
    <router-view></router-view>

</template>

<script>

import axios from "axios";
export default {
    name: 'App',

    data() {
        return {
            items: [],
        };
    },
    mounted() {
        // Use axios.get to assign data to the 'items' variable
        axios.get('/api/artistinfo')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });
    },

};


</script>
