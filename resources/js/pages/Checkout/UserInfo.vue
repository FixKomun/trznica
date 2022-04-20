<template>
  <div>
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--CHECKOUT-->
      <Modal v-model="modal" footer-hide>
        <Login />
      </Modal>

      <b-container>
        <h1 class="title">Dovrši narudžbu u četiri koraka</h1>
        <b-row>
          <b-col cols="1" class="steps">
            <h2 :class="{active:$route.name==='checkoutUser'}">Početak</h2>
            <h2 :class="{active:$route.name==='deliveryInfo'}">Adresa</h2>
            <h2 :class="{active:$route.name==='paymentInfo'}">Plaćanje i dostava</h2>
            <h2 :class="{active:$route.name==='orderSummary'}">Potvrdi</h2>
          </b-col>
          <b-col cols="1">
            <svg
              width="45"
              height="613"
              viewBox="0 0 45 613"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="22.8929" cy="211.893" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <circle cx="22.8929" cy="400.893" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <path d="M22.8169 43.7856L22.8169 189.745" stroke="#8ED974" stroke-width="2" />
              <path d="M22.8169 233.524L22.8169 379.484" stroke="#8ED974" stroke-width="2" />
              <circle cx="22.8167" cy="591.107" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <path
                d="M23.9352 593.893L19.4802 593.897C19.2102 593.897 18.995 593.827 18.8346 593.687C18.6741 593.547 18.5936 593.373 18.593 593.163C18.5923 592.953 18.6717 592.752 18.8311 592.562L24.4805 585.778C24.7197 585.508 24.9692 585.373 25.2292 585.372C25.4392 585.372 25.6345 585.447 25.8149 585.597C26.1157 585.837 26.2663 586.062 26.267 586.272C26.2674 586.392 26.2128 586.532 26.1033 586.692L25.924 586.932L25.9404 592.302L27.2754 592.301L27.2802 593.891L25.9452 593.892L25.9516 596.007L23.9416 596.008L23.9352 593.893ZM24.0354 592.303L24.0249 588.868L21.1704 592.306L24.0354 592.303Z"
                fill="#394241"
              />
              <path
                d="M23.1377 407.158C21.9677 407.159 20.9869 406.895 20.1953 406.365C19.4037 405.836 18.8413 405.051 18.5081 404.012L20.3513 403.41C20.5436 404.15 20.8702 404.69 21.3312 405.029C21.8022 405.359 22.4027 405.524 23.1327 405.523C24.6927 405.522 25.4707 404.861 25.4667 403.541C25.465 402.971 25.3187 402.541 25.0278 402.252C24.7369 401.952 24.3364 401.802 23.8264 401.802C23.6164 401.803 23.4115 401.833 23.2117 401.893L23.0025 402.163C22.8232 402.393 22.6436 402.508 22.4636 402.509C22.2836 402.509 22.0232 402.394 21.6825 402.164C21.4721 402.014 21.3666 401.864 21.3661 401.714C21.3657 401.574 21.4401 401.384 21.5894 401.144L23.5751 398.098L21.1451 398.1L20.6991 399.42L19.1511 398.431L19.8053 396.511L26.0903 396.506C26.3703 396.505 26.5804 396.545 26.7206 396.625C26.8609 396.695 26.9313 396.825 26.9318 397.015C26.9322 397.125 26.9026 397.27 26.8432 397.45C26.754 397.71 26.6445 397.885 26.5148 397.975C26.385 398.055 26.1851 398.096 25.9151 398.096L25.6151 398.096L24.1071 400.377C24.3169 400.307 24.5668 400.272 24.8568 400.272C25.3368 400.271 25.7771 400.396 26.1779 400.646C26.5787 400.895 26.8998 401.27 27.1413 401.77C27.3828 402.26 27.5046 402.85 27.5067 403.54C27.5089 404.26 27.3358 404.895 26.9875 405.445C26.6492 405.985 26.1504 406.406 25.4914 406.706C24.8323 407.007 24.0477 407.157 23.1377 407.158Z"
                fill="#394241"
              />
              <path
                d="M19.6523 217.011C19.3023 217.012 19.0572 216.967 18.9169 216.877C18.7867 216.787 18.7211 216.607 18.7203 216.337C18.719 215.917 18.7732 215.642 18.8828 215.512C19.0024 215.382 19.1972 215.312 19.4671 215.301C19.7356 214.801 20.0843 214.366 20.5132 213.996C20.952 213.625 21.5407 213.195 22.2792 212.704C22.8282 212.354 23.2623 212.053 23.5815 211.803C23.9007 211.543 24.1648 211.253 24.3738 210.933C24.5929 210.612 24.7018 210.257 24.7006 209.867C24.6987 209.257 24.5523 208.792 24.2613 208.473C23.9804 208.153 23.5499 207.993 22.9699 207.994C22.2699 207.994 21.7454 208.18 21.3966 208.55C21.0577 208.92 20.8546 209.555 20.7874 210.455L18.8818 210.277C18.8994 209.487 19.0773 208.797 19.4155 208.206C19.7637 207.616 20.2373 207.161 20.8364 206.84C21.4454 206.52 22.1549 206.359 22.9649 206.359C24.1649 206.358 25.0909 206.672 25.7428 207.301C26.4047 207.931 26.7373 208.786 26.7406 209.866C26.7423 210.426 26.6088 210.926 26.3402 211.366C26.0815 211.806 25.7626 212.181 25.3836 212.492C25.0145 212.802 24.5256 213.162 23.9169 213.573C23.388 213.933 22.9689 214.234 22.6596 214.474C22.3604 214.714 22.1212 214.979 21.942 215.269L25.137 215.267L25.5541 214.307L27.3109 214.905L26.4023 217.006L19.6523 217.011Z"
                fill="#394241"
              />
              <path d="M22.8167 423.261L22.8167 569.221" stroke="#8ED974" stroke-width="2" />
              <circle cx="22.8929" cy="21.8929" r="21.8929" fill="#8ED974" />
              <path
                d="M21.8779 18.0092L20.0127 19.5947L18.3349 17.682L22.8773 13.8944C23.287 13.5568 23.6678 13.3878 24.0198 13.3875C24.3571 13.3873 24.6803 13.5483 24.9893 13.8708C25.2982 14.1932 25.4532 14.5011 25.4541 14.7944C25.4549 15.0731 25.2944 15.3519 24.9726 15.6308L24.819 15.7629L24.8594 29.0068L21.9114 29.0091L21.8779 18.0092Z"
                fill="white"
              />
            </svg>
          </b-col>
          <b-col cols="10" class="user-info">
            <div class="top-title">
              <h1>Podaci</h1>
              <h3>
                Već ste registrirani?
                <span @click="modal=true">Prijavi se</span>
              </h3>
            </div>
            <div class="form">
              <label>Ime *</label>
              <b-form-input type="text" v-model="userInfo.firstName"></b-form-input>
              <label>Prezime *</label>
              <b-form-input type="text" v-model="userInfo.lastName"></b-form-input>
              <label>E-mail adresa *</label>
              <b-form-input type="text" v-model="userInfo.email"></b-form-input>
              <label>Broj mobitela *</label>
              <vue-tel-input
                v-model="userInfo.phoneNumber"
                v-bind="phoneProps"
                :valid-characters-only="true"
                :inputOptions="phoneProps.options"
              ></vue-tel-input>
            </div>
            <Button @click="validateUserInfo" :disabled="validating" :loading="validating">Nastavi</Button>
          </b-col>
        </b-row>
      </b-container>
    </main>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
import TopNav from "../../components/TopNav";
import Login from "../../components/Login";
export default {
  data() {
    return {
      validating: false,
      modal: false
    };
  },
  computed: {
    userInfo() {
      if (this.$store.state.order.userInfo)
        return this.$store.state.order.userInfo;
      else {
        return {
          firstName: "",
          lastName: "",
          email: "",
          phoneNumber: ""
        };
      }
    },
    phoneProps() {
      return {
        mode: "international",
        placeholder: "Unesite broj mobitela",
        defaultCountry: "HR",
        preferredCountries: ["HR", "BA", "RS", "ME", "SI", "HU"],
        options: { placeholder: "Unesite broj mobitela" }
      };
    }
  },
  components: {
    LeftNav,
    TopNav,
    Login
  },
  methods: {
    async validateUserInfo() {
      if (this.userInfo.firstName.trim() == "")
        return this.error("Potrebno je navesti ime!");
      else if (this.userInfo.lastName.trim() == "")
        return this.error("Potrebno je navesti prezime!");
      else if (this.userInfo.email.trim() == "")
        return this.error("Potrebno je navesti email adresu!");
      else if (this.userInfo.phoneNumber.trim() == "")
        return this.error("Potrebno je navesti broj tel/mob!");
      this.checkUserInfo();
    },
    async checkUserInfo() {
      this.validating = true;
      const res = await this.callApi(
        "post",
        "order/validate-user",
        this.userInfo
      );
      if (res.status === 200) {
        this.$store.commit("addUserInfoToOrder", this.userInfo);
        window.location = "/#/delivery-info";
      } else if (res.status === 422) {
        if (res.data.errors.firsName) {
          this.swr(res.data.errors.firstName[0]);
        }
        if (res.data.errors.lastName) {
          this.swr(res.data.errors.lastName[0]);
        }
        if (res.data.errors.email) {
          this.swr(res.data.errors.email[0]);
        }
        if (res.data.errors.phoneNumber) {
          this.swr(res.data.errors.phoneNumber[0]);
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
  .user-info {
    background-color: #f6f6f6;
    border-radius: 8px;
    padding: 30px 0px 50px 100px;
    .top-title {
      display: flex;
      align-items: center;
      gap: 90px;
      h1 {
        font-size: 1.8rem;
      }
      h3 {
        font-size: 1.2rem;
        span {
          margin-left: 10px;
          color: #4ca456;
          cursor: pointer;
        }
      }
    }

    .form {
      margin-top: 15px;
      label {
        margin: 0 0 5px 5px;
        font-size: 1.2rem;
      }
    }
    input,
    .vue-tel-input {
      width: 450px;
      border-radius: 15px;
      margin-bottom: 25px;
      height: 50px;
    }
    .ivu-btn {
      border-radius: 8px;
      width: 450px;
      height: 50px;
      margin-top: 25px;
      background-color: #4ca456;
      color: white;
      border: none;
      font-size: 1.2rem;
      transition: 0.3s ease-in-out;
      border: 1px solid #4ca456;
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
      h2 {
        text-align: center;
        margin: 0;
        font-size: 1.5rem;
      }
    }
  }
}
</style>