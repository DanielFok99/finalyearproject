<template>
  <TabPanel>

    <div class="flex flex-col sm:flex-row items-center mt-8">
      <!--      <h2 class="text-lg font-medium mr-auto"></h2>-->
      <div class="ml-auto w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
        <!--        <button class="btn btn-primary shadow-md mr-2" @click="modalOpen = true">-->
        <!--          <PlusIcon class="w-4 h-4 mr-2"/>-->
        <!--          New Product-->
        <!--        </button>-->

        <router-link to="/products/add-new">
          <button class="btn btn-primary shadow-md mr-2">
            <PlusIcon class="w-4 h-4 mr-2"/>
            New Product
          </button>
        </router-link>

        <Dropdown class="ml-auto sm:ml-0">
          <DropdownToggle class="btn px-2 box">
            <span class="w-5 h-5 flex items-center justify-center">
              <MenuIcon class="w-4 h-4"/>
            </span>
          </DropdownToggle>
          <DropdownMenu class="w-40">
            <DropdownContent>
              <DropdownItem @click="onPrint">
                <PrinterIcon class="w-4 h-4 mr-2"/>
                Print
              </DropdownItem>
              <DropdownItem>
                <UploadIcon class="w-4 h-4 mr-2"/>
                Import
              </DropdownItem>
              <DropdownItem @click="onExportXlsx">
                <FileTextIcon class="w-4 h-4 mr-2"/>
                Export
              </DropdownItem>
            </DropdownContent>
          </DropdownMenu>
        </Dropdown>

        <!--        <button class="btn box mr-2">-->
        <!--        -->
        <!--        </button>-->
        <!--        <button class="btn box">-->
        <!--       -->
        <!--        </button>-->
      </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
      <div class="overflow-x-auto scrollbar-hidden">
        <div
            id="tabulator"
            ref="tableRef"
            class="mt-5 table-report table-report--tabulator"
        ></div>
      </div>
    </div>
    <!-- END: HTML Table Data -->

    <!--
    <div class="box p-5 intro-y mt-5">
      <table class="table table-report -mt-2">
        <thead>
        <tr>
          <th class="whitespace-nowrap">NAME</th>
          <th class="whitespace-nowrap">EMAIL</th>
          <th class="text-center whitespace-nowrap">PHONE NUMBER</th>
          <th class="text-center whitespace-nowrap">CUSTOMER GROUP</th>
          <th class="text-center whitespace-nowrap">STATUS</th>
          <th class="text-center whitespace-nowrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(customer , index) in customers" :key="index" class="intro-x">
          <td class="w-40">
            <div class="font-medium whitespace-nowrap">
              {{ customer.customer_name }}
            </div>
          </td>
          <td class="w-40"> {{ customer.email }}</td>
          <td class="w-40"> {{ customer.customer_contact }}</td>
          <td class="w-40"> {{ customer.customer_group_name }}</td>
          <td class="w-40">
            <div
                class="flex items-center justify-center status"
                :class="{
                  'text-success': customer.status === 'activate',
                  'text-danger': customer.status !== 'activate',
                }"
            >
              <CheckSquareIcon class="w-4 h-4 mr-2"/>
              {{  capitalized(customer.status) }}
            </div>
          </td>
          <td class="table-report__action w-56">
            <div class="flex justify-center items-center">
              <button class="flex items-center mr-3" @click="editData(index)">
                <CheckSquareIcon class="w-4 h-4 mr-1"/>
                Edit
              </button>
              <button class="flex items-center text-danger" @click="deleteData(index)">
                <Trash2Icon class="w-4 h-4 mr-1"/>
                Delete
              </button>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    -->
  </TabPanel>
</template>

<script>
export default {
  name: "product-index"
}
</script>

<script setup>
import {TabPanel} from "@/global-components/tab";
import {ref, reactive, onMounted} from "vue";
import xlsx from "xlsx";
import {createIcons, icons} from "lucide";
import Tabulator from "tabulator-tables";
import dom from "@left4code/tw-starter/dist/js/dom";
import {useApi} from "@/api/useAPI";
import ProductAddNew from "@/components/product-page/products/upload-image.vue";

const web = useApi('web');
const tableRef = ref();
const tabulator = ref();
const filter = reactive({
  field: "name",
  type: "like",
  value: "",
});
const tableData = reactive([]);
const products = ref([]);
const product = ref(null);
const modalOpen = ref(false);
const deleteModalOpen = ref(false);


const modalStatus = (value) => {
  modalOpen.value = value;
  deleteModalOpen.value = value;
  product.value = null;
  getData().then(()=>{
    if (value === false){
      tabulator.value.setData(products.value);
    }
  });
}

const getData = async () => {
  await web.get('/products').then((response) => {
    products.value = response.data;
  });
}


const initTabulator = () => {
  tabulator.value = new Tabulator(tableRef.value, {
    data: products.value,
    // ajaxURL: "https://dummy-data.left4code.com",
    // ajaxFiltering: true,
    // ajaxSorting: true,
    printAsHtml: true,
    printStyled: true,
    // pagination: "remote",
    // paginationSize: 10,
    // paginationSizeSelector: [10, 20, 30, 40],
    layout: "fitColumns",
    responsiveLayout: "collapse",
    placeholder: "No matching records found",
    columns: [
      {
        formatter: "responsiveCollapse",
        width: 40,
        minWidth: 30,
        hozAlign: "center",
        resizable: false,
        headerSort: false,
      },

      // For HTML table
      {
        title: "PRODUCT NAME",
        minWidth: 200,
        responsive: 0,
        field: "product_name",
        vertAlign: "middle",
        print: false,
        download: false,
        // formatter(cell) {
        //   return `<div>
        //         <div class="font-medium whitespace-nowrap">${
        //       cell.getData().name
        //   }</div>
        //         <div class="text-slate-500 text-xs whitespace-nowrap">${
        //       cell.getData().category
        //   }</div>
        //       </div>`;
        // },
      },
      {
        title: "BRAND NAME",
        minWidth: 200,
        field: "brand_name",
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
      },
      {
        title: "GROUP NAME",
        minWidth: 200,
        field: "group_name",
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
      },
      {
        title: "REMAINING STOCK",
        minWidth: 200,
        field: "remaining_stock",
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
      },
      // {
      //   title: "STATUS",
      //   minWidth: 200,
      //   field: "status",
      //   hozAlign: "center",
      //   vertAlign: "middle",
      //   print: false,
      //   download: false,
      //   formatter(cell) {
      //     return `<div class="flex items-center lg:justify-center ${
      //         cell.getData().status ? "text-success" : "text-danger"
      //     }">
      //           <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> ${
      //         cell.getData().status ? "Active" : "Inactive"
      //     }
      //         </div>`;
      //   },
      // },
      {
        title: "ACTIONS",
        minWidth: 200,
        field: "actions",
        responsive: 1,
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
        formatter() {
          const a = dom(`<div class="flex lg:justify-center items-center">
                <a class="flex items-center mr-3" href="javascript:;">
                  <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                </a>
                <a class="flex items-center text-danger" href="javascript:;">
                  <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                </a>
              </div>`);
          dom(a).on("click", function () {
            // On click actions
          });

          return a[0];
        },
      },

    ],
    renderComplete() {
      createIcons({
        icons,
        "stroke-width": 1.5,
        nameAttr: "data-lucide",
      });
    },
  });
};

// Redraw table onresize
const reInitOnResizeWindow = () => {
  window.addEventListener("resize", () => {
    tabulator.value.redraw();
    createIcons({
      icons,
      "stroke-width": 1.5,
      nameAttr: "data-lucide",
    });
  });
};

// Filter function
const onFilter = () => {
  tabulator.value.setFilter(filter.field, filter.type, filter.value);
};

// On reset filter
const onResetFilter = () => {
  filter.field = "name";
  filter.type = "like";
  filter.value = "";
  onFilter();
};

// Export
const onExportXlsx = () => {
  const win = window;
  win.XLSX = xlsx;
  tabulator.value.download("xlsx", "data.xlsx", {
    sheetName: "Products",
  });
};

// Print
const onPrint = () => {
  tabulator.value.print();
};

onMounted(async () => {
  await getData();
  initTabulator();
  reInitOnResizeWindow();
});

</script>

<style scoped>

</style>