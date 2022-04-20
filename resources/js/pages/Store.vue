<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />

      <!--STORE -->
      <div class="store">
        <div class="category-list">
          <ul v-for="category in categoryList" :key="category.id">
            <li>{{ category.categoryName }}</li>
          </ul>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M1 1L8 8L1 15"
              stroke="#394241"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M8 1L15 8L8 15"
              stroke="#394241"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </div>
        <div class="break-line"></div>
        <div class="filter">
          <h3 class="filterClick">Filtriraj</h3>
          <div class="filter-group">
            <div class="filter-sort">
              <h3>Sortiraj:</h3>
              <Select v-model="sortSelected" placeholder>
                <Option
                  v-for="item in sortTypes"
                  :value="item.value"
                  :key="item.value"
                >{{ item.text }}</Option>
              </Select>
            </div>
            <div class="filter-category">
              <h3>Kategorija:</h3>
              <Select v-model="categorySelected" placeholder>
                <Option
                  v-for="category in categoryList"
                  :value="category.id"
                  :key="category.id"
                >{{ category.categoryName }}</Option>
              </Select>
            </div>
            <div class="filter-opg">
              <h3>Proizvođač:</h3>
              <Select v-model="OPGSeleceted" placeholder>
                <Option v-for="opg in opgList" :value="opg.id" :key="opg.id">{{ opg.opgName }}</Option>
              </Select>
            </div>
          </div>
        </div>
        <div class="total-products">
          <h3>
            <span>ukupno:</span>
            {{ productList.length }}
          </h3>
        </div>

        <!-- MAIN PART OF STORE ( PRODUCT LIST) -->
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
              <h2 class="price">{{ Number(product.price).toFixed(2) }} kn</h2>
              <div class="add-container" v-if="$store.state.user.id!=product.user_id">
                <h6 class="addToBasket">Dodaj u košaricu</h6>
                <div class="adder">
                  <Button class="remove" @click="removeProduct(product)">
                    <h1>-</h1>
                  </Button>
                  <h1 class="quantity">{{product_quantity(product)}}</h1>
                  <Button class="add" @click="addProduct(product)">
                    <h1>+</h1>
                  </Button>
                </div>
              </div>
              <div class="buttons">
                <router-link v-bind:to="'/product/' + product.id">
                  <Button class="showProduct">Detalji</Button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import LeftNav from "../components/LeftNav";
import TopNav from "../components/TopNav";
export default {
  data() {
    return {
      productList: [],
      categoryList: [],
      opgList: [],
      sortSelected: null,
      categorySelected: null,
      OPGSeleceted: null,

      sortTypes: [
        { value: 0, text: "Popularno" },
        { value: 1, text: "Najnovije" },
        { value: 2, text: "Viša cijena" },
        { value: 3, text: "Niža cijena" }
      ]
    };
  },
  async created() {
    const res1 = await this.callApi("get", "/get-category");
    if (res1.status === 200) {
      this.categoryList = res1.data;
    } else {
      this.swr();
    }
    const res2 = await this.callApi("get", "/get-product");
    if (res2.status === 200) {
      this.productList = res2.data;
    } else {
      this.swr();
    }
  },
  computed: {},
  methods: {
    addProduct(product) {
      this.$store.commit("addToCart", product);
    },
    removeProduct(product) {
      this.$store.commit("removeFromCart", product);
    },
    product_quantity(product) {
      return this.$store.getters.getProductQuantity(product);
    },
    checkValue() {
      console.log("asdl");
    }
  },
  components: {
    LeftNav,
    TopNav
  }
};
</script>

<style lang="scss" scoped>
.store {
  margin-left: 2rem;
  margin-right: 2rem;
  .category-list {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 1.5rem;
    font-size: 1.2rem;
    ul {
      list-style-type: none;
      margin: 0;
      li {
        cursor: pointer;
      }
    }
    svg {
      margin-left: 2rem;
      margin-top: 2px;
      cursor: pointer;
      transition: 0.1s ease-in;
      &:hover {
        padding: 1px;
      }
    }
  }
  .break-line {
    height: 1px;
    width: 100%;
    background-color: #dddddd;
    margin-top: 1.5rem;
  }
  .filter {
    margin-left: 2rem;
    h3 {
      margin-top: 10px;
      font-size: 16px;
    }
    .filterClick {
      width: 80px;
      cursor: pointer;
      transition: all 0.2s ease-out;
      text-align: center;
      &:hover {
        padding: 2px;
        box-shadow: 0 0 3pt 1pt #4ca456;
        border-radius: 8px;
      }
    }
    .filter-group {
      display: flex;
      flex-direction: row;
      gap: 4rem;
      height: 35px;
      .custom-select {
        background-color: #4ca456;
        border-radius: 8px;
      }

      .filter-sort,
      .filter-category,
      .filter-opg {
        display: flex;
        gap: 1rem;
      }
    }
  }
  .total-products {
    margin-top: 1rem;
    h3 {
      font-size: 16px;
      font-style: italic;
      font-weight: lighter;
    }
  }
  .product-list {
    display: grid;
    // grid-template-columns: 1fr 1fr 1fr;

    grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
    margin-right: 2rem;

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
        width: 50%;
        justify-content: center;

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
          margin-top: 1.2rem;
          margin-bottom: 1rem;
        }
        .add-container {
          display: flex;
          flex-direction: column;
          align-items: center;
          .adder {
            display: flex;
            width: 100px;
            h1 {
              font-size: 20px;
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
}
</style>
