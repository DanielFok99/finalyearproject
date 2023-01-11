<template>
  <Notification
      refKey="basicNonStickyNotification"
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal size="modal-xl" backdrop="static" :show="isOpen" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">
          {{ customerData == null ? "Add New Customer" : "Edit Customer" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-6">
          <label for="name" class="form-label">Customer Name</label>
          <input id="name" name="name" v-model.trim="customer.name" type="text" class="form-control"/>

          <template v-if="validate.name.$error">
            <div v-for="(error, index) in validate.name.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>
        <div class="col-span-12 sm:col-span-6">
          <label for="contact" class="form-label">Contact Number</label>
          <input id="contact" name="contact" v-model.number="customer.contact" type="tel"
                 class="form-control"/>
          <template v-if="validate.contact.$error">
            <div v-for="(error, index) in validate.contact.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" v-model.trim="customer.email" type="email"
                 class="form-control"/>
          <template v-if="validate.email.$error">
            <div v-for="(error, index) in validate.email.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label for="ic" class="form-label">IC Number</label>
          <input id="ic" name="ic" v-model="customer.ic" type="text"
                 class="form-control"/>
          <template v-if="validate.ic.$error">
            <div v-for="(error, index) in validate.ic.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div v-if="customerData !== null" class="col-span-12 sm:col-span-6">
          <label class="form-label">Status</label>
          <TomSelect v-model="customer.status" :options="{
                      placeholder: 'Select Customer Status',
                    }" class="w-full">
            <option value="activate">Activate</option>
            <option value="pending">Pending</option>
          </TomSelect>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label">Customer Group</label>
          <TomSelect v-model="customer.customerGroup" :options="{
                      placeholder: 'Select Customer Group',
                    }" class="w-full">
            <option v-for="(group, index) in customerGroups" :key="index" :value="group.id">{{ group.title }}</option>
          </TomSelect>
        </div>

        <div class="col-span-12 sm:col-span-6">
          <label class="form-label">Avatar</label>
          <Dropzone ref-key="dropzoneValidationRef" :options="dropzoneConfig" class="dropzone">
            <div class="text-lg font-medium">
              Drop files here or click to upload.
            </div>
          </Dropzone>
        </div>


        <div class="col-span-12 sm:col-span-12">
          <label for="note" class="form-label">Note</label>
          <ClassicEditor v-model="customer.note" :config="editorConfig"/>
        </div>


      </ModalBody>
      <ModalFooter>
        <button type="button" @click="closeModal" class="btn btn-outline-secondary w-20 mr-1">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary w-20">
          {{ customerData == null ? "Create" : "Edit" }}
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

const customerGroups = ref([]);
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
  'customerData', 'isOpen',
]);


const emit = defineEmits([
  'modalClose'
]);

const setDefaultGroup = () => {
  web.get('/customer-groups').then((res) => {
    if (res.data) {
      customerGroups.value = res.data;

      customerGroups.value.forEach((item) => {
        if (item.is_default === true) {
          customer.customerGroup = item.id.toString();
        }
      });
    }
  })

}

onMounted(() => {
  setDefaultGroup();
})

onUpdated(() => {
  if (props.customerData != null && props.isOpen) {
    customer.name = props.customerData.name;
    customer.contact = props.customerData.contact;
    customer.ic = props.customerData.ic;
    customer.email = props.customerData.email;
    customer.note = props.customerData.note;
    customer.customerGroup = props.customerData.customerGroup;
  }

})

const customer = reactive({
  name: '',
  contact: '',
  ic: '',
  email: '',
  note: '',
  customerGroup: '',
  status: '',
});

const rules = {
  name: {
    required,
  },
  contact: {
    required,
  },
  email: {
    required, email
  },
  ic: {
    required,
  },
};

const validate = useVuelidate(rules, toRefs(customer));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data;

    // Update Data
    if (props.customerData != null) {

      data = {
        'customer_name': customer.name,
        'customer_contact': customer.contact.toString(),
        'ic_number': customer.ic,
        'email': customer.email,
        'note': customer.note,
        'customer_group_id': customer.customerGroup,
        'status': customer.status,
      };

      web.put('/customers/' + props.customerData.id, data).then((response) => {
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
        'customer_name': customer.name,
        'customer_contact': customer.contact.toString(),
        'ic_number': customer.ic,
        'email': customer.email,
        'note': customer.note,
        'customer_group_id': customer.customerGroup,
      }

      web.post('/customers', data).then((response) => {
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
  customer.name = '';
  customer.contact = '';
  customer.ic = '';
  customer.email = '';
  customer.note = '';
  setDefaultGroup();
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