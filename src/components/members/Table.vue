<template>
  <el-table
    :data="tableData"
    height="520"
    :row-class-name="tableRowClassName"
    style="width: 100%">
    <el-table-column
      v-for="(propItem, propKey) in tableProps"
      :key="propKey"
      :prop="propItem.propName"
      :label="propItem.propLabel"
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
      <template slot-scope="scope" v-if="tableData[scope.$index].Role != '1'">
        <el-button @click="handleClick(tableData[scope.$index])" type="text" size="small">Detail</el-button>
        <el-button type="text" size="small">Edit</el-button>
        <el-button type="text" size="small">Remove</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
import { tableProps } from "@/components/members/tableProps.js";

export default {
  data() {
    return {
      search: '',
      tableProps: tableProps,
      tableData: [],
    }
  },
  methods: {
    handleClick(item) {
      console.log(item);
    },
    tableRowClassName({row, rowIndex}) {
      if (rowIndex % 2 == 0) {
        return 'warning-row';
      }
      return '';
    },
    getUsers() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.tableData = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.getUsers();
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