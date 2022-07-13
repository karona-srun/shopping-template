<template>
  <div>
    <form ref="editProduct" @submit.prevent="formSubmit" enctype="multipart/form-data">
      <div class="card card-shadow">
        <div class="card-header container-fluid">
          <div class="row">
            <div class="col-auto me-auto">
              <p class="p-title">កែសម្រួលព័តមានផលិតផល</p>
            </div>
            <div class="col-auto p-3-2">
              <button
                class="btn btn-black me-3"
                style="right: 1rem; bottom: 0.5rem"
              >
                រក្សាទិន្នន័យ
              </button>
              <router-link
                :to="{ path: '/products' }"
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
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="product.category_id"
                    :options="loadCategory"
                    placeholder="ជ្រើសរើសប្រភេទផលិតផល"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
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
                    v-model="product.sub_category_id"
                    :options="loadSubCategory"
                    placeholder="ជ្រើសរើសប្រភេទរងផលិតផល"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
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
                    v-model="product.title_kh"
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
                    v-model="product.title_en"
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
                    step="0.01"
                    v-model="product.price"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>តម្លៃទិញចូល ($)</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    v-model="product.promote"
                    min="0"
                    step="0.01"
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
                    v-model="product.rate"
                    :options="rateOptions"
                    placeholder="ជ្រើសរើសការពេញនិយម"
                    key="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    track-by="label"
                  >
                  </Multiselect>
                  <label>ការពេញនិយម</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    min="0"
                    step="0.01"
                    v-model="product.sale_price"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>តម្លៃលក់ចេញ ($)</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input
                    type="number"
                    v-model="product.qty"
                    min="0"
                    class="form-control"
                    id="floatingInputGrid"
                    placeholder="ឈ្មោះផលិតផល"
                  />
                  <label>ចំនួន</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <textarea
                    v-model="product.content_kh"
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
                    v-model="product.content_en"
                    class="form-control"
                    placeholder="Leave a comment here"
                    id="floatingTextarea2"
                    style="height: 100px"
                  ></textarea>
                  <label for="floatingTextarea2">អត្តបទជាអង់គ្គេស</label>
                </div>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input
                    class="form-control"
                    type="file"
                    id="formFile"
                    accept="image/*"
                    @change="onFileChange"
                  />
                  <label for="formFile" class="form-label"
                    >ជ្រើសរើសរូបតំណាង</label
                  >
                </div>
              </div>
              <div class="col-md">
                <div id="preview">
                  <img
                    v-if="product.path"
                    :src="path == '' ? product.path : path"
                    class="img-fluid img-thumbnail"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex";
import Multiselect from "@vueform/multiselect";
export default {
  components: { Multiselect },
  data() {
    return {
      rateOptions: [
        {
          value: 1,
          label: "មិនសូវពេញនិយម",
        },
        {
          value: 2,
          label: "ពេញនិយមតិចៗ",
        },
        {
          value: 3,
          label: "ពេញនិយមបង្គួម",
        },
        {
          value: 4,
          label: "ពេញនិយម",
        },
        {
          value: 5,
          label: "ពេញនិយមខ្លាំង",
        },
      ],
      product: [],
      path: '',
      file: null,
    };
  },
  computed: {
    loadData() {
      return this.$store.state.Product.product;
    },
    loadSubCategory() {
      return this.$store.state.ProductSubCategory.listSubCategories;
    },
    loadCategory() {
      return this.$store.state.ProductCategory.listCategory;
    },
  },
  created() {
    this.refreshData();
  },
  methods: {
    ...mapActions("ProductCategory", ["getListCategory"]),
    ...mapActions("ProductSubCategory", ["getSubCategories"]),
    ...mapActions("Product", ["addProduct","showProduct","updateProduct"]),
    refreshData() {
      this.getListCategory();
      this.getSubCategories();
      var response = this.showProduct(this.$route.params.id);
      response.then((resp) => {
        this.product = resp;
      });
    },
    formSubmit() {
      var fd = new FormData();
      fd.append("id", this.product.id);
      fd.append("category", this.product.category_id);
      fd.append("sub_category", this.product.sub_category_id);
      fd.append("title_kh", this.product.title_kh);
      fd.append("title_en", this.product.title_en);
      fd.append("content_kh", this.product.content_kh);
      fd.append("content_en", this.product.content_en);
      fd.append("price", this.product.price);
      fd.append("sale_price", this.product.sale_price);
      fd.append("qty", this.product.qty);
      fd.append("rate", this.product.rate);
      fd.append("promote", this.product.promote);
      fd.append("file", this.file);

      var response = this.updateProduct(fd);
      
      response.then((resp) => {
        if (resp.success == false) {
          swal({
            title: "ជូនដំណឹង!",
            text: "ផលិតផលត្រូវបានបរាជ័យ! សូមប៉ពេញព័តមានអោយបានត្រឹមត្រូវ!\n\n Errors:"+ JSON.stringify(resp.msg)  ,
            icon: "error",
            button: "បាទ/ចា៎",
          });
        } else {
          swal({
            title: "ជូនដំណឹង!",
            text: "ផលិតផលត្រូវបានរក្សាទុកដោយជោគជ័យ!",
            icon: "success",
            button: "បាទ/ចា៎",
          });
          this.$refs.editProduct.reset(); 
        }
      });    
    },
    onFileChange(e) {
      this.file = e.target.files[0];
      this.path = URL.createObjectURL(this.file);
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>