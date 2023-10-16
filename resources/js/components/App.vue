<template>
    <nav class="navbar navbar-expand navbar-dark bg-light shadow p-3 bg-white">
        <div class="collapse navbar-collapse" id="navbarNav">
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
body {
    background-color: #cbd5e0;
    color: white;
}


a {
    color: black; /* blue colors for links too */
    text-decoration: none; /* no underline */
}

h1 {
    color: black;
    text-align: center
}

label {
    color: black;
}

button {
    margin-bottom: 10px;
    width: 10%;
    padding: 10px;
}

#center {
    margin: auto;
    width: 20%;
    border: 3px solid white;
    background-color: white;
    padding: 10px;
}

</style>
