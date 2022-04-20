<template>
  <div>
    <router-view :key="$route.path"></router-view>
  </div>
</template>

<script>
export default {
  props: ["user"],
  mounted() {
    this.$store.commit("updateCartFromLocalStorage");
    this.$store.commit("updateOrderFromLocaleStorage");
  },
  created() {
    this.$store.commit("setUserLoginStatus", this.user);
  }
};
</script>

<style lang="scss"></style>
