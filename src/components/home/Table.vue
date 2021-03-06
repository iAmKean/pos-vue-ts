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
        width="280">
        <template slot="header" slot-scope="scope">

        <el-select
          v-model="brandValue"
          @change="selectCategory"
          placeholder="Select brand category" class="select-brand">
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.id">
          </el-option>
        </el-select>

          <el-input
            v-model="search"
            size="mini"
            placeholder="Type to search"/>
        </template>
        <template slot-scope="scope">
          <el-button @click="handleClick(tableData[scope.$index])" icon="el-icon-info" type="success" size="small">Info</el-button>
          <el-button v-if="userInfo.Role != '3'" @click="update(tableData[scope.$index])" icon="el-icon-edit" type="warning" size="small">Edit</el-button>
          <el-button v-if="userInfo.Role != '3'" @click="showRemoveItem(tableData[scope.$index])" icon="el-icon-delete" type="danger" size="small">Remove</el-button>
        </template>
      </el-table-column>
    </el-table>

    <el-dialog
      title="Remove Item"
      :visible.sync="centerDialogVisible"
      width="25%"
      center>
      <span>Warning, removing item will enter the archive, which may affect the stock list.</span>
      <span slot="footer" class="dialog-footer">
        <el-button type="success" @click="centerDialogVisible = false">Cancel</el-button>
        <el-button type="danger" @click="removeItem()">Confirm</el-button>
      </span>
    </el-dialog>

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
      itemInfo: {},
      options: [],
      brandValue: ''
    }
  },
  methods: {
    showRemoveItem(item) {
      this.itemInfo = item;
      this.centerDialogVisible = true
      console.log(this.itemInfo);
    },
    removeItem() {
      let params = {
        request: 10,
        data: {
          ID: this.itemInfo.ID,
        }
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          if (response.data.State == 1) {
            this.centerDialogVisible = false;
            this.userItem = {};
            this.$emit('updateData');
            this.getModels();
            this.$message({
              message: response.data.Message,
              type: 'success'
            });
          } else {
            this.$message({
              message: response.data.Message,
              type: 'error'
            });
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
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
    },
    getModelsByBrandID(catID) {
      let params = {
        request: 2,
        data: {
          BrandCategory: catID
        }
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          this.tableData = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    selectCategory(catID) {
      this.getModelsByBrandID(catID);
      this.$emit('getModelsByBrandID', { catID: catID, brandValue: this.options[Number(this.brandValue - 1)].value })
    },
    getCategoryList() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.BrandServices, params)
        .then(response => {
          let newData = response.data;
          newData.map((val) => {
            this.options.push({id: val.ID, value: val.Brand, label: val.Brand })
          });
        })
        .catch(error => {
          console.log(error);
        });
    },
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
    this.getCategoryList();
  }
}
</script>

<style lang="less" scoped>
  ::v-deep.el-table .warning-row {
    background: #F2F6FC;
  }

  ::v-deep.el-table .success-row {
    background: #f0f9eb;
  }

  ::v-deep.el-table .low-stock td:nth-child(7){
    color: red;
  }

  ::v-deep.el-table .high-stock td:nth-child(7){
    color: green;
  }

  ::v-deep.select-brand {
    width: 100%;
    margin-bottom: 5px;
    .el-input__inner {
      height: 28px;
      line-height: 28px;
    }
    .el-input__icon {
      line-height: 28px;
    }
  }
</style>