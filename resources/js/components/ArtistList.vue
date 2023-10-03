<template>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">naam</th>
                <th scope="col">bandleden</th>
                <th scope="col">genre</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="item in items" :key="item.id">
                <td><router-link :to="'ArtistShow/' + item.id">{{item.naam}}</router-link></td>
                <td>{{item.bandleden}}</td>
                <td>{{item.genre}}</td>
            </tr>
        </tbody>
    </table>

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
