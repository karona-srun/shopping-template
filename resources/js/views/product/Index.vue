<template>
  <div>
    <div class="card card-shadow">
      <div class="card-header container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <p class="p-title">បញ្ជើរផលិតផល</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <router-link :to="{ path: 'create-products' }" class="btn btn-black"
              style="position: absolute; right: 1rem; bottom: 0.5rem"
            >
              បង្កើតទិន្នន័យថ្មី
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>