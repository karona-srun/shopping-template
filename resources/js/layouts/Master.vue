<template>
  <div>
    <div class="container-fluid">
      <header
        class="
          d-flex
          flex-wrap
          align-items-center
          justify-content-center justify-content-md-between
          py-2
        "
      >
        <ul class="nav d-flex align-items-center col-md-4 mb-2 mb-md-0">
          <li><a href="#" class="nav-link px-2 nav-head">ព័ត៍មានថ្មីៗ</a></li>
        </ul>

        <a
          href="/"
          class="
            nav
            col-12 col-md-4
            mb-2
            justify-content-center
            mb-md-0
            text-dark text-decoration-none
          "
        >
          Welcome.
        </a>
        <div class="col-md-4 text-end">
          <router-link class="btn btn-black mx-2" :to="{ name: 'signin' }"
            >ចូលប្រើប្រាស់</router-link
          >
          <router-link class="btn btn-black" :to="{ name: 'signup' }"
            >ចុះឈ្មោះ</router-link
          >
        </div>
      </header>
    </div>

    <div class="bg-black">
      <nav class="navbar navbar-expand-lg navbar-light text-white">
        <button
          class="navbar-toggler py-2"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="bi bi-list nav-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <router-link :to="{ name: 'home' }" class="nav-link"
                >ទំព័រដើម</router-link
              >
            </li>
            <li class="nav-item active">
              <router-link :to="{ name: 'products' }" class="nav-link"
                >ផលិតផល</router-link
              >
            </li>
            <li class="nav-item active">
              <router-link :to="{ name: 'entertainment' }" class="nav-link"
                >កម្សាន្ត</router-link
              >
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'technology' }" class="nav-link"
                >បច្ចេកវិទ្យា</router-link
              >
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'life' }" class="nav-link"
                >ជិវិតនិងសង្គម</router-link
              >
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'contact' }" class="nav-link"
                >ទំនាក់ទំនង</router-link
              >
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container-fluid mt-3 mb-5">
      <router-view></router-view>
    </div>
    <div class="container-fluid">
      <footer class="py-3 my-4">
        <hr />
        <p class="text-center text-muted">© 2022 Template, Inc</p>
      </footer>
    </div>
  </div>
</template>
<script>
export default {};
</script> 