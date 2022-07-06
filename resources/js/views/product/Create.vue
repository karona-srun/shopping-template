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
          </p>
          <form ref="signUp">
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <select
                    onselect=""
                    class="form-select form-select-custom"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  v-model="data.category_id">
                    <option value="0">ជ្រើសរើសប្រភេទផលិតផល</option>
                    <option v-for="category in loadCategory" v-bind:key="category.id" :value="category.id" selected>{{ category.name_kh }}</option>
                  </select>
                  <label >ឈ្មោះប្រភេទផលិតផល</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <select
                    onselect=""
                    class="form-select form-select-custom"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  v-model="data.sub_category_id">
                    <option value="0">ជ្រើសរើសប្រភេទផលិតផល</option>
                    <option v-for="category in loadSubCategory" v-bind:key="category.id" :value="category.id" selected>{{ category.name_kh }}</option>
                  </select>
                  <label >ឈ្មោះប្រភេទរងផលិតផល</label>
                </div>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label >ឈ្មោះជាខ្មែរ</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="Product Name"
                  />
                  <label >ឈ្មោះជាអង់គ្លេស</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    min="0"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label >តម្លៃលក់ ($)</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    min="0"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label >ប្រមូលសិន ($)</label>
                </div>
              </div>
              
              <div class="col-md">
                <div class="form-floating">
                <select
                    onselect=""
                    class="form-select form-select-custom"
                    id="floatingSelect"
                    aria-label="Floating label select example"
                  >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <label>ការចូលចិត្ត</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                 <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 100px"></textarea>
  <label for="floatingTextarea1">អត្តបទជាខ្មែរ</label>
</div>
              </div>
              <div class="col-md">
                <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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
export default {
  data() {
    return {
      ID: null,
      data: {
        category_id: 0,
        sub_category_id: 0,
        name_kh: null,
        name_en: null,
        status: 0,
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
    refreshData() {
      this.initSubCategories();
      this.initCategories();
    },
  },
};
</script>