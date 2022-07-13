<template>
  <div>
    <div class="card card-shadow">
      <div class="card-header container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <p class="p-title">បញ្ជើរផលិតផល</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <router-link
              :to="{ path: 'create-products' }"
              class="btn btn-black"
              style="position: absolute; right: 1rem; bottom: 0.5rem"
            >
              បង្កើតទិន្នន័យថ្មី
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ល.រ</th>
            <th scope="col">រូបតំណាំង</th>
            <th scope="col">ឈ្មោះជាខ្មែរ</th>
            <th scope="col">ឈ្មោះជាអង់គ្លេស</th>
            <th scope="col">ស្ថានភាព</th>
            <th scope="col">បានបង្កើតនៅ</th>
            <th scope="col">បានធ្វើបច្ចុប្បន្នភាពនៅ</th>
            <th scope="col">សកម្មភាព</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(data, i) in loadDatas" v-bind:key="data.id">
            <td>{{ ++i }}</td>
            <td><img :src="data.path" class="img-review-100 img-fluid img-thumbnail" /></td>
            <td>{{ data.title_kh }}</td>
            <td>{{ data.title_en }}</td>
            <td>{{ data.status }}</td>
            <td>{{ data.created_at }}</td>
            <td>{{ data.updated_at }}</td>
            <td>
              <router-link
                :to="{ path: '/products/' + data.id }"
                @click.prevent="fetchProduct(data.id)"
                class="btn btn-sm btn-black me-2"
              >
                <i class="bi bi-list"></i>
              </router-link>
              <button
                type="button"
                class="btn btn-sm btn-black"
                @click.prevent="confirmDelete(data.id)"
              >
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapState } from "vuex";
export default {
  computed: {
    loadDatas() {
      return this.$store.state.Product.products;
    },
  },
  created() {
    this.refreshData();
  },
  methods: {
    ...mapActions("Product", ["initProducts", "deleteProduct", "showProduct"]),
    refreshData() {
      this.initProducts();
    },
    fetchProduct(id) {
      this.showProduct(id);
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
            this.deleteProduct(id);
            swal("ជូនដំណឹង!", "ការលុបបានដោយជោគជ័យ!", "success");
            break;
        }
      });
    },
  },
};
</script>