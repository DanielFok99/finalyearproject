<template>
  <TabPanel>
    <supplier-add-new v-model:is-open="modalOpen" v-model:supplier-data="supplier"
                      @modal-close="modalStatus"></supplier-add-new>
    <supplier-delete v-model:is-open="deleteModalOpen" v-model:supplier="supplier"
                     @modal-close="modalStatus"></supplier-delete>

    <div class="flex flex-col sm:flex-row items-center mt-8">
      <!--      <h2 class="text-lg font-medium mr-auto"></h2>-->
      <div class="ml-auto w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2" @click="modalOpen = true">
          <PlusIcon class="w-4 h-4 mr-2"/>
          New Supplier
        </button>
        <button class="btn box mr-2">
          <UploadIcon class="w-4 h-4 mr-2"/>
          Import
        </button>
        <button class="btn box">
          <FileTextIcon class="w-4 h-4 mr-2"/>
          Export
        </button>
      </div>
    </div>

    <div class="box p-5 intro-y mt-5">
      <table class="table table-report -mt-2">
        <thead>
        <tr>
          <th class="whitespace-nowrap">COMPANY NAME</th>
          <th class="text-center whitespace-nowrap">CONTACT NUMBER</th>
          <th class="text-center whitespace-nowrap">EMAIL</th>
          <th class="text-center whitespace-nowrap">ADDRESS</th>
          <th class="text-center whitespace-nowrap">STATUS</th>
          <th class="text-center whitespace-nowrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(supplier , index) in suppliers" :key="index" class="intro-x">
          <td class="w-40">
            <div class="font-medium whitespace-nowrap">
              {{ supplier.company_name }}
            </div>
          </td>
          <td class="w-40"> {{ supplier.contact_number }}</td>
          <td class="w-40"> {{ supplier.email }}</td>
          <td class="w-40"> {{ supplier.address }}</td>
          <td class="w-40">
            <div
                :class="{
                  'text-success': supplier.status === 'activate',
                  'text-danger': supplier.status !== 'activate',
                }"
                class="flex items-center justify-center status"
            >
              <CheckSquareIcon class="w-4 h-4 mr-2"/>
              {{ capitalized(supplier.status) }}
            </div>
          </td>
          <td class="table-report__action w-56">
            <div class="flex justify-center items-center">
              <button class="flex items-center mr-3" @click="editData(index)">
                <CheckSquareIcon class="w-4 h-4 mr-1"/>
                Edit
              </button>
              <button class="flex items-center text-danger" @click="deleteData(index)">
                <Trash2Icon class="w-4 h-4 mr-1"/>
                Delete
              </button>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

  </TabPanel>


</template>

<script setup>
import SupplierAddNew from "./add-new.vue";
import SupplierDelete from "./delete.vue";

import {TabPanel} from "@/global-components/tab";
import {onMounted, ref} from "vue";
import {useApi} from "@/api/useAPI";

const web = useApi('web');
const modalOpen = ref(false)
const deleteModalOpen = ref(false)
const suppliers = ref([]);
const supplier = ref(null);

onMounted(() => {
  getData();

})

const modalStatus = (value) => {
  modalOpen.value = value;
  deleteModalOpen.value = value;
  supplier.value = null;
  getData();
}

const getData = () => {
  web.get('/suppliers').then((response) => {
    suppliers.value = response.data;
  });
}

const editData = (index) => {
  // supplier.value = suppliers.value[index];
  supplier.value = {
    id: suppliers.value[index].id,
    name: suppliers.value[index].company_name,
    contact: suppliers.value[index].contact_number,
    address: suppliers.value[index].address,
    email: suppliers.value[index].email,
    tinNumber: suppliers.value[index].tin_number,
    note: suppliers.value[index].note != null ? suppliers.value[index].note : '',
    status: suppliers.value[index].status,

  }

  console.log(supplier.value);
  modalOpen.value = true;
}

const deleteData = (index) => {
  supplier.value = suppliers.value[index];
  deleteModalOpen.value = true;
}


const capitalized = (word) => {
  return word.charAt(0).toUpperCase()
      + word.slice(1)
};

</script>

<script>
export default {
  name: "supplier-index"
}
</script>

<style scoped>
.status::first-letter {
  text-transform: capitalize;
}
</style>