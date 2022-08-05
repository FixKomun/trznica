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
        <h1 class="title">Dovrši narudžbu u tri koraka</h1>
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
                d="M18.6523 216.014C18.3023 216.014 18.0572 215.969 17.9169 215.879C17.7867 215.789 17.7211 215.609 17.7203 215.339C17.719 214.919 17.7732 214.644 17.8828 214.514C18.0024 214.384 18.1972 214.314 18.4671 214.304C18.7356 213.804 19.0843 213.368 19.5132 212.998C19.952 212.628 20.5407 212.197 21.2792 211.707C21.8282 211.356 22.2623 211.056 22.5815 210.806C22.9007 210.545 23.1648 210.255 23.3738 209.935C23.5929 209.615 23.7018 209.26 23.7006 208.87C23.6987 208.26 23.5523 207.795 23.2613 207.475C22.9804 207.155 22.5499 206.996 21.9699 206.996C21.2699 206.997 20.7454 207.182 20.3966 207.552C20.0577 207.923 19.8546 208.558 19.7874 209.458L17.8818 209.279C17.8994 208.489 18.0773 207.799 18.4155 207.209C18.7637 206.619 19.2373 206.163 19.8364 205.843C20.4454 205.522 21.1549 205.362 21.9649 205.361C23.1649 205.36 24.0909 205.674 24.7428 206.304C25.4047 206.933 25.7373 207.788 25.7406 208.868C25.7423 209.428 25.6088 209.928 25.3402 210.368C25.0815 210.809 24.7626 211.184 24.3836 211.494C24.0145 211.804 23.5256 212.165 22.9169 212.575C22.388 212.936 21.9689 213.236 21.6596 213.476C21.3604 213.717 21.1212 213.982 20.942 214.272L24.137 214.269L24.5541 213.309L26.3109 213.908L25.4023 216.008L18.6523 216.014Z"
                fill="#394241"
              />
              <path
                d="M22.1377 407.158C20.9677 407.159 19.9869 406.895 19.1953 406.365C18.4037 405.836 17.8413 405.051 17.5081 404.012L19.3513 403.41C19.5436 404.15 19.8702 404.69 20.3312 405.029C20.8022 405.359 21.4027 405.524 22.1327 405.523C23.6927 405.522 24.4707 404.861 24.4667 403.541C24.465 402.971 24.3187 402.541 24.0278 402.252C23.7369 401.952 23.3364 401.802 22.8264 401.802C22.6164 401.803 22.4115 401.833 22.2117 401.893L22.0025 402.163C21.8232 402.393 21.6436 402.508 21.4636 402.509C21.2836 402.509 21.0232 402.394 20.6825 402.164C20.4721 402.014 20.3666 401.864 20.3661 401.714C20.3657 401.574 20.4401 401.384 20.5894 401.144L22.5751 398.098L20.1451 398.1L19.6991 399.42L18.1511 398.431L18.8053 396.511L25.0903 396.506C25.3703 396.505 25.5804 396.545 25.7206 396.625C25.8609 396.695 25.9313 396.825 25.9318 397.015C25.9322 397.125 25.9026 397.27 25.8432 397.45C25.754 397.71 25.6445 397.885 25.5148 397.975C25.385 398.055 25.1851 398.096 24.9151 398.096L24.6151 398.096L23.1071 400.377C23.3169 400.307 23.5668 400.272 23.8568 400.272C24.3368 400.271 24.7771 400.396 25.1779 400.646C25.5787 400.895 25.8998 401.27 26.1413 401.77C26.3828 402.26 26.5046 402.85 26.5067 403.54C26.5089 404.26 26.3358 404.895 25.9875 405.445C25.6492 405.985 25.1504 406.406 24.4914 406.706C23.8323 407.007 23.0477 407.157 22.1377 407.158Z"
                fill="#394241"
              />
              <circle cx="21.8929" cy="211.893" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <circle cx="21.8929" cy="400.893" r="20.8929" stroke="#8ED974" stroke-width="2" />
              <path d="M21.8169 43.7856L21.8169 189.745" stroke="#8ED974" stroke-width="2" />
              <path d="M21.8169 233.524L21.8169 379.484" stroke="#8ED974" stroke-width="2" />
              <circle cx="21.8929" cy="21.8929" r="21.8929" fill="#8ED974" />
              <path
                d="M20.8779 18.0092L19.0127 19.5947L17.3349 17.682L21.8773 13.8944C22.287 13.5568 22.6678 13.3878 23.0198 13.3875C23.3571 13.3873 23.6803 13.5483 23.9893 13.8708C24.2982 14.1932 24.4532 14.5011 24.4541 14.7944C24.4549 15.0731 24.2944 15.3519 23.9726 15.6308L23.819 15.7629L23.8594 29.0068L20.9114 29.0091L20.8779 18.0092Z"
                fill="white"
              />
            </svg>
          </b-col>
          <b-col cols="10" class="user-info">
            <div class="top-title">
              <h1>Podaci</h1>
              <h3 v-if="!$store.state.user.status">
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
              <b-form-input type="email" v-model="userInfo.email"></b-form-input>
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
      //User already filled the info
      if (this.$store.state.order.userInfo) {
        return this.$store.state.order.userInfo;
      } else {
        //User is logged in
        if (this.$store.state.user.status) {
          this.modal = false;
          return {
            firstName: this.$store.state.user.status.firstName,
            lastName: this.$store.state.user.status.lastName,
            email: this.$store.state.user.status.email,
            phoneNumber: this.$store.state.user.status.phoneNumber
          };
        } else {
          return {
            firstName: "",
            lastName: "",
            email: "",
            phoneNumber: ""
          };
        }
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
        await this.$store.commit("addUserInfoToOrder", this.userInfo);
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