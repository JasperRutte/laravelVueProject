<template>

    <p>{{platenmaatschappij.naam}}</p>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data() {
        return{
            hasLoaded: false,
            platenmaatschappij: {
                naam: ""
            }
        }
    },

    mounted() {

        axios.get(`/api/platenmaatschappijen/` + this.$route.params.id + `/edit`)
            .then(response => {
                this.platenmaatschappij = response.data.item;
                console.log(response.data);
                this.hasLoaded = true

            })
            .catch(error => {
                console.error(error);
            });
    },
}

</script>
