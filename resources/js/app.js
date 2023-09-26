import './bootstrap';

import { createApp } from "vue"
import { createRouter, createWebHistory } from "vue-router";

import App from "@/components/App.vue";
import ArtistList from "@/components/ArtistList.vue";
import ArtistShow from "@/components/ArtistShow.vue";


const routes = [
    {
        path: "/ArtistList",
        component: ArtistList
    },
    {
        path: "/ArtistShow",
        component: ArtistShow
    }

];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({
    components: {
        App,
        ArtistList,
        ArtistShow,
    }
})

// Use the router in your Vue app
app.use(router);

app.mount("#app");

