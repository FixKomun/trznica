<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />

      <!--PRODUCT INFO -->
      <b-row>
        <b-col class="image" cols="4">
          <img :src="productData.image" alt />
        </b-col>
        <b-col class="product-info" cols="5">
          <div class="name-edit">
            <h1 class="name">{{productData.name}}</h1>
            <router-link
              v-if="$store.state.user.id == $store.state.activeProduct.user_id"
              v-bind:to="'/product/' + product_id + '/edit'"
            >
              <Button class="edit">Uredi proizvod</Button>
            </router-link>
          </div>
          <h3 class="price">{{Number(productData.price).toFixed(2)}} kn</h3>
          <div class="rating">
            <Rate show-text v-model="ratingValue">
              <span style="color: #f5a623">{{ ratingValue }}</span>
            </Rate>
          </div>
          <div class="line"></div>
          <h2 class="description-title">Opis proizvoda</h2>
          <p class="description">{{productData.description}}</p>
          <div
            v-if="$store.state.user.id != $store.state.activeProduct.user_id"
            class="add-container"
          >
            <h6 class="addToBasket">Dodaj u košaricu</h6>
            <div class="adder">
              <Button class="remove" @click="removeProduct(productData)">
                <h1>-</h1>
              </Button>
              <h1 class="quantity">{{product_quantity(productData)}}</h1>
              <Button class="add" @click="addProduct(productData)">
                <h1>+</h1>
              </Button>
            </div>
            <!--<Button class="add-product" @click="addProduct">Dodaj</Button>-->
          </div>
        </b-col>
        <b-col class="user-info" cols="3">
          <!--OPG INFO COMES HERE, NOW ITS JUST USER INFO-->
          <h2 class="user-name">{{userData.firstName + ' ' + userData.lastName}}</h2>
          <!--AVATAR GOES HERE...-->
          <div class="user-container">
            <div class="user-number">
              <span>Kontakt:</span>
              <h2>{{userData.phoneNumber}}</h2>
            </div>
            <div class="user-email">
              <span>Email:</span>
              <h2>{{userData.email}}</h2>
            </div>
            <div class="user-city">
              <span>Grad:</span>
              <h2>{{userData.city}}</h2>
            </div>
          </div>
        </b-col>
      </b-row>

      <!--Similar products  NEEDS FIXING-->
      <div class="similar-products">
        <h2>Slični proizvodi</h2>
        <div class="similar-product-list">
          <img :src="productData.image" alt />
          <img :src="productData.image" alt />
          <img :src="productData.image" alt />
        </div>
      </div>
    </main>
    <div class="empty-box"></div>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
import TopNav from "../../components/TopNav";
export default {
  data() {
    return {
      product_id: this.$route.params.id,
      productData: [],
      userData: [],
      ratingValue: 0,
      adderCounter: 0
    };
  },
  components: {
    LeftNav,
    TopNav
  },
  async created() {
    // console.log(this.$route.params);
    const res = await this.callApi("get", "/get-product/" + this.product_id);
    if (res.status === 200) {
      this.productData = res.data[0];
      this.userData = res.data[0].user;
      this.$store.commit("setActiveProduct", res.data[0]);
    } else this.swr();
  },
  methods: {
    addProduct(product) {
      this.$store.commit("addToCart", product);
    },
    removeProduct(product) {
      this.$store.commit("removeFromCart", product);
    },
    product_quantity(product) {
      return this.$store.getters.getProductQuantity(product);
    }
  }
};
</script>

<style lang="scss" scoped>
.row {
  margin: 3rem 10rem 0 10rem;
  height: 500px;
  .col-4,
  .col-5,
  .col-3 {
    padding: 0;
  }
  .image {
    height: 500px;

    img {
      border-radius: 10px;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  .product-info {
    // margin-left: 2rem;
    padding-left: 4rem;
    height: 100%;
    .name-edit {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      .name {
        margin: 0;
        font-size: 2.3rem;
      }
      a {
        align-self: center;
      }
      .edit {
        height: 50%;
        width: 8rem;
      }
    }

    .price {
      font-size: 1.4rem;
      margin-bottom: 1rem;
    }
    .rating {
      margin-bottom: 0.5rem;
      span {
        font-size: 1rem;
      }
    }
    .line {
      border: 1px solid #dadada;
      width: 100%;
      margin-bottom: 4rem;
    }
    .description-title {
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }
    .description {
      font-size: 1rem;
    }
    .add-container {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .adder {
      display: flex;
      width: 100px;
      h1 {
        font-size: 20px;
        margin-bottom: 0.5rem;
      }
      .add,
      .remove,
      .quantity {
        font-size: 16px;
        padding: 0;
        width: 50px;
        height: 30px;
      }
      .quantity {
        font-size: 20px;
        text-align: center;
      }
    }
    button {
      width: 10rem;
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

  .user-info {
    padding-left: 4rem;
    .user-container {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      span {
        color: #adadad;
      }
      h2 {
        font-size: 1.2rem;
      }
    }
  }
}
.similar-products {
  margin-top: 4rem;
  margin-left: 10rem;

  h2 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
  }
  .similar-product-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, 300px);
    justify-content: space-between;
    grid-auto-rows: 200px;
    > * {
      padding: 10px;
    }
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}
.empty-box {
  height: 200px;
}
</style>