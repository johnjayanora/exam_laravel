<template>
<div class="header">
        <header  >NCE 2018 PASSERS</header>
        <div id="nav">
            <router-link to="/nce-2018-passers" class="route-link">Passers</router-link> |
            <router-link to="/school-ranking" class="route-link">School Ranking</router-link>
        </div>
        
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>
    .header{
        background-color: darkslategrey;
        padding: 10px;
        color: aliceblue;
        height: 70px;
        text-align: center;           
        
    }
    .route-link{
        padding: 5px;
        text-decoration: none;
        color: aliceblue;

    }
    #nav{
        margin-top: 5px;
    }
</style>