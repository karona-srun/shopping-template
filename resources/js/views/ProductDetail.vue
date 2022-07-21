<template>
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-6 col-sm-12">
        <img :src="loadData.path" class="rounded img-fluid img-min-width"/>

        <div class="row mt-4">
          <div
            class="col-auto"
            v-for="(attachment, i) in loadData.attachments"
            :key="i"
          >
            <img
              :src="attachment.path"
              class="rounded img-review-100"
              @click.prevent="getImagePath(attachment.path)"
              data-toggle="modal"
              data-target="#exampleModal"
            />
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 border-left">
        <p>{{ loadData.title_kh }}</p>
        <i
          class="bi bi-hand-thumbs-up-fill text-black"
          v-for="(like, li) in loadData.rate"
          :key="li"
        ></i>
        <hr />
        <h5>USD ${{ loadData.sale_price }}</h5>
        <p>{{ loadData.content_kh }}</p>
      </div>
    </div>

      <div class="col-md-12">
        <h4>ផលិតផលជាច្រើនទៀត</h4>
      </div>
    <div class="row">
      <div
        class="col-sm-6 col-md-2 mt-3"
        v-for="(data, i) in loadDatas.products"
        :key="i"
      >
          <div class="card" @click.prevent="clickOnProduct(data.id)">
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
      </div>
    </div>

    <div
      class="modal fade bd-example-modal-lg"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title" id="exampleModalLabel">បង្ហាញរូបផលិតផល</p>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img :src="imagePath" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  data() {
    return {
      imagePath: null,
    };
  },
  computed: {
    loadData() {
      return this.$store.state.Home.data;
    },
    loadDatas() {
      return this.$store.state.Home.datas;
    },
  },
  created() {
    this.fetchData(this.$route.params.id);
    this.initDatas();
  },
  methods: {
    ...mapActions("Home", ["initDatas", "fetchData"]),
    getImagePath(str) {
      this.imagePath = str;
    },
    clickOnProduct(id){
      this.fetchData(id);
    }
  },
};
</script>