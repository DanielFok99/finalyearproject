<template>
  <TabPanel>
    <customer-add-new v-model:customer-data="customer" v-model:is-open="modalOpen" @modal-close="modalStatus"></customer-add-new>
    <customer-delete v-model:is-open="deleteModalOpen" v-model:customer="customer" @modal-close="modalStatus"></customer-delete>



    <div class="flex flex-col sm:flex-row items-center mt-8">
      <!--      <h2 class="text-lg font-medium mr-auto"></h2>-->
      <div class="ml-auto w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
        <button @click="modalOpen = true" class="btn btn-primary shadow-md mr-2">
          <PlusIcon class="w-4 h-4 mr-2"/>
          New Customer
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
          <th class="whitespace-nowrap">NAME</th>
          <th class="whitespace-nowrap">EMAIL</th>
          <th class="text-center whitespace-nowrap">PHONE NUMBER</th>
          <th class="text-center whitespace-nowrap">CUSTOMER GROUP</th>
          <th class="text-center whitespace-nowrap">STATUS</th>
          <th class="text-center whitespace-nowrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(customer , index) in customers" :key="index" class="intro-x">
          <td class="w-40">
            <div class="font-medium whitespace-nowrap">
              {{ customer.customer_name }}
            </div>
          </td>
          <td class="w-40"> {{ customer.email }}</td>
          <td class="w-40"> {{ customer.customer_contact }}</td>
          <td class="w-40"> {{ customer.customer_group_name }}</td>
          <td class="w-40">
            <div
                class="flex items-center justify-center status"
                :class="{
                  'text-success': customer.status === 'activate',
                  'text-danger': customer.status !== 'activate',
                }"
            >
              <CheckSquareIcon class="w-4 h-4 mr-2"/>
              {{  capitalized(customer.status) }}
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
import CustomerAddNew from "./add-new.vue";
import CustomerDelete from "./delete.vue";

import {TabPanel} from "@/global-components/tab";
import {onMounted, ref} from "vue";
import {useApi} from "@/api/useAPI";

const web = useApi('web');
const modalOpen = ref(false)
const deleteModalOpen = ref(false)
const customers = ref([]);
const customer = ref(null);

onMounted(() => {
  getData();

})

const modalStatus = (value) => {
  modalOpen.value = value;
  deleteModalOpen.value = value;
  customer.value = null;
  getData();
}

const getData = () => {
  web.get('/customers').then((response) => {
    customers.value = response.data;
  });
}

const editData = (index) => {
  customer.value = customers.value[index];
  customer.value = {

    id:  customers.value[index].id,
    name: customers.value[index].customer_name,
    contact: customers.value[index].customer_contact,
    ic: customers.value[index].ic_number,
    email: customers.value[index].email,
    note: customers.value[index].note != null ?  customers.value[index].note : '',
    customerGroup: customers.value[index].customer_group_id.toString(),

  }
  modalOpen.value = true;
}

const deleteData = (index) => {
  customer.value = customers.value[index];
  deleteModalOpen.value = true;
}


const capitalized = (word) => {
  return word.charAt(0).toUpperCase()
      + word.slice(1)
};

</script>

<script>
export default {
  name: "customer-index"
}
</script>

<style scoped>
</style>