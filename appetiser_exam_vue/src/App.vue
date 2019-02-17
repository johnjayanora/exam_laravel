<template>
  <div id="app">
    <Header />
    <router-view/>
  </div>
</template>


<script>
import Header from '@/components/layouts/Header.vue'


export default {
  name: "App",
  components:{
    Header
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Nunito:200,600');
@import url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');


#app {
  font-family: Nunito,sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  
}
html, body {
      background-color: #fff;
      color: #636b6f;      
      font-weight: 200;
      height: 100vh;
      margin: 0;
  }

  .full-height {
      height: 100vh;
  }

  .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
  }

  .position-ref {
      position: relative;
  }

  .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
  }

  .content {
      text-align: center;
  }

  .title {
      font-size: 84px;
  }

  .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
  }

  .m-b-md {
      margin-bottom: 30px;
  }
  .pagination{
    justify-content: center!important;
  }
</style>
