<template>
  <div>
    <LeftNav />
    <main>
      <b-row>
        <!--LEFT SIDE ADD IMAGE-->
        <b-col class="new-left" cols="4">
          <Upload
            ref="uploads"
            action="product/upload-image"
            :headers="{'x-csrf-token':token, 'X-Requested-With':'XMLHttpRequest'}"
            :on-success="handleSuccess"
            :on-error="handleError"
            :format="['jpg','jpeg','png']"
            :on-format-error="handleFormatError"
            :max-size="2048"
            :on-exceeded-size="handleMaxSize"
          >
            <Button v-if="!productData.image">Dodaj sliku prizvoda</Button>
            <img v-if="productData.image" class="product-img" :src="productData.image" alt />

            <!-- CHANGE BUTTON AND DELETE ON SERVER
            <Button class="change-button" v-if="recipeData.image">Change image</Button>
            -->
          </Upload>
          <div class="delete-icon">
            <Icon v-if="productData.image" @click="deleteImage" type="md-trash" size="30" />
          </div>
        </b-col>

        <!--RIGHT SIDE ADD PRODUCT-->
        <b-col class="new-right" cols="5">
          <label for="productName">Naziv proizvoda</label>
          <b-form-input v-model="productData.name" type="text" debounce="500"></b-form-input>
          <label for="productPrice">Cijena proizvoda</label>
          <b-form-input
            class="price-input"
            v-model="productData.price"
            oninput="this.value = Math.abs(this.value)"
            type="number"
            debounce="500"
          ></b-form-input>
          <div class="category">
            <label for="productCategory">Kategorija</label>
            <Select v-model="productData.category_id" placeholder="Odaberite kategoriju proizvoda">
              <Option
                v-for="(category,i) in categoryList"
                :key="i"
                :value="category.id"
              >{{category.categoryName }}</Option>
            </Select>
          </div>
          <div class="description">
            <label for="productDescription">Opis proizvoda</label>
            <b-form-textarea
              v-model="productData.description"
              placeholder="Opiši me..."
              rows="2"
              max-rows="6"
              debounce="500"
              class="scroll"
            ></b-form-textarea>
          </div>
          <div class="btns">
            <Button class="close-btn" @click="close">Zatvori</Button>
            <Button
              class="create-btn"
              @click="validateProduct"
              :loading="isCreating"
              :disabled="isCreating"
            >
              Spremi promjene
              <svg
                width="28"
                height="28"
                viewBox="0 0 28 28"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M14 27C21.1797 27 27 21.1797 27 14C27 6.8203 21.1797 1 14 1C6.8203 1 1 6.8203 1 14C1 21.1797 6.8203 27 14 27Z"
                  stroke="white"
                  stroke-opacity="0.2"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M15 18L19 14L15 10"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M9 14H17"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </Button>
          </div>
        </b-col>
      </b-row>
    </main>
  </div>
</template>

<script>
import LeftNav from "../../components/LeftNav";
export default {
  data() {
    return {
      productData: [],
      userData: [],
      product_id: this.$route.params.id,
      categoryList: [],
      isCreating: false,
      token: "",
      canClose: true,
      refImage: ""
    };
  },
  components: {
    LeftNav
  },
  methods: {
    handleSuccess(res, file) {
      res = `/uploads/${res}`;
      // console.log(res);
      this.productData.image = res;
      this.canClose = true;
      this.$refs.uploads.clearFiles();
    },
    handleError(res, file) {
      console.log(file);
      this.$Notice.warning({
        title: `${file.message}`,
        desc: `Error`
      });
    },
    handleFormatError(file) {
      console.log(file);
      this.$Notice.warning({
        title: "Format (" + file.name + ") je kriv!",
        desc: "Odaberite dobar format slike, .jpg ili .png"
      });
    },
    handleMaxSize(file) {
      this.$Notice.warning({
        title: "Prevelik file",
        desc: "File" + file.name + "je prevelik!"
      });
    },
    validateProduct() {
      if (this.productData.name.trim() == "")
        return this.error("Potrebno je navesti ime proizvoda!");
      else if (
        this.productData.price.toString().trim() == "" ||
        this.productData.price == 0
      )
        return this.error("Potrebno je navesti željenu cijenu proizvoda!");
      else if (this.productData.category_id.toString().trim() == "")
        return this.error("Potrebno je odabrati kategoriju!");
      else if (this.productData.description.trim() == "")
        return this.error("Potrebno je navesti opis proizvoda!");
      else if (this.productData.description.length > 450)
        return this.error("Predugačak opis, maksimalno 450 karaktera");
      if (this.productData.image == "")
        return this.error("Potrebno je postaviti sliku proizvoda");

      this.editProduct();
    },
    async editProduct() {
      this.isCreating = true;
      const res = await this.callApi(
        "post",
        "product/edit-product",
        this.productData
      );
      if (res.status === 200) {
        this.success("Proizvod je uspješno uređen, vraćamo vas na tržnicu...");
        setTimeout(function() {
          window.location = "/#/trznica";
        }, 1500);
      } else {
        this.swr();
      }
      this.isCreating = false;
    },
    async close() {
      if (!this.productData.image) {
        this.error("Ne moze!");
        this.productData.image = this.refImage;
      } else {
        window.location = "/";
      }
    },
    async deleteImage() {
      //TODO: Izbrisati sliku tek kad se stisne edit product!!
      if (!this.productData.image) this.canClose = false;
      this.refImage = this.productData.image;
      this.productData.image = "";
      this.$refs.uploads.clearFiles();
      console.log(this.refImage);

      const res = await this.callApi("post", "/product/delete-image", {
        imageName: this.refImage,
        close: this.canClose
      });
      if (res.status != 200) {
        this.productData.image = this.refImage;
        this.swr();
      }
    }
  },
  async created() {
    this.token = window.Laravel.csrfToken;
    const res1 = await this.callApi("get", "/get-category");
    if (res1.status === 200) {
      console.log(res1.data);
      this.categoryList = res1.data;
    } else {
      this.error("Neuspješno spajanje sa bazom podataka");
    }
    const res = await this.callApi("get", "/get-product/" + this.product_id);
    if (res.status === 200) {
      this.productData = res.data[0];
      this.userData = res.data[0].user;
      this.$store.commit("setActiveProduct", res.data[0]);
    } else this.swr();
  }
};
</script>

<style lang="scss" scoped>
.row {
  margin: 0;
  justify-content: center;
  margin-top: 100px;
}
.new-left {
  background-color: #f6f6f6;
  border-radius: 8px;
  width: 530px;
  button {
    width: 180px;
    height: 50px;
    box-shadow: 0px 20px 50px 0px #d3d3d3;
    background-color: #4ca456;
    box-shadow: #d3d3d3 0px 30px 100px -20px, #d3d3d3 0px 30px 60px -30px;
    transition: all 0.3s ease-in-out;
    color: white;
    font-size: 16px;
    font-weight: 700;
    border-radius: 8px;
    &:hover {
      color: #adadad;
      background-color: #4ca456;
      box-shadow: #4ca456 0px 20px 100px -20px, #4ca456 0px 20px 60px -30px;
      border-color: #adadad;
    }
  }

  .product-img {
    object-fit: cover;
    width: 530px;
    height: 600px;
    cursor: pointer;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  .ivu-upload {
    display: flex;
    flex-direction: column;
    min-height: 600px;
    justify-content: center;
    align-items: center;
  }

  .delete-icon {
    display: flex;
    justify-content: center;
    padding-bottom: 1rem;
    i {
      cursor: pointer;
      transition: all 0.2s ease-in-out;
      &:hover {
        animation: shake 0.5s;
        animation-iteration-count: infinite;
      }

      @keyframes shake {
        0% {
          transform: translate(1px, 1px) rotate(0deg);
        }
        20% {
          transform: translate(-1px, -1px) rotate(-1deg);
        }
        40% {
          transform: translate(-1px, 0px) rotate(1deg);
        }
        70% {
          transform: translate(1px, 1px) rotate(0deg);
        }
        100% {
          transform: translate(1px, -1px) rotate(1deg);
        }
      }
    }
  }
}
.new-right {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  color: #212529;
  font-size: 1.2rem;
  margin-left: 10px;

  input,
  .vue-tel-input {
    width: 450px;
    border-radius: 15px;
    margin-bottom: 25px;
    height: 50px;
  }
  .create-btn {
    width: 204px;
    height: 64px;
    box-shadow: 0px 20px 50px 0px #d3d3d3;
    background-color: #4ca456;
    box-shadow: #d3d3d3 0px 30px 100px -20px, #d3d3d3 0px 30px 60px -30px;
    transition: all 0.3s ease-in-out;
    color: white;
    font-size: 16px;
    font-weight: 700;
    border-radius: 8px;
    &:hover {
      color: #adadad;
      background-color: #4ca456;
      box-shadow: #4ca456 0px 20px 100px -20px, #4ca456 0px 20px 60px -30px;
      border-color: #adadad;
    }
  }
  .close-btn {
    width: 168px;
    height: 64px;
    color: #4f5255;
    border: 1px solid #4ca456;
    margin-right: 16px;
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    &:hover {
      border: 1px solid #6bc26b;
    }
  }
  .price-input {
    width: 100px;
  }
  .category {
    display: flex;
    flex-direction: column;
    margin-bottom: 1rem;
    label {
      margin-bottom: 1rem;
    }
  }
  .description {
    width: 450px;
    margin-bottom: 4rem;
    label {
      margin-bottom: 1rem;
    }
  }
}
</style>