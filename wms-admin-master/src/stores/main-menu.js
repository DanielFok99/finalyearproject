import {defineStore} from "pinia";

export const useMainMenuStore = defineStore("mainMenu", {
  state: () => ({
    menu: [
      {
        icon: "HomeIcon",
        pageName: "dashboard",
        title: "Dashboard",
      },
      {
        icon: "ShoppingBagIcon",
        pageName: "purchase-order",
        title: "Purchase Order",
      },
      {
        icon: "ShoppingCartIcon",
        pageName: "sales-order",
        title: "Sales Order",
      },
      {
        icon: "BoxIcon",
        pageName: "product",
        title: "Product",
      },
      {
        icon: "UserIcon",
        pageName: "contact",
        title: "Contact",
      },
      {
        icon: "SettingsIcon",
        pageName: "setting",
        title: "Setting",
      },
    ],
  }),
});
