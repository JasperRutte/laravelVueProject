<template>
    <div class="col-md-12 text-center">
        <button class="btn btn-light me-1" @click="selectPlatenmaatschappijArtist('artists')">Artists</button>
        <button class="btn btn-light" @click="selectPlatenmaatschappijArtist('platenmaatschappijen')">Platenmaatschappijen</button>
    </div>

    <table id="center" v-if="loadArtists" class="table">
            <thead>
            <tr>
                <th scope="col">naam</th>
                <th scope="col">bandleden</th>
                <th scope="col">genre</th>
                <th scope="col">platenmaatschappij</th>
                <th scope="col">id</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="artist in artists" :key="artist.id">
                <td><router-link :to="'ArtistShow/' + artist.id">{{artist.naam}}</router-link></td>
                <td>{{artist.bandleden}}</td>
                <td>{{artist.genre}}</td>
                <td>{{platenmaatschappijen[artist.platenmaatschappij_id-1].naam}}</td>
                <td>{{artist.id}}</td>
            </tr>
            </tbody>
        </table>

        <table id="center" v-if="loadPlatenmaatschappijen" class="table ">
            <thead>
            <tr>
                <th scope="col">naam</th>
                <th scope="col">id</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="platenmaatschappij in platenmaatschappijen" :key="platenmaatschappij">
                <td><router-link :to="'PlatenmaatschappijEdit/' + platenmaatschappij.id">{{ platenmaatschappij.naam }}</router-link></td>
                <td>{{platenmaatschappij.id}}</td>
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

</style>
