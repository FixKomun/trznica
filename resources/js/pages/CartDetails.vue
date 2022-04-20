<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--CART DETAILS-->
      <b-row v-if="products.length">
        <h1 class="cart-title">Tvoja košarica</h1>
        <b-col cols="7">
          <div class="table-titles">
            <h3>PROIZVOD</h3>
            <h3>CIJENA</h3>
            <h3>KOLIČINA</h3>
            <h3>UKUPNO</h3>
          </div>
          <div class="product-container">
            <div
              class="product-card"
              v-for="product in products"
              :key="product.id"
              :v-if="product.quantity!=0"
            >
              <div class="image">
                <img :src="product.image" alt />
              </div>
              <div class="cart-card-names">
                <h2>{{ product.name }}</h2>
                <h3>{{product.user.firstName + ' ' + product.user.lastName}}</h3>
              </div>

              <h2 class="price">
                {{Number(product.price).toFixed(2)}}
                <span>kn</span>
              </h2>
              <div class="adder">
                <Button class="remove" @click="removeProduct(product)">
                  <h1>-</h1>
                </Button>
                <h1 class="quantity">{{product_quantity(product)}}</h1>
                <Button class="add" @click="addProduct(product)">
                  <h1>+</h1>
                </Button>
              </div>
              <h2 class="item_price">{{(product.quantity*product.price).toFixed(2)+ ' ' + 'kn'}}</h2>
              <svg
                width="18"
                height="18"
                viewBox="0 0 18 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="remove"
                @click="removeWholeProduct(product)"
              >
                <g clip-path="url(#clip0_333_60)">
                  <path
                    d="M6.21606 5.65359C6.07201 5.65359 5.92795 5.70825 5.8185 5.81853C5.59877 6.03825 5.59877 6.39449 5.8185 6.61421L11.3865 12.183C11.6062 12.4028 11.9625 12.4028 12.1822 12.183C12.4021 11.9633 12.4021 11.6071 12.1822 11.3872L6.61418 5.81853C6.50404 5.70825 6.35999 5.65359 6.21606 5.65359Z"
                    fill="#DDDDDD"
                  />
                  <path
                    d="M11.7839 5.65358C11.64 5.65358 11.496 5.70824 11.3865 5.81852L5.8185 11.3865C5.59877 11.6063 5.59877 11.9625 5.8185 12.1822C6.03822 12.4021 6.39445 12.4021 6.61418 12.1822L12.1822 6.61351C12.4021 6.39379 12.4021 6.03756 12.1822 5.81783C12.0721 5.70824 11.928 5.65358 11.7839 5.65358Z"
                    fill="#DDDDDD"
                  />
                  <path
                    d="M15.9375 0H2.06255C0.924774 0 0 0.924774 0 2.06255V15.9375C0 17.0752 0.924774 18 2.06255 18H15.9375C17.0752 18 18 17.0752 18 15.9375V2.06255C18 0.924774 17.0752 0 15.9375 0ZM2.06255 16.875C1.54578 16.875 1.125 16.4542 1.125 15.9375V2.06255C1.125 1.54578 1.54578 1.125 2.06255 1.125H15.9375C16.4542 1.125 16.875 1.54578 16.875 2.06255V15.9375C16.875 16.4542 16.4542 16.875 15.9375 16.875H2.06255Z"
                    fill="#DDDDDD"
                  />
                </g>
                <defs>
                  <clipPath id="clip0_333_60">
                    <rect width="18" height="18" fill="white" transform="matrix(1 0 0 -1 0 18)" />
                  </clipPath>
                </defs>
              </svg>
            </div>
          </div>
        </b-col>
        <b-col cols="5">
          <div class="table-titles">
            <h3>SVEUKUPNO</h3>
          </div>
          <div class="info-container">
            <div class="items-price">
              <h2>Ukupno</h2>
              <h2 v-if="total_price">{{total_price.toFixed(2) +" kn"}}</h2>
            </div>
            <div class="delivery-price">
              <h2>Dostava</h2>
              <h2>30.00 kn</h2>
            </div>
            <div class="total-price">
              <h2>Za platiti</h2>
              <h2>{{(total_price + 30).toFixed(2) + " kn"}}</h2>
            </div>
            <div class="buttons">
              <router-link to="/trznica">
                <Button class="cart-details-button">Nastavi kupovati</Button>
              </router-link>
              <router-link v-if="products.length" to="/checkout-user">
                <Button class="checkout-button">Kreni na plaćanje</Button>
              </router-link>
            </div>
          </div>
        </b-col>
      </b-row>
      <b-row v-if="!products.length">
        <h1 class="cart-title">Tvoja košarica je prazna...</h1>
      </b-row>
    </main>
  </div>
</template>

<script>
import LeftNav from "../components/LeftNav";
import TopNav from "../components/TopNav";
export default {
  data() {
    return {};
  },
  computed: {
    total_price() {
      return this.$store.getters.totalPrice;
    },
    products() {
      return this.$store.getters.getCartItems;
    }
  },
  methods: {
    product_quantity(product) {
      return this.$store.getters.getProductQuantity(product);
    },
    removeProduct(product) {
      this.$store.commit("removeFromCart", product);
    },
    addProduct(product) {
      this.$store.commit("addToCart", product);
    },
    removeWholeProduct(product) {
      this.$store.commit("removeWholeProductFromCart", product);
    }
  },
  components: {
    LeftNav,
    TopNav
  }
};
</script>

<style lang="scss" scoped>
h1.cart-title {
  color: #4ca456;
  font-size: 2rem;
  margin-top: 20px;
  margin-bottom: 20px;
  padding: 0;
}
.table-titles {
  display: grid;
  grid-template-columns: 336px 114px 110px 103px;
  border-bottom: 1px solid #adadad;
  h3 {
    font-size: 1.2rem;
    color: #bbbbbb;
  }
}
.row {
  padding: 0;
  margin: 0;
  margin-left: 50px;
  margin-right: 50px;

  .col-7 {
    .product-container {
      .product-card {
        display: grid;
        grid-template-columns: 100px 245px 109px 107px 100px 50px;
        align-items: center;
        padding-top: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #adadad;
        img {
          width: 84px;
          height: 84px;
          object-fit: cover;
          border-radius: 5px;
        }
        h2 {
          font-size: 1rem;
          font-weight: bold;
        }
        h3 {
          margin-top: 10px;
          font-size: 0.9rem;
          font-weight: lighter;
        }
        svg {
          margin-bottom: 40px;
          cursor: pointer;
        }
        .adder {
          display: flex;
          width: 100px;
          h1 {
            font-size: 1rem;
          }
          .add,
          .remove,
          .quantity {
            font-size: 16px;
            padding: 0;
            width: 24px;
            height: 24px;
          }
          .quantity {
            font-size: 1rem;
            text-align: center;
          }

          button:hover,
          input:hover {
            color: #4ca456;
            border: 1px solid #4ca456;
          }
          button:focus,
          input:focus {
            border: 1px solid #dcdee2;
            box-shadow: none;
          }
        }
      }
    }
  }
  .col-5 {
    padding-left: 50px;
    h2 {
      font-size: 1rem;
      font-weight: bold;
    }
    .info-container {
      display: flex;
      flex-direction: column;
      .items-price,
      .delivery-price,
      .total-price {
        display: flex;
        justify-content: space-between;
        margin: 10px;
        border-bottom: 1px solid #adadad;
      }
    }
    .buttons {
      margin-top: 20px;
      margin-left: 10px;
      .cart-details-button {
        width: 49%;
        height: 50px;
        background-color: #394141;
        color: white;
        box-shadow: #d3d3d3 0px 30px 100px -20px, #d3d3d3 0px 30px 60px -30px;
        transition: all 0.1s ease-in-out;
        border-radius: 7px;
        font-size: 1rem;
        &:hover {
          color: #adadad;

          border-color: #adadad;
        }
      }
      .checkout-button {
        width: 49%;
        height: 50px;
        box-shadow: 0px 20px 50px 0px #d3d3d3;
        background-color: #4ca456;
        box-shadow: #d3d3d3 0px 30px 100px -20px, #d3d3d3 0px 30px 60px -30px;
        transition: all 0.1s ease-in-out;
        color: white;
        font-size: 16px;
        border-radius: 7px;
        font-size: 1rem;
        &:hover {
          color: #adadad;
          background-color: #4ca456;
          box-shadow: #4ca456 0px 20px 100px -20px, #4ca456 0px 20px 60px -30px;
          border-color: #adadad;
        }
      }
    }
  }
}
</style>]