import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

import Home from "./pages/Home";
import Register from "./pages/Register";
import store from "./store";
import Store from "./pages/Store.vue";
import NewProduct from "./pages/Product/NewProduct";
import ShowProduct from "./pages/Product/ShowProduct";
import EditProduct from "./pages/Product/EditProduct";
import UserProducts from "./pages/Product/UserProducts";
import UserProfile from "./pages/User/UserProfile";
import CartDetails from "./pages/CartDetails";
import UserInfo from "./pages/Checkout/UserInfo";
import DeliveryInfo from "./pages/Checkout/DeliveryInfo";
import PaymentInfo from "./pages/Checkout/PaymentInfo";
import Forgot from "./pages/User/Forgot";
import Reset from "./pages/User/Reset";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/registracija",
        name: "registration",
        component: Register,
        beforeEnter: (to, from, next) => {
            if (store.state.user.status) {
                next(false);
            } else {
                next();
            }
        },
    },
    {
        path: "/trznica",
        name: "store",
        component: Store,
    },
    {
        path: "/dodaj-proizvod",
        name: "new-product",
        component: NewProduct,
        beforeEnter: (to, from, next) => {
            if (store.state.user.status) {
                next();
            } else {
                next(false);
            }
        },
    },
    {
        path: "/product/:id",
        name: "product-id",
        component: ShowProduct,
    },
    {
        path: "/product/:id/edit",
        name: "edit-product",
        component: EditProduct,
    },
    {
        path: "/user/:id/products",
        name: "user-products",
        component: UserProducts,
    },
    {
        path: "/user/:id/profile",
        name: "user-profile",
        component: UserProfile,
    },
    {
        path: "/cart-details",
        name: "cart-details",
        component: CartDetails,
    },
    {
        path: "/checkout-user",
        name: "checkoutUser",
        component: UserInfo,

        beforeEnter: (to, from, next) => {
            if (localStorage.cart.length == 2) {
                next(false);
            } else {
                next();
            }
        },
    },
    {
        path: "/delivery-info",
        name: "deliveryInfo",
        component: DeliveryInfo,
        beforeEnter: (to, from, next) => {
            if (localStorage.cart.length == 2 || !localStorage.order_userInfo) {
                next(false);
            } else {
                next();
            }
        },
    },
    {
        path: "/payment-info",
        name: "paymentInfo",
        component: PaymentInfo,
        beforeEnter: (to, from, next) => {
            if (
                localStorage.cart.length == 2 ||
                !localStorage.order_userInfo ||
                !localStorage.order_deliveryInfo
            ) {
                next(false);
            } else {
                next();
            }
        },
    },
    {
        path: "/forgot",
        name: "forgot",
        component: Forgot,
        beforeEnter: (to, from, next) => {
            if (!store.state.user.status) {
                next();
            } else {
                next(false);
            }
        },
    },
    {
        path: "/reset/:token",
        name: "reset",
        component: Reset,
    },
];

export default new Router({
    mode: "hash",
    routes: routes,
});
