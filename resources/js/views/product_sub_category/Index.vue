<template>
  <div>
    <div class="card card-shadow">
      <div class="card-header container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <p class="p-title">បញ្ជើរប្រភេទរងក្រុមផលិតផល</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <button
              class="btn btn-black"
              style="position: absolute; right: 1rem; bottom: 0.5rem"
              data-toggle="modal"
              data-target="#exampleModalCenter"
                data-backdrop="static" data-keyboard="false"
            >
              បង្កើតទិន្នន័យថ្មី
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="table-responsive mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ល.រ</th>
            <th scope="col">ឈ្មោះក្រុមផលិតផល</th>
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
            <td class="text-break">{{ data.category_name }}</td>
            <td class="text-break">{{ data.name_kh }}</td>
            <td class="text-break">{{ data.name_en }}</td>
            <td class="text-break">
              <span
                :class="
                  data.status ? 'badge bg-dark' : 'badge bg-light text-dark'
                "
                >{{ data.status ? "អសកម្ម" : "សកម្ម" }}</span
              >
            </td>
            <td>{{ data.created_at }}</td>
            <td>{{ data.updated_at }}</td>
            <td>
              <button
                type="button"
                class="btn btn-sm btn-black btn-modal"
                data-backdrop="static" data-keyboard="false"
                style="margin-right: 10px"
                @click.prevent=""
              >
                <i class="bi bi-eye-fill"></i>
              </button>
              <button
                type="button"
                class="btn btn-sm btn-black btn-modal"
                style="margin-right: 10px"
                @click.prevent="showProductCategory(data.id)"
                data-toggle="modal"
                data-target="#exampleModalCenterEdit"
                data-backdrop="static" data-keyboard="false"
              >
                <i class="bi bi-pen"></i>
              </button>
              <button
                type="button"
                class="btn btn-sm btn-black btn-modal"
                @click.prevent="handleID(data.id)"
                data-toggle="modal"
                data-target=".bd-example-modal-sm"
                data-backdrop="static" data-keyboard="false"
              >
                <i class="bi bi-trash3-fill"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              បង្កើតក្រុមផលិតផល
            </h5>
            <button
              type="button"
              class="btn btn-black btn-sm close"
              @click.prevent="refreshModal"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form ref="signUp">
              <div class="form-floating mb-3">
                <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="add.category_id"
                    :options="loadCategory"
                    placeholder="ជ្រើសរើសប្រភេទផលិតផល"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
                  >
                  </Multiselect>
                <label>ឈ្មោះក្រុម</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="name_kh"
                  v-model="add.name_kh"
                />
                <label for="floatingInput">ឈ្មោះជាខ្មែរ</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="name_en"
                  v-model="add.name_en"
                />
                <label for="floatingPassword">ឈ្មោះជាអង់គ្លេស</label>
              </div>
              <div class="form-floating mb-3">
                <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="add.status"
                    :options="options"
                    placeholder="ជ្រើសរើសស្ថានភាព"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
                  ></Multiselect>
                <label for="floatingPassword">ស្ថានភាព</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="refreshModal"
              data-dismiss="modal"
              data-backdrop="static" data-keyboard="false"
            >
              បោះបង់
            </button>
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="saveProductCategory"
            >
              រក្សាទុក
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="exampleModalCenterEdit"
      tabindex="0"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div
          class="modal-content"
          v-for="data in loadData"
          v-bind:key="data.id"
        >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              កែសម្រួលក្រុមផលិតផល
            </h5>
            <button
              type="button"
              class="btn btn-black btn-sm close"
              @click.prevent="refreshModal"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form ref="signUp">
              <input
                type="hidden"
                class="form-control"
                placeholder="id"
                v-model="data.id"
              />
              <div class="form-floating mb-3">
                <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="data.category_id"
                    :options="loadCategory"
                    placeholder="ជ្រើសរើសប្រភេទផលិតផល"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
                  >
                  </Multiselect>
                <label>ឈ្មោះក្រុម</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="name_kh"
                  v-model="data.name_kh"
                />
                <label for="floatingInput">ឈ្មោះជាខ្មែរ</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="name_en"
                  v-model="data.name_en"
                />
                <label for="floatingPassword">ឈ្មោះជាអង់គ្លេស</label>
              </div>
              <div class="form-floating mb-3">
                <Multiselect
                    class="form-select"
                    mode="single"
                    v-model="data.status"
                    :options="options"
                    placeholder="ជ្រើសរើសស្ថានភាព"
                    track-by="value"
                    label="label"
                    :close-on-select="true"
                    :searchable="false"
                    :object="false"
                  >
                  </Multiselect>
                <label for="floatingPassword">ស្ថានភាព</label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="refreshModal"
              data-dismiss="modal"
              data-backdrop="static" data-keyboard="false"
            >
              បោះបង់
            </button>
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="editProductCategory(data.id)"
            >
              រក្សាទុក
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      class="modal fade bd-example-modal-sm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mySmallModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">ផ្ទៀងផ្ទាត់</h5>
            <button
              type="button"
              class="btn btn-black btn-sm close"
              data-dismiss="modal"
              @click.prevent="refreshModal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>តើលោកអ្នកប្រាកដចង់លុបទិន្នន័យនេះដែរឬទេ?</h5>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="refreshModal"
              data-dismiss="modal"
            >
              បោះបង់
            </button>
            <button
              type="button"
              class="btn btn-black"
              @click.prevent="submitDeleteCategories"
            >
              យល់ព្រម
            </button>
          </div>
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
      ID: null,
      add: {
        category_id: 1,
        name_kh: null,
        name_en: null,
        status: 0,
      },
      options:[{
        value:0,
        label:"សកម្ម"
      },{
        value:1,
        label:"អសកម្ម"
      }]
    };
  },
  computed: {
    loadDatas() {
      return this.$store.state.ProductSubCategory.subCategories;
    },
    loadCategory() {
      return this.$store.state.ProductCategory.listCategory;
    },
    loadData() {
      return this.$store.state.ProductSubCategory.subCategory;
    },
  },
  created() {
    this.refreshData();
  },
  methods: {
    ...mapActions("ProductCategory", ["getListCategory"]),
    ...mapActions("ProductSubCategory", [
      "initSubCategories",
      "addSubCategories",
      "showSubCategory",
      "updateSubCategories",
      "deleteSubCategories",
    ]),
    handleID(id) {
      this.ID = id;
    },
    saveProductCategory() {
      this.addSubCategories(this.add);
      this.refreshData();
      this.refreshModal();
    },
    showProductCategory(id) {
      this.showSubCategory(id);
      this.ID = id;
    },
    editProductCategory() {
      this.updateSubCategories(this.loadData);
      this.refreshData();
      this.refreshModal();
    },
    submitDeleteCategories() {
      this.deleteSubCategories(this.ID);
      this.refreshData();
      this.refreshModal();
    },
    refreshData() {
      this.initSubCategories();
      this.getListCategory();
    },

    refreshModal() {
      window.location.reload();
    },
  },
};
</script>