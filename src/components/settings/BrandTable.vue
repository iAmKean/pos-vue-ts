<template>
  <div>
    <el-table
      :data="searchTable"
      height="520"
      :row-class-name="tableRowClassName"
      style="width: 100%">
      <el-table-column
        v-for="(propItem, propKey) in tableProps"
        :key="propKey"
        :prop="propItem.propName"
        :label="propItem.propLabel"
        :align="'center'"
        :width="propItem.width"/>
      <el-table-column
        fixed="right"
        label="Operations"
        width="180">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            size="mini"
            placeholder="Type to search"/>
        </template>
        <template slot-scope="scope" v-if="tableData[scope.$index].Role != 'Owner'">
          <el-button @click="update(tableData[scope.$index])" type="text" size="small">Edit</el-button>
        </template>
      </el-table-column>
    </el-table>

  </div>
</template>

<script>
import { tableProps } from "@/components/settings/tableProps_brand.js";

export default {
  data() {
    return {
      search: '',
      tableProps: tableProps,
      tableData: [],
      centerDialogVisible: false,
      userItem: {},
    }
  },
  methods: {
    update(item) {
      // this.$router.push({ name: 'EditMember', params: { accountid: item.AccountID }});
    },
    tableRowClassName({row, rowIndex}) {
      if (rowIndex % 2 == 0) {
        return 'warning-row';
      }
      return '';
    },
    getBrands() {

    },
  },
  computed: {
    searchTable: function() {
      if (this.search == "") return this.tableData;
      return this.tableData.filter(item => {
        return item.ID.indexOf(this.search) > -1 
        || item.Type.indexOf(this.search) > -1;
      });
    }
  },
  created() {
    this.getBrands();
  }
}
</script>

<style>
  .el-table .warning-row {
    background: #F2F6FC;
  }

  .el-table .success-row {
    background: #f0f9eb;
  }
</style>