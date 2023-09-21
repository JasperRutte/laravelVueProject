import './bootstrap';

import { createApp } from "vue"
// import Example from "@/components/Example.vue";
import App from "@/components/App.vue";
import Artists from "@/components/Artists.vue";
import ArtistList from "@/components/ArtistList.vue";
import ArtistShow from "@/components/ArtistShow.vue";

const app = createApp({
    components: {
        App,
        Artists,
        ArtistList,
        ArtistShow,
    }
})

app.mount("#app")


