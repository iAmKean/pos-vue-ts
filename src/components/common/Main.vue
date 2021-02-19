<template>
  <div class="main">
    <!-- <component :is="tabContent"></component> -->
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {};
  },
  methods: {},
  props: {
    tabContent: {
      type: String,
      default: "Dashboard"
    }
  },
  created() {}
};
</script>

<style lang="less">
.main {
  padding: 10px;
  background: #fff;
  height: 100%;
  overflow: hidden;
}
</style>
