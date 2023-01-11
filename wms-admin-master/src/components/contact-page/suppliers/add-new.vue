<template>
  <Notification
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row"
      refKey="basicNonStickyNotification">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal :show="isOpen" backdrop="static" size="modal-xl" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">
          {{ supplierData == null ? "Add New Supplier" : "Edit Supplier" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label" for="name">Company Name</label>
          <input id="name" v-model.trim="supplier.name" class="form-control" name="name" type="text"/>
          <template v-if="validate.name.$error">
            <div v-for="(error, index) in validate.name.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label" for="email">Company Email</label>
          <input id="email" v-model.trim="supplier.email" class="form-control" name="email" type="email"/>
          <template v-if="validate.email.$error">
            <div v-for="(error, index) in validate.email.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label" for="contact">Company Contact Number</label>
          <input id="contact" v-model.trim="supplier.contact" class="form-control" name="contact" type="tel"/>

          <template v-if="validate.contact.$error">
            <div v-for="(error, index) in validate.contact.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label" for="address">Company Address</label>
          <input id="address" v-model.trim="supplier.address" class="form-control" name="address"
                 type="text"/>
          <template v-if="validate.address.$error">
            <div v-for="(error, index) in validate.address.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label" for="tin">TIN Number</label>
          <input id="tin" v-model.trim="supplier.tinNumber" class="form-control" name="tin"
                 type="text"/>
        </div>

        <div v-if="supplierData !== null" class="col-span-12 sm:col-span-6">
          <label class="form-label">Status</label>
          <TomSelect v-model="supplier.status" :options="{
                      placeholder: 'Select Customer Status',
                    }" class="w-full">
            <option value="activate">Activate</option>
            <option value="pending">Pending</option>
          </TomSelect>
        </div>

        <div class="col-span-12 sm:col-span-12">
          <label class="form-label" for="note">Note</label>
          <ClassicEditor v-model="supplier.note" :config="editorConfig"/>
        </div>


      </ModalBody>
      <ModalFooter>
        <button class="btn btn-outline-secondary w-20 mr-1" type="button" @click="closeModal">
          Cancel
        </button>
        <button class="btn btn-primary w-20" type="submit">
          {{ supplierData == null ? "Create" : "Edit" }}
        </button>
      </ModalFooter>
    </form>
  </Modal>
</template>

<script setup>
import {Modal, ModalBody, ModalFooter, ModalHeader} from '../../../global-components/modal/index';
import {onMounted, onUpdated, provide, reactive, ref, toRefs} from "vue";
import {email, required} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import {useApi} from "@/api/useAPI";

const responseMessage = ref('');
const web = useApi('web');
const editorConfig = {
  toolbar: {
    items: ["bold", "italic", "link"],
  },
};
const dropzoneConfig = ref({
  url: 'https://httpbin.org/post',
  thumbnailWidth: 150,
  maxFilesize: 0.5,
  acceptedFiles: 'image/jpeg|image/png|image/jpg',
  headers: {'My-Awesome-Header': 'header value'},
})
const props = defineProps([
  'supplierData', 'isOpen',
]);


const emit = defineEmits([
  'modalClose'
]);


onMounted(() => {

})

onUpdated(() => {
  if (props.supplierData != null && props.isOpen) {
    supplier.name = props.supplierData.name;
    supplier.email = props.supplierData.email;
    supplier.contact = props.supplierData.contact;
    supplier.address = props.supplierData.address;
    supplier.tinNumber = props.supplierData.tinNumber;
    supplier.note = props.supplierData.note;
    supplier.status = props.supplierData.status;
  }

})

const supplier = reactive({
  name: '',
  email: '',
  contact: '',
  address: '',
  tinNumber: '',
  note: '',
  status: '',
});

const rules = {
  name: {
    required,
  },
  email: {
    required, email
  },
  contact: {
    required,
  },
  address: {
    required,
  },
};

const validate = useVuelidate(rules, toRefs(supplier));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data;

    // Update Data
    if (props.supplierData != null) {

      data = {
        'name': supplier.name,
        'email': supplier.email,
        'contact_number': supplier.contact.toString(),
        'address': supplier.address,
        'tin_number': supplier.tinNumber,
        'note': supplier.note,
        'status': supplier.status,
      };

      web.put('/suppliers/' + props.supplierData.id, data).then((response) => {
        if (response.status === 201) {
          responseMessage.value = response.data;
          showSuccessToast();
          closeModal();
        } else {
          console.log('error');
        }

      });
    } else {
      //Create New
      data = {
        'name': supplier.name,
        'email': supplier.email,
        'contact_number': supplier.contact.toString(),
        'address': supplier.address,
        'tin_number': supplier.tinNumber,
        'note': supplier.note,
      }

      web.post('/suppliers', data).then((response) => {
        if (response.status === 201) {
          responseMessage.value = response.data;
          showSuccessToast();
          closeModal();
        } else {
          console.log('error');
        }

      });
    }
  }
}


const closeModal = () => {
  validate.value.$reset();
  emit('modalClose', false);
  clearData();
}

const clearData = () => {
  supplier.name = '';
  supplier.email = '';
  supplier.contact = '';
  supplier.address = '';
  supplier.tinNumber = '';
  supplier.note = '';
  supplier.status = '';
}

const basicNonStickyNotification = ref();
provide("bind[basicNonStickyNotification]", (el) => {
  // Binding
  basicNonStickyNotification.value = el;
});

const showSuccessToast = () => {
  // Show notification
  basicNonStickyNotification.value.showToast();
};


</script>

<style scoped>

</style>