<template>
    <div v-if="!artistCreate">
        <!-- Your content for the ArtistShow component goes here -->
        <p>create</p>
    </div>
</template>

<script>
export default {
    name: 'ArtistCreate',
    data() {
        return {
            artistCreate: false,
        };
    },
};

</script>

<style lang="scss" scoped>

</style>
