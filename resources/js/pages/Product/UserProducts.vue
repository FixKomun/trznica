<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--User products-->
      <div class="product-list">
        <div v-for="(product, i) in productList" :key="i" class="products">
          <div class="left">
            <img :src="product.image" alt />
          </div>
          <div class="right">
            <h1 class="name">{{ product.name }}</h1>
            <div class="line"></div>
            <h2 class="user">
              {{
              product.user.firstName +
              " " +
              product.user.lastName
              }}
            </h2>
            <h2 class="price">{{ product.price }} kn</h2>

            <div class="buttons">
              <router-link v-bind:to="'/product/' + product.id + '/edit'">
                <Button class="editProduct">Uredi proizvod</Button>
              </router-link>
              <router-link v-bind:to="'/product/' + product.id">
                <Button class="showProduct">Detalji</Button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
import TopNav from "../../components/TopNav";
export default {
  data() {
    return {
      id: this.$store.state.user.id,
      productList: []
    };
  },
  components: {
    LeftNav,
    TopNav
  },
  async created() {
    const res = await this.callApi("get", "/get-user-products/" + this.id);
    if (res.status === 200) {
      this.productList = res.data;
    } else {
      this.swr();
    }
  }
};
</script>

<style lang="scss" scoped>
.product-list {
  display: grid;
  // grid-template-columns: 1fr 1fr 1fr;

  grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
  margin: 2rem 2rem 0 2rem;

  .products {
    display: flex;
    // justify-content: space-evenly;
    flex-direction: row;
    border-radius: 8px;
    // width: 500px;
    margin-bottom: 2rem;
    //  flex-wrap: wrap;
    box-shadow: 3px 3px #00000012;
    margin-left: 1rem;

    .left {
      width: 50%;
      height: 300px;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
      }
    }
    .right {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10px;
      width: 50%;

      .line {
        height: 1px;
        width: 80%;
        background-color: #dddddd;
      }
      .name {
        font-size: 1.2rem;
      }
      .user {
        text-transform: uppercase;
        font-size: 13px;
        margin-top: 10px;
      }
      .price {
        font-size: 15px;
        margin-top: 2rem;
      }

      .buttons {
        display: flex;
        flex-direction: column;
        margin-top: 1rem;
        gap: 1rem;
        button {
          width: 150px;
        }
      }
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
</style>