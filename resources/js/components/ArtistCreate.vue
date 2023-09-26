<template>
<h1>Maak een artiest aan</h1>
    <label for="naam"></label>
    <input type="text" id="title" class="form-control" name="naam">
<form action="" method="POST">

    <label for="platenmaatschappij">Platenmaatschappij</label>
    <select name="platenmaatschappij">
        <option value="test1">test1</option>
        <option value="test2">test2</option>
        <option value="test3">test3</option>
    </select> <br>

    <label for="bandleden">Bandleden</label>
    <label for="genre">Genre:</label><br>

    <input type="radio" id="rock" name="genre" value="Rock" >
    <label for="rock">Rock</label><br>

    <input type="radio" id="pop" name="genre" value="Pop">
    <label for="pop">Pop</label><br>

    <input type="radio" id="metal" name="genre" value="Metal">
    <label for="metal">Metal</label><br>

    <input type="radio" id="dnb" name="genre" value="D 'n B" >
    <label for="dnb">D'n B</label><br>

    <input type="radio" id="rap" name="genre" value="rap" >
    <label for="dnb">Rap</label><br>

    <div class="row mt-2">
        <div class="control-group col-12 text-center">
            <button id="btn-submit" class="col-8 btn btn-success">
                Create artist
            </button>
        </div>
    </div>
</form>

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
