<template>
  <div class="cart-container">
    <div class="cart-no-items" v-if="cart.length==0">
      <img src="https://img.icons8.com/ios/50/000000/sad-ghost.png" />
      <h2>Nemate proizvoda u košarici!</h2>
    </div>
    <div class="cart-card" v-for="product in cart" :key="product.id" :v-if="product.quantity!=0">
      <div class="image">
        <img :src="product.image" alt />
      </div>
      <div class="cart-card-left">
        <h2>{{ product.name }}</h2>
        <h3>{{product.user.firstName + ' ' + product.user.lastName}}</h3>
        <h4 class="price">
          {{product.quantity}} x {{product.price}}
          <span>kn</span>
        </h4>
      </div>
      <div class="cart-card-right">
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
        <h2 class="item_price">{{(product.quantity*product.price).toFixed(2)+ ' ' + 'kn'}}</h2>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userList: this.$store.state.userList
    };
  },
  computed: {
    cart() {
      return this.$store.state.cart;
    }
  },
  methods: {
    removeWholeProduct(product) {
      this.$store.commit("removeWholeProductFromCart", product);
    }
  }
};
</script>

<style lang="scss" scoped>
.cart-container {
  .cart-card {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    border-bottom: 1px solid #d3cccc;
    padding-bottom: 7px;
    h2 {
      font-size: 1rem;
      font-weight: bold;
    }
    .image img {
      width: 75px;
      height: 82px;
      object-fit: cover;
      border-radius: 5px;
    }
    .cart-card-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      width: 200px;

      h3 {
        font-weight: lighter;
        font-size: 1rem;
      }
      h4 {
        font-size: 1rem;
      }
    }
    .cart-card-right {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      svg {
        cursor: pointer;
        transition: all 0.1s ease-in-out;
        align-self: flex-end;
        &:hover {
          padding-top: 3px;
        }
      }
    }
  }
  .cart-no-items {
    display: flex;
    align-items: center;
    flex-direction: column;
    gap: 1.2rem;
    h2 {
      font-size: 1.2rem;
    }
  }
}
</style>