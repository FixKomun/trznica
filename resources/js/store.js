import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

function updateCartLocalStorage(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}
function updateOrderUserLocalStorage(orderUserInfo) {
    localStorage.setItem("order_userInfo", JSON.stringify(orderUserInfo));
}
function updateOrderDeliveryLocalStorage(orderDeliveryInfo) {
    localStorage.setItem(
        "order_deliveryInfo",
        JSON.stringify(orderDeliveryInfo)
    );
}
function updateOrderPaymentLocalStorage(orderPaymentInfo) {
    localStorage.setItem("order_paymentInfo", JSON.stringify(orderPaymentInfo));
}

export default new Vuex.Store({
    state: {
        user: {
            status: false,
            firstName: "",
            id: "",
        },
        userList: [],
        activeProduct: {
            data: "",
            product_id: "",
            user_id: "",
        },
        cart: [],
        order: {
            userInfo: "",
            deliveryInfo: "",
            paymentInfo: "",
        },
        search: "",
        cardElement: {},
    },
    getters: {
        getProductQuantity: (state) => (product) => {
            const item = state.cart.find((i) => i.id === product.id);

            if (item) {
                return item.quantity;
            } else {
                return 0;
            }
        },
        totalPrice: (state) => {
            //a = previous, b = current state
            return state.cart.reduce((a, b) => a + b.price * b.quantity, 0);
        },
        getCartItems: (state) => {
            return state.cart;
        },
        getOrderInfo: (state) => {
            return state.order;
        },
    },
    mutations: {
        setUserLoginStatus(state, data) {
            state.user.status = data;
            if (data.firstName) {
                state.user.firstName = data.firstName;
                state.user.id = data.id;
            }
        },
        setActiveProduct(state, data) {
            state.activeProduct.user_id = data.user.id;
            state.activeProduct.product_id = data.id;
            state.activeProduct.data = data;
        },
        addToCart(state, product) {
            let item = state.cart.find((i) => i.id === product.id);
            if (item) {
                item.quantity++;
            } else {
                state.cart.push({ ...product, quantity: 1 });
            }

            updateCartLocalStorage(state.cart);
        },
        removeFromCart(state, product) {
            let item = state.cart.find((i) => i.id === product.id);

            if (item) {
                if (item.quantity > 1) {
                    item.quantity--;
                } else {
                    state.cart = state.cart.filter((i) => i.id !== product.id);
                }
            }
            updateCartLocalStorage(state.cart);
        },
        removeWholeProductFromCart(state, product) {
            let index = state.cart.indexOf(product);
            state.cart.splice(index, 1);
            updateCartLocalStorage(state.cart);
        },
        saveUsers(state, users) {
            state.userList = users;
        },
        updateCartFromLocalStorage(state) {
            const cart = localStorage.getItem("cart");
            if (cart) {
                state.cart = JSON.parse(cart);
            }
        },
        updateOrderFromLocaleStorage(state) {
            const order_userInfo = localStorage.getItem("order_userInfo");
            const order_deliveryInfo =
                localStorage.getItem("order_deliveryInfo");
            const order_paymentInfo = localStorage.getItem("order_paymentInfo");
            if (order_userInfo) {
                state.order.userInfo = JSON.parse(order_userInfo);
            }
            if (order_deliveryInfo) {
                state.order.deliveryInfo = JSON.parse(order_deliveryInfo);
            }
            if (order_paymentInfo) {
                state.order.paymentInfo = JSON.parse(order_paymentInfo);
            }
        },
        addUserInfoToOrder(state, userInfo) {
            state.order.userInfo = userInfo;
            updateOrderUserLocalStorage(state.order.userInfo);
        },
        addDeliveryInfoToOrder(state, deliveryInfo) {
            state.order.deliveryInfo = deliveryInfo;
            updateOrderDeliveryLocalStorage(state.order.deliveryInfo);
        },
        addPaymentInfoToOrder(state, paymentInfo) {
            state.order.paymentInfo = paymentInfo;
            updateOrderPaymentLocalStorage(state.order.paymentInfo);
        },
        addCardElement(state, cardElement) {
            state.cardElement = cardElement;
        },
    },
});
