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
      require(["@/components/category/BrandTable.vue"], resolve);
    },
    ModelPartTable: resolve => {
      require(["@/components/category/ModelPartTable.vue"], resolve);
    },
  },
  data() {
    return {
      activeName: 'Brands',
      tabList: [
        { name: 'Brands', tableName: 'BrandTable' },
        { name: 'Model Parts', tableName: 'ModelPartTable' }
      ],
    };
  },
  methods: {
    handleClick(item) {
      // console.log(item);
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
