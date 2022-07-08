<template>
  <div>
    <div class="card card-shadow">
      <div class="card-header container-fluid">
        <div class="row">
          <div class="col-auto me-auto">
            <p class="p-title">បង្កើតផលិតផល</p>
          </div>
          <div class="col-auto p-3-2">
            <button
              class="btn btn-black me-3"
              style="right: 1rem; bottom: 0.5rem"
              @click.prevent="saveProduct"
            >
              រក្សាទិន្នន័យ
            </button>
            <router-link
              :to="{ path: 'products' }"
              class="btn btn-black"
              style="right: 1rem; bottom: 0.5rem"
            >
              ត្រឡប់ក្រោយ
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-4">
            ផលិតផល<small>( បំពេញព័ត៍មានរបស់អ្នក )</small>
            {{datas}}
          </p>
          <form ref="signUp">
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="datas.category"
                    :options="loadCategory.map(category => category.name_kh)"
                    placeholder="ជ្រើសរើសប្រភេទផលិតផល"
                    key="id"
                    label="name_kh"
                    :close-on-select="true"
                    :searchable="false"
                    :track-by="id"
                    :object="true"
                    :resolve-on-load="false"
                    :delay="0"
                    :min-chars="1"
                  >
                  </Multiselect>
                  <label>ឈ្មោះប្រភេទផលិតផល</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="datas.subCategory"
                    :options="loadSubCategory.map(subCategory => subCategory.name_kh)"
                    placeholder="ជ្រើសរើសប្រភេទរងផលិតផល"
                    key="id"
                    label="name_kh"
                    :close-on-select="true"
                    :searchable="false"
                    track-by="name_kh"
                    :object="true"
                    :resolve-on-load="false"
                    :delay="0"
                    :min-chars="1"
                  >
                  </Multiselect>
                  <label>ឈ្មោះប្រភេទរងផលិតផល</label>
                </div>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="text"
                    v-model="datas.name_kh"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>ឈ្មោះជាខ្មែរ</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="text"
                    v-model="datas.name_en"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="Product Name"
                  />
                  <label>ឈ្មោះជាអង់គ្លេស</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    min="0"
                    v-model="datas.price"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>តម្លៃលក់ ($)</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    v-model="datas.promote"
                    min="0"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>ប្រមូលសិន ($)</label>
                </div>
              </div>

              <div class="col-md">
                <div class="form-floating">
                  <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="datas.rate"
                    :options="rateOptions.map(rate => rate.name)"
                    placeholder="ជ្រើសរើសការពេញនិយម"
                    key="id"
                    label="name"
                    :close-on-select="true"
                    :searchable="false"
                    track-by="name"
                    :object="true"
                    :resolve-on-load="false"
                    :delay="0"
                    :min-chars="1"
                  >
                  </Multiselect>
                  <label>ការពេញនិយម</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <textarea
                  v-model="datas.content_kh"
                    class="form-control"
                    placeholder="Leave a comment here"
                    id="floatingTextarea1"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea1">អត្តបទជាខ្មែរ</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <textarea
                  v-model="datas.content_en"
                    class="form-control"
                    placeholder="Leave a comment here"
                    id="floatingTextarea2"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea2">អត្តបទជាអង់គ្គេស</label>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex";
import Multiselect from "@vueform/multiselect";
export default {
  components: { Multiselect },
  data() {
    return {
      rateOptions: [{
        "id":1,
        "name":"មិនសូវពេញនិយម"
      },{
        "id":2,
        "name":"ពេញនិយមតិចៗ"
      },{
        "id":3,
        "name":"ពេញនិយមបង្គួម"
      },{
        "id":4,
        "name":"ពេញនិយម"
      },{
        "id":5,
        "name":"ពេញនិយមខ្លាំង"
      }],
      datas: {
        category: '',
        subCategory: '', 
        rate: '',
        price: 0,
        promote: 0,
        name_kh: null,
        name_en: null,
        status: 0,
        content_kh: null,
        content_en: null
      },
    };
  },
  computed: {
    loadSubCategory() {
      return this.$store.state.ProductSubCategory.subCategories;
    },
    loadCategory() {
      return this.$store.state.ProductCategory.categories;
    },
  },
  created() {
    this.refreshData();
  },
  methods: {
    ...mapActions("ProductCategory", ["initCategories"]),
    ...mapActions("ProductSubCategory", ["initSubCategories"]),
    ...mapActions("Product", ["addProduct"]),
    refreshData() {
      this.initSubCategories();
      this.initCategories();
    },
    saveProduct(){
      console.log( JSON.parse(datas) );
    }
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>