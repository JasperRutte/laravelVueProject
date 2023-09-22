<template>

<!--    <nav class="navbar navbar-expand-lg navbar-light bg-dark px-3 py-2">-->
<!--        <ul class="navbar-nav">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link text-light text-decoration-underline" href="#">Home</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link text-light text-decoration-underline" href="#">Alle artiesten</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link text-light text-decoration-underline" href="#">Voeg artiest toe</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link text-light text-decoration-underline" href="#">Alle platenmaatschappijen</a>-->
<!--            </li>-->
<!--            <li class="nav-item" v-if="false" >-->
<!--                <a class="nav-link text-light text-decoration-underline" href="#">voeg platenmaatschappij toe</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->

    <div>
        <button class="nav-link text-light" @click="toggleArtistShow">Show Artist</button>

        <!-- Include the ArtistShow component and conditionally render it -->
        <artist-show v-if="showArtist"></artist-show>
    </div>

    <div>
        <button class="nav-link text-light" @click="createNewArtist">Maak artiest aan</button>

        <!-- Include the ArtistShow component and conditionally render it -->
        <artist-create v-if="artistCreate"></artist-create>
    </div>

</template>

<script>
import ArtistShow from './ArtistShow.vue';
import ArtistCreate from "./ArtistCreate.vue";
export default {
    name: 'App',
    components: {
        'artist-show': ArtistShow,
        'artist-create': ArtistCreate,
    },
    data() {
        return {
            showArtist: false,
            artistCreate: false,
        };
    },
    methods: {
        toggleArtistShow() {
            this.showArtist = !this.showArtist;
        },
        createNewArtist() {
            this.artistCreate = !this.artistCreate;
        }
    },
};
//     data(){
//
//     },
//
//     methods: {
//         toggleArtistShow(){
//
//         }
//     },
//
// }

</script>
