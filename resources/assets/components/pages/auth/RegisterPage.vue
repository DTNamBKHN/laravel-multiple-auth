<template>
  <div>
    <v-app>
      <v-card class="text-center pa-1">
        <v-card-title class="justify-center display-1 mb-2"
          >Create Account</v-card-title
        >

        <!-- sign up form -->
        <v-card-text>
          <v-form ref="form" v-model="isFormValid" lazy-validation>
            <v-text-field
              v-model="name"
              :rules="[rules.required]"
              :validate-on-blur="false"
              :error="errorName"
              :error-messages="errorNameMessage"
              label="Full name"
              name="name"
              outlined
              @keyup.enter="submit"
              @change="resetErrors"
            ></v-text-field>

            <v-text-field
              v-model="email"
              :rules="[rules.required]"
              :validate-on-blur="false"
              :error="errorEmail"
              :error-messages="errorEmailMessage"
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
              :error="errorPassword"
              :error-messages="errorPasswordMessage"
              label="Password"
              name="password"
              outlined
              @change="resetErrors"
              @keyup.enter="submit"
              @click:append="showPassword = !showPassword"
            ></v-text-field>

            <v-btn
              :loading="isLoading"
              :disabled="isSignUpDisabled"
              block
              x-large
              color="primary"
              @click="submit"
              >Create Account</v-btn
            >
          </v-form>
        </v-card-text>
      </v-card>

      <div class="text-center mt-6">
        Already have an account?
        <router-link to="/auth/signin" class="font-weight-bold">
          Sign In
        </router-link>
      </div>
    </v-app>
  </div>
</template>

<script>
/*
|---------------------------------------------------------------------
| Sign Up Page Component
|---------------------------------------------------------------------
|
| Template for user sign up with external providers buttons
|
*/
export default {
  data() {
    return {
      // sign up buttons
      isLoading: false,
      isSignUpDisabled: false,

      // form
      isFormValid: true,
      email: "",
      password: "",
      name: "",

      // form error
      errorName: false,
      errorEmail: false,
      errorPassword: false,
      errorNameMessage: "",
      errorEmailMessage: "",
      errorPasswordMessage: "",

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
        this.isLoading = true;
        this.isSignUpDisabled = true;
        this.signUp(this.email, this.password);
      }
    },
    signUp(email, password) {},
    resetErrors() {
      this.errorName = false;
      this.errorEmail = false;
      this.errorPassword = false;
      this.errorNameMessage = "";
      this.errorEmailMessage = "";
      this.errorPasswordMessage = "";
    },
  },
};
</script>
