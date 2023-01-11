<template>
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Add New Purchase </h2>

    <div class="w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
      <router-link to="/purchase-order">
        <button class="btn btn-primary shadow-md mr-2">
          <ArrowLeftIcon class="w-4 h-4 mr-2"/>
          Back to Order List
        </button>
      </router-link>
    </div>

  </div>


  <!-- BEGIN: Filter -->
  <div class="intro-y box p-5 mt-7 flex flex-col xl:flex-row gap-y-3">
    <div
        class="form-inline flex-1 flex-col xl:flex-row items-start xl:items-center gap-y-2 xl:mr-6"
    >
      <label for="invoice" class="form-label">Product</label>
      <input
          id="invoice"
          type="text"
          class="form-control w-full"
          placeholder="Search product by name or sku code"
      />
    </div>
    <button class="btn btn-primary shadow-md">
      <SearchIcon class="w-4 h-4 mr-2"/>
      Filter
    </button>
  </div>
  <!-- END: Filter -->

  <div class="box grid grid-cols-12 mt-5">


    <!-- BEGIN: Inbox Content -->
    <div class="py-5 inbox col-span-12 xl:col-span-8 2xl:col-span-9">
      <div
          class="px-5 pb-4 grid grid-cols-12 gap-3 sm:gap-6 border-b border-slate-200/60"
      >


        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">

          <!--Product Item-->
          <div @click="test"
              class="file box border-slate-200/60 dark:border-darkmode-400 shadow-none rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">

            <div class="w-3/5 file__icon file__icon--image mx-auto">
              <div class="file__icon--image__preview image-fit">
                <img alt="Rocketman Tailwind HTML Admin Template" src="/src/assets/images/preview-1.jpg" draggable="false" style="pointer-events: none;"/>
              </div>
            </div>


            <p class="block font-medium mt-4 text-center truncate">{{ "Iphone 8" }}</p>
            <div class="text-slate-500 text-xs text-center mt-0.5">
              {{ "RM10.00" }}
            </div>
          </div>
        </div>


        <!--        <div-->
        <!--            v-for="(faker, fakerKey) in $f()"-->
        <!--            :key="fakerKey"-->
        <!--            class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2"-->
        <!--        >-->
        <!--          <div-->
        <!--              class="file box border-slate-200/60 dark:border-darkmode-400 shadow-none rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in"-->
        <!--          >-->
        <!--            <a-->
        <!--                v-if="faker.files[0].type == 'Empty Folder'"-->
        <!--                href=""-->
        <!--                class="w-3/5 file__icon file__icon&#45;&#45;empty-directory mx-auto"-->
        <!--            ></a>-->
        <!--            <a-->
        <!--                v-else-if="faker.files[0].type == 'Folder'"-->
        <!--                href=""-->
        <!--                class="w-3/5 file__icon file__icon&#45;&#45;directory mx-auto"-->
        <!--            ></a>-->
        <!--            <a-->
        <!--                v-else-if="faker.files[0].type == 'Image'"-->
        <!--                href=""-->
        <!--                class="w-3/5 file__icon file__icon&#45;&#45;image mx-auto"-->
        <!--            >-->
        <!--              <div class="file__icon&#45;&#45;image__preview image-fit">-->
        <!--                <img-->
        <!--                    alt="Rocketman Tailwind HTML Admin Template"-->
        <!--                    :src="$_.toLower(faker.files[0]['fileName'])"-->
        <!--                />-->
        <!--              </div>-->
        <!--            </a>-->
        <!--            <a v-else href="" class="w-3/5 file__icon file__icon&#45;&#45;file mx-auto">-->
        <!--              <div class="file__icon__file-name">-->
        <!--                {{ faker.files[0].type }}-->
        <!--              </div>-->
        <!--            </a>-->

        <!--            -->
        <!--            <a href="" class="block font-medium mt-4 text-center truncate">{{-->
        <!--                faker.files[0].fileName.split("/")[-->
        <!--                faker.files[0].fileName.split("/").length - 1-->
        <!--                    ]-->
        <!--              }}</a>-->
        <!--            <div class="text-slate-500 text-xs text-center mt-0.5">-->
        <!--              {{ faker.files[0].size }}-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
      </div>

      <!-- BEGIN: Pagination -->
      <div class="mt-3 mx-1 flex flex-col sm:flex-row items-center text-center sm:text-left text-slate-500">
        <nav class="w-full sm:w-auto sm:mr-auto">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#">
                <ChevronsLeftIcon class="w-4 h-4"/>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <ChevronLeftIcon class="w-4 h-4"/>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">...</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">...</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <ChevronRightIcon class="w-4 h-4"/>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <ChevronsRightIcon class="w-4 h-4"/>
              </a>
            </li>
          </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
          <option>10</option>
          <option>25</option>
          <option>35</option>
          <option>50</option>
        </select>

      </div>
      <!-- END: Pagination -->
    </div>
    <!-- END: Inbox Content -->

    <!-- BEGIN: Inbox Side Menu -->
    <div
        class="col-span-12 xl:col-span-4 2xl:col-span-3 border-b xl:border-l border-slate-200/60 bg-slate-50 dark:bg-darkmode-600 p-5 rounded-l-md"
    >
      <!--      <div>-->
      <!--        <a-->
      <!--            href=""-->
      <!--            class="flex items-center px-3 py-2 rounded-md bg-primary dark:bg-darkmode-800 font-medium text-white"-->
      <!--        >-->
      <!--          <MailIcon class="w-4 h-4 mr-2" /> Inbox-->
      <!--        </a>-->
      <!--        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">-->
      <!--          <StarIcon class="w-4 h-4 mr-2" /> Marked-->
      <!--        </a>-->
      <!--        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">-->
      <!--          <InboxIcon class="w-4 h-4 mr-2" /> Draft-->
      <!--        </a>-->
      <!--        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">-->
      <!--          <SendIcon class="w-4 h-4 mr-2" /> Sent-->
      <!--        </a>-->
      <!--        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">-->
      <!--          <TrashIcon class="w-4 h-4 mr-2" /> Trash-->
      <!--        </a>-->
      <!--      </div>-->
    </div>
    <!-- END: Inbox Side Menu -->
  </div>

  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
      <!-- BEGIN: Form Layout -->
      <div class="intro-y box p-5">

        <!--Supplier Name-->
        <div>
          <label for="supplier-name" class="form-label">Supplier Name</label>

          <TomSelect id="supplier-name" v-model="categories" :options="{
                      placeholder: 'Select supplier',
                    }" class="w-full">
            <option v-for="(supplier, index) in suppliers" :key="index" :value="supplier.id">{{
                supplier.company_name
              }}
            </option>
          </TomSelect>
        </div>

        <!--        &lt;!&ndash;Purchase Order Doc&ndash;&gt;-->
        <!--        <div class="mt-3">-->
        <!--          <label for="crud-form-1" class="form-label">Purchase Order#</label>-->
        <!--          <input-->
        <!--              id="crud-form-1"-->
        <!--              type="text"-->
        <!--              class="form-control w-full"-->
        <!--              placeholder="Input text"-->
        <!--          />-->
        <!--        </div>-->

        <!--Prefer Ship Time-->

        <div class="mt-3">
          <label for="prefer-ship-time" class="form-label">Expected Delivery Date</label>
          <Litepicker
              id="prefer-ship-time"
              v-model="date"
              :options="{
                autoApply: false,
                showWeekNumbers: true,
                dropdowns: {
                  minYear: 1990,
                  maxYear: null,
                  months: true,
                  years: true,
                },
              }"
              class="form-control w-full"
          />
        </div>

        <!--Purchase Note-->
        <div class="mt-3">
          <label>Purchase Note</label>
          <div class="mt-2">
            <ClassicEditor v-model="editorData" :config="editorConfig"/>
          </div>
        </div>
        <div class="text-right mt-5">
          <button type="button" class="btn btn-outline-secondary w-24 mr-1">
            Cancel
          </button>
          <button type="button" class="btn btn-primary w-24">Save</button>
        </div>
      </div>
      <!-- END: Form Layout -->
    </div>
  </div>
</template>

<script>
export default {
  name: "purchase-order-add-new-page"
}
</script>
<script setup>
import {onMounted, ref} from "vue";
import {useApi} from "../../api/useAPI";

const web = useApi('web');
const suppliers = ref([]);
const date = ref("");
const categories = ref("");
const editorConfig = {
  toolbar: {
    items: ["bold", "italic", "link"],
  },
};
const editorData = ref("");

const getData = async () => {
  await web.get('/suppliers').then((response) => {
    suppliers.value = response.data;
  });
}

const test = () => {
  console.log('test');
}

onMounted(() => {
  getData();
})
</script>

<style scoped>

</style>