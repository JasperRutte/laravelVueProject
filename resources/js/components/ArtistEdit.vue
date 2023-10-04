<template>
<!--    <p>{{ item.id }}</p>-->
    <br>
    <div v-if="hasLoaded">
<!--        <p>{{artist.id}}</p>-->
        <input :value="artist.id">
    </div>
</template>



<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return {
            hasLoaded: false,
        }
    },
    mounted() {

        console.log(this.$route)

        axios.get(`/api/artistinfo/` + this.$route.params.id +`/edit`)
            .then(response => {
                this.artist = response.data.item;
                console.log(response.data);
                this.hasLoaded = true
            })
            .catch(error => {
                console.error(error);
            });
    }
}


</script>
