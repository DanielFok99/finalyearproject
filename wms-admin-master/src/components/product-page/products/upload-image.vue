<template>
  <Notification
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row"
      refKey="basicNonStickyNotification">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal :center="true" :show="isOpen" backdrop="static" size="modal-xl" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">Add Image For {{ props.product.variantName}}</h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-12">
          <Dropzone ref-key="dropzoneValidationRef" :options="{
                  url: 'https://httpbin.org/post',
                  thumbnailWidth: 150,
                  maxFilesize: 5,
                  acceptedFiles: 'image/jpeg|image/png|image/jpg',
                  headers: { 'My-Awesome-Header': 'header value' },
                }" class="dropzone">
            <div class="text-lg font-medium">
              Drop images here or click to upload.
            </div>
          </Dropzone>
        </div>


      </ModalBody>
      <ModalFooter>
        <button class="btn btn-outline-secondary w-20 mr-1" type="button" @click="closeModal">
          Cancel
        </button>
        <button class="btn btn-primary w-20" type="submit">
          Save
        </button>
      </ModalFooter>
    </form>
  </Modal>
</template>

<script>
export default {
  name: "product-upload-image"
}
</script>

<script setup>
import {Modal, ModalBody, ModalFooter, ModalHeader} from '../../../global-components/modal/index';
import {onMounted, onUpdated, provide, reactive, ref, toRefs} from "vue";
import {integer, required,} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import {useApi} from "@/api/useAPI";

const responseMessage = ref('');
const web = useApi('web');
const props = defineProps([
  'isOpen', 'product'
]);

const emit = defineEmits([
  'modalClose'
]);

onUpdated(() => {
  if (props.product != null && props.isOpen) {
    product.name = props.product.name;
    product.shortName = props.product.shortName;
    product.isDefault = props.product.isDefault;
  }

})

const product = reactive({
  name: '',
  shortName: '',
  isDefault: false,
});

const rules = {
  name: {
    required,
  },
  shortName: {
    required,
  },
};

const validate = useVuelidate(rules, toRefs(product));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data = {
      'name': product.name,
      'short_name': product.shortName,
      'is_default': product.isDefault,
    }

    // Update Data
    if (props.product != null) {
      web.put('/products/' + props.product.id, data).then((response) => {
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
      web.post('/products', data).then((response) => {
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
  product.name = '';
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