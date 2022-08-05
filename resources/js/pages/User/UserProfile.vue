<template>
  <div>
    <!-- SIDE NAV BAR -->
    <LeftNav />
    <main>
      <!-- TOP NAV BAR -->
      <TopNav />
      <!--USER PROFILE-->
      <div>
        <b-row class="edit">
          <h1>Promijenite informacije</h1>
          <b-col cols="6" class="left-reg">
            <label>Ime *</label>
            <b-form-input type="text" v-model="userData.firstName"></b-form-input>
            <label>Prezime *</label>
            <b-form-input type="text" v-model="userData.lastName"></b-form-input>
            <label>Adresa *</label>
            <b-form-input type="text" v-model="userData.address"></b-form-input>
            <label>Poštanski broj *</label>
            <b-form-input type="text" v-model="userData.zipCode"></b-form-input>
          </b-col>
          <b-col cols="6" class="right-reg">
            <label>Mjesto *</label>
            <b-form-input type="text" v-model="userData.city"></b-form-input>
            <label>Broj mobitela *</label>
            <vue-tel-input
              v-model="userData.phoneNumber"
              v-bind="phoneProps"
              :valid-characters-only="true"
              :inputOptions="phoneProps.options"
            ></vue-tel-input>
            <Button @click="validateUser" :disabled="editing" :loading="editing">
              <h2>Spremi promjene</h2>
            </Button>
          </b-col>
        </b-row>
      </div>
    </main>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
import TopNav from "../../components/TopNav";
export default {
  data() {
    return {
      user_id: this.$route.params.id,
      userData: [],
      phoneProps: {
        mode: "international",
        placeholder: "Unesite broj mobitela",
        defaultCountry: "HR",
        preferredCountries: ["HR", "BA", "RS", "ME", "SI", "HU"],
        options: { placeholder: "Unesite broj mobitela" }
      },
      editing: false
    };
  },
  components: {
    LeftNav,
    TopNav
  },
  methods: {
    async validateUser() {
      //FRONTEND VALIDATION//
      if (this.userData.firstName.trim() == "")
        return this.error("Potrebno je navesti ime!");
      else if (this.userData.lastName.trim() == "")
        return this.error("Potrebno je navesti prezime!");
      else if (this.userData.address.trim() == "")
        return this.error("Potrebno je navesti adresu!");
      else if (this.userData.zipCode.trim() == "")
        return this.error("Potrebno je navesti prezime!");
      else if (this.userData.city.trim() == "")
        return this.error("Potrebno je navesti mjesto stanovanja!");
      else if (this.userData.phoneNumber.trim() == "")
        return this.error("Potrebno je navesti broj tel/mob!");

      this.editUser();
    },
    async editUser() {
      this.editing = true;
      //console.log(this.userData);
      const res = await this.callApi("post", "/user/edit-user", this.userData);
      if (res.status === 200) {
        this.success("Uspješno uređivanje profila!");
        await setTimeout(function() {
          window.location = "/";
        }, 1500);
      } else if (res.status === 422) {
        if (res.data.errors.firstName) {
          this.swr(res.data.errors.firstName[0]);
        }
        if (res.data.errors.lastName) {
          this.swr(res.data.errors.lastName[0]);
        }
        if (res.data.errors.address) {
          this.swr(res.data.errors.address[0]);
        }
        if (res.data.errors.zipCode) {
          this.swr(res.data.errors.zipCode[0]);
        }
        if (res.data.errors.city) {
          this.swr(res.data.errors.city[0]);
        }
        if (res.data.errors.phoneNumber) {
          this.swr(res.data.errors.phoneNumber[0]);
        }
      }
      this.editing = false;
    }
  },
  async created() {
    const res = await this.callApi("get", "/get-user/" + this.user_id);
    if (res.status === 200) {
      this.userData = res.data[0];
    } else {
      this.swr();
    }
  }
};
</script>

<style lang="scss" scoped>
.edit {
  background-color: #f6f6f6;
  border-radius: 8px;
  margin: 50px 70px 50px 70px;

  justify-content: space-around;
  padding: 70px;
  .col-6 {
    width: 500px;
    margin: 10px;
  }
  input,
  .vue-tel-input {
    width: 450px;
    border-radius: 15px;
    margin-bottom: 25px;
    height: 50px;
  }

  label {
    margin: 0 0 5px 5px;
    font-size: 1.2rem;
  }
  h1 {
    margin-bottom: 50px;
    font-size: 2rem;
  }
}
.ivu-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  border-radius: 8px;
  width: 450px;
  height: 70px;
  margin-top: 75px;
  background-color: #4ca456;
  color: white;
  border: none;
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
</style>