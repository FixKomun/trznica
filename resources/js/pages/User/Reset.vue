<template>
  <b-container fluid>
    <b-row class="reset">
      <b-col class="reset-form">
        <h1>Upišite novu lozinku</h1>
        <div class="password">
          <label>Lozinka</label>
          <b-form-input type="password" v-model="userData.password"></b-form-input>
        </div>

        <div class="password">
          <label>Ponovite lozinku</label>
          <b-form-input type="password" v-model="userData.passwordRepeat"></b-form-input>
        </div>
        <Button
          class="reset-btn"
          @click="confirmPassword"
          :disabled="accepting"
          :loading="accepting"
        >
          <h2>Potvrdi</h2>
        </Button>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      accepting: false,
      userData: {
        password: "",
        passwordRepeat: ""
      }
    };
  },
  methods: {
    async confirmPassword() {
      const res = await this.callApi("post", "/reset", {
        password: this.userData.password,
        passwordRepeat: this.userData.passwordRepeat,
        token: this.$route.params.token
      });
      if (res.status === 200) {
        this.success(
          "Uspješno ste promjenili lozinku, vraćamo Vas na početnu stranicu!"
        );
        setTimeout(function() {
          window.location = "/";
        }, 1500);
      } else if (res.status === 422) {
        if (res.data.errors.password) {
          this.swr(res.data.errors.password);
        } else if (res.data.errors.passwordRepeat) {
          this.swr(res.data.errors.passwordRepeat);
        }
      } else {
        this.swr(res.data.message);
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.reset-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  width: 470px;
  height: 600px;
  h1 {
    font-size: 25px;
    color: #394241;
  }
  .password {
    width: 330px;
    label {
      font-size: 18px;
      margin: 0 0 10px 3px;
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
.reset-btn {
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
</style>