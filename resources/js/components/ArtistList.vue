<template>
    <nav>
        <br> <button class="btn btn-info ms-4" @click="selectPlatenmaatschappijArtist('artists')">Artists</button> |
        <button class="btn btn-info" @click="selectPlatenmaatschappijArtist('platenmaatschappijen')">Platenmaatschappijen</button>
    </nav>

    <table class="table table-bordered" v-if="loadArtists">
        <thead>
        <tr>
            <th scope="col">naam</th>
            <th scope="col">bandleden</th>
            <th scope="col">genre</th>
            <th scope="col">id</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="artist in artists" :key="artist.id">
            <td><router-link :to="'ArtistShow/' + artist.id">{{artist.naam}}</router-link></td>
            <td>{{artist.bandleden}}</td>
            <td>{{artist.genre}}</td>
            <td>{{artist.id}}</td>
        </tr>
        </tbody>
    </table>



    <table v-else-if="loadPlatenmaatschappijen" class="table table-bordered">
        <thead>
        <tr>
            <th>Platenmaatschappij</th>
            <th>edit/delete</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="platenmaatschappij in platenmaatschappijen" :key="platenmaatschappij">
            <td>{{platenmaatschappij.naam}}</td>
            <td class="btn btn-outline-success col-5" ><router-link :to=""></router-link></td>
            <td class="btn btn-outline-danger col-5">delete</td>

        </tr>
        </tbody>
<!--        <tbody>-->
<!--            <tr v-for="platenmaatschappij in platenmaatschappijen" :key="platenmaatschappij">-->
<!--                <td>{{platenmaatschappij.naam}}</td>-->
<!--                <td class="btn">delete</td>-->
<!--                <td class="btn">Edit</td>-->
<!--            </tr>-->
<!--        </tbody>-->
    </table>

    <router-view></router-view>
</template>

<script>

import axios from "axios";
export default {
    name: 'App',
    data() {
        return {
            artists: [],
            platenmaatschappijen: [],
            loadArtists: false,
            loadPlatenmaatschappijen: false,
        };
    },
    mounted() {
        axios.get('/api/artistinfo')
            .then(response => {
                this.artists = response.data;
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });

        axios.get('/api/platenmaatschappijen')
            .then(response => {
                this.platenmaatschappijen = response.data;
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
