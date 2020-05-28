<template>
  <div id="app">
    <Main />
  </div>
</template>

<script>
import Main from './components/main.vue'

export default {
  name: 'App',
  components: {
    Main
  }
}
</script>

<style>
  html {
    background: #C8DCED;
  }
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
</style>
