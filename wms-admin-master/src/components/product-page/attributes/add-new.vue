<template>
  <Notification
      refKey="basicNonStickyNotification"
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal :center="true" backdrop="static" :show="isOpen" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">
          {{ props.attribute == null ? "Add New Attribute" : "Edit Attribute" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-12">
          <label for="name" class="form-label">Name</label>
          <input id="name" name="name" v-model.trim="attribute.name" type="text" class="form-control"/>

          <template v-if="validate.name.$error">
            <div v-for="(error, index) in validate.name.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>


      </ModalBody>
      <ModalFooter>
        <button type="button" @click="closeModal" class="btn btn-outline-secondary w-20 mr-1">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary w-20">
          {{ props.attribute == null ? "Create" : "Edit" }}
        </button>
      </ModalFooter>
    </form>
  </Modal>
</template>

<script>
export default {
  name: "attribute-add-new"
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
  'isOpen', 'attribute'
]);

const emit = defineEmits([
  'modalClose'
]);

onUpdated(()=>{
  if (props.attribute != null && props.isOpen) {
    attribute.name = props.attribute.name;

    console.log(attribute);
  }

})

const attribute = reactive({
  name: '',
});

const rules = {
  name: {
    required,
  },
};

const validate = useVuelidate(rules, toRefs(attribute));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data = {
      'name': attribute.name,
    }

    // Update Data
    if (props.attribute != null){
      web.put('/attributes/'+ props.attribute.id, data).then((response) => {
        if (response.status === 201) {
          responseMessage.value = response.data;
          showSuccessToast();
          closeModal();
        } else {
          console.log('error');
        }

      });
    }else {
      //Create New
      web.post('/attributes', data).then((response) => {
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
  attribute.name = '';
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