<template>

    <nav>
        <br> <button class="btn btn-secondary mx-2" @click="selectPlatenmaatschappijArtist('artists')">Artists</button>
        <button class="btn btn-secondary" @click="selectPlatenmaatschappijArtist('platenmaatschappijen')">Platenmaatschappijen</button>
    </nav>
    <div>
        <table id="center" v-if="loadArtists" class="table table-dark">
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

        <table id="center" v-if="loadPlatenmaatschappijen" class="table table-dark">
            <thead>
            <tr>
                <th scope="col">naam</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="platenmaatschappij in platenmaatschappijen" :key="platenmaatschappij">
                <td><router-link :to="'PlatenmaatschappijEdit/' + platenmaatschappij.id">{{ platenmaatschappij.naam }}</router-link></td>
            </tr>
            </tbody>
        </table>
    </div>

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
        removeArtist() {

            axios.delete(`/api/platenmaatschappijen/${this.$route.params.id}`)
                .then(response => {
                    console.log("success");
                    this.$router.push("/ArtistList");
                })
                .catch(error => {
                    console.log("failed");
                    console.error(error);
                })

        }

    }

};
</script>

<style lang="css">
    #center {
        margin: auto;
        width: 50%;
        border: 3px solid darkgrey;
        padding: 10px;
    }
</style>
