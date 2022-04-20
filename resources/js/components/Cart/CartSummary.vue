<template>
  <div v-if="cart.length">
    <div class="summary">
      <div class="left-summary">
        <h3>Poštarina</h3>
        <h2>Ukupno</h2>
      </div>
      <div class="right-summary">
        <h3>30.00 kn</h3>
        <h2>{{ total_price.toFixed(2) + ' kn' }}</h2>
      </div>
    </div>
    <div class="buttons">
      <router-link to="/cart-details">
        <Button class="cart-details-button">Pregled košarice</Button>
      </router-link>
      <router-link to="/checkout-user">
        <Button class="checkout-button">Plaćanje</Button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {
    total_price() {
      return this.$store.getters.totalPrice + 30;
    },
    cart() {
      return this.$store.getters.getCartItems;
    }
  }
};
</script>

<style lang="scss" scoped>
.summary {
  display: flex;
  justify-content: space-between;
  h2 {
    font-size: 1rem;
    font-weight: bold;
  }
  h3 {
    font-size: 1rem;
    font-weight: lighter;
  }
}
.buttons {
  margin-top: 20px;
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
</style>