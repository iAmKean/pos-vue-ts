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
        width="200">
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
          <el-button @click="handleClickAdd(tableData[scope.$index])" icon="el-icon-circle-plus-outline" type="success" size="small">Add</el-button>
          <el-button @click="handleClickLess(tableData[scope.$index])" icon="el-icon-remove-outline" type="danger" size="small">Less</el-button>
          <!-- <el-button v-if="userInfo.Role == '1'" @click="handleClickEdit(tableData[scope.$index])" icon="el-icon-edit" type="warning" size="small">Edit</el-button> -->
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
      top="100px"
      width="850px"
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
            label-width="160px" class="demo-ruleForm">
            <!-- <el-form-item label="ID:">
              <el-input type="number" v-model="ruleFormStock.ID" autocomplete="off" readonly></el-input>
            </el-form-item> -->

            <div class="left">
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
            </div>

            <div class="right">
              <el-divider content-position="left">Current Stock Number</el-divider>
              <el-form-item label="Current Total Stock(s):">
                <el-input type="number" v-model="ruleFormStock.Stocks" autocomplete="off" readonly></el-input>
              </el-form-item>
              <el-divider content-position="left">New Stock Number</el-divider>
              <el-form-item label="Add Stock(s):" prop="newStock" class="add-con">
                <el-button type="danger" :disabled="btnAddStatus" icon="el-icon-minus" @click="decreaseVal()"></el-button>
                <el-input type="number" v-model="ruleFormStock.newStock" autocomplete="off"></el-input>
                <el-button type="success" icon="el-icon-plus" @click="increaseVal()"></el-button>
              </el-form-item>
              <el-form-item label="New Total Stock(s):">
                <el-input type="number" v-model="ruleFormStock.newTotalStocks" autocomplete="off" readonly></el-input>
              </el-form-item>
            </div>

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

    <!-- #less popup -->
    <el-dialog
    class="popup-c"
      :visible.sync="showLessStock"
      :show-close="false"
      :close-on-press-escape="false"
      :close-on-click-modal="false"
      top="100px"
      width="850px"
    >
      <template #title>
        Less Stock
      </template>
      <div class="add-brand-content">
          <el-form
            :model="ruleFormLessStock"
            status-icon
            :rules="rulesLessStock"
            size="medium"
            ref="ruleFormLessStock"
            label-position="left"
            label-width="180px" class="demo-ruleForm">
            <div class="left">
              <!-- <el-form-item label="ID:">
                <el-input type="number" v-model="ruleFormStock.ID" autocomplete="off" readonly></el-input>
              </el-form-item> -->
              <el-divider content-position="left">Item Detail</el-divider>
              <el-form-item label="Brand:">
                <el-input type="text" v-model="ruleFormLessStock.BrandCategory" autocomplete="off" readonly></el-input>
              </el-form-item>
              <el-form-item label="Model:">
                <el-input type="text" v-model="ruleFormLessStock.ModelName" autocomplete="off" readonly></el-input>
              </el-form-item>
              <el-form-item label="Model Part:">
                <el-input type="text" v-model="ruleFormLessStock.ModelPartCategory" autocomplete="off" readonly></el-input>
              </el-form-item>
              <el-form-item label="Total Stock(s):">
                <el-input type="number" v-model="ruleFormLessStock.Stocks" autocomplete="off" readonly></el-input>
              </el-form-item>
            </div>
            <div class="right">
              <el-divider content-position="left">Current Available Stock(s) Number</el-divider>
              <el-form-item label="Current Available Stock(s):">
                <el-input type="number" v-model="ruleFormLessStock.AvailableItems" autocomplete="off" readonly></el-input>
              </el-form-item>
              <el-divider content-position="left">Less Stock Number</el-divider>
              <el-form-item label="Less Stock(s):" prop="newLessStock" class="add-con">

                <el-button
                  type="danger"
                  :disabled="ruleFormLessStock.LessStock == 0 ? true: false"
                  icon="el-icon-minus"
                  @click="decreaseLessVal()"></el-button>

                <el-input type="number" v-model="ruleFormLessStock.LessStock" min="1" max="3" autocomplete="off"></el-input>

                <el-button
                  type="success"
                  icon="el-icon-plus"
                  :disabled="ruleFormLessStock.newAvailableStocks == 0 ? true: false"
                  @click="increaseLessVal()"></el-button>



              </el-form-item>
              <el-form-item label="New Available Stock(s):">
                <el-input type="number" v-model="ruleFormLessStock.newAvailableStocks" autocomplete="off" readonly></el-input>
              </el-form-item>
            </div>
          </el-form>
      </div>
      <span slot="footer" class="dialog-footer">
        <div class="button-con">
          <el-button
            :disabled="ruleFormLessStock.LessStock == 0 ? true : (ruleFormLessStock.LessStock > ruleFormLessStock.AvailableItems ? true : false )" 
            type="success"
            @click="addLessStock()">Less Stock</el-button>
          <el-button type="warning" @click="closeLessStock()">Cancel</el-button>
        </div>
      </span>
    </el-dialog>
    <!-- #end less popup -->

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
    var validateNewLessStock = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the lesss stock number'));
      } else {
        callback();
      }
    };
    return {
      brandValue: 'All',
      options: [],
      userInfo: {},
      search: '',
      tableProps: tableProps,
      tableData: [],
      centerDialogVisible: false,
      showAddStock: false,
      showLessStock: false,
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
      ruleFormLessStock: {
        ID: '',
        BrandCategory: '',
        ModelName: '',
        ModelPartCategory: '',
        Stocks: '',
        AvailableItems: '',
        SoldItems: '',
        LessStock: 0,
        newAvailableStocks: 0,
      },
      rulesLessStock: {
        newLessStock: [
          { validator: validateNewLessStock, trigger: 'blur' }
        ],
      },
      oldStockItem: {},
      oldLessStockItem: {},
    }
  },
  methods: {
    handleClickAdd(item) {
      this.oldStockItem = item;
      this.ruleFormStock.ID = item.ID;
      this.ruleFormStock.BrandCategory = item.BrandCategory;
      this.ruleFormStock.ModelName = item.ModelName;
      this.ruleFormStock.ModelPartCategory = item.ModelPartCategory;
      this.ruleFormStock.Stocks = Number(item.Stocks);
      this.ruleFormStock.newTotalStocks = Number(item.Stocks);
      this.ruleFormStock.AvailableItems = Number(item.AvailableItems);
      this.ruleFormStock.newAvailableItems = Number(item.AvailableItems);
      this.ruleFormStock.SoldItems = Number(item.SoldItems);
      this.showAddStock = true;
    },
    addStock() {
     this.$refs.ruleFormStock.validate((valid) => {
        if (valid) {
          this.ruleFormStock.newAvailableItems = this.ruleFormStock.newAvailableItems + Number(this.ruleFormStock.newStock);
          let validateChar = ['.', 'e', '-', '+'];
          this.ruleFormStock.newStock = this.ruleFormStock.newStock.toString();
          if (this.ruleFormStock.newStock.includes(validateChar[0])
              || this.ruleFormStock.newStock.includes(validateChar[1])
              || this.ruleFormStock.newStock.includes(validateChar[2])
              || this.ruleFormStock.newStock.includes(validateChar[3])) {
              this.$message({
                message: 'Please input valid stock number',
                type: 'error'
              });
              this.ruleFormStock.newAvailableItems = Number(this.ruleFormStock.AvailableItems);
              this.ruleFormStock.newStock = 0;
          } else {
            let params = {
              request: 6,
              data: this.ruleFormStock
            };

            this.http
              .post(this.api.StockService, params)
              .then(response => {
                if (response.data.State == 1) {
                  this.ruleFormStock.newStock = 0;
                  this.showAddStock = false;
                  this.$refs.ruleFormStock.resetFields();
                  this.addStockLog();
                  this.getModels();
                  this.$emit('updateData');
                  this.$message({
                    message: response.data.Message,
                    type: 'success'
                  });
                } else {
                  this.$message.error('Error');
                }
              })
              .catch(error => {
                console.log(error);
              });
          }
        } else {
          return false;
        }
      });
    },
    addStockLog() {
      let userInfo = JSON.parse(localStorage.getItem("userInfo"));
      let params = {
        request: 7,
        data: {
          UpdatedBy: userInfo.AccountName,
          Action: 'Add Stock',
          NewData: JSON.stringify(this.ruleFormStock),
          PreviousData: JSON.stringify(this.oldStockItem),
          UpdateTime: this.createTime(),
        }
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {})
        .catch(error => {
          console.log(error);
        });

    },
    closeStock() {
      this.showAddStock = false;
      this.ruleFormStock.newStock = 0;
    },
    increaseVal() {
      this.ruleFormStock.newStock++;
      if (this.ruleFormStock.newStock > 0) {
        this.ruleFormStock.newTotalStocks++;
      }
    },
    decreaseVal() {
      if (this.ruleFormStock.newStock !== 0) {
        this.ruleFormStock.newStock--;
        this.ruleFormStock.newTotalStocks--;
      }
    },
    handleClickLess(item) {
      this.oldLessStockItem = item;
      this.ruleFormLessStock.ID = item.ID;
      this.ruleFormLessStock.BrandCategory = item.BrandCategory;
      this.ruleFormLessStock.ModelName = item.ModelName;
      this.ruleFormLessStock.ModelPartCategory = item.ModelPartCategory;
      this.ruleFormLessStock.Stocks = Number(item.Stocks);
      this.ruleFormLessStock.newAvailableStocks = Number(item.AvailableItems);
      this.ruleFormLessStock.AvailableItems = Number(item.AvailableItems);
      this.ruleFormLessStock.SoldItems = Number(item.SoldItems);
      this.showLessStock = true;
    },
    addLessStock() {
     this.$refs.ruleFormLessStock.validate((valid) => {
        if (valid) {
          let validateChar = ['.', 'e', '-', '+'];
          this.ruleFormLessStock.LessStock = this.ruleFormLessStock.LessStock.toString();
          if (this.ruleFormLessStock.LessStock.includes(validateChar[0])
              || this.ruleFormLessStock.LessStock.includes(validateChar[1])
              || this.ruleFormLessStock.LessStock.includes(validateChar[2])
              || this.ruleFormLessStock.LessStock.includes(validateChar[3])) {
              this.$message({
                message: 'Please input valid stock number',
                type: 'error'
              });
              this.ruleFormStock.newTotalStocks = Number(this.ruleFormStock.Stocks);
              this.ruleFormLessStock.LessStock = 0;
          } else {
            this.ruleFormLessStock.SoldItems = Number(this.ruleFormLessStock.SoldItems) + Number(this.ruleFormLessStock.LessStock);
            let params = {
              request: 8,
              data: this.ruleFormLessStock
            };
            this.http
              .post(this.api.StockService, params)
              .then(response => {
                if (response.data.State == 1) {
                  this.showLessStock = false;
                  this.$refs.ruleFormLessStock.resetFields();
                  this.ruleFormLessStock.LessStock = 0;
                  this.addLessStockLog();
                  this.$emit('updateData');
                  this.getModels();
                  this.$message({
                    message: response.data.Message,
                    type: 'success'
                  });
                } else {
                  this.$message.error('Error');
                }
              })
              .catch(error => {
                console.log(error);
              });
          }
        } else {
          return false;
        }
      });
    },
    addLessStockLog () {
      let userInfo = JSON.parse(localStorage.getItem("userInfo"));
      let params = {
        request: 7,
        data: {
          UpdatedBy: userInfo.AccountName,
          Action: 'Less Stock',
          NewData: JSON.stringify(this.ruleFormLessStock),
          PreviousData: JSON.stringify(this.oldLessStockItem),
          UpdateTime: this.createTime(),
        }
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {})
        .catch(error => {
          console.log(error);
        });

    },
    closeLessStock() {
      this.showLessStock = false;
      // this.ruleFormLessStock = {};
      this.ruleFormLessStock.LessStock = 0;
    },
    increaseLessVal() {
      this.ruleFormLessStock.LessStock++;
      if (this.ruleFormLessStock.LessStock > 0) {
        this.ruleFormLessStock.newAvailableStocks--;
      }
    },
    decreaseLessVal() {
      if (this.ruleFormLessStock.LessStock !== 0) {
        this.ruleFormLessStock.LessStock--;
        this.ruleFormLessStock.newAvailableStocks++;
      }
    },
    tableRowClassName({row, rowIndex}) {
      let stockNum = this.tableData[rowIndex].AvailableItems;

      if (rowIndex % 2 == 0) {
        return stockNum < Number(20) ? 'low-stock warning-row' : 'high-stock warning-row';
      }
      return stockNum < Number(20) ? 'low-stock' : 'high-stock';
    },
    getModelsByBrandID(catID) {
      let params = {
        request: 2,
        data: {
          BrandCategory: catID
        }
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {
          this.tableData = response.data;
        })
        .catch(error => {
          console.log(error);
        });
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
          this.options.push({id: '0', value: 'All', label: 'All' })
          newData.map((val) => {
            this.options.push({id: val.ID, value: val.Brand, label: val.Brand })
          });
        })
        .catch(error => {
          console.log(error);
        });
    },
    selectCategory(catID) {
      
      this.brandValue = this.options[Number(catID)].value;
      if (catID == '0' || catID == 0) {
        this.getModels();
        this.$emit('getModels');
      } else {
        this.getModelsByBrandID(catID);
        this.$emit('getModelsByBrandID', { catID: catID, brandValue: this.brandValue })
      }
    },
    createTime() {
      let today = new Date();
      let currdate =
        today.getFullYear() +
        "-" +
        (today.getMonth() + 1 < 10
          ? "0" + (today.getMonth() + 1)
          : today.getMonth() + 1) +
        "-" +
        (today.getDate() < 10 ? "0" + today.getDate() : today.getDate());
      let currHour =
        today.getHours() < 10 ? "0" + today.getHours() : today.getHours();
      let currMinutes =
        today.getMinutes() < 10 ? "0" + today.getMinutes() : today.getMinutes();
      let currSeconds =
        today.getSeconds() < 10 ? "0" + today.getSeconds() : today.getSeconds();
      let timePeriod = today.getHours() < 13 ? "AM" : "PM";
      let currtime =
        currdate +
        " " +
        currHour +
        ":" +
        currMinutes +
        ":" +
        currSeconds
      return currtime;
    },
  },
  computed: {
    btnAddStatus: function () {
      if (this.ruleFormStock.newStock > 0) {
        return false;
      } else {
        return true;
      }
    },
    btnLessStatus: function () {
      if (this.ruleFormLessStock.LessStock > 0) {
        if (this.ruleFormLessStock.newAvailableStocks === 0 ) {
          return true;
        } else {
          return false;
        }
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
  watch: {
    'ruleFormStock.newStock': function (newVal, oldVal) {
      if (newVal) {
        this.ruleFormStock.newTotalStocks = Number(this.ruleFormStock.Stocks) + Number(this.ruleFormStock.newStock);
      } else {
        this.ruleFormStock.newTotalStocks = Number(this.ruleFormStock.Stocks);
      }
    },
    'ruleFormLessStock.LessStock': function (newVal, oldVal) {
      if (newVal) {
        this.ruleFormLessStock.newAvailableStocks = Number(this.ruleFormLessStock.AvailableItems) - Number(this.ruleFormLessStock.LessStock);
      } else {
        this.ruleFormLessStock.newAvailableStocks = Number(this.ruleFormLessStock.AvailableItems);
      }
    },
  },
  created() {
    this.userInfo = JSON.parse(localStorage.getItem("userInfo"));
    this.getModels();
    this.getCategoryList();
  }
}
</script>

<style lang="less" scoped>
  .popup-c {
    .el-dialog__header {
      padding-top: 10px;
    }
    ::v-deep.el-dialog__body {
      padding-top: 0px;
      padding-bottom: 10px;

      .el-form {
        display: flex;
      }

      .el-form>div {
        flex: 1;
      }

      .el-form .left {
        margin-right: 30px;
      }
    }
    ::v-deep input::-webkit-outer-spin-button,
    ::v-deep input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  }
  ::v-deep.el-table .warning-row {
    background: #F2F6FC;
  }

  ::v-deep.el-table .success-row {
    background: #f0f9eb;
  }

  ::v-deep.el-table .low-stock td:nth-child(6){
    color: red;
  }

  ::v-deep.el-table .high-stock td:nth-child(6){
    color: green;
  }

  .add-con ::v-deep.el-form-item__content {
    display: flex;

    .el-button {
      margin: 0px 10px;
    }
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