<template>
  <b-container fluid>
    <b-row class="forgot">
      <b-col class="forgot-form">
        <h1>Upišite svoj email, poslat ćemo link za promjenu lozinke.</h1>
        <div class="email">
          <label>E-mail adresa</label>
          <b-form-input type="text" v-model="email"></b-form-input>
        </div>
        <Button class="forgot-btn" @click="forgot" :disabled="sending" :loading="sending">
          <h2>Pošalji</h2>
        </Button>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "forgot",
  data() {
    return {
      sending: false,
      email: ""
    };
  },
  methods: {
    async forgot() {
      this.sending = true;
      const res = await this.callApi("post", "/forgot", { email: this.email });

      if (res.status === 200) {
        this.success("Mail je poslan, provjerite poštu.");
        setTimeout(function() {
          window.location = "/";
        }, 1500);
      } else if (res.status === 422) {
        this.swr(res.data.errors.email);
      } else {
        this.swr(res.data.message);
      }
      this.sending = false;
    }
  }
};
</script>

<style lang="scss" scoped>
.forgot-form {
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
  .email {
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
.forgot-btn {
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