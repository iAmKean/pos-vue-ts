<template>
  <div class="main">
    <el-tabs v-model="activeName" @tab-click="handleClick(activeName)" type="border-card">
      <el-tab-pane
        v-for="(tabItem, tabKey) in tabList"
        :key="tabKey"
        :label="tabItem.name"
        :name="tabItem.name">
        <component :is="tabItem.tableName"></component>
      </el-tab-pane>
    </el-tabs>
  </div>
</template>

<script>

export default {
  components: {
    BrandTable: resolve => {
      require(["@/components/settings/BrandTable.vue"], resolve);
    },
  },
  data() {
    return {
      activeName: 'Brands',
      tabList: [
        { name: 'Brands', tableName: 'BrandTable' }
      ],
    };
  },
  methods: {
    handleClick(item) {
      console.log(item);
    }
  },
  props: {},
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
