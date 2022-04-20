<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!-- CAROUSEL -->
      <div class="carousels">
        <div class="carousel">
          <b-carousel
            id="carousel-fade"
            :interval="5000"
            background="#ababab"
            img-width="1024"
            img-height="480"
            style="text-shadow: 1px 1px 2px #333"
          >
            <b-carousel-slide>
              <template #img>
                <img
                  class="d-block img-fluid w-100"
                  width="1024"
                  height="480"
                  :src="carousel_img1"
                  alt="image slot"
                />
              </template>
            </b-carousel-slide>
            <b-carousel-slide>
              <template #img>
                <img
                  class="d-block img-fluid w-100"
                  width="1024"
                  height="480"
                  :src="carousel_img2"
                  alt="image slot"
                />
              </template>
            </b-carousel-slide>
          </b-carousel>
        </div>
        <div class="carousel-info">
          <h1>
            Istražite
            <span>sve proizvode</span> naših
            <br />OPG-ovaca
          </h1>
          <router-link to="/trznica">
            <Button>Kreni u kupnju</Button>
          </router-link>
        </div>
      </div>
      <!-- LIST OF RANDOM ITEMS (4 in row) + REGISTRATION -->
      <div class="item-list">
        <img :src="item_img1" alt />

        <img :src="item_img1" alt />

        <div class="register">
          <h2>
            Želite postaviti
            <span>
              svoj
              <br />proizvod
              <br />
            </span>na web tržnicu?
          </h2>
          <router-link to="/register_OPG" class="button">Registriraj OPG</router-link>
        </div>
        <img :src="item_img1" alt />
      </div>
      <b-container class="top-categories">
        <h1>ISTRAŽI KATEGORIJE</h1>
        <b-row>
          <b-col>
            <div class="items">
              <div class="item">
                <img :src="alkohol" alt />
                <h3>Alkohol</h3>
              </div>
              <div class="item">
                <img :src="grain" alt />
                <h3>Žitarice</h3>
              </div>
              <div class="item">
                <img :src="turkey" alt />
                <h3>Piletina</h3>
              </div>
              <div class="item">
                <img :src="flour" alt />
                <h3>Brašno</h3>
              </div>
              <div class="item">
                <img :src="eggs" alt />
                <h3>Jaja</h3>
              </div>
              <div class="item">
                <img :src="beans" alt />
                <h3>Mahunarke</h3>
              </div>
              <div class="item">
                <img :src="baguette" alt />
                <h3>Kruh</h3>
              </div>
              <div class="item">
                <img :src="steak" alt />
                <h3>Meso</h3>
              </div>
              <div class="item">
                <img :src="milk" alt />
                <h3>Mlijeko</h3>
              </div>
              <div class="item">
                <img :src="fruit" alt />
                <h3>Voće</h3>
              </div>
              <div class="item">
                <img :src="fish" alt />
                <h3>Riba</h3>
              </div>
              <div class="item">
                <img :src="chilli" alt />
                <h3>Ljuto</h3>
              </div>
              <div class="item">
                <img :src="cheese" alt />
                <h3>Sir</h3>
              </div>
              <div class="item">
                <img :src="carrot" alt />
                <h3>Povrće</h3>
              </div>
              <div class="item">
                <img :src="beer" alt />
                <h3>Pivo</h3>
              </div>
            </div>
          </b-col>
        </b-row>
      </b-container>
      <b-container class="info-containers">
        <b-row>
          <b-col cols="5">
            <img :src="delivery" alt />
            <h1>Petkom besplatna dostava!</h1>
          </b-col>
          <b-col cols="5">
            <img :src="apples" alt />
            <h1>Sezonsko voće i povrće</h1>
          </b-col>
        </b-row>
      </b-container>
      <div class="line"></div>
      <!--TODO: promjeniti u opg,a ne useri-->
      <b-container class="new-opgs">
        <h1>NOVI ČLANOVI TRŽNICE</h1>
        <b-row>
          <b-col v-for="(user,i) in userList" :key="i" cols="2">
            <!--Add logo for opgs here-->
            <h3>{{ user.firstName + ' ' + user.lastName }}</h3>
          </b-col>
        </b-row>
      </b-container>
      <div class="box"></div>
    </main>
  </div>
</template>

<script>
import carousel_img1 from "../assets/img/wheat.jpg";
import carousel_img2 from "../assets/img/vegetables.jpg";
import item_img1 from "../assets/img/strawberries.jpg";
import delivery from "../assets/img/delivery.jpg";
import apples from "../assets/img/apples.jpg";
import LeftNav from "../components/LeftNav";
import TopNav from "../components/TopNav";
import Login from "../components/Login";
//CATEGORIES IMAGES -.-
import alkohol from "../assets/img/categories/glass.png";
import grain from "../assets/img/categories/grain.png";
import turkey from "../assets/img/categories/turkey.png";
import flour from "../assets/img/categories/flour.png";
import eggs from "../assets/img/categories/eggs.png";
import beans from "../assets/img/categories/beans.png";
import baguette from "../assets/img/categories/baguette.png";
import steak from "../assets/img/categories/steak.png";
import milk from "../assets/img/categories/milk.png";
import fruit from "../assets/img/categories/fruit.png";
import fish from "../assets/img/categories/fish.png";
import chilli from "../assets/img/categories/chilli.png";
import cheese from "../assets/img/categories/cheese.png";
import carrot from "../assets/img/categories/carrot.png";
import beer from "../assets/img/categories/beer.png";

export default {
  data() {
    return {
      carousel_img1: carousel_img1,
      carousel_img2: carousel_img2,
      item_img1: item_img1,
      apples: apples,
      delivery: delivery,
      //CATEGORIES IMAGES
      alkohol: alkohol,
      grain: grain,
      turkey: turkey,
      flour: flour,
      eggs: eggs,
      beans: beans,
      baguette: baguette,
      steak: steak,
      milk: milk,
      fruit: fruit,
      fish: fish,
      chilli: chilli,
      cheese: cheese,
      carrot: carrot,
      beer: beer
    };
  },
  computed: {
    userList() {
      return this.$store.state.userList;
    }
  },
  components: {
    LeftNav,
    Login,
    TopNav
  },
  async created() {
    const res = await this.callApi("get", "get-user");
    if (res.status === 200) {
      this.$store.commit("saveUsers", res.data);
      console.log(res.data);
    } else {
      this.swr();
    }
  },
  methods: {}
};
</script>

<style lang="scss" scoped>
.col-2,
.col-10,
.col-3 {
  padding: 0;
}

.carousels {
  padding: 0;
  .carousel-item {
    height: 350px;
    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}
.carousel-info {
  position: absolute;
  top: 50px;
  z-index: 3;

  h1 {
    color: white;
    font-weight: lighter;
    margin: 30px 0 0 50px;
    span {
      font-weight: 700;
    }
  }
  button {
    margin: 110px 0px 0px 100px;
    background-color: transparent;
    border: 4px solid white;
    border-radius: 8px;
    width: 230px;
    height: 60px;
    color: #394241;
    font-size: 24px;
    font-weight: 700;
    text-align: center;
    box-shadow: rgba(73, 175, 78, 0.3) 0px 30px 100px -20px,
      rgba(31, 187, 109, 0.3) 0px 30px 60px -30px;
    transition: all 0.3s ease-in-out;
    &:hover {
      color: #4ca456;
      background-color: #394241;
    }
  }
}

.item-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, 300px);
  height: 350px;
  justify-content: space-evenly;
  margin: 80px 30px 30px 30px;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .register {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #dddddd;
    color: #394241;
    h2 {
      font-size: 26px;
      font-weight: lighter;
      letter-spacing: 2px;
      line-height: 28px;
      margin: 15px 0 0 15px;
      span {
        font-weight: 700;
      }
    }
    .button {
      margin: 80px 0 0 0;
      background-color: transparent;
      border: 4px solid #4ca456;
      color: #4ca456;
      width: 260px;
      height: 50px;
      border-radius: 3px;
      font-size: 24px;
      font-weight: 700px;
      text-decoration: none;
      text-align: center;
      transition: 0.2s ease-in-out;
      &:hover {
        background-color: #394241;
        color: #4ca456;
        border-radius: 8px;
      }
    }
  }
}

.top-categories {
  margin-top: 5rem;
  h1 {
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: 2rem;
  }
  .items {
    display: flex;
    align-items: center;
    justify-content: space-evenly;

    flex-wrap: wrap;
    .item {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-evenly;
      gap: 10px;
      cursor: pointer;
      h3 {
        font-size: 1.2rem;
      }
      img {
        height: 50px;
        width: 50px;
      }
    }
  }
}
.info-containers {
  margin-top: 5rem;
  .row {
    justify-content: space-evenly;
    .col-5 {
      position: relative;
      border: 1px solid #dadada;
      height: 250px;
      padding: 0;
      background: rgb(9, 9, 11);
      background: linear-gradient(
        180deg,
        rgba(9, 9, 11, 0.7231267507002801) 23%,
        rgba(0, 0, 0, 0.5130427170868348) 42%,
        rgba(107, 100, 100, 0.3561799719887955) 76%
      );
      h1 {
        position: absolute;
        top: 0;
        color: white;
        padding: 15px;
      }
      img {
        position: relative;
        height: 100%;
        width: 100%;
        object-fit: cover;
        z-index: -1;
      }
    }
  }
}
.new-opgs {
  margin-top: 5rem;
  h1 {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 2rem;
  }
  .row {
    display: flex;
    justify-content: space-evenly;
    .col-2 {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  }
}
.box {
  height: 200px;
}
</style>
