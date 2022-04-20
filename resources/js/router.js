import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

import Home from "./pages/Home";
import Register from "./pages/Register";
import Store from "./pages/Store";
import NewProduct from "./pages/Product/NewProduct";
import ShowProduct from "./pages/Product/ShowProduct";
import EditProduct from "./pages/Product/EditProduct";
import UserProducts from "./pages/Product/UserProducts";
import CartDetails from "./pages/CartDetails";
import UserInfo from "./pages/Checkout/UserInfo";
import DeliveryInfo from "./pages/Checkout/DeliveryInfo";
import PaymentInfo from "./pages/Checkout/PaymentInfo";
import OrderSummary from "./pages/Checkout/OrderSummary";

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
        path: "/cart-details",
        name: "cart-details",
        component: CartDetails,
    },
    {
        path: "/checkout-user",
        name: "checkoutUser",
        component: UserInfo,
    },
    {
        path: "/delivery-info",
        name: "deliveryInfo",
        component: DeliveryInfo,
    },
    {
        path: "/payment-info",
        name: "paymentInfo",
        component: PaymentInfo,
    },
    {
        path: "/order-summary",
        name: "orderSummary",
        component: OrderSummary,
    },
];

export default new Router({
    mode: "hash",
    routes: routes,
});
