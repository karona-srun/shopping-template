<template>
  <div>
    <form ref="createProduct" @submit.prevent="formSubmit" enctype="multipart/form-data">
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
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="datas.category"
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
                    v-model="datas.sub_category"
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
                    v-model="datas.title_kh"
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
                    v-model="datas.title_en"
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
                    v-model="datas.price"
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
                    v-model="datas.promote"
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
                    v-model="datas.rate"
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
                    v-model="datas.sale_price"
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
                    v-model="datas.qty"
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
                    v-if="datas.thumbnail"
                    :src="datas.thumbnail"
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
      datas: {
        category: "",
        sub_category: "",
        thumbnail: '',
        rate: "",
        price: 0,
        sale_price: 0,
        qty: 0,
        promote: 0,
        title_kh: '',
        title_en: '',
        status: 0,
        content_kh: '',
        content_en: '',
      },
      file: null,
    };
  },
  computed: {
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
    ...mapActions("Product", ["addProduct"]),
    refreshData() {
      this.getListCategory();
      this.getSubCategories();
    },
    formSubmit() {
      let formData = new FormData();
      formData.append("category", this.datas.category);
      formData.append("sub_category", this.datas.sub_category);
      formData.append("title_kh", this.datas.title_kh);
      formData.append("title_en", this.datas.title_en);
      formData.append("content_kh", this.datas.content_kh);
      formData.append("content_en", this.datas.content_en);
      formData.append("price", this.datas.price);
      formData.append("sale_price", this.datas.sale_price);
      formData.append("qty", this.datas.qty);
      formData.append("rate", this.datas.rate);
      formData.append("promote", this.datas.promote);
      formData.append("file", this.file);

      var response = this.addProduct(formData);
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
          this.$refs.createProduct.reset();
        }
      });
    },
    onFileChange(e) {
      let file = e.target.files[0];
      this.datas.thumbnail = URL.createObjectURL(file);
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>