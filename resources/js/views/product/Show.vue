<template>
  <div>
    <div class="card card-shadow">
      <div class="card-header container-fluid">
        <div class="row">
          <div class="col-auto me-auto">
            <p class="p-title">ព័តមានផលិតផល</p>
          </div>
          <div class="col-auto p-3-2">
            <router-link
              :to="{ path: '/products/' + id + '/edit' }"
              class="btn btn-black me-3"
              style="right: 1rem; bottom: 0.5rem"
            >
              កែសម្រួល
            </router-link>
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
        <div class="card-body" v-for="data in loadData" :key="data.id">
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">រូបតំណាំង៖</p>
            </div>
            <div class="col-10">
              <img
                :src="data.path"
                class="img-review img-fluid img-thumbnail"
              />
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">លេខសំគាល់៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.id }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ប្រភេទផលិត៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.category }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ប្រភេទរងផលិត៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.sub_category }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ឈ្មោះជាខ្មែរ៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.title_kh }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ឈ្មោះជាអង់គ្លេស៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.title_en }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">តម្លៃទិញចូល៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.price }} ($)</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">តម្លៃលក់ចេញ៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.sale_price }} ($)</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ចំនួនឯកតា៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.qty }}</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">អត្រាចំណាត់អារម្មណ៍៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.rate }} ($)</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ប្រមូលសិន៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">{{ data.promote }} ($)</p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ស្ថានភាព៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">
                {{ data.status == 0 ? "បង្ហាញ" : "មិនបង្ហាញ" }}
              </p>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">ពាក្យគន្លឹះ៖</p>
            </div>
            <div class="col-10">
              <p class="fw-bold">
                {{ data.keyword == "" ? data.keyword : "មិនមាន" }}
              </p>
            </div>
          </div>
          <hr />
          <form ref="addAttachment" @submit.prevent="formSubmit" enctype="multipart/form-data">
          <div class="row g-2">
            <div class="col-2 text-end">
              <p class="fw-bold">រូបភាពផលិតផល៖</p>
              
            </div>
            <div class="col-10">
               <input
                    class="btn btn-black"
                    type="file"
                    id="formFile"
                    accept="image/*"
                    @change="onFileChange"
              /><button class="btn btn-black" type="submit">យល់ព្រម</button>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md">
              <div id="preview">
                <img
                  v-if="thumbnail"
                  :src="thumbnail"
                  class="img-fluid img-thumbnail"
                />
              </div>
            </div>
          </div>
          </form>
          <hr>
          <div class="row">
            <div class="col-sm-2" v-for="(data,i) in loadFile" :key="i">
            <div class="card bg-dark text-white mb-4 ">
              <img :src="data.path" class="img-list img-fluid img-thumbnail card-img" alt="...">
              <div class="card-img-overlay">
                <p class="card-title">
                  <button
                    type="button"
                    class="btn btn-sm btn-danger btn-black"
                    @click.prevent="confirmDelete(data.id)"
                  >
                    <i class="bi bi-trash text-white"></i>
                  </button>
                </p>
              </div>
            </div>

              <!-- <img :src="data.path" class="img-list img-fluid img-thumbnail mb-4" />
              <button>f</button> -->
            </div>
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
      id: this.$route.params.id,
      thumbnail: null,
      file: null,
      attr :{
        id: this.$route.params.id,
        type: "product/photos"
      }
    };
  },
  computed: {
    loadData() {
      return this.$store.state.Product.product;
    },
    loadFile() {
      return this.$store.state.Attachment.attachments;
    },
  },
  created() {
    this.load(this.$route.params.id);
  },
  methods: {
    ...mapActions("Product", ["showProduct"]),
    ...mapActions("Attachment", ["initAttachments","addAttachment","deleteAttachment"]),
    load(id) {
      this.showProduct(id);
      this.initAttachments(this.attr);
    },
    formSubmit() {
      var formData = new FormData();
      formData.append('attachment_id',this.$route.params.id);
      formData.append('file', this.file);

      var response = this.addAttachment(formData);
      response.then((resp) => {
        if (resp.success == false) {
          swal({
            title: "ជូនដំណឹង!",
            text: "រូបភាពត្រូវបានបរាជ័យ! សូមប៉ពេញព័តមានអោយបានត្រឹមត្រូវ!",
            icon: "error",
            button: "បាទ/ចា៎",
          });
        } else {
          swal({
            title: "ជូនដំណឹង!",
            text: "រូបភាពត្រូវបានរក្សាទុកដោយជោគជ័យ!",
            icon: "success",
            button: "បាទ/ចា៎",
          });
          this.initAttachments(this.attr);
        }
        this.thumbnail = null;
      })
    },
    onFileChange(e) {
      this.file = e.target.files[0];
      this.thumbnail = URL.createObjectURL(this.file);
    },
    confirmDelete(id) {
      swal("តើលោកអ្នកចង់លុបចោលទិន្នន័យនេះមែនទេ?", {
        buttons: {
          cancel: "បោះបង់!",
          catch: {
            text: "បាទ/ចា៎!",
            value: "catch",
          },
        },
      }).then((value) => {
        switch (value) {
          case "catch":
            this.deleteAttachment(id);
            swal("ជូនដំណឹង!", "ការលុបបានដោយជោគជ័យ!", "success");
            break;
        }
      });
    },
  },
};
</script>