<template>
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: -->
        <div class="col-span-12 mt-6">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Settings</h2>

          </div>

        </div>
        <!-- END: General Report -->

      </div>
    </div>

  </div>

  <div class="box grid grid-cols-12 mt-3">

    <!--    <TabGroup>-->
    <!--      <div-->
    <!--          class="col-span-12 xl:col-span-4 2xl:col-span-2 border-b xl:border-r border-slate-200/60 bg-slate-50 dark:bg-darkmode-600 p-5 rounded-l-md"-->
    <!--      >-->

    <!--        <div>-->

    <!--          <TabList>-->

    <!--            <Tab>-->
    <!--              <a href="" class="flex items-center px-3 py-2 rounded-md bg-primary dark:bg-darkmode-800 font-medium text-white">-->
    <!--                <MailIcon class="w-4 h-4 mr-2" /> Application-->
    <!--              </a>-->
    <!--            </Tab>-->
    <!--            <Tab>-->
    <!--              <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">-->
    <!--                <StarIcon class="w-4 h-4 mr-2" /> Devices-->
    <!--              </a>-->
    <!--            </Tab>-->
    <!--          </TabList>-->


    <!--        </div>-->


    <!--      </div>-->

    <!--      <TabPanels>-->

    <!--        <application-index></application-index>-->
    <!--        <device-index></device-index>-->
    <!--      </TabPanels>-->

    <!--    </TabGroup>-->
    <!-- BEGIN: Inbox Side Menu -->
    <div
        class="col-span-12 xl:col-span-4 2xl:col-span-2 border-b xl:border-r border-slate-200/60 bg-slate-50 dark:bg-darkmode-600 p-5 rounded-l-md"
    >
      <div>
        <a
            href=""
            class="flex items-center px-3 py-2 rounded-md bg-primary dark:bg-darkmode-800 font-medium text-white"
        >
          <MailIcon class="w-4 h-4 mr-2"/>
          Application
        </a>
        <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
          <StarIcon class="w-4 h-4 mr-2"/>
          Devices
        </a>

      </div>

    </div>
    <!-- END: Inbox Side Menu -->
    <!-- BEGIN: Inbox Content -->
    <div class="inbox col-span-12 xl:col-span-8 2xl:col-span-10">

      <qrcode-vue :value="qrcodeVueConfig.value" :size="qrcodeVueConfig.size" level="H"/>

      <!--      <div-->
      <!--          class="flex flex-wrap gap-y-3 items-center px-5 pt-5 border-b border-slate-200/60 dark:border-darkmode-400 mb-4 pb-5"-->
      <!--      >-->
      <!--        <button class="btn btn-outline-secondary mr-2">-->
      <!--          <UsersIcon class="w-4 h-4 mr-2" /> Create Group-->
      <!--        </button>-->
      <!--        <button class="btn btn-outline-secondary mr-auto">-->
      <!--          <VideoIcon class="w-4 h-4 mr-2" /> Start a Video Call-->
      <!--        </button>-->
      <!--        <div class="w-[350px] relative">-->
      <!--          <input-->
      <!--              type="text"-->
      <!--              class="form-control pl-10"-->
      <!--              placeholder="Search for messages or users..."-->
      <!--          />-->
      <!--          <SearchIcon-->
      <!--              class="w-5 h-5 absolute inset-y-0 left-0 my-auto text-slate-400 ml-3"-->
      <!--          />-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      <div-->
      <!--          class="px-5 pb-4 flex flex-col-reverse sm:flex-row text-slate-500 border-b border-slate-200/60"-->
      <!--      >-->
      <!--        <div-->
      <!--            class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-slate-200/60 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0"-->
      <!--        >-->
      <!--          <input class="form-check-input" type="checkbox" />-->

      <!--          <Dropdown class="ml-1" placement="bottom-start">-->
      <!--            <DropdownToggle class="w-5 h-5 block">-->
      <!--              <ChevronDownIcon class="w-5 h-5" />-->
      <!--            </DropdownToggle>-->
      <!--            <DropdownMenu class="w-40">-->
      <!--              <DropdownContent>-->
      <!--                <DropdownItem>All</DropdownItem>-->
      <!--                <DropdownItem>None</DropdownItem>-->
      <!--                <DropdownItem>Read</DropdownItem>-->
      <!--                <DropdownItem>Unread</DropdownItem>-->
      <!--                <DropdownItem>Starred</DropdownItem>-->
      <!--                <DropdownItem>Unstarred</DropdownItem>-->
      <!--              </DropdownContent>-->
      <!--            </DropdownMenu>-->
      <!--          </Dropdown>-->
      <!--          <a-->
      <!--              href="javascript:;"-->
      <!--              class="w-5 h-5 ml-5 flex items-center justify-center"-->
      <!--          >-->
      <!--            <RefreshCwIcon class="w-4 h-4" />-->
      <!--          </a>-->
      <!--          <a-->
      <!--              href="javascript:;"-->
      <!--              class="w-5 h-5 ml-5 flex items-center justify-center"-->
      <!--          >-->
      <!--            <MoreHorizontalIcon class="w-4 h-4" />-->
      <!--          </a>-->
      <!--        </div>-->
      <!--        <div class="flex items-center sm:ml-auto">-->
      <!--          <div class="">1 - 50 of 5,238</div>-->
      <!--          <a-->
      <!--              href="javascript:;"-->
      <!--              class="w-5 h-5 ml-5 flex items-center justify-center"-->
      <!--          >-->
      <!--            <ChevronLeftIcon class="w-4 h-4" />-->
      <!--          </a>-->
      <!--          <a-->
      <!--              href="javascript:;"-->
      <!--              class="w-5 h-5 ml-5 flex items-center justify-center"-->
      <!--          >-->
      <!--            <ChevronRightIcon class="w-4 h-4" />-->
      <!--          </a>-->
      <!--          <a-->
      <!--              href="javascript:;"-->
      <!--              class="w-5 h-5 ml-5 flex items-center justify-center"-->
      <!--          >-->
      <!--            <SettingsIcon class="w-4 h-4" />-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      <div class="overflow-x-auto sm:overflow-x-visible">-->
      <!--        <div v-for="(faker, fakerKey) in $f()" :key="fakerKey" class="intro-y">-->
      <!--          <div-->
      <!--              class="inbox__item inline-block sm:block text-slate-600 dark:text-slate-500 bg-slate-100 dark:bg-darkmode-400/70 border-b border-slate-200/60 dark:border-darkmode-400"-->
      <!--              :class="{ 'inbox__item&#45;&#45;active': faker.trueFalse[0] }"-->
      <!--          >-->
      <!--            <div class="flex px-5 py-3">-->
      <!--              <div class="w-72 flex-none flex items-center mr-5">-->
      <!--                <input-->
      <!--                    class="form-check-input flex-none"-->
      <!--                    type="checkbox"-->
      <!--                    :checked="!faker.trueFalse[0]"-->
      <!--                />-->
      <!--                <a-->
      <!--                    href="javascript:;"-->
      <!--                    class="w-5 h-5 flex-none ml-4 flex items-center justify-center text-slate-400"-->
      <!--                >-->
      <!--                  <StarIcon class="w-4 h-4" />-->
      <!--                </a>-->
      <!--                <a-->
      <!--                    href="javascript:;"-->
      <!--                    class="w-5 h-5 flex-none ml-2 flex items-center justify-center text-slate-400"-->
      <!--                >-->
      <!--                  <BookmarkIcon class="w-4 h-4" />-->
      <!--                </a>-->
      <!--                <div class="w-6 h-6 flex-none image-fit relative ml-5">-->
      <!--                  <img-->
      <!--                      alt="Rocketman Tailwind HTML Admin Template"-->
      <!--                      class="rounded-full"-->
      <!--                      :src="faker.photos[0]"-->
      <!--                  />-->
      <!--                </div>-->
      <!--                <div class="inbox__item&#45;&#45;sender truncate ml-3">-->
      <!--                  {{ faker.users[0].name }}-->
      <!--                </div>-->
      <!--              </div>-->
      <!--              <div class="w-64 sm:w-auto truncate">-->
      <!--                <span class="inbox__item&#45;&#45;highlight">{{-->
      <!--                    faker.news[0].superShortContent-->
      <!--                  }}</span>-->
      <!--                {{ faker.news[0].shortContent }}-->
      <!--              </div>-->
      <!--              <div class="inbox__item&#45;&#45;time whitespace-nowrap ml-auto pl-10">-->
      <!--                {{ faker.times[0] }}-->
      <!--              </div>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      <div-->
      <!--          class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-slate-500"-->
      <!--      >-->
      <!--        <div>4.41 GB (25%) of 17 GB used Manage</div>-->
      <!--        <div class="sm:ml-auto mt-2 sm:mt-0">-->
      <!--          Last account activity: 36 minutes ago-->
      <!--        </div>-->
      <!--      </div>-->
    </div>
    <!-- END: Inbox Content -->
  </div>
</template>

<script setup>
import QrcodeVue from 'qrcode.vue';
import {onMounted, ref} from "vue";
import {useApi} from "@/api/useAPI";

const web = useApi('web');


const qrcodeVueConfig = ref({
  'value': 'http://192.168.8.107/wms/public/api/',
  // 'value': 'http://192.168.50.22/wms/public/api/ip',
  'size': 300,
});

onMounted(() => {
  web.get('/').then((response) => {

  });
})

</script>
