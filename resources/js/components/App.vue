<template>
    <thead>
    <tr>
        <th scope="col">naam</th>
    </tr>
    </thead>

    <tbody>

        <tr v-for="item in items" :key="item.id">
            {{item.id}}
        </tr>
    </tbody>



<!--    <div>-->
<!--        <button class="nav-link text-light" @click="toggleArtistShow">Show Artist</button>-->

<!--        &lt;!&ndash; Include the ArtistShow component and conditionally render it &ndash;&gt;-->
<!--        <artist-show v-if="showArtist"></artist-show>-->
<!--    </div>-->

<!--    <div>-->
<!--        <button class="nav-link text-light" @click="createNewArtist">Maak artiest aan</button>-->

<!--        &lt;!&ndash; Include the ArtistShow component and conditionally render it &ndash;&gt;-->
<!--        <artist-create v-if="artistCreate"></artist-create>-->
<!--    </div>-->

</template>

<script>
import axios from "axios";
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
            items: [],
        };
    },
    mounted() {
        // Use axios.get to assign data to the 'items' variable
        axios.get('/api/artistinfo')
            .then(response => {
                this.items = response.data;
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });
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
