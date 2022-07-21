<template>
  <div>
    <div
      class="
        d-flex
        justify-content-between
        flex-wrap flex-md-nowrap
        align-items-center
        pt-3
        pb-2
        mb-3
        border-bottom
      "
    >
      <h4>ផ្ទាំងគ្រប់គ្រងព័តមាន</h4>
      <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>
    <div class="row">
      <div class="card me-3" style="width: 18rem">
        <div class="card-body">
          <h5 class="card-title">ប្រភេទផលិតផល</h5> 
          <a href="#" class="btn btn-black mt-2">ចំនួនទិន្នន័យ៖​ {{loadDatas.productCategory}}</a>
        </div>
      </div>
      <div class="card me-3" style="width: 18rem">
        <div class="card-body">
          <h5 class="card-title">ប្រភេទរងផលិតផល</h5>
          <a href="#" class="btn btn-black mt-2">ចំនួនទិន្នន័យ៖​ {{loadDatas.productSubCategory}}</a>
        </div>
      </div>
      <div class="card" style="width: 18rem">
        <div class="card-body">
          <h5 class="card-title">ផលិតផល</h5>
          <a href="#" class="btn btn-black mt-2">ចំនួនទិន្នន័យ៖​ {{loadDatas.product}}</a>
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
      return this.$store.state.Dashboard.datas;
    },
  },
  created() {
    this.initDatas();
  },
  methods: {
    ...mapActions("Dashboard", ["initDatas"]),
  },
};
</script>