<template>
  <div>
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--CHECKOUT-->
      <b-container>
        <h1 class="title">Trebaju nam tvoje informacije</h1>
        <b-row>
          <b-col cols="1" class="steps">
            <h2 :class="{active:$route.name==='checkoutUser'}">Početak</h2>
            <h2 :class="{active:$route.name==='deliveryInfo'}">Adresa</h2>
            <h2 :class="{active:$route.name==='paymentInfo'}">Plaćanje i dostava</h2>
          </b-col>
          <b-col cols="1">
            <svg
              width="44"
              height="423"
              viewBox="0 0 44 423"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M22.1377 407.158C20.9677 407.159 19.9869 406.895 19.1953 406.365C18.4037 405.836 17.8413 405.051 17.5081 404.012L19.3513 403.41C19.5436 404.15 19.8702 404.69 20.3312 405.029C20.8022 405.359 21.4027 405.524 22.1327 405.523C23.6927 405.522 24.4707 404.861 24.4667 403.541C24.465 402.971 24.3187 402.541 24.0278 402.252C23.7369 401.952 23.3364 401.802 22.8264 401.802C22.6164 401.803 22.4115 401.833 22.2117 401.893L22.0025 402.163C21.8232 402.393 21.6436 402.508 21.4636 402.509C21.2836 402.509 21.0232 402.394 20.6825 402.164C20.4721 402.014 20.3666 401.864 20.3661 401.714C20.3657 401.574 20.4401 401.384 20.5894 401.144L22.5751 398.098L20.1451 398.1L19.6991 399.42L18.1511 398.431L18.8053 396.511L25.0903 396.506C25.3703 396.505 25.5804 396.545 25.7206 396.625C25.8609 396.695 25.9313 396.825 25.9318 397.015C25.9322 397.125 25.9026 397.27 25.8432 397.45C25.754 397.71 25.6445 397.885 25.5148 397.975C25.385 398.055 25.1851 398.096 24.9151 398.096L24.6151 398.096L23.1071 400.377C23.3169 400.307 23.5668 400.272 23.8568 400.272C24.3368 400.271 24.7771 400.396 25.1779 400.646C25.5787 400.895 25.8998 401.27 26.1413 401.77C26.3828 402.26 26.5046 402.85 26.5067 403.54C26.5089 404.26 26.3358 404.895 25.9875 405.445C25.6492 405.985 25.1504 406.406 24.4914 406.706C23.8323 407.007 23.0477 407.157 22.1377 407.158Z"
                fill="#394241"
              />
              <circle cx="21.8929" cy="211.893" r="21.8929" fill="#8ED974" />
              <path
                d="M17.1067 220.013C16.5934 220.013 16.2338 219.948 16.0281 219.816C15.837 219.684 15.7409 219.42 15.7397 219.024C15.7378 218.408 15.8172 218.005 15.978 217.814C16.1534 217.623 16.4391 217.52 16.835 217.505C17.2288 216.771 17.7402 216.133 18.3692 215.59C19.0129 215.047 19.8763 214.415 20.9595 213.696C21.7646 213.182 22.4012 212.741 22.8694 212.374C23.3376 211.993 23.725 211.567 24.0315 211.097C24.3528 210.628 24.5125 210.107 24.5108 209.535C24.5081 208.64 24.2933 207.959 23.8666 207.49C23.4545 207.021 22.8231 206.786 21.9724 206.787C20.9457 206.788 20.1766 207.06 19.6649 207.603C19.1679 208.146 18.8701 209.078 18.7714 210.398L15.9766 210.136C16.0024 208.977 16.2633 207.965 16.7594 207.099C17.2701 206.233 17.9647 205.566 18.8433 205.096C19.7365 204.626 20.7771 204.39 21.9651 204.389C23.7251 204.388 25.0832 204.849 26.0393 205.772C27.0101 206.695 27.498 207.949 27.5028 209.533C27.5053 210.354 27.3095 211.088 26.9155 211.733C26.5361 212.379 26.0685 212.929 25.5125 213.384C24.9712 213.839 24.2542 214.368 23.3613 214.97C22.5856 215.499 21.971 215.939 21.5174 216.291C21.0784 216.644 20.7276 217.033 20.4649 217.458L25.1509 217.455L25.7626 216.046L28.3393 216.924L27.0067 220.005L17.1067 220.013Z"
                fill="white"
              />
              <circle cx="21.8929" cy="400.893" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <path d="M21.8169 43.7856L21.8169 189.745" stroke="#8ED974" stroke-width="2" />
              <path d="M21.8169 233.524L21.8169 379.484" stroke="#8ED974" stroke-width="2" />
              <circle cx="21.8929" cy="21.8929" r="21.8929" fill="#8ED974" />
              <path
                d="M31.1266 13.1379C30.2241 12.6428 29.2175 13.5976 28.6274 14.1635C27.2737 15.5074 26.1282 17.0635 24.8438 18.4781C23.4206 20.0342 22.1016 21.5903 20.6437 23.111C19.8106 23.9598 18.9081 24.8793 18.3528 25.9403C17.1031 24.7024 16.0271 23.3585 14.6386 22.2623C13.632 21.4842 11.9658 20.9184 12.0005 22.7927C12.07 25.233 14.1874 27.8501 15.7494 29.5122C16.4089 30.2195 17.2767 30.9622 18.2833 30.9976C19.4982 31.0683 20.7478 29.5829 21.4768 28.7695C22.7612 27.3549 23.8025 25.7634 24.9827 24.3135C26.51 22.4037 28.072 20.5293 29.5646 18.5842C30.5018 17.3817 33.4523 14.411 31.1266 13.1379ZM13.5278 22.6513C13.4931 22.6513 13.4584 22.6513 13.3889 22.6866C13.2501 22.6513 13.146 22.6159 13.0071 22.5451C13.1112 22.4744 13.2848 22.5098 13.5278 22.6513Z"
                fill="white"
              />
            </svg>
          </b-col>
          <b-col cols="10" class="delivery-info">
            <div class="top-title">
              <h1>Adresa</h1>
            </div>
            <div class="form">
              <b-row>
                <b-col cols="6">
                  <label>Ulica i kućni broj *</label>
                  <b-form-input type="text" v-model="deliveryInfo.address"></b-form-input>
                  <label>Poštanski broj *</label>
                  <b-form-input type="text" v-model="deliveryInfo.zipCode"></b-form-input>
                </b-col>
                <b-col cols="6">
                  <label>Zemlja *</label>
                  <b-form-input type="text" v-model="deliveryInfo.country"></b-form-input>
                  <label>Mjesto *</label>
                  <b-form-input type="text" v-model="deliveryInfo.city"></b-form-input>
                </b-col>
              </b-row>
            </div>
            <div class="buttons">
              <Button @click="$router.push('/checkout-user')" class="back">Nazad</Button>
              <Button
                @click="validateDeliveryInfo"
                :disabled="validating"
                :loading="validating"
                class="continue"
              >Nastavi</Button>
            </div>
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
      validating: false
    };
  },
  computed: {
    //TODO : Dodati podatke automatski ako se user ulogira
    deliveryInfo() {
      if (this.$store.state.order.deliveryInfo) {
        return this.$store.state.order.deliveryInfo;
      } else if (this.$store.state.user.status) {
        return {
          address: "",
          zipCode: "",
          country: "",
          city: ""
        };
      } else {
        return {
          address: "",
          zipCode: "",
          country: "",
          city: ""
        };
      }
    }
  },
  components: {
    LeftNav,
    TopNav
  },
  methods: {
    async validateDeliveryInfo() {
      if (this.deliveryInfo.address.trim() == "")
        return this.error("Potrebno je navesti adresu!");
      else if (this.deliveryInfo.zipCode.trim() == "")
        return this.error("Potrebno je navesti poštanski broj!");
      else if (this.deliveryInfo.country.trim() == "")
        return this.error("Potrebno je navesti zemlju!");
      else if (this.deliveryInfo.city.trim() == "")
        return this.error("Potrebno je navesti grad!");
      this.checkDeliveryInfo();
    },
    async checkDeliveryInfo() {
      this.validating = true;
      const res = await this.callApi(
        "post",
        "order/validate-delivery",
        this.deliveryInfo
      );
      if (res.status === 200) {
        this.$store.commit("addDeliveryInfoToOrder", this.deliveryInfo);
        window.location = "/#/payment-info";
      } else if (res.status === 422) {
        if (res.data.errors.address) {
          this.swr(res.data.errors.address[0]);
        }
        if (res.data.errors.zipCode) {
          this.swr(res.data.errors.zipCode[0]);
        }
        if (res.data.errors.country) {
          this.swr(res.data.errors.country[0]);
        }
        if (res.data.errors.city) {
          this.swr(res.data.errors.city[0]);
        }
      }
      this.validating = false;
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
  .delivery-info {
    background-color: #f6f6f6;
    border-radius: 8px;
    padding: 30px 0px 50px 100px;
    .top-title {
      h1 {
        font-size: 1.8rem;
      }
    }

    .form {
      .form-control {
        &:hover {
          margin-bottom: 25px;
        }
        &:focus {
          margin-bottom: 24px;
        }
      }
      margin-top: 15px;
      label {
        margin: 0 0 5px 5px;
        font-size: 1.2rem;
      }
    }
    input,
    .vue-tel-input {
      width: 350px;
      border-radius: 15px;
      margin-bottom: 25px;
      height: 50px;
    }
    .buttons {
      display: flex;
      justify-content: flex-start;
      gap: 263px;

      .ivu-btn.continue {
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
        &:hover {
          color: #394241;
          background-color: #f3f3f3;
          border: 1px solid #4ca456;
          box-shadow: #4ca45683 0px 20px 100px -20px,
            #4ca456 0px 20px 60px -30px;
        }
        &:focus {
          border: 1px solid #4ca456;
          box-shadow: none;
        }
      }
      .ivu-btn.back {
        border-radius: 8px;
        width: 250px;
        height: 50px;
        margin-top: 25px;
        color: #394241;
        border: 1px solid #4ca456;
        transition: all 0.2s ease-in-out;
        font-size: 1.2rem;
        font-weight: 700;
        &:hover {
          border: 1px solid #6bc26b;
          box-shadow: #4ca45683 0px 20px 100px -20px;
        }
      }
    }
  }
}
</style>