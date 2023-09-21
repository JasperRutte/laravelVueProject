<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark px-3 py-2">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-light text-decoration-underline" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-decoration-underline" href="#">Alle artiesten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-decoration-underline" href="#">Voeg artiest toe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light text-decoration-underline" href="#">Alle platenmaatschappijen</a>
            </li>
            <li class="nav-item" v-if="false" >
                <a class="nav-link text-light text-decoration-underline" href="#">voeg platenmaatschappij toe</a>
            </li>
        </ul>
    </nav>

<!--    <router-view></router-view>-->
<!--        <header>-->
<!--            <div class="px-3 py-2 bg-dark text-white">-->
<!--                <div class="container">-->
<!--                        <ul class="nav ">-->
<!--                            <li>-->
<!--                                <router-link>Alle artiesten</router-link>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <router-link>Voeg artiest toe</router-link>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <router-link>Alle platenmaatschappijen</router-link>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <router-ling>Voeg platenmaatschappij toe</router-ling>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </header>-->
<!--    <p><router-link to->test</router-link></p>-->

<!--        <button type="button" class="btn btn-primary">Primary</button>-->

<!--        <div class="card">-->
<!--            <div class="card-body">-->
<!--                <div class="container-fluid">-->
<!--                    <router-view></router-view>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

</template>

<script>
export default {
    name: 'App'
}
</script>
