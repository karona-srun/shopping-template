<template>
  <div>
    <div class="alert alert-black" role="alert">
      <h4 class="alert-heading">ទំព័រដើម!</h4>
      <p>
        Aww yeah, you successfully read this important alert message. This
        example text is going to run a bit longer so that you can see how
        spacing within an alert works with this kind of content.
      </p>
      <hr />
      <p class="mb-0">
        Whenever you need to, be sure to use margin utilities to keep things
        nice and tidy.
      </p>
    </div>
    <div class="container">
      <h5>បញ្ជើរប្រភេទក្រុមផលិតផល</h5>
      <div v-for="(data, i) in loadDatas.productCategory" :key="i">
        <button class="btn btn-black mb-1">{{ data.name_kh }}</button>
      </div>
      <h5>បញ្ជើរប្រភេទរងក្រុមផលិតផល</h5>
      <div v-for="(data, i) in loadDatas.productSubCategory" :key="i">
        <button class="btn btn-black mb-1">{{ data.name_kh }}</button>
      </div>
      <div class="row">
        <div
          class="col-sm-6 col-md-2 mt-3"
          v-for="(data, i) in loadDatas.products"
          :key="i"
        >
        <router-link :to="{ path: '/products-detail/' + data.id }">
          <div class="card">
            <img class="card-img-top" :src="data.path" alt="Card image cap" />
            <div class="card-img-overlay">
              <span class="card-title bg-warning text-black p-1 rounded">
                {{ data.sale_price }} $
              </span>
            </div>
            <div class="card-body">
              <h6 class="card-title text-black">{{ data.title_kh }}</h6>
              <h6 class="card-title">
                <i
                  class="bi bi-hand-thumbs-up-fill text-black"
                  v-for="(like, li) in data.rate"
                  :key="li"
                ></i>
              </h6>
            </div>
          </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  computed: {
    loadDatas() {
      return this.$store.state.Home.datas;
    },
  },
  created() {
    this.initDatas();
  },
  methods: {
    ...mapActions("Home", ["initDatas"]),
  },
};
</script>