<template>
  <Notification
      refKey="basicNonStickyNotification"
      :options="{duration: 5000,}"
      class="flex flex-col sm:flex-row">
    <div class="font-medium">{{ responseMessage }}</div>
  </Notification>

  <Modal backdrop="static" :show="isOpen" @hidden="closeModal">
    <form class="validate-form" @submit.prevent="submit">
      <ModalBody class="p-0">
        <div class="p-5 text-center">
          <XCircleIcon class="w-16 h-16 text-danger mx-auto mt-3" />
          <div class="text-3xl mt-5">Are you sure?</div>
          <div class="text-slate-500 mt-2" v-if="customer!= null && customer.status !== 'activate'">
            Do you really want to delete these records? <br />This
            process cannot be undone.
          </div>
          <div class="text-slate-500 mt-2" v-else>
            Active Customer can't be delete
          </div>

        </div>
        <div class="px-5 pb-8 text-center">
          <button type="button" @click="closeModal" class="btn btn-outline-secondary w-24 mr-1">
            Cancel
          </button>
          <button v-if="customer!= null && customer.status !== 'activate'" type="submit" class="btn btn-danger w-24">
            Delete
          </button>
        </div>
      </ModalBody>
    </form>
  </Modal>
</template>

<script setup>
import {Modal, ModalBody} from '../../../global-components/modal/index';

import {provide, ref} from "vue";
import {useApi} from "@/api/useAPI";

const responseMessage = ref('');
const web = useApi('web');
const props = defineProps([
  'isOpen', 'customer'
]);

const emit = defineEmits([
  'modalClose'
]);

const closeModal = () => {
  emit('modalClose', false);
}

const submit = () => {
  web.delete('/customers/'+ props.customer.id).then((response) => {
    if (response.status === 200) {
      responseMessage.value = response.data;
      showSuccessToast();
      closeModal();
    } else {
      console.log('error');
    }

  });
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