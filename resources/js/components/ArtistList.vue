<template>
    <p>list</p>
    <thead>
    <tr>
        <th scope="col">naam</th>
    </tr>
    </thead>

    <tbody>
<!---->

    <tr v-for="item in items" :key="item.id" >
        <router-link :to="'ArtistShow/' + item.id">
            {{item.naam}}
        </router-link>
    </tr>
    </tbody>

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
