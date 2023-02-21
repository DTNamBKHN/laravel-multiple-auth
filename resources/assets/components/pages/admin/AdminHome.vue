<template>
  <v-app class="grey lighten-4">
    <Navbar />

    <v-main>
      <router-view></router-view>
    </v-main>
    
  </v-app>
</template>

<script>
import Navbar from './Navbar.vue'

export default {
  components: { Navbar },
  name: 'App',
  data () {
    return {
      
    }
  }
}
</script>

<style>

</style>