<template>
  <TabPanel>
    <category-add-new v-model:category="category" v-model:is-open="modalOpen"
                      @modal-close="modalStatus"></category-add-new>
    <!--    <customer-group-delete v-model:is-open="deleteModalOpen" v-model:group="group" @modal-close="modalStatus"></customer-group-delete>-->

    <div class="flex flex-col sm:flex-row items-center mt-8">
      <!--      <h2 class="text-lg font-medium mr-auto"></h2>-->
      <div class="ml-auto w-full sm:w-auto flex flex-wrap gap-y-3 mt-4 sm:mt-0">
        <button class="btn btn-primary shadow-md mr-2" @click="modalOpen = true">
          <PlusIcon class="w-4 h-4 mr-2"/>
          New Category
        </button>
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
    </div><!-- END: HTML Table Data -->

  </TabPanel>
</template>

<script>
export default {
  name: "attribute-index"
}
</script>

<script setup>
import {TabPanel} from "@/global-components/tab";
import {Dropdown, DropdownContent, DropdownToggle, DropdownMenu, DropdownItem} from "@/global-components/dropdown";
import {ref, reactive, onMounted} from "vue";
import xlsx from "xlsx";
import {createIcons, icons} from "lucide";
import Tabulator from "tabulator-tables";
import dom from "@left4code/tw-starter/dist/js/dom";
import {useApi} from "@/api/useAPI";
import AttributeAddNew from './add-new.vue';
import CategoryAddNew from "@/components/product-page/categories/add-new.vue";

const web = useApi('web');
const tableRef = ref();
const tabulator = ref();
const categories = ref([]);
const category = ref(null);
const modalOpen = ref(false);
const deleteModalOpen = ref(false);

const modalStatus = (value) => {
  modalOpen.value = value;
  deleteModalOpen.value = value;
  category.value = null;
  getData().then(()=>{
    if (value === false){
      tabulator.value.setData(categories.value);
    }
  });
}

const getData = async () => {
  await web.get('/categories').then((response) => {
    categories.value = response.data;
  });
}

const editData = (data) => {
  category.value = {
    id: data.id,
    name: data.name,
  }
  modalOpen.value = true;


}

const initTabulator = () => {
  tabulator.value = new Tabulator(tableRef.value, {
    data: categories.value,
    // ajaxURL: "https://dummy-data.left4code.com",
    // ajaxFiltering: true,
    // ajaxSorting: true,
    printAsHtml: true,
    printStyled: true,
    // pagination: "remote",
    // paginationSize: 10,
    // paginationSizeSelector: [10, 50, 100, 250],
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
        title: "CATEGORY NAME",
        minWidth: 200,
        responsive: 0,
        field: "name",
        vertAlign: "middle",
        print: false,
        download: false,
        formatter(cell) {
          return `<div class="font-medium whitespace-nowrap">${cell.getData().name}</div>`;
        },
      },
      {
        title: "ACTIONS",
        minWidth: 200,
        field: "actions",
        responsive: 1,
        hozAlign: "center",
        vertAlign: "middle",
        print: false,
        download: false,
        formatter(cell) {

          const a = dom(`<div class="flex lg:justify-center items-center">
                <a class="flex items-center mr-3 edit-btn"  href="javascript:;">
                  <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                </a>
<!--                <a class="flex items-center text-danger delete-btn" href="javascript:;">-->
<!--                  <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete-->
<!--                </a>-->
              </div>`);
          //Edit Button Action
          dom(a).find(".edit-btn").on("click", function () {
            // alert(JSON.stringify(cell.getData()));
            editData(cell.getData());
          });
          //Delete Button Action
          dom(a).find(".delete-btn").on("click", function () {
            alert("DELETE");
          });
          return a[0];
        },
      },

      // For print format
      // {
      //   title: "ATTRIBUTE NAME",
      //   field: "name",
      //   visible: false,
      //   print: true,
      //   download: true,
      // },
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

// Export
const onExportXlsx = () => {
  const win = window;
  win.XLSX = xlsx;
  tabulator.value.download("xlsx", "data.xlsx", {
    sheetName: "Products",
  });
};

const onExportHtml = () => {
  tabulator.value.download("html", "data.html", {
    style: true,
  });
};

// Print
const onPrint = () => {
  tabulator.value.print();
};

onMounted(async () => {
  await getData();
  await initTabulator();
  reInitOnResizeWindow();
});
</script>

<style scoped>

</style>