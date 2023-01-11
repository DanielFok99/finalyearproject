<template>
  <button class="btn btn-primary w-24 mr-1 mb-2" @click="submitFunction">Submit</button>
  <button class="btn btn-primary w-24 mr-1 mb-2" @click="submit2Function">Submit2</button>
</template>

<script>
export default {
  name: "test-page-index"
}
</script>
<script setup>
import {onMounted, reactive, ref} from "vue";
import {useApi} from "../../api/useAPI";

const data = reactive({
  "basic": {
    "product_name": "iphone 8",
    "categories": [
      "1"
    ],
    "brand_id": "1",
    "group_id": "1",
    "description": "<p>Iphone 8</p>"
  },
  "standard_product": {
    "ref_purchase_price": 1000,
    "ref_selling_price": 1500,
    "alternative_code": "0",
    "sku": "1",
    "barcode": "2",
    "is_enable": true
  },
  "single_product_unit": {
    "id": "1"
  }
});

const data2 = reactive({
  "basic": {
    "product_name": "iphone 8",
    "categories": [
      "1"
    ],
    "brand_id": "1",
    "group_id": "1",
    "description": "<p>Iphone 8</p>"
  },
  "variant_products": [
    {
      "variantName": "128GB,RED",
      "refPurchasePrice": 1000,
      "refSellingPrice": 2500,
      "altCode": "0",
      "sku": "iphone8-128gb-red",
      "barcode": "2",
      "isEnabled": true
    },
    {
      "variantName": "256GB,RED",
      "refPurchasePrice": 1500,
      "refSellingPrice": 3000,
      "altCode": "4",
      "sku": "iphone8-256gb-red",
      "barcode": "6",
      "isEnabled": true
    },
    {
      "variantName": "128GB,SLIVER",
      "refPurchasePrice": 1000,
      "refSellingPrice": 2500,
      "altCode": "7",
      "sku": "iphone8-128gb-sliver",
      "barcode": "9",
      "isEnabled": true
    },
    {
      "variantName": "256GB,SLIVER",
      "refPurchasePrice": 1500,
      "refSellingPrice": 300,
      "altCode": "1",
      "sku": "iphone8-256gb-sliver",
      "barcode": "7",
      "isEnabled": true
    }
  ],
  "multi_product_unit": {
    "base_id": "1",
    "other_units": [
      {
        "id": "2",
        "ratio": 12
      }
    ]
  }
});

const web = useApi('web');

onMounted(() => {

});

const submitFunction = () => {

  web.post('/products', data).then((res) => {
    console.log(res.data);
  }).catch((err) => {
    console.log(err);
  });
}
const submit2Function = () => {

  web.post('/products', data2).then((res) => {
    console.log(res.data);
  }).catch((err) => {
    console.log(err);
  });
}

</script>

<style scoped>

</style>