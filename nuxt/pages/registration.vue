<template>
    <v-content align-center>
        <v-flex xs3 ma-auto>
            <v-card 
            class="pa-4"
            height=500px
            >
                <v-form >    
                    <h1>新規登録</h1>
                    <v-text-field
                    label="name"
                    v-model="userForm.name"
                    ></v-text-field>
                    <v-text-field
                    label="email"
                    v-model="userForm.email"
                    ></v-text-field>
                    <v-text-field
                    label="password"
                    v-model="userForm.password"
                    ></v-text-field>
                    <v-text-field
                    label="confirm password"
                    v-model="userForm.password_confirmation"
                    ></v-text-field>
                    <v-btn @click="registerUser">新規登録</v-btn>
                </v-form>
            </v-card>
        </v-flex>
    </v-content>
</template>
<script>
export default {
  data () {
    return {
      userForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }
    }
  },
  methods: {
    async registerUser () {
      await this.$axios.post('http://localhost:8888/api/v1/register', this.userForm)
      this.$axios.post('http://localhost:8888/api/v1/login', this.userForm)
      this.$router.push({
        path: '/'
      })
    }
  }
}
</script>
