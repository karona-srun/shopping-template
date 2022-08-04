<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="card col-md-6 col-sm-12">
        <div class="card-body">
          <h5 class="card-title mb-4">បង្កើតគណនីរបស់អ្នក<small>( បំពេញព័ត៍មានរបស់អ្នក )</small> </h5>
          <form ref="signUp">
            <div class="form-floating mb-3">
              <input
                type="text"
                v-model="form.name"
                class="form-control"
                placeholder="ឈ្មោះ"
              />
              <label for="floatingInput">ឈ្មោះ</label>
            </div>
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
            <div class="form-floating mb-3">
              <input
                type="password"
                v-model="form.password_confirmation"
                class="form-control"
                placeholder="Password"
              />
              <label for="floatingPassword">បញ្ជាក់ពាក្យសម្ងាត់ម្តងទៀត</label>
            </div>
            <div class="form-floating mt-4">
              <button type="submit" @click.prevent="authenticate" class="btn btn-black">ចូលប្រើប្រាស់</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
    import { register } from '../../helpers/auth';

    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                type: 'login',
                error: null,
            }
        },
    methods: {
            authenticate() {
                this.$store.dispatch("REGISTER");

                register(this.form)
                    .then(res => {
                        this.$store.commit("LOGIN_SUCCESS", res);
                        this.$router.push({path: '/signin'});
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
