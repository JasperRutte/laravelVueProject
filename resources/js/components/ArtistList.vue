<template>
    <br> <button class="btn btn-primary" @click="selectPlatenmaatschappijArtist('artists')">Artists</button>
    <br> <button class="btn btn-primary" @click="selectPlatenmaatschappijArtist('platenmaatschappijen')">Platenmaatschappijen</button>

    <table class="table" v-if="loadArtists">
        <thead class="thead-dark">
        <tr>
            <th scope="col">naam</th>
            <th scope="col">bandleden</th>
            <th scope="col">genre</th>
            <th scope="col">id</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="item in items" :key="item.id">
            <td><router-link :to="'ArtistShow/' + item.id">{{item.naam}}</router-link></td>
            <td>{{item.bandleden}}</td>
            <td>{{item.genre}}</td>
            <td>{{item.id}}</td>
        </tr>
        </tbody>
    </table>



    <table v-else-if="loadPlatenmaatschappijen">
        <p>dwadaw</p>
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
            loadArtists: false,
            loadPlatenmaatschappijen: false,
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
        axios.get('/api/artistinfo')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });
    },
    methods: {
        selectPlatenmaatschappijArtist(selection) {
            if (selection === "platenmaatschappijen") {
                this.loadPlatenmaatschappijen = true
                this.loadArtists = false
            } else if (selection === "artists") {
                this.loadPlatenmaatschappijen = false
                this.loadArtists = true
            }
        },
    }

};
</script>
