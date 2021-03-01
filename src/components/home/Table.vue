<template>
  <div>
    <el-table
      :data="searchTable"
      height="520"
      :row-class-name="tableRowClassName"
      style="width: 100%">
      <el-table-column
      :disable-transitions="true"
        v-for="(propItem, propKey) in tableProps"
        :key="propKey"
        :prop="propItem.propName"
        :label="propItem.propLabel"
        :align="'center'"
        :width="propItem.width"/>
      <el-table-column
      :disable-transitions="true"
        fixed="right"
        label="Operations"
        width="180">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            size="mini"
            placeholder="Type to search"/>
        </template>
        <template slot-scope="scope">
          <el-button @click="handleClick(tableData[scope.$index])" type="text" size="small">Detail</el-button>
          <el-button v-if="userInfo.Role != '3'" @click="update(tableData[scope.$index])" type="text" size="small">Edit</el-button>
        </template>
      </el-table-column>
    </el-table>

  </div>
</template>

<script>
import { tableProps } from "@/components/home/tableProps.js";

export default {
  data() {
    return {
      search: '',
      tableProps: tableProps,
      tableData: [],
      centerDialogVisible: false,
      userInfo: {},
    }
  },
  methods: {
    update(item) {
      this.$router.push({ name: 'EditItem', params: { id: item.ID }});
    },
    handleClick(item) {
      this.$router.push({ name: 'DetailItem', params: { id: item.ID }});
    },
    tableRowClassName({row, rowIndex}) {
      let stockNum = this.tableData[rowIndex].Stocks;

      if (rowIndex % 2 == 0) {
        return stockNum < Number(20) ? 'low-stock warning-row' : 'high-stock warning-row';
      }
      return stockNum < Number(20) ? 'low-stock' : 'high-stock';
    },
    getModels() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          this.tableData = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  computed: {
    searchTable: function() {
      if (this.search == "") return this.tableData;
      return this.tableData.filter(item => {
        return item.ID.indexOf(this.search) > -1 
        || item.ModelName.indexOf(this.search) > -1
        || item.Description.indexOf(this.search) > -1
        || item.BrandCategory.indexOf(this.search) > -1
        || item.ModelPartCategory.indexOf(this.search) > -1
        || item.Price.indexOf(this.search) > -1
        || item.Stocks.indexOf(this.search) > -1;
      });
    }
  },
  created() {
    this.userInfo = JSON.parse(localStorage.getItem("userInfo"));
    this.getModels();
  }
}
</script>

<style lang="less">
  .el-table .warning-row {
    background: #F2F6FC;
  }

  .el-table .success-row {
    background: #f0f9eb;
  }

  .el-table .low-stock td:nth-child(7){
    color: red;
  }

  .el-table .high-stock td:nth-child(7){
    color: green;
  }
</style>