<template>
    <v-content align-center>
        <v-flex xs3 ma-auto>
            <v-card 
            class="pa-4"
            height=500px
            >
                <v-form >    
                    <h1>Login</h1>
                    <v-text-field
                    label="email"
                    v-model="userForm.email"
                    ></v-text-field>
                    <v-text-field
                    label="password"
                    v-model="userForm.password"
                    ></v-text-field>
                    <v-flex 
                    align-center
                    justify-space-between
                    >
                    <v-btn @click="loginUser">login</v-btn>
                    <v-btn 
                    flat 
                    small
                    to="/registration"
                    >新規登録</v-btn>
                    </v-flex>
                </v-form>
            </v-card>
        </v-flex>
    </v-content>
</template>
<script>
const moduleName = 'auth'
export default {
  data () {
    return {
      userForm: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async loginUser () {
      let res = await this.$axios.post('http://localhost:8888/api/v1/login', this.userForm)
      const mutationName = 'userLogin'
      this.$store.dispatch(`${moduleName}/${mutationName}`, res)
      this.$router.push({
        path: '/main'
      })
    }
  }
}
</script>
