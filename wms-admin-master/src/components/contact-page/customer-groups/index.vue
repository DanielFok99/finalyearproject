<template>

  <TabPanel>
    <customer-group-add-new v-model:group="group" v-model:is-open="modalOpen" @modal-close="modalStatus"></customer-group-add-new>
    <customer-group-delete v-model:is-open="deleteModalOpen" v-model:group="group" @modal-close="modalStatus"></customer-group-delete>

    <div class="flex flex-col sm:flex-row items-center mt-8">
      <!--      <h2 class="text-lg font-medium mr-auto"></h2>-->
      <div class="ml-auto w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
        <button @click="modalOpen = true" class="btn btn-primary shadow-md mr-2">
          <PlusIcon class="w-4 h-4 mr-2"/>
          New Customer Group
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
          <th class="whitespace-nowrap">TITLE</th>
          <th class="whitespace-nowrap">DISCOUNT</th>
          <th class="text-center whitespace-nowrap">DEFAULT</th>
          <th class="text-center whitespace-nowrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(group , index) in customerGroups" :key="index" class="intro-x">
          <td class="w-40">
            <div class="font-medium whitespace-nowrap">
              {{ group.title }}
            </div>
          </td>
          <td class="w-40"> {{ group.discount }}%</td>
          <td class="w-40">
            <div
                class="flex items-center justify-center"
                :class="{
                  'text-success': group.is_default,
                  'text-danger': !group.is_default,
                }"
            >
              <CheckSquareIcon class="w-4 h-4 mr-2"/>
              {{ group.is_default ? "Yes" : "No" }}
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
import {TabPanel} from "@/global-components/tab";
import {onMounted, ref} from "vue";
import CustomerGroupAddNew from "./add-new.vue";
import CustomerGroupDelete from "./delete.vue";
import {useApi} from "@/api/useAPI";

const modalOpen = ref(false)
const deleteModalOpen = ref(false)
const web = useApi('web');

const customerGroups = ref([]);
const group = ref(null);


const modalStatus = (value) => {
  modalOpen.value = value;
  deleteModalOpen.value = value;
  group.value = null;
  getData();
}


onMounted(() => {
  getData();
})

const getData = () => {
  web.get('/customer-groups').then((response) => {
    customerGroups.value = response.data;
  });
}

const editData = (index) => {
  group.value = customerGroups.value[index];
  modalOpen.value = true;
}


const deleteData = (index) => {
  group.value = customerGroups.value[index];
  deleteModalOpen.value = true;
}

</script>

<script>
export default {
  name: "customer-group-index"
}
</script>

<style scoped>

</style>