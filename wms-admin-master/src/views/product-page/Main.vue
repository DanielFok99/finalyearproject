<template>
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
      <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 mt-6">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Products</h2>
          </div>

          <TabGroup class="col-span-12 2xl:col-span-9">
            <div class="box intro-y p-3">
              <TabList class="nav nav-pills flex-col md:flex-row">
                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <UsersIcon class="w-4 h-4 mr-2"/>
                  Product
                </Tab>
                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Category
                </Tab>

                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Brand
                </Tab>

                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Group
                </Tab>

                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Attribute
                </Tab>

                <Tab
                    class="w-full flex items-center justify-center !rounded-lg py-3"
                    tag="button"
                >
                  <InboxIcon class="w-4 h-4 mr-2"/>
                  Unit
                </Tab>
              </TabList>
            </div>


            <TabPanels>
              <product-index></product-index>
              <category-index></category-index>
              <brand-index></brand-index>
              <group-index></group-index>
              <attribute-index></attribute-index>
              <unit-index></unit-index>
            </TabPanels>
          </TabGroup>

        </div>


      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: "product-page"
}
</script>

<script setup>
import {TabGroup, TabPanels} from "@/global-components/tab";

import ProductIndex from "../../components/product-page/products/index.vue";
import CategoryIndex from "../../components/product-page/categories/index.vue";
import GroupIndex from "../../components/product-page/groups/index.vue";
import AttributeIndex from "../../components/product-page/attributes/index.vue";
import UnitIndex from "../../components/product-page/units/index.vue";
import BrandIndex from "@/components/product-page/brands/index.vue";
</script>
