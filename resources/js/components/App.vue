<template>
<nav class="text-center mt-3" >
    <router-link to="../ArtistList" class="btn btn-primary">List</router-link> |
    <router-link to="../ArtistCreate" class="btn btn-primary">Create</router-link>
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
