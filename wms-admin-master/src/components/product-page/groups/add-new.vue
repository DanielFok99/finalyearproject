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
          {{ props.group == null ? "Add New Group" : "Edit Group" }}
        </h2>
      </ModalHeader>
      <ModalBody class="grid grid-cols-12 gap-4 gap-y-3">

        <div class="col-span-12 sm:col-span-12">
          <label class="form-label" for="name">Name</label>
          <input id="name" v-model.trim="group.name" class="form-control" name="name" type="text"/>

          <template v-if="validate.name.$error">
            <div v-for="(error, index) in validate.name.$errors" :key="index" class="text-danger mt-2">
              {{ error.$message }}
            </div>
          </template>
        </div>


      </ModalBody>
      <ModalFooter>
        <button class="btn btn-outline-secondary w-20 mr-1" type="button" @click="closeModal">
          Cancel
        </button>
        <button class="btn btn-primary w-20" type="submit">
          {{ props.group == null ? "Create" : "Edit" }}
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
  'isOpen', 'group'
]);

const emit = defineEmits([
  'modalClose'
]);

onUpdated(() => {
  if (props.group != null && props.isOpen) {
    group.name = props.group.name;

    console.log(group);
  }

})

const group = reactive({
  name: '',
});

const rules = {
  name: {
    required,
  },
};

const validate = useVuelidate(rules, toRefs(group));


const submit = () => {
  validate.value.$touch();
  if (!validate.value.$invalid) {

    let data = {
      'name': group.name,
    }

    // Update Data
    if (props.group != null) {
      web.put('/groups/' + props.group.id, data).then((response) => {
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
      web.post('/groups', data).then((response) => {
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
  group.name = '';
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