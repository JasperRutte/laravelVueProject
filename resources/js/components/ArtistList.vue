<template>
    <p>list</p>
    <thead>
    <tr>
        <th scope="col">naam</th>
    </tr>
    </thead>

    <tbody>

    <tr v-for="item in items" :key="item.id">
        {{item.naam}}
    </tr>
    </tbody>
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
        // Use axios.get to assign data to the 'items' variable
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
