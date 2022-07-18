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
      <div class="row">
        <div class="col-md-3">
          <div class="alert alert-black">
            <p><i class="bi bi-list"></i> បញ្ជើរប្រភេទក្រុមផលិតផល</p>
            <p class="btn text-white mb-1 category-active" @click.prevent="fetchProductbyCategory()">ផលិតផលទាំងអស់</p>
            <div v-for="(data, i) in loadDatas.productCategory" :key="i" >
            <p class="btn text-white mb-1 category-active" @click.prevent="fetchProductbyCategory(data.id)">
              {{data.name_kh}}
            </p>
            <div class="collapse show mb-1" v-for="(sub,i) in data.subcategory" :key="i">
              <p class="btn text-white mb-1" @click.prevent="ProductbySubCategory(sub.id)">{{ sub.name_kh }}</p>
            </div>
            </div>
          </div>
        </div>
        <div
          class="col-sm-9 col-md-2 mt-3"
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
                <h6 class="card-title text-black">
                  {{ data.title_kh.substring(0, 50) }}
                </h6>
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
        <div class="col-md-9 border-dashed text-center" v-if="loadDatas.products == ''">
          <h5 class="mt-4">មិនមានផលិតផលទេ</h5>
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
    ...mapActions("Home", ["initDatas","fetchDataByCategory","fetchProductbySubCategory"]),
    fetchProductbyCategory(categoryID){
      if(categoryID)
        this.fetchDataByCategory(categoryID);
      else
        this.initDatas();
    },
    ProductbySubCategory(subCategoryID){
      if(subCategoryID)
        this.fetchProductbySubCategory(subCategoryID);
      else
        this.initDatas();
    }
  },
};
</script>