<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="card col-md-6 col-sm-12">
        <div class="card-body">
          <h5 class="card-title mb-4">បង្កើតគណនីរបស់អ្នក<small>( បំពេញព័ត៍មានរបស់អ្នក )</small> </h5>
          <form ref="signUp">
            <div class="form-floating mb-3">
              <input
                type="email"
                v-model="form.email"
                class="form-control"
                placeholder="name@example.com"
              />
              <label for="floatingInput">អ៊ីម៉ែល</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                v-model="form.password"
                class="form-control"
                placeholder="Password"
              />
              <label for="floatingPassword">ពាក្យសម្ងាត់</label>
            </div>
            <div class="form-floating mt-4">
              <button type="submit" @click.prevent="authenticate()" class="btn btn-black">ចូលប្រើប្រាស់</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import { login } from '../../helpers/auth';

    export default {
        name: 'SignIn',
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                },
                type: 'login',
                error: null,
            }
        },
        methods: {
            authenticate() {
                this.$store.dispatch("LOGIN");

                login(this.$data.form)
                    .then(res => {
                        this.$store.commit("LOGIN_SUCCESS", res);
                        this.$router.push({path: '/dashboard'});
                    })
                    .catch(err => {
                        this.$store.commit("LOGIN_FAILED", {err})
                        swal("ជូនដំណឹង!", this.authError , "error");
                    })
            },
        },
        computed: {
            authError() {
                return this.$store.getters.AUTH_ERROR;
            }
        }
    }
</script>