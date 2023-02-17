<template>
  <v-app>
    <div>
      <v-card class="text-center pa-1">
        <v-card-title class="justify-center display-1 mb-2"
          >Welcome</v-card-title
        >
        <v-card-subtitle>Log in to your account</v-card-subtitle>

        <!-- log in form -->
        <v-card-text>
          <v-form ref="form" v-model="isFormValid" lazy-validation>
            <v-text-field
              v-model="email"
              :rules="[rules.required]"
              :validate-on-blur="false"
              :error="error"
              label="Email"
              name="email"
              outlined
              @keyup.enter="submit"
              @change="resetErrors"
            ></v-text-field>

            <v-text-field
              v-model="password"
              :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
              :rules="[rules.required]"
              :type="showPassword ? 'text' : 'password'"
              :error="error"
              :error-messages="errorMessages"
              label="Password"
              name="password"
              outlined
              @change="resetErrors"
              @keyup.enter="submit"
              @click:append="showPassword = !showPassword"
            ></v-text-field>

            <v-btn
              :loading="isLoading"
              :disabled="isSignInDisabled"
              block
              x-large
              color="primary"
              @click="submit"
              >Log In</v-btn
            >

            <!-- <div class="mt-5">
              <router-link to="/auth/forgot-password">
                Forgot password?
              </router-link>
            </div> -->
          </v-form>
        </v-card-text>
      </v-card>

      <div class="text-center mt-6" v-if="param !== ''">
        Don't have an account?
        <router-link :to="`/register${param}`" class="font-weight-bold">
          Create one here
        </router-link>
      </div>
    </div>
  </v-app>
</template>

<script>
import axios from 'axios';
axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN': window.csrf_token
};
export default {
  data() {
    return {
      param: this.$route.fullPath.slice(6),
      // log in buttons
      isLoading: false,
      isSignInDisabled: false,

      // form
      isFormValid: true,
      email: "",
      password: "",

      // form error
      error: false,
      errorMessages: "",

      // show password field
      showPassword: false,

      // input rules
      rules: {
        required: (value) => (value && Boolean(value)) || "Required",
      },
    };
  },
  methods: {
    submit() {
      if (this.$refs.form.validate()) {
        this.resetErrors();
        this.isLoading = true;
        this.isSignInDisabled = true;
        this.signIn(this.email, this.password);
      }
    },
    signIn(email, password) {
      axios.post(`/api/login${this.param}`, {
        email: email,
        password: password
      })
      .then(response => {
        console.log('response: ', response.data.success)
        this.$router.push('/')
      })
      .catch(error => {
        this.error = true;
        this.errorMessages = "Wrong email or password";
        this.isLoading = false;
        this.isSignInDisabled = false;
      })
    },
    resetErrors() {
      this.error = false;
      this.errorMessages = "";
    },
  },
};
</script>
