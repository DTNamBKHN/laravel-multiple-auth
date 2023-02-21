<template>
  <nav>
    <v-app-bar app>
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
        class="grey--text"
      ></v-app-bar-nav-icon>
      <v-toolbar-title class="text-uppercase grey--text">
        <span class="font-weight-light">FinalProject</span>
        <span>Management</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn color="primary">
        <span>Log Out</span>
        <v-icon right>mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer app v-model="drawer" class="blue-grey lighten-5">
      <v-list nav dense>
        <v-list-item-group v-model="selectedItem" color="primary">
          <v-list-item v-for="(item, i) in items" :key="i">
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      selectedItem: 0,
      items: [
        { text: 'User list', icon: 'mdi-account' },
        { text: 'Email list', icon: 'mdi-email' },
        { text: 'Graduation projects', icon: 'mdi-folder' },
      ],
    };
  },
};
</script>

<style>
</style>