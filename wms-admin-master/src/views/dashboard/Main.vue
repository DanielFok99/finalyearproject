<template>
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-12">
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-6">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
            <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
              <CalendarIcon
                  class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"
              />
              <Litepicker
                  v-model="generalReportFilter"
                  :options="{
                  autoApply: false,
                  singleMode: false,
                  numberOfColumns: 2,
                  numberOfMonths: 2,
                  showWeekNumbers: true,
                  dropdowns: {
                    minYear: 1990,
                    maxYear: null,
                    months: true,
                    years: true,
                  },
                }"
                  class="form-control sm:w-56 box pl-10"
              />
            </div>
          </div>
          <div class="intro-y report-box mt-12 sm:mt-4">
            <div
                class="box py-0 xl:py-5 grid grid-cols-12 gap-0 divide-y xl:divide-y-0 divide-x divide-dashed divide-slate-200 dark:divide-white/5"
            >
              <div
                  class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3"
              >
                <div class="report-box__content">
                  <div class="flex">
                    <div
                        class="report-box__item__icon text-primary bg-primary/20 border border-primary/20 flex items-center justify-center rounded-full"
                    >
                      <PieChartIcon/>
                    </div>
                    <div class="ml-auto">
<!--                      <Tippy-->
<!--                          tag="div"-->
<!--                          class="report-box__item__indicator text-success cursor-pointer"-->
<!--                          content="5.2% Higher than last month"-->
<!--                      >-->
<!--&lt;!&ndash;                        +5.2%&ndash;&gt;-->
<!--                        <ArrowUpIcon class="w-4 h-4 ml-0.5"/>-->
<!--                      </Tippy>-->
                    </div>
                  </div>
                  <div class="text-2xl font-medium leading-7 mt-6">
                    0 QTY
                  </div>
                  <div class="text-slate-500 mt-1">To be Packed</div>
                </div>
              </div>
              <div
                  class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3"
              >
                <div class="report-box__content">
                  <div class="flex">
                    <div
                        class="report-box__item__icon text-pending bg-pending/20 border border-pending/20 flex items-center justify-center rounded-full"
                    >
                      <CreditCardIcon/>
                    </div>
                    <div class="ml-auto">
<!--                      <Tippy-->
<!--                          tag="div"-->
<!--                          class="report-box__item__indicator text-danger cursor-pointer"-->
<!--                          content="2% Lower than last month"-->
<!--                      >-->
<!--                        -2%-->
<!--                        <ArrowDownIcon class="w-4 h-4 ml-0.5"/>-->
<!--                      </Tippy>-->
                    </div>
                  </div>
                  <div class="text-2xl font-medium leading-7 mt-6">0 PKGS</div>
                  <div class="text-slate-500 mt-1">To be Shipped</div>
                </div>
              </div>
              <div
                  class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3"
              >
                <div class="report-box__content">
                  <div class="flex">
                    <div
                        class="report-box__item__icon text-warning bg-warning/20 border border-warning/20 flex items-center justify-center rounded-full"
                    >
                      <ShoppingBagIcon/>
                    </div>
                    <div class="ml-auto">
<!--                      <Tippy-->
<!--                          tag="div"-->
<!--                          class="report-box__item__indicator text-success cursor-pointer"-->
<!--                          content="4.1% Higher than last month"-->
<!--                      >-->
<!--                        +4.1%-->
<!--                        <ArrowDownIcon class="w-4 h-4 ml-0.5"/>-->
<!--                      </Tippy>-->
                    </div>
                  </div>
                  <div class="text-2xl font-medium leading-7 mt-6">0 PKGS</div>
                  <div class="text-slate-500 mt-1">   To be Delivered </div>
                </div>
              </div>
              <div
                  class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3"
              >
                <div class="report-box__content">
                  <div class="flex">
                    <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full"
                    >
                      <HardDriveIcon/>
                    </div>
                    <div class="ml-auto">
<!--                      <Tippy-->
<!--                          tag="div"-->
<!--                          class="report-box__item__indicator text-danger cursor-pointer"-->
<!--                          content="1% Lower than last month"-->
<!--                      >-->
<!--                        -1%-->
<!--                        <ArrowDownIcon class="w-4 h-4 ml-0.5"/>-->
<!--                      </Tippy>-->
                    </div>
                  </div>
                  <div class="text-2xl font-medium leading-7 mt-6">0 QTY</div>
                  <div class="text-slate-500 mt-1">To be Invoiced</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END: General Report -->
        <!-- BEGIN: Seller Report -->
        <div
            class="col-span-12 sm:col-span-6 lg:col-span-3 sm:row-start-4 md:row-start-3 lg:row-start-auto mt-4"
        >
          <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Product Details</h2>
<!--            <a href="" class="ml-auto text-slate-500 truncate">View More</a>-->
          </div>
          <div class="intro-y box p-5 mt-4">
            <div class="relative px-3">
              <div class="w-40 mx-auto lg:w-auto">
                <ReportDonutChart1 class="mt-2 z-10 relative" :height="210" />
              </div>
              <div
                  class="flex flex-col justify-center items-center absolute w-full h-full top-0 left-0"
              >
                <div class="text-2xl leading-7 font-medium">120</div>
                <div class="text-slate-500 mt-1"> Items </div>
              </div>
            </div>
<!--            <div class="w-52 lg:w-auto mx-auto mt-6">-->
<!--              <div class="flex items-center">-->
<!--                <div-->
<!--                    class="w-2 h-2 bg-primary/50 border border-primary/50 rounded-full mr-3"-->
<!--                ></div>-->
<!--                <span class="truncate">17 - 30 Years old</span>-->
<!--                <span class="ml-auto">50%</span>-->
<!--              </div>-->
<!--              <div class="flex items-center mt-4">-->
<!--                <div-->
<!--                    class="w-2 h-2 bg-pending/50 border border-pending/50 rounded-full mr-3"-->
<!--                ></div>-->
<!--                <span class="truncate">31 - 50 Years old</span>-->
<!--                <span class="ml-auto">30%</span>-->
<!--              </div>-->
<!--              <div class="flex items-center mt-4">-->
<!--                <div-->
<!--                    class="w-2 h-2 bg-warning/50 border border-warning/60 rounded-full mr-3"-->
<!--                ></div>-->
<!--                <span class="truncate">>= 50 Years old</span>-->
<!--                <span class="ml-auto">20%</span>-->
<!--              </div>-->
<!--            </div>-->
          </div>
        </div>
        <!-- END: Seller Report -->
      </div>
    </div>

  </div>
</template>

<script setup>
import {ref} from "vue";
import ReportDonutChart1 from '../../components/report-donut-chart-1/Main.vue'


const generalReportFilter = ref();


</script>
