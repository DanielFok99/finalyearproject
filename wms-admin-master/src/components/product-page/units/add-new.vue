<template>
  <Notification
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row"
      refKey="basicNonStickyNotification">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal :center="true" :show="isOpen" backdrop="static" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">
          {{ props.unit == null ? "Add New Unit" : "Edit Unit" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-12">
          <label class="form-label" for="name">Name</label>
          <input id="name" v-model.trim="unit.name" class="form-control" name="name" type="text"/>
          <template v-if="validate.name.$error">
            <div v-for="(error, index) in validate.name.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-12">
          <label class="form-label" for="shortName">Short Name</label>
          <input id="shortName" v-model.trim="unit.shortName" class="form-control" name="shortName" type="text"/>
          <template v-if="validate.shortName.$error">
            <div v-for="(error, index) in validate.shortName.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>

        <div class="col-span-12 sm:col-span-12 form-check form-switch">
          <input id="isDefault" name="isDefault" v-model.trim="unit.isDefault" class="form-check-input"
                 type="checkbox"/>
          <label class="form-check-label" for="isDefault">As Default</label>
        </div>


      </ModalBody>
      <ModalFooter>
        <button class="btn btn-outline-secondary w-20 mr-1" type="button" @click="closeModal">
          Cancel
        </button>
        <button class="btn btn-primary w-20" type="submit">
          {{ props.unit == null ? "Create" : "Edit" }}
        </button>
      </ModalFooter>
    </form>
  </Modal>
</template>

<script>
export default {
  name: "unit-add-new"
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
  'isOpen', 'unit'
]);

const emit = defineEmits([
  'modalClose'
]);

onUpdated(() => {
  if (props.unit != null && props.isOpen) {
    unit.name = props.unit.name;
    unit.shortName = props.unit.shortName;
    unit.isDefault = props.unit.isDefault;
  }

})

const unit = reactive({
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

const validate = useVuelidate(rules, toRefs(unit));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data = {
      'name': unit.name,
      'short_name': unit.shortName,
      'is_default': unit.isDefault,
    }

    // Update Data
    if (props.unit != null) {
      web.put('/units/' + props.unit.id, data).then((response) => {
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
      web.post('/units', data).then((response) => {
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
  unit.name = '';
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