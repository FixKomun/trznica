<template>
  <div>
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--CHECKOUT-->
      <b-container>
        <h1 class="title">Provjeri i potvrdi narudžbu!</h1>
        <b-row>
          <b-col cols="1" class="steps">
            <h2 :class="{ active: $route.name === 'checkoutUser' }">Početak</h2>
            <h2 :class="{ active: $route.name === 'deliveryInfo' }">Adresa</h2>
            <h2 :class="{ active: $route.name === 'paymentInfo' }">Plaćanje i dostava</h2>
            <h2 :class="{ active: $route.name === 'orderSummary' }">Potvrdi</h2>
          </b-col>
          <b-col cols="1">
            <svg
              width="45"
              height="613"
              viewBox="0 0 45 613"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="22.8929" cy="400.893" r="21.8929" fill="#8ED974" />
              <path d="M22.8169 43.7856L22.8169 189.745" stroke="#8ED974" stroke-width="2" />
              <path d="M22.8169 233.524L22.8169 379.484" stroke="#8ED974" stroke-width="2" />
              <circle
                cx="22.8167"
                cy="591.107"
                r="20.8929"
                fill="#8ED974"
                stroke="#8ED974"
                stroke-width="2"
              />
              <path
                d="M24.3882 595.906L17.8542 595.911C17.4582 595.911 17.1426 595.809 16.9073 595.603C16.672 595.398 16.5539 595.142 16.5529 594.834C16.552 594.526 16.6684 594.232 16.9022 593.953L25.188 584.003C25.5387 583.607 25.9048 583.408 26.2861 583.408C26.5941 583.408 26.8805 583.518 27.1451 583.737C27.5862 584.089 27.8072 584.419 27.8082 584.727C27.8087 584.903 27.7287 585.108 27.568 585.343L27.3051 585.695L27.3291 593.571L29.2871 593.57L29.2942 595.902L27.3362 595.903L27.3457 599.005L24.3977 599.007L24.3882 595.906ZM24.5351 593.573L24.5198 588.535L20.3331 593.577L24.5351 593.573Z"
                fill="white"
              />
              <path d="M22.8169 423.261L22.8169 569.221" stroke="#8ED974" stroke-width="2" />
              <circle cx="22.8929" cy="21.8929" r="21.8929" fill="#8ED974" />
              <path
                d="M32.1266 13.1379C31.2241 12.6428 30.2175 13.5976 29.6274 14.1635C28.2737 15.5074 27.1282 17.0635 25.8438 18.4781C24.4206 20.0342 23.1016 21.5903 21.6437 23.111C20.8106 23.9598 19.9081 24.8793 19.3528 25.9403C18.1031 24.7024 17.0271 23.3585 15.6386 22.2623C14.632 21.4842 12.9658 20.9184 13.0005 22.7927C13.07 25.233 15.1874 27.8501 16.7494 29.5122C17.4089 30.2195 18.2767 30.9622 19.2833 30.9976C20.4982 31.0683 21.7478 29.5829 22.4768 28.7695C23.7612 27.3549 24.8025 25.7634 25.9827 24.3135C27.51 22.4037 29.072 20.5293 30.5646 18.5842C31.5018 17.3817 34.4523 14.411 32.1266 13.1379ZM14.5278 22.6513C14.4931 22.6513 14.4584 22.6513 14.3889 22.6866C14.2501 22.6513 14.146 22.6159 14.0071 22.5451C14.1112 22.4744 14.2848 22.5098 14.5278 22.6513Z"
                fill="white"
              />
              <circle cx="22.8929" cy="211.893" r="21.8929" fill="#8ED974" />
              <path
                d="M32.1266 203.138C31.2241 202.643 30.2175 203.598 29.6274 204.163C28.2737 205.507 27.1282 207.063 25.8438 208.478C24.4206 210.034 23.1016 211.59 21.6437 213.111C20.8106 213.96 19.9081 214.879 19.3528 215.94C18.1031 214.702 17.0271 213.359 15.6386 212.262C14.632 211.484 12.9658 210.918 13.0005 212.793C13.07 215.233 15.1874 217.85 16.7494 219.512C17.4089 220.22 18.2767 220.962 19.2833 220.998C20.4982 221.068 21.7478 219.583 22.4768 218.77C23.7612 217.355 24.8025 215.763 25.9827 214.313C27.51 212.404 29.072 210.529 30.5646 208.584C31.5018 207.382 34.4523 204.411 32.1266 203.138ZM14.5278 212.651C14.4931 212.651 14.4584 212.651 14.3889 212.687C14.2501 212.651 14.146 212.616 14.0071 212.545C14.1112 212.474 14.2848 212.51 14.5278 212.651Z"
                fill="white"
              />
              <path
                d="M32.1266 393.136C31.2241 392.641 30.2175 393.596 29.6274 394.162C28.2737 395.505 27.1282 397.062 25.8438 398.476C24.4206 400.032 23.1016 401.588 21.6437 403.109C20.8106 403.958 19.9081 404.877 19.3528 405.938C18.1031 404.7 17.0271 403.357 15.6386 402.26C14.632 401.482 12.9658 400.916 13.0005 402.791C13.07 405.231 15.1874 407.848 16.7494 409.51C17.4089 410.218 18.2767 410.96 19.2833 410.996C20.4982 411.066 21.7478 409.581 22.4768 408.768C23.7612 407.353 24.8025 405.761 25.9827 404.312C27.51 402.402 29.072 400.527 30.5646 398.582C31.5018 397.38 34.4523 394.409 32.1266 393.136ZM14.5278 402.649C14.4931 402.649 14.4584 402.649 14.3889 402.685C14.2501 402.649 14.146 402.614 14.0071 402.543C14.1112 402.472 14.2848 402.508 14.5278 402.649Z"
                fill="white"
              />
            </svg>
          </b-col>
          <b-col cols="4" class="summary-user-info">
            <h1>Kratak pregled</h1>
            <div class="address">
              <h2>Adresa dostave</h2>
              <div class="address-info">
                <div class="address-des">
                  <h3>
                    {{
                    order.userInfo.firstName +
                    " " +
                    order.userInfo.lastName
                    }}
                  </h3>
                  <h3>{{ order.userInfo.address }}</h3>
                  <h3>
                    {{
                    order.deliveryInfo.zipCode +
                    "," +
                    order.deliveryInfo.city
                    }}
                  </h3>
                  <h3>{{ order.deliveryInfo.country }}</h3>
                </div>
                <div class="change">
                  <h4 @click="changeDelivery">promijeni</h4>
                </div>
              </div>
            </div>
            <div class="payment">
              <h2>Način plaćanja</h2>
              <div class="payment-desc">
                <h3>{{ order.paymentInfo.selectedPayment }}</h3>
                <div class="change">
                  <h4 @click="changePayment">promijeni</h4>
                </div>
              </div>
            </div>
            <div class="delivery">
              <h2>Dostava</h2>
              <div class="delivery-desc">
                <h3>GLS</h3>
              </div>
            </div>
            <div class="remark">
              <h2>Napomena</h2>
              <b-form-textarea
                id="textarea"
                v-model="remark"
                placeholder="Napomena uz narudžbu (neobavezno)"
                rows="3"
                max-rows="6"
              ></b-form-textarea>
            </div>
          </b-col>
          <b-col cols="6" class="summary-product-info">
            <h1>Proizvodi</h1>

            <div class="product-card" v-for="product in cart" :key="product.id">
              <div class="left">
                <h2>{{ product_quantity(product) }}x</h2>
                <img :src="product.image" alt />
                <h2>{{ product.description }}</h2>
              </div>
              <div class="right">
                <h3 class="price">
                  {{
                  Number(product.price).toFixed(2) + " kn"
                  }}
                </h3>
              </div>
            </div>
            <div class="price-info">
              <h2>Cijena svih proizvoda</h2>
              <h3>{{ total_price.toFixed(2) + " kn" }}</h3>
            </div>
            <div class="price-delivery">
              <h2>Dostava</h2>
              <h3>30 kn</h3>
            </div>
            <div class="price-total">
              <h2>Ukupno:</h2>
              <h2 class="total">{{ (total_price + 30).toFixed(2) + " kn" }}</h2>
            </div>
            <Button class="order" @click="finalOrder(order,cart)">Naruči</Button>
          </b-col>
        </b-row>
      </b-container>
    </main>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
import TopNav from "../../components/TopNav";

export default {
  data() {
    return {
      validating: false,
      remark: ""
    };
  },
  computed: {
    order() {
      return this.$store.state.order;
    },
    cart() {
      return this.$store.state.cart;
    },
    total_price() {
      return this.$store.getters.totalPrice;
    }
  },
  components: {
    LeftNav,
    TopNav
  },

  methods: {
    product_quantity(product) {
      return this.$store.getters.getProductQuantity(product);
    },
    async finalOrder(order, cart) {
      let products = JSON.stringify(cart);
      let fullOrderInfo = {
        firstName: order.userInfo.firstName,
        lastName: order.userInfo.lastName,
        email: order.userInfo.email,
        phoneNumber: order.userInfo.phoneNumber,
        address: order.deliveryInfo.address,
        zipCode: order.deliveryInfo.zipCode,
        country: order.deliveryInfo.country,
        city: order.deliveryInfo.city,
        selectedPayment: order.paymentInfo.selectedPayment,
        products: products
      };

      const res = await this.callApi("post", "order/upload", fullOrderInfo);
      if (res.status === 200) {
        this.success("Vaša narudžba je zaprimljena");
        localStorage.clear("cart");
        localStorage.clear("order");
        setTimeout(function() {
          window.location = "/trznica";
        }, 1500);
      } else {
        this.swr();
      }
    },
    changeDelivery() {
      window.location = "/#/delivery-info";
    },
    changePayment() {
      window.location = "/#/payment-info";
    }
  }
};
</script>

<style lang="scss" scoped>
.title {
  color: #4ca456;
  font-size: 2rem;
  margin-top: 20px;
  margin-bottom: 50px;
  padding: 0;
}

.row {
  margin: 0 70px 0 70px;
  padding: 0;

  .col-1 {
    padding: 0;
  }
  .steps {
    display: grid;
    grid-template-rows: 189px 180px 201px;
    margin-top: 10px;

    h2 {
      font-size: 1.2rem;
      text-align: center;

      &.active {
        font-weight: bold;
        font-size: 1.3rem;
      }
    }
  }

  .summary-user-info {
    background-color: #f6f6f6;
    border-radius: 8px;
    margin-right: 50px;
    width: 350px;
    padding: 20px;
    > * {
      margin-bottom: 30px;
    }
    h1 {
      font-size: 1.8rem;
    }
    h2 {
      font-size: 1.3rem;
      font-weight: bold;
    }
    h3 {
      font-size: 1.2rem;
      font-weight: lighter;
    }
    .change {
      display: flex;

      h4 {
        font-size: 1rem;
        font-weight: lighter;
        font-style: italic;
        cursor: pointer;
        align-self: flex-end;
        &:hover {
          color: #4ca456;
        }
      }
    }
    .address-info,
    .payment-desc,
    .delivery-desc {
      display: flex;
      justify-content: space-between;
    }
    .address-info,
    .payment-desc {
      border-bottom: 1px solid #adadad;
    }
  }
  .summary-product-info {
    background-color: #f6f6f6;
    border-radius: 8px;
    width: 560px;
    padding: 20px;
    h1 {
      font-size: 1.8rem;
      margin-bottom: 20px;
    }
    .product-card {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      .left {
        display: flex;
        width: 80%;
        gap: 20px;
        align-items: center;
      }
      .right {
        display: flex;
        align-items: center;
        width: 20%;
        justify-content: flex-end;
      }
      img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        object-fit: cover;
      }
      h2 {
        font-size: 1.2rem;
      }
      h3 {
        font-size: 1.1rem;
        font-weight: bold;
      }
    }
    .price-info,
    .price-delivery,
    .price-total {
      display: flex;
      justify-content: space-between;
      margin-bottom: 30px;
      border-bottom: 1px solid #adadad;
      h1 {
        font-size: 2rem;
      }
      h2 {
        font-size: 1.3rem;
        font-weight: bold;
      }
      h3 {
        font-size: 1.2rem;
        font-weight: lighter;
      }
    }
  }
  .ivu-btn.order {
    border-radius: 8px;
    width: 250px;
    height: 50px;
    margin-top: 25px;
    background-color: #4ca456;
    color: white;
    border: none;
    font-size: 1.2rem;
    font-weight: bold;
    transition: 0.3s ease-in-out;
    border: 1px solid #4ca456;
    margin-left: 25%;
    &:hover {
      color: #394241;
      background-color: #f3f3f3;
      border: 1px solid #4ca456;
      box-shadow: #4ca45683 0px 20px 100px -20px, #4ca456 0px 20px 60px -30px;
    }
    &:focus {
      border: 1px solid #4ca456;
      box-shadow: none;
    }
  }
}
</style>
