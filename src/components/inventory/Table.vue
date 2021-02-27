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
          <el-button @click="handleClickAdd(tableData[scope.$index])" type="text" size="small">Add</el-button>
          <el-button @click="handleClickLess(tableData[scope.$index])" type="text" size="small">Less</el-button>
        </template>
      </el-table-column>
    </el-table>

    <!-- #add popup -->
    <el-dialog
    class="popup-c"
      :visible.sync="showAddStock"
      :show-close="false"
      :close-on-press-escape="false"
      :close-on-click-modal="false"
      top="50px"
      width="400px"
    >
      <template #title>
        Add Stock
      </template>
      <div class="add-brand-content">
          <el-form
            :model="ruleFormStock"
            status-icon
            :rules="rulesStock"
            size="medium"
            ref="ruleFormStock"
            label-position="left"
            label-width="150px" class="demo-ruleForm">
            <!-- <el-form-item label="ID:">
              <el-input type="number" v-model="ruleFormStock.ID" autocomplete="off" readonly></el-input>
            </el-form-item> -->
            <el-divider content-position="left">Item Detail</el-divider>
            <el-form-item label="Brand:">
              <el-input type="text" v-model="ruleFormStock.BrandCategory" autocomplete="off" readonly></el-input>
            </el-form-item>
            <el-form-item label="Model:">
              <el-input type="text" v-model="ruleFormStock.ModelName" autocomplete="off" readonly></el-input>
            </el-form-item>
            <el-form-item label="Model Part:">
              <el-input type="text" v-model="ruleFormStock.ModelPartCategory" autocomplete="off" readonly></el-input>
            </el-form-item>
            <el-divider content-position="left">Current Stock Number</el-divider>
            <el-form-item label="Current Stock(s):">
              <el-input type="number" v-model="ruleFormStock.Stocks" autocomplete="off" readonly></el-input>
            </el-form-item>
            <el-divider content-position="left">New Stock Number</el-divider>
            <el-form-item label="Add Stock(s):" prop="newStock" class="add-con">
              <el-input type="number" v-model="ruleFormStock.newStock" autocomplete="off"></el-input>
              <el-button type="success" icon="el-icon-plus" @click="increaseVal()"></el-button>
              <el-button type="danger" :disabled="btnAddStatus" icon="el-icon-minus" @click="decreaseVal()"></el-button>
            </el-form-item>
            <el-form-item label="New Total Stock(s):">
              <el-input type="number" v-model="ruleFormStock.newTotalStocks" autocomplete="off" readonly></el-input>
            </el-form-item>
          </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <div class="button-con">
          <el-button :disabled="btnAddStatus"  type="success" @click="addStock()">Add Stock</el-button>
          <el-button type="warning" @click="closeStock()">Cancel</el-button>
        </div>
      </span>
    </el-dialog>
    <!-- #end add popup -->

  </div>
</template>

<script>
import { tableProps } from "@/components/inventory/tableProps.js";

export default {
  data() {
    var validateNewStock = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the stock number'));
      } else {
        callback();
      }
    };
    return {
      search: '',
      tableProps: tableProps,
      tableData: [],
      centerDialogVisible: false,
      showAddStock: false,
      ruleFormStock: {
        ID: '',
        BrandCategory: '',
        ModelName: '',
        ModelPartCategory: '',
        Stocks: '',
        AvailableItems: '',
        SoldItems: '',
        newStock: 0,
        newTotalStocks: 0,
      },
      rulesStock: {
        newStock: [
          { validator: validateNewStock, trigger: 'blur' }
        ],
      },
    }
  },
  methods: {
    update(item) {
      this.$router.push({ name: 'EditItem', params: { id: item.ID }});
    },
    handleClickAdd(item) {
      this.ruleFormStock.BrandCategory = item.BrandCategory;
      this.ruleFormStock.ModelName = item.ModelName;
      this.ruleFormStock.ModelPartCategory = item.ModelPartCategory;
      this.ruleFormStock.Stocks = item.Stocks;
      this.ruleFormStock.newTotalStocks = item.Stocks;
      this.showAddStock = true;
    },
    addStock() {
     this.$refs.ruleFormStock.validate((valid) => {
        if (valid) {
          let params = {
            request: 3,
            data: this.ruleFormStock
          };

          console.log(params);
          // this.http
          //   .post(this.api.BrandServices, params)
          //   .then(response => {
          //     if (response.data.State == 1) {
          //       this.getModels();
          //       this.$message({
          //         message: response.data.Message,
          //         type: 'success'
          //       });
          //       this.$refs.ruleForm.resetFields();
          //     } else {
          //       this.$message.error('Error');
          //     }
          //   })
          //   .catch(error => {
          //     console.log(error);
          //   });

        } else {
          return false;
        }
      });
    },
    closeStock() {
      this.showAddStock = false;
      this.$refs.ruleFormStock.resetFields();
    },
    increaseVal() {
      this.ruleFormStock.newStock++;
    },
    decreaseVal() {
      if (this.ruleFormStock.newStock !== 0) {
        this.ruleFormStock.newStock--;
      }
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
        .post(this.api.StockService, params)
        .then(response => {
          this.tableData = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  computed: {
    btnAddStatus: function () {
      if (this.ruleFormStock.newStock > 0) {
        return false;
      } else {
        return true;
      }
    },
    searchTable: function() {
      if (this.search == "") return this.tableData;
      return this.tableData.filter(item => {
        return item.ID.indexOf(this.search) > -1 
        || item.ModelName.indexOf(this.search) > -1
        || item.BrandCategory.indexOf(this.search) > -1
        || item.ModelPartCategory.indexOf(this.search) > -1;
      });
    }
  },
  created() {
    this.getModels();
  }
}
</script>

<style lang="less">
  .popup-c {
    .el-dialog__header {
      padding-top: 10px;
    }
    .el-dialog__body {
      padding-top: 0px;
    }
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
  }
  .el-table .warning-row {
    background: #F2F6FC;
  }

  .el-table .success-row {
    background: #f0f9eb;
  }

  .el-table .low-stock td:nth-child(5){
    color: red;
  }

  .el-table .high-stock td:nth-child(5){
    color: green;
  }

  .add-con .el-form-item__content {
    display: flex;

    .el-button {
      margin: 0px 0px 0px 10px;
    }
  }
</style>