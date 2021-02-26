<template>
  <el-col>
    <el-menu
      :default-active="`${activeTab}`"
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b"
    >
      <el-menu-item
        v-for="(tabItem, tabKey) in tabItems"
        :key="tabKey"
        :index="`${tabKey}`"
        @click="selectTabContent(tabItem.link)"
      >
        <i :class="tabItem.icon"></i>
        <span>{{ tabItem.name }}</span>
      </el-menu-item>
    </el-menu>
  </el-col>
</template>

<script>
export default {
  name: "Aside",
  components: {},
  data() {
    return {
      // activeTab: "0",
      tabItems: [
        {
          name: "Dashboard",
          icon: "el-icon-s-data",
          link: 'Home',
        },
        {
          name: "Inventory",
          icon: "el-icon-notebook-2",
          link: 'Inventory',
        },
        {
          name: "Sales",
          icon: "el-icon-sell",
          link: 'Sales',
        },
        {
          name: "Members",
          icon: "el-icon-user-solid",
          link: 'Members',
        },
        {
          name: "Settings",
          icon: "el-icon-s-tools",
          link: 'Settings',
        },
      ],
    };
  },
  props: {
    activeTab: {
      type: String,
      default: '0'
    },
  },
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    },
    selectTabContent(url) {
      this.$router.push({ name: url ,})
    }
  },
  created() {}
};
</script>
<style lang="less">
.el-col {
  height: 100%;
  .el-menu {
    height: 100%;
  }
  .el-menu li {
    text-align: left;
    padding: 0px 35px !important;
  }
}
</style>
