<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />

      <!--STORE -->
      <div class="store">
        <div class="filter">
          <h3 class="filterClick" @click="clearFilter">Ukloni filter</h3>
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
              <Select v-model="userSelected" placeholder>
                <Option
                  v-for="user in userList"
                  :value="user.id"
                  :key="user.id"
                >{{ user.firstName + ' ' + user.lastName }}</Option>
              </Select>
            </div>
          </div>
        </div>
        <div class="total-products">
          <h3>
            <span>ukupno:</span>
            {{ filteredList.length }}
          </h3>
          <div class="break-line"></div>
        </div>

        <!-- MAIN PART OF STORE ( PRODUCT LIST) -->
        <div class="product-list">
          <div v-for="(product, i) in filteredList" :key="i" class="products">
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
      userList: [],
      sortSelected: null,
      categorySelected: null,
      userSelected: null,
      search: "",
      sortTypes: [
        { value: 0, text: "Najnovije" },
        { value: 1, text: "Viša cijena" },
        { value: 2, text: "Niža cijena" }
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
      this.$store.state.searchList = res2.data;
    } else {
      this.swr();
    }
    const res3 = await this.callApi("get", "/get-user");
    if (res3.status === 200) {
      this.userList = res3.data;
    } else {
      this.swr();
    }
  },
  computed: {
    //SEARCH FILTER
    filteredList() {
      if (this.search != "") {
        return this.productList.filter(product =>
          product.name.toLowerCase().includes(this.search.toLowerCase())
        );
      } else if (this.categorySelected) {
        let tempProductList = this.productList;
        if (this.userSelected && this.categorySelected) {
          tempProductList = tempProductList.filter(product => {
            return (
              product.category_id == this.categorySelected &&
              product.user_id == this.userSelected
            );
          });
          return tempProductList;
        }
        tempProductList = tempProductList.filter(product => {
          return product.category_id == this.categorySelected;
        });
        return tempProductList;
      } else if (this.userSelected) {
        let temp2 = this.productList;
        temp2 = temp2.filter(product => {
          return product.user_id == this.userSelected;
        });
        return temp2;
      } else {
        return this.productList;
      }
    }
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
    },
    checkValue() {
      console.log("asdl");
    },
    clearFilter() {
      this.sortSelected = null;
      this.categorySelected = null;
      this.userSelected = null;
    }
  },
  watch: {
    "$store.state.search": function() {
      this.search = this.$store.state.search;
    },

    sortSelected: function() {
      //0-Najnovije
      if (this.sortSelected == 0) {
        this.productList.sort(function(a, b) {
          return new Date(b.created_at) - new Date(a.created_at);
        });
      }
      //1-Viša cijena
      if (this.sortSelected == 1) {
        this.productList.sort(function(a, b) {
          return b.price - a.price;
        });
      }
      //2-Niža cijena
      if (this.sortSelected == 2) {
        this.productList.sort(function(a, b) {
          return a.price - b.price;
        });
      }
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
  margin-top: 2rem;
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
    margin-bottom: 1.5rem;
  }
  .filter {
    margin-left: 2rem;
    h3 {
      margin-top: 10px;
      font-size: 16px;
    }
    .filterClick {
      width: 100px;
      cursor: pointer;
      transition: all 0.2s ease-out;
      text-align: center;
      margin-bottom: 1rem;
      border: 1px solid rgba(98, 105, 119, 0.315);
      border-radius: 8px;
      padding: 6px;
      &:hover {
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
