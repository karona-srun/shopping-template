<template>
  <div>
    <header
      class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
    >
      <router-link
        :to="{ path: '/dashboard' }"
        class="navbar-brand col-md-3 col-lg-2 me-0 px-3"
        href="#"
        >Welcome.</router-link
      >
      <button
        class="navbar-toggler position-absolute d-md-none collapsed"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="bi bi-list nav-icon"></i></button
      >` `
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="#" 
                data-toggle="modal"
                data-target=".bd-signout-modal-sm">ចាកចេញ</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav
          id="sidebarMenu"
          class="col-md-3 col-lg-2 d-md-block bg-black sidebar collapse"
        >
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <router-link
                  :to="{ path: '/dashboard' }"
                  class="nav-link active"
                  aria-current="page"
                >
                  <i class="bi bi-house"></i>
                  ផ្ទាំងគ្រប់គ្រង
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  :to="{ path: '/product-categories' }"
                  class="nav-link"
                >
                  <i class="bi bi-shop-window"></i>
                  ប្រភេទផលិត
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  :to="{ path: '/product-sub-categories' }"
                  class="nav-link"
                >
                  <i class="bi bi-shop-window"></i>
                  ប្រភេទរងផលិត
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  :to="{ path: '/products' }"
                  class="nav-link"
                >
                  <i class="bi bi-bag"></i>
                  ផលិតផល
                </router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

            <h6
              class="
                sidebar-heading
                d-flex
                justify-content-between
                align-items-center
                px-3
                mt-4
                mb-1
                text-muted
              "
            >
              <span>Saved reports</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="container-fluid mt-3 mb-5">
            <router-view></router-view>
          </div>
        </main>
      </div>
    </div>

<div
      class="modal fade bd-signout-modal-sm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mySmallModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ផ្ទៀងផ្ទាត់</h5>
            <button
              type="button"
              class="btn btn-black btn-sm close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>តើលោកអ្នកប្រាកដចង់ចាកចេញដែរឬទេ?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-black" data-dismiss="modal">
              បោះបង់
            </button>
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="signOut"
            >
              យល់ព្រម
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>
<script>
export default {
  methods:{
    signOut(){
        alert('Success')
    }
  }
}
</script>