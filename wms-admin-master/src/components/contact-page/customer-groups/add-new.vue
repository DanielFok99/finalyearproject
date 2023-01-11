<template>
  <Notification
      refKey="basicNonStickyNotification"
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal backdrop="static" :show="isOpen" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalHeader>
        <h2 class="font-medium text-base mr-auto">
          {{ group == null ? "Add New Customer Group" : "Edit Customer Group" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-12">
          <label for="title" class="form-label">Title</label>
          <input id="title" name="title" v-model.trim="customerGroup.title" type="text" class="form-control"/>

          <template v-if="validate.title.$error">
            <div v-for="(error, index) in validate.title.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>
        <div class="col-span-12 sm:col-span-12">
          <label for="discount" class="form-label">Default Discount (%)</label>
          <input id="discount" name="discount" v-model.number="customerGroup.discount" type="number"
                 class="form-control"/>
          <template v-if="validate.discount.$error">
            <div v-for="(error, index) in validate.discount.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>
        <div class="col-span-12 sm:col-span-12 form-check form-switch">
          <input id="isDefault" name="isDefault" v-model.trim="customerGroup.isDefault" class="form-check-input"
                 type="checkbox"/>
          <label class="form-check-label" for="isDefault">As Default</label>
        </div>


      </ModalBody>
      <ModalFooter>
        <button type="button" @click="closeModal" class="btn btn-outline-secondary w-20 mr-1">
          Cancel
        </button>
        <button type="submit" class="btn btn-primary w-20">
          {{ group == null ? "Create" : "Edit" }}
        </button>
      </ModalFooter>
    </form>
  </Modal>
  <!-- END: Modal Content -->
</template>

<script setup>
import {Modal, ModalBody, ModalFooter, ModalHeader} from '../../../global-components/modal/index';
import {onMounted, onUpdated, provide, reactive, ref, toRefs} from "vue";
import {integer, required,} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import {useApi} from "@/api/useAPI";

const responseMessage = ref('');
const web = useApi('web');
const props = defineProps([
  'isOpen', 'group'
]);

const emit = defineEmits([
  'modalClose'
]);

onUpdated(()=>{
  if (props.group != null && props.isOpen){
    customerGroup.title = props.group.title;
    customerGroup.discount = props.group.discount;
    customerGroup.isDefault = props.group.is_default;
  }

})

const customerGroup = reactive({
  title: '',
  discount: '',
  isDefault: false,
});

const rules = {
  title: {
    required,
  },
  discount: {
    required,
    integer,
  },
};

const validate = useVuelidate(rules, toRefs(customerGroup));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data = {
      'title': customerGroup.title,
      'discount': customerGroup.discount,
      'is_default': customerGroup.isDefault,
    }

    // Update Data
    if (props.group != null){
      web.put('/customer-groups/'+ props.group.id, data).then((response) => {
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
      web.post('/customer-groups', data).then((response) => {
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
  customerGroup.title = '';
  customerGroup.discount = '';
  customerGroup.isDefault = false;
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