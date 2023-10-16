<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
        <div id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-2">
                    <router-link to="/ArtistList">List</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/ArtistCreate">Create</router-link>
                </li>
            </ul>
        </div>
    </nav>

<nav class="text-center mt-3" >



</nav>

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

<style lang="css">
a {
    color: white; /* blue colors for links too */
    text-decoration: none; /* no underline */
}
</style>
