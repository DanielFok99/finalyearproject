<template>

  <product-upload-image v-model:product="selectedVariantProduct" v-model:is-open="modalOpen"
                        @modal-close="modalStatus"></product-upload-image>

  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Add New Product</h2>

    <div class="w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
      <router-link to="/products">
        <button class="btn btn-primary shadow-md mr-2">
          <ArrowLeftIcon class="w-4 h-4 mr-2"/>
          Back to Product List
        </button>
      </router-link>
    </div>

  </div>
  <div class="grid grid-cols-12 gap-6 mt-3">
    <!--    Product Detail-->
    <div :class="{
                  'lg:col-span-12': isStandardProduct === false,
                  'lg:col-span-6': isStandardProduct === true,
                }"
         class="intro-y col-span-12">
      <div class="intro-y box p-5">
        <div class="grid grid-cols-2 gap-2">
          <!--        Product Name-->
          <div class="col-span-2">
            <label class="form-label" for="product-name">Product Name</label>
            <input id="product-name" v-model="product.basic.name" name="product_name" class="form-control w-full" type="text"/>
          </div>

          <!--        Product Category-->
          <div class="mt-3 col-span-2">
            <label class="form-label" for="product-category">Category</label>
            <TomSelect id="product-category" v-model="product.categories" :options="categoryTomSelectOption"
                       class="w-full"
                       multiple>
              <option v-for="(data, index) in categories" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

          <!--        Product Brand-->
          <div class="mt-3 col-span-2 lg:col-span-1">
            <label class="form-label" for="product-brand">Brand</label>
            <TomSelect id="product-brand" v-model="product.brand" class="w-full">
              <option v-for="(data, index) in brands" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

          <!--        Product Group-->
          <div class="mt-3 col-span-2 lg:col-span-1">
            <label class="form-label" for="product-brand">Group</label>
            <TomSelect id="product-brand" v-model="product.group" class="w-full">
              <option v-for="(data, index) in groups" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

          <!-- Description -->
          <div class="mt-3 col-span-2">
            <label>Description</label>
            <div class="mt-2">
              <ClassicEditor v-model="product.basic.description" :config="editorConfig"/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--        Other Details-->
    <div :class="{
                  'lg:col-span-12': isStandardProduct === false,
                  'lg:col-span-6': isStandardProduct === true,
                }"
         class="intro-y col-span-12"
    >

      <!--  Select Product Type Card-->
      <div class="intro-y box p-5">

        <h4 class="text-xl text-primary font-bold leading-none">
          Select Product Type
        </h4>
        <div class="flex flex-col sm:flex-row mt-3">
          <div class="form-check mr-2">
            <input id="radio-standard-product" v-model="isStandardProduct" :value="true" class="form-check-input"
                   name="horizontal_radio_button"
                   type="radio"/>
            <label class="form-check-label" for="radio-standard-product">Standard Product</label>
          </div>
          <div class="form-check mr-2 mt-2 sm:mt-0">
            <input id="radio-variant-product" v-model="isStandardProduct" :value="false" class="form-check-input"
                   name="horizontal_radio_button"
                   type="radio"/>
            <label class="form-check-label" for="radio-variant-product">Variant Product</label>
          </div>
        </div>
      </div>

      <!-- Standard Product Section -->
      <div v-if="isStandardProduct" class="intro-y box p-5 mt-3">
        <div class="grid grid-cols-2 gap-2">
          <!--       Reference Purchase Price-->
          <div class="col-span-2">
            <label class="form-label" for="name">Reference Purchase Price</label>
            <input id="name" v-model="product.standardProduct.purchasePrice" class="form-control w-full" min="0"
                   type="number"/>
          </div>

          <!--       Reference Selling Price-->
          <div class="col-span-2">
            <label class="form-label" for="name">Reference Selling Price</label>
            <input id="name" v-model="product.standardProduct.sellingPrice" class="form-control w-full" min="0"
                   type="number"/>
          </div>

          <!--       Alternative Code-->
          <div class="col-span-2">
            <label class="form-label" for="name">Alternative Code</label>
            <input id="name" v-model="product.standardProduct.alternativeCode" class="form-control w-full" type="text"/>
          </div>

          <!--       SKU-->
          <div class="col-span-2">
            <label class="form-label" for="name">SKU</label>
            <input id="name" v-model="product.standardProduct.sku" class="form-control w-full" min="0" type="text"/>
          </div>

          <!--       Barcode-->
          <div class="col-span-2">
            <label class="form-label" for="name">Barcode</label>
            <input id="name" v-model="product.standardProduct.barcode" class="form-control w-full" min="0" type="text"/>
          </div>

          <div class="mt-3 col-span-2">
            <label>Images</label>
            <div class="mt-2">
              <Dropzone :options="{
                            url: 'https://httpbin.org/post',
                            acceptedFiles: 'image/jpeg|image/png|image/jpg',
                            thumbnailWidth: 150,
                            maxFilesize: 0.5,
                            headers: { 'My-Awesome-Header': 'header value' },
                          }" class="dropzone" ref-key="dropzoneMultipleRef">
                <div class="text-lg font-medium">
                  Drop images here or click to upload.
                </div>
              </Dropzone>
            </div>

          </div>

          <div class="mt-2">
            <div class="form-check form-switch">
              <input id="product-enable-switch" v-model="product.standardProduct.isEnabled" class="form-check-input"
                     type="checkbox"/>
              <label class="form-check-label" for="checkbox-switch-7">Enable Product</label>
            </div>
          </div>
        </div>

      </div>

      <!-- Variant Product Section -->
      <div v-else class="intro-y box p-5 mt-3">
        <div class="grid grid-cols-2 gap-2">

        </div>

        <!--  Tab Indicator-->
        <div class="relative before:hidden before:lg:block before:absolute
        before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100
        before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">

          <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
            <button :class="{
                  'btn-primary': wizardPageIndex === 1,
                  'text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400': wizardPageIndex !== 1,
                }"
                    class="w-10 h-10 rounded-full btn"
            >1
            </button>
            <div :class="{
                  'font-medium': wizardPageIndex === 1,
                  'text-slate-600 dark:text-slate-400': wizardPageIndex !== 1,
                }"
                 class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto"
            >
              Select Attribute
            </div>
          </div>
          <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
            <button :class="{
                  'btn-primary': wizardPageIndex === 2,
                  'text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400': wizardPageIndex !== 2,
                }"
                    class="w-10 h-10 rounded-full btn"
            >2
            </button>
            <div :class="{
                  'font-medium': wizardPageIndex === 2,
                  'text-slate-600 dark:text-slate-400': wizardPageIndex !== 2,
                }"
                 class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto"
            >
              Set Attribute
            </div>
          </div>
          <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
            <button :class="{
                  'btn-primary': wizardPageIndex === 3,
                  'text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400': wizardPageIndex !== 3,
                }"
                    class="w-10 h-10 rounded-full btn"
            >3
            </button>
            <div :class="{
                  'font-medium': wizardPageIndex === 3,
                  'text-slate-600 dark:text-slate-400': wizardPageIndex !== 3,
                }"
                 class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto"
            >
              Edit Attribute Details
            </div>
          </div>

        </div>

        <div class="sm:px-5 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">

          <!-- Select Attribute -->
          <div v-show="wizardPageIndex === 1">
            <div class="font-medium text-base">Attributes</div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-3">
              <!--        Product Attributes-->
              <div class="intro-y col-span-12 sm:col-span-12">
                <TomSelect id="attributes"
                           v-model="lists"
                           :options="attributeTomSelectOption" class="w-full"
                           multiple>
                  <option v-for="(data, index) in attributes" :key="index" :value="data.id">{{ data.name }}</option>
                </TomSelect>
              </div>

            </div>
          </div>

          <!--  Set Attribute-->
          <div v-show="wizardPageIndex === 2">
            <div class="font-medium text-base">Add Attribute Value</div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">

              <div v-for="(data ,parentIndex) in product.variantProductAttributes" :key="parentIndex"
                   class="intro-y col-span-12 sm:col-span-12">
                <label class="form-label" for="input-wizard-1">{{ data.name }}</label>

                <div class="input-group mt-2" v-for="(item,childIndex) in data.list" :key="item">
                  <input v-model="item.value" type="text" class="form-control"

                  />
                  <button class="btn btn-primary ml-1" @click="addRow(parentIndex)">
                    <PlusIcon class="w-5 h-5"/>
                  </button>

                  <button class="btn btn-danger ml-1" @click="removeRow(parentIndex,childIndex)">
                    <TrashIcon class="w-5 h-5"/>
                  </button>
                </div>


              </div>

            </div>

          </div>

          <!-- Edit Attribute Details-->
          <div v-show="wizardPageIndex === 3">
            <div class="font-medium text-base">Attributes Details</div>
            <!--      Attributes Table-->
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-3" v-for="(data , index) in variantList" :key="index">

              <!--  Variants-->
              <div class="intro-y col-span-2">
                <label v-if="index === 0" for="input-wizard-2" class="form-label">Variant</label>
                <input
                    v-model="data.variantName"
                    id="input-wizard-1"
                    type="text"
                    name="variant_name"
                    class="form-control"
                />
              </div>
              <!--  Purchase Price-->
              <div class="intro-y col-span-1">
                <label v-if="index === 0" for="input-wizard-1" class="form-label">Purchase Price</label>
                <input
                    id="input-wizard-1"
                    v-model="data.refPurchasePrice"
                    type="number"
                    min="0"
                    name="purchase_price"
                    class="form-control"
                />
              </div>
              <!--  Selling Price-->
              <div class="intro-y col-span-1">
                <label v-if="index === 0" for="input-wizard-2" class="form-label">Selling Price</label>
                <input
                    id="input-wizard-2"
                    v-model="data.refSellingPrice"
                    type="number"
                    min="0"
                    name="selling_price"
                    class="form-control"
                />
              </div>
              <!--  Alternative Code-->
              <div class="intro-y col-span-2">
                <label v-if="index === 0" for="input-wizard-3" class="form-label">Alt. Code</label>
                <input
                    id="input-wizard-3"
                    v-model="data.altCode"
                    type="text"
                    name="alt_code"
                    class="form-control"
                />
              </div>
              <!--  SKU-->
              <div class="intro-y col-span-2">
                <label v-if="index === 0" for="input-wizard-1" class="form-label">SKU</label>
                <input
                    id="input-wizard-1"
                    v-model="data.sku"
                    type="text"
                    name="sku"
                    class="form-control"
                />
              </div>
              <!--  Barcode-->
              <div class="intro-y col-span-2">
                <label v-if="index === 0" for="input-wizard-2" class="form-label">Barcode</label>
                <input
                    id="input-wizard-2"
                    v-model="data.barcode"
                    type="text"
                    name="barcode"
                    class="form-control"
                />
              </div>
              <!--  Images-->
              <div class="intro-y col-span-1">
                <label v-if="index === 0" for="input-wizard-3" class="form-label">Images</label>
                <button class="form-control btn btn-dark" @click="openUploadImageModal(data)">Upload</button>
              </div>

              <div class="intro-y col-span-1">
                <label v-if="index === 0" class="form-label">Enable</label>
                <div class="mt-2">
                  <div class="form-check form-switch">
                    <input id="checkbox-switch-7" v-model="data.isEnabled" class="form-check-input" type="checkbox"/>
                  </div>
                </div>
              </div>

              <!--  Enable Product-->
              <!--              <div class="intro-y col-span-2 form-check form-switch">-->
              <!--                <input id="enable-product" class="form-check-input" type="checkbox"/>-->
              <!--                <label for="enable-product" class="form-label">Enable Product</label>-->
              <!--              </div>-->

              <!--              <div class="form-check form-switch">-->
              <!--                <input id="checkbox-switch-7" class="form-check-input" type="checkbox" />-->
              <!--                <label class="form-check-label" for="checkbox-switch-7">Default switch checkbox input</label>-->
              <!--              </div>-->

            </div>
          </div>


        </div>

        <div
            class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5"
        >
          <button v-if="wizardPageIndex > 1" class="btn btn-primary w-24" @click="wizardPageIndex--">Previous
          </button>
          <button v-if="wizardPageIndex < 3" class="btn btn-primary w-24 ml-2" @click="wizardPageIndex++">Next
          </button>
        </div>
      </div>

      <!--  Select Product Unit Card-->
      <div class="intro-y box p-5 mt-3">

        <h4 class="text-xl text-primary font-bold leading-none">
          Select Product Unit of Measurement
        </h4>
        <div class="flex flex-col sm:flex-row mt-3">
          <div class="form-check mr-2">
            <input id="radio-single-product" v-model="selectProductUnitType" value="single" class="form-check-input"
                   name="product_unit_radio_button"
                   type="radio"/>
            <label class="form-check-label" for="radio-single-product">Single Product UOM</label>
          </div>
          <div class="form-check mr-2 mt-2 sm:mt-0">
            <input id="radio-multi-product" v-model="selectProductUnitType" value="multi" class="form-check-input"
                   name="product_unit_radio_button"
                   type="radio"/>
            <label class="form-check-label" for="radio-multi-product">Multi Product UOM</label>
          </div>
        </div>

        <!--  Single UOM-->
        <div class="grid grid-cols-2 gap-2 mt-2" v-if="selectProductUnitType === 'single'">

          <div class="col-span-2">
            <label class="form-label" for="product-unit"></label>
            <TomSelect id="product-unit" v-model="product.unit" class="w-full">
              <option v-for="(data, index) in units" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

        </div>

        <!--  Multi UOM-->
        <div class="grid grid-cols-2 gap-2 mt-5" v-if="selectProductUnitType === 'multi'">
          <div class="col-span-2">
            <label class="form-label" for="product-unit">Base UOM</label>
            <TomSelect id="product-unit" v-model="productUnit.baseUnitId" class="w-full">
              <option v-for="(data, index) in units" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

        </div>

        <div class="grid grid-cols-12 gap-2 mt-5" v-for="(unitData, index) in productUnit.units" :key="index">
          <div class="col-span-6" v-if="selectProductUnitType === 'multi'">
            <label class="form-label" for="product-unit" v-if="index === 0">Other UOM</label>
            <TomSelect id="product-unit" v-model="unitData.id" class="w-full">
              <option v-for="(data, index) in units" :key="index" :value="data.id">{{ data.name }}</option>
            </TomSelect>
          </div>

          <div class="col-span-4" v-if="selectProductUnitType === 'multi'">
            <label class="form-label" for="unit-ratio" v-if="index === 0">Ratio to Base UOM</label>
            <input id="unit-ratio" v-model="unitData.ratio" type="number" min="0" class="form-control" placeholder="1"/>
          </div>

          <div class="col-span-2" v-if="selectProductUnitType === 'multi'">
            <label class="form-label" for="product-unit" v-if="index === 0">&nbsp;</label>
            <div class="form-control">
              <button class=" btn btn-small btn-primary " @click="addUnitRow()">
                <PlusIcon class="w-5 h-5"/>
              </button>

              <button class="ml-1 btn btn-small btn-danger " @click="removeUnitRow(index)">
                <MinusIcon class="w-5 h-5"/>
              </button>
            </div>

          </div>

        </div>


      </div>

    </div>

    <!--    Product Detail-->
    <div class="intro-y col-span-12 lg:col-span-12">
      <div class="intro-y box p-3 col-span-12 flex items-center justify-center sm:justify-end">
        <button class="btn btn-secondary w-24" @click="clearFunction">CLEAR</button>
        <button class="btn btn-primary w-24 mx-5" @click="submitFunction">SUBMIT</button>
      </div>

    </div>

  </div>


</template>


<script>
export default {
  name: "product-add-new-page"
}
</script>
<script setup>
import _ from "lodash";
import {onMounted, reactive, ref, watch} from "vue";
import ClassicEditor from "@/global-components/ckeditor/ClassicEditor.vue";
import TomSelect from "@/global-components/tom-select/Main.vue";
import Dropzone from "@/global-components/dropzone/Main.vue";
import {useApi} from "@/api/useAPI";
import ProductUploadImage from "../../components/product-page/products/upload-image.vue";


//Temp Variable
const lists = ref([]);

const web = useApi('web');
const isSelectAttribute = ref(true);
const wizardPageIndex = ref(1);
const isStandardProduct = ref(true);
const selectProductUnitType = ref('single');
const tempVariantList = ref([]);
const variantList = ref([]);
const modalOpen = ref(false);

const categories = ref([]);
const brands = ref([]);
const groups = ref([]);
const attributes = ref([]);
const units = ref([]);

const product = reactive({
  basic: {
    name: '',
    description: '',
  },
  categories: [],
  brand: '',
  group: '',
  unit: '',
  standardProduct: {
    isEnabled: true,
    alternativeCode: '',
    sku: '',
    barcode: '',
    purchasePrice: 0,
    sellingPrice: 0,
  },
  variantProductAttributes: []
});
const selectedVariantProduct = ref({
  variantName: '',
  refPurchasePrice: 0,
  refSellingPrice: 0,
  altCode: '',
  sku: '',
  barcode: '',
  isEnabled: true,
});
const productUnit = reactive({
  baseUnitId: '',
  units: [],
})

const categoryTomSelectOption = ref({
  placeholder: 'Select categories',
  plugins: {
    dropdown_header: {
      title: 'Categories',
    },
  },
});
const attributeTomSelectOption = ref({
  valueField: 'id',
  labelField: 'name',
  searchField: 'name',
  placeholder: 'Select attributes',
  plugins: {
    dropdown_header: {title: 'Attributes',},
  },
  onItemAdd: function (value, $item) {
    let data = reactive({
      id: value,
      name: getAttributeFromId(value),
      list: [{value: ''}],
    });
    product.variantProductAttributes.push(data);
  },
  onItemRemove: function (value, $item) {
    product.variantProductAttributes.forEach((attribute, index) => {
      if (attribute.id === value.toString()) {
        product.variantProductAttributes.splice(index, 1);
      }
    });

  },
});

const addRow = (index) => {
  let data = {
    value: '',
  };
  product.variantProductAttributes[index].list.push(data);
}

const removeRow = (parentIndex, index) => {
  product.variantProductAttributes[parentIndex].list.splice(index, 1);

  if (product.variantProductAttributes[parentIndex].list.length === 0) {
    addRow(parentIndex)
  }
}

const addUnitRow = () => {
  let data = {
    id: '',
    ratio: 1,
  }
  productUnit.units.push(data);
}

const removeUnitRow = (index) => {
  productUnit.units.splice(index, 1);

  if (productUnit.units.length === 0) {
    addUnitRow();
  }
}

const getData = async () => {
  await web.get('/categories').then((res) => {
    categories.value = res.data;
  }).catch(() => {
    categories.value = [];
  });

  await web.get('/brands').then((res) => {
    let data = res.data;

    brands.value = data;
    product.brand = data[0].id.toString();
  }).catch(() => {
    brands.value = [];
  });

  await web.get('/groups').then((res) => {
    let data = res.data;

    groups.value = data;
    product.group = data[0].id.toString();
  }).catch(() => {
    groups.value = [];
  });

  await web.get('/attributes').then((res) => {
    attributes.value = res.data;
  }).catch(() => {
    attributes.value = [];
  });

  await web.get('/units').then((res) => {
    let data = res.data;


    units.value = data;
    if (data.length > 0) {
      data.forEach((value) => {
        if (value.is_default === 1) {
          product.unit = value.id.toString();
          productUnit.baseUnitId = value.id.toString();
        }
      });
    }
    // product.unit =
  }).catch(() => {
    attributes.value = [];
  });
}

const editorConfig = {
  toolbar: {
    items: ["bold", "italic", "link"],
  },
};

const getAttributeFromId = (id) => {
  let data = attributes.value.find(attribute => attribute.id === parseInt(id));
  return data.name;
}

const generateOutput = (input, output, index) => {
  // If we have reached the end of the input array, return the output array
  if (index >= input.length) {
    return output;
  }
  // Create a new array to store the updated output
  const newOutput = [];
  // Iterate through the current elements in the input array
  for (const elem of input[index]) {
    // Iterate through the current elements in the output array
    for (const outputElem of output) {
      // Add the current element from the input array to the current element in the output array
      let variant = {
        variantName: '',
        refPurchasePrice: 0,
        refSellingPrice: 0,
        altCode: '',
        sku: '',
        barcode: '',
        isEnabled: true,
      }
      if (outputElem.variantName === '' || outputElem.variantName === undefined) {
        variant.variantName = `${elem}`;
        newOutput.push(variant);
      } else {
        variant.variantName = `${outputElem.variantName},${elem}`
        newOutput.push(variant);
      }
    }
  }
  // Call the function again with the next index and the updated output array
  return generateOutput(input, newOutput, index + 1);
}

const clearFunction = () => {

}

const submitFunction = () => {

  let data = {
    basic:{
      product_name: product.basic.name,
      categories:product.categories,
      brand_id:product.brand,
      group_id:product.group,
      description: product.basic.description,
    },
  };

  if (isStandardProduct.value === true){
    data.standard_product = {
      ref_purchase_price :product.standardProduct.purchasePrice,
      ref_selling_price :product.standardProduct.sellingPrice,
      alternative_code :product.standardProduct.alternativeCode,
      sku :product.standardProduct.sku,
      barcode :product.standardProduct.barcode,
      is_enable:product.standardProduct.isEnabled,
    }
  }else{
    data.variant_products = variantList.value;
  }

  if (selectProductUnitType.value === 'single'){
    data.single_product_unit = {
      id:product.unit,
    }

  }else{
    data.multi_product_unit = {
      base_id : productUnit.baseUnitId,
      other_units:productUnit.units,
    }
  }



  web.post('/products', data).then((res) => {
    // alert(res.data);
  }).catch((err) => {
    console.log(err);
  });

}

const modalStatus = (value) => {
  modalOpen.value = value;
  selectedVariantProduct.value = {
    variantName: '',
    refPurchasePrice: 0,
    refSellingPrice: 0,
    altCode: '',
    sku: '',
    barcode: '',
    isEnabled: true,
  };
}

const openUploadImageModal = (data) => {
  selectedVariantProduct.value = data;
  modalOpen.value = true;
}

watch(selectProductUnitType, (value) => {
  if (value === 'multi') {
    productUnit.units = [];

    let data = {
      id: '',
      ratio: 1,
    }
    productUnit.units.push(data);
  }
})

watch(wizardPageIndex, (value) => {
  if (value === 3) {

    tempVariantList.value = [];
    variantList.value = [];

    product.variantProductAttributes.forEach((value) => {

      let array = [];
      value.list.forEach((innerValue) => {
        array.push(innerValue.value);
      });
      tempVariantList.value.push(array);

    });

    const output = [""];

    variantList.value = generateOutput(tempVariantList.value, output, 0);

  }


});

onMounted(() => {
  getData();
});

</script>

<style scoped>

</style>