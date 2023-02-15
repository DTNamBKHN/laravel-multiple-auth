<template>
  <v-app>
    <div>
      <v-app-bar flat height="80">
        <v-container class="py-0 px-0 px-sm-2 fill-height">
          <!-- <router-link to="/dashboard/analytics" class="d-flex align-center text-decoration-none mr-2">
          <img :src="require('@/assets/images/logo.png')" height="36" />
        </router-link> -->
          <span class="text-uppercase grey--text"
            >Final Project Management</span
          >
          <v-spacer></v-spacer>

          <!-- <div class="d-none d-md-block">
            <v-btn text class="mx-1" to="/auth/signin"> Log In </v-btn>
          </div>

          <v-btn outlined large to="/auth/signup"> Register </v-btn> -->
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary mr-2" dark v-bind="attrs" v-on="on">
                Log in as
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in loginItems" :key="index" router :to="item.route">
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Register as
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in registerItems" :key="index" router :to="item.route">
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-container>
      </v-app-bar>

      <v-main>
        <v-parallax
          height="600"
          dark
          src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
        >
          <v-row align="center" justify="center">
            <v-col class="text-center" cols="12">
              <h1 class="text-h4 font-weight-thin mb-4">
                Final Project Management
              </h1>
              <h4 class="subheading">Get started!</h4>
            </v-col>
          </v-row>
        </v-parallax>

        <v-footer color="transparent">
          <v-container class="py-5">
            <v-row>
              <v-col cols="12" md="12">
                <div class="text-h6 text-lg-h5 font-weight-bold">
                  Contact Information
                </div>
                <div
                  style="width: 80px; height: 2px"
                  class="mb-5 mt-1 primary"
                />
                <div class="d-flex mb-2 font-weight-bold">
                  <v-icon color="primary lighten-1" class="mr-2"
                    >mdi-map-marker-outline</v-icon
                  >
                  1 - Dai Co Viet - Hai Ba Trung - Hanoi
                </div>
                <div class="d-flex mb-2">
                  <v-icon color="primary lighten-1" class="mr-2"
                    >mdi-phone-outline</v-icon
                  >
                  <a href="#" class="text-decoration-none text--primary"
                    >+03 000 23 00 555 55</a
                  >
                </div>
                <div class="d-flex mb-2">
                  <v-icon color="primary lighten-1" class="mr-2"
                    >mdi-email-outline</v-icon
                  >
                  <a href="#" class="text-decoration-none text--primary"
                    >hello@loremcompany.com</a
                  >
                </div>
              </v-col>
            </v-row>
            <v-divider class="my-3"></v-divider>
            <div class="text-center caption">
              © HUST 2023. All Rights Reserved
            </div>
          </v-container>
        </v-footer>
      </v-main>
    </div>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      loginItems: [
        { title: 'Admin', route: '/login' },
        { title: 'Professor', route: '/login/professor' },
        { title: 'Student', route: '/login/student' },
      ],
      registerItems: [
        { title: 'Professor', route: '/register/professor' },
        { title: 'Student', route: '/register/student' },
      ],
    };
  },
};
</script>
