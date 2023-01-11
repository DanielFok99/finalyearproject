import {createRouter, createWebHistory} from "vue-router";
import MainLayout from "../layout/Main.vue";
import authMiddleware from "@/router/middleware/auth-middleware";

const routes = [
    {
        path: "/",
        component: MainLayout,
        meta: {
            requireAuth: true,
        },
        children: [
            {
                path: "/",
                name: "dashboard",
                component: () => import('../views/dashboard/Main.vue')

            },
            {
                path: "/purchase-order",
                name: "purchase-order",
                component: () => import('../views/purchase-order-page/Main.vue')

            },
            {
                path: "/purchase-order/add-new",
                name: "purchase-order-add-new",
                component: () => import('../views/purchase-order-page/add-new.vue')

            },
            {
                path: "/sales-order",
                name: "sales-order",
                component: () => import('../views/sales-order-page/Main.vue')

            },
            {
                path: "/products",
                name: "product",
                component: () => import('../views/product-page/Main.vue')

            },
            {
                path: "/products/add-new",
                name: "product-add-new",
                component: () => import('../views/product-page/add-new.vue')

            },
            {
                path: "/contact",
                name: "contact",
                component: () => import('../views/contact-page/Main.vue')
            },
            {
                path: "/setting",
                name: "setting",
                component: () => import('../views/setting-page/Main.vue')
            },
            {
                path: "/testing",
                name: "testing",
                component: () => import('../views/test-page/index.vue')
            },

        ],
    },
    {
        path: "/login",
        name: "login",
        component: () => import('../views/login/Main.vue')
    },
    {
        path: "/error-page",
        name: "error-page",
        component: () => import('../views/error-page/Main.vue'),
    },
    {
        path: "/:pathMatch(.*)*",
        component: () => import('../views/error-page/Main.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return savedPosition || {left: 0, top: 0};
    },
});

router.beforeEach(authMiddleware);

export default router;
