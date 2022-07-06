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
                class="form-control"
                id="floatingInput"
                placeholder="name@example.com"
              />
              <label for="floatingInput">អ៊ីម៉ែល</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password"
              />
              <label for="floatingPassword">ពាក្យសម្ងាត់</label>
            </div>
            <div class="form-floating mt-4">
              <button type="submit" class="btn btn-black">ចូលប្រើប្រាស់</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>