<template>
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
      <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 mt-6">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Contacts</h2>
          </div>

          <TabGroup class="col-span-12 2xl:col-span-9">
            <div class="box intro-y p-3">
              <TabList class="nav nav-pills flex-col md:flex-row">
                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <UsersIcon class="w-4 h-4 mr-2"/>
                  Customers
                </Tab>
                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Customer Groups
                </Tab>

                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Suppliers
                </Tab>
              </TabList>
            </div>


            <TabPanels>
              <customer-index></customer-index>
              <customer-group-index></customer-group-index>
              <supplier-index></supplier-index>


            </TabPanels>
          </TabGroup>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "contact-page"
}
</script>

<script setup>

import CustomerIndex from "../../components/contact-page/customers/index.vue";
import CustomerGroupIndex from "../../components/contact-page/customer-groups/index.vue";
import SupplierIndex from "../../components/contact-page/suppliers/index.vue";
import {Tab, TabGroup, TabList, TabPanels} from "@/global-components/tab";
</script>
