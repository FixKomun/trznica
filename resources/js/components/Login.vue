<template>
  <div>
    <b-container fluid>
      <b-row class="login">
        <b-col class="login-modal">
          <h1>Prijavite se na svoj račun</h1>
          <div class="email">
            <label>Moja e-mail adresa *</label>
            <b-form-input type="text" v-model="userData.email"></b-form-input>
          </div>
          <div class="password">
            <label>Moja lozinka *</label>
            <b-form-input type="password" v-model="userData.password"></b-form-input>
          </div>
          <Checkbox v-model="single" size="large">Zapamti me</Checkbox>
          <Button class="login-btn" @click="login" :disabled="loging" :loading="loging">
            <h2>Prijava</h2>
          </Button>
          <Button
            class="face-btn"
            @click="facebookLogin"
            :disabled="fcbLoging"
            :loading="fcbLoging"
          >
            <div class="btn-items">
              <svg
                class="face-logo"
                width="29"
                height="29"
                viewBox="0 0 29 29"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <rect width="29" height="28.6987" rx="1" fill="url(#pattern0)" />
                <defs>
                  <pattern
                    id="pattern0"
                    patternContentUnits="objectBoundingBox"
                    width="1"
                    height="1"
                  >
                    <use
                      xlink:href="#image0_209_48"
                      transform="translate(-0.206863) scale(0.000706863)"
                    />
                  </pattern>
                  <image
                    id="image0_209_48"
                    width="2000"
                    height="1400"
                    xlink:href="data:image/png;base64,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cTZsPM41d+M4jOIwjsNuDeM4anAoGsFKumcaozjjOFJyzd04DqM4KizpxnHMcivOOI4E3IoLyO04jOIyMI7je27FGcdhFEelq3TjOIzijOMwiuMJF29uGcdhFBfPdbTPz8/fDb5zdnb9b6c3sb+wSqd83mf5eQk/Px8M2p+4GgzevTs/PS0w78ZxGMXNFfLBZjuvq6vBdd7f/FrSOM7Tzf0oTuf+eLu+cTZoF3cb9zelxH3f88033md5rJY/L+UP2vky0u6nHNC5P13Mz1+U8u/TbhyHUVyJNs7aJboJe4+V/cgTzi1L9JmefdAu3dWgt7BbpXPLEn3lMb+r7L0M5H1oBp37D037ymJ+d2Y/7fzIbpXOjUPxvh/BnbWrd3V9ZLdKp2uW6Pdd+/lm243rE7tVOt2yRO+ma5+JepeHdb07luh35fys7VSXQfdWOt5E/1bON9u4QbdKR+d+W87fdp3zTlt3q3TWdO7dt+2dV3TXYNOzRG+ay802eND17ulZond/PO++dde7p+/c0y/RL962vej4LqzeXefueJ4g6FbpOnc5j9+6uwarc5fzDBXdK2ypJf8hpotPbZag69117nKeoHXXu2eW+8W1PnPefUX3CpvOXc4zBF3vnteJnKdp3fXuiTt38/ZEFV3vntYviYPed857CLreXeeeztu+c9596653N3NPZ6Nt81V0vXtSeT850ct7qf0HXe+uc881iCsg5z207np3nbvFWoaKrnc3czeIyxB0vbvO3SAufuuud9e5O6BnqOh6dzN3B/QMQde753PogJ6udde755P02zKXbZu5ouvd08n5hmopB/Tegq5317lr3OO37np3nbvGPUNF17snk/J77gU17r0FXe+uc9e4x2/d9e46d417horud1V17q7KJAh684enX+eucQ/fuvtd1VQSdu5FTeJ6rOh690Qyfv71rBX0W0ee/zQSvtByWVjOe2vd9e6JnOQL+qdWRde769yj22gF3eU4nbtJXJ7W3eU4nbvVWoaK7nJcEvmuxZVX0PsMut49iR0FPXXrrndP4lBBz13RLdh07gp6gqBbsFmuKegJWneX4yzXFPQEFV3vbrmmoGcIut5d566gJ2jdLdh07gp6gopuwWa5Fs7fraC7HGe5Fl6hBb3f1v2z3j26bF+Lu2xVdAs2R/TwPgm6BZvlmoKes3W3YLNci+W3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"
                  />
                </defs>
              </svg>

              <h2>Facebook prijava</h2>
            </div>
          </Button>
          <Button
            class="google-btn"
            @click="googleLogin"
            :disabled="gglLoging"
            :loading="gglLoging"
          >
            <div class="btn-items">
              <svg
                class="google-logo"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 48 48"
              >
                <defs>
                  <path
                    id="a"
                    d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"
                  />
                </defs>
                <clipPath id="b">
                  <use xlink:href="#a" overflow="visible" />
                </clipPath>
                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
              </svg>

              <h2>Google prijava</h2>
            </div>
          </Button>
          <router-link to="/forgot">Zaboravili ste lozinku?</router-link>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userData: {
        email: "",
        password: ""
      },
      loging: false,
      fcbLoging: false,
      gglLoging: false,
      single: false
    };
  },

  methods: {
    async login() {
      //FRONTEND VALIDATION//
      if (this.userData.email.trim() == "")
        return this.error("Potrebno je navesti email korisnika!");
      else if (this.userData.password.trim() == "")
        return this.error("Potrebno je navesti lozinku korisnika!");

      this.loging = true;
      //console.log(this.userData);
      const res = await this.callApi("post", "/user/login", this.userData);
      if (res.status === 200) {
        this.success("Uspješno ulogiranje !");
        if (this.$route.name !== "checkoutUser") {
          console.log(this.$route.name);
          this.loging = false;
          await setTimeout(function() {
            window.location = "/";
          }, 1500);
        } else {
          console.log(this.$route.name);
          window.location.reload();
        }
      } else {
        if (res.status === 401) {
          this.error(res.data.msg);
          this.loging = false;
          return;
        }
        if (res.status === 422) {
          if (res.data.errors.email) {
            this.swr(res.data.errors.email[0]);
          }
          if (res.data.errors.password) {
            this.swr(res.data.errors.password[0]);
          }
        } else {
          this.swr();
        }
      }
      this.loging = false;
    },
    async facebookLogin() {
      return;
    },
    async googleLogin() {
      return;
    }
  }
};
</script>

<style lang="scss" scoped>
.login-modal {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  width: 470px;
  height: 600px;
  h1 {
    font-size: 30px;
    color: #394241;
  }
  .email,
  .password {
    width: 330px;
    label {
      font-size: 18px;
      margin: 0 0 10px 3px;
    }
  }
  .ivu-checkbox-wrapper {
    width: 330px;
    margin-left: 1rem;
    font-size: 17px;
    .ivu-checkbox-inner {
      width: 19px;
      height: 19px;
    }
    .ivu-checkbox-checked {
      background-color: coral;
    }
  }
  .ivu-modal {
    .ivu-modal-content {
      background-color: #f6f6f6;
    }
  }
}
.ivu-btn {
  display: flex;
  align-items: center;
  justify-content: center;

  border-radius: 8px;
  width: 330px;
  height: 70px;

  color: white;
  border: none;
  transition: 0.3s ease-in-out;

  h2 {
    text-align: center;
    margin: 0;
    font-size: 1.5rem;
  }
}
.login-btn {
  background-color: #4ca456;
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
}
.face-btn {
  background-color: #4267b2;
  border: 1px solid #4267b2;
  &:hover {
    color: #394241;
    background-color: #f3f3f3;
    border: 1px solid #4267b2;
    box-shadow: #4267b283 0px 20px 100px -20px, #4267b283 0px 20px 60px -30px;
  }
  &:focus {
    border: 1px solid #4267b2;
    box-shadow: none;
  }
  .btn-items {
    width: 330px;
    display: flex;
    justify-content: space-evenly;
    margin-right: 50px;
  }
}
.google-btn {
  color: #a6adad;
  border: 1px solid #a6adad;
  &:hover {
    color: #394241;
    background-color: #a6adad;
    border: 1px solid #a6adad;
    box-shadow: #a6adad83 0px 20px 100px -20px, #a6adad83 0px 20px 60px -30px;
  }
  &:focus {
    box-shadow: none;
  }
  .btn-items {
    width: 330px;
    display: flex;
    justify-content: space-evenly;
    margin-right: 68px;
    .google-logo {
      width: 27px;
      height: 27px;
    }
  }
}
</style>
