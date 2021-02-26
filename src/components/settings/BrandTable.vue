<template>
  <div>
    <div class="table-options">
      <div class="left">
        <el-row>
          <el-button type="success" @click="showAddBrand = true">New</el-button>
        </el-row>
      </div>
      <div class="right">

      </div>
    </div>
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
          <el-button @click="showUpdate(tableData[scope.$index])" type="text" size="small">Edit</el-button>
        </template>
      </el-table-column>
    </el-table>

  <el-dialog
    :visible.sync="showAddBrand"
    :show-close="false"
    :close-on-press-escape="false"
    :close-on-click-modal="false"
    top="50px"
    width="400px"
  >
    <template #title>
      Add New Brand
    </template>
    <div class="add-brand-content">
        <el-form
          :model="ruleForm"
          status-icon
          :rules="rules"
          size="medium"
          ref="ruleForm"
          label-position="left"
          label-width="100px" class="demo-ruleForm">
          <el-form-item label="Model Name:" prop="Model">
            <el-input type="text" v-model="ruleForm.Model" autocomplete="off"></el-input>
          </el-form-item>
        </el-form>
    </div>
    <span slot="footer" class="dialog-footer">
      <div class="button-con">
        <el-button type="success" @click="save()">Save</el-button>
        <el-button type="warning" @click="close()">Cancel</el-button>
      </div>
    </span>
  </el-dialog>

  <el-dialog
    :visible.sync="showUpdateBrand"
    :show-close="false"
    :close-on-press-escape="false"
    :close-on-click-modal="false"
    top="50px"
    width="400px"
  >
    <template #title>
      Update Model
    </template>
    <div class="add-brand-content">
        <el-form
          :model="ruleForm"
          status-icon
          :rules="rules"
          size="medium"
          ref="ruleForm"
          label-position="left"
          label-width="100px" class="demo-ruleForm">
          <el-form-item label="Model Name:" prop="Model">
            <el-input type="text" v-model="ruleForm.Model" autocomplete="off"></el-input>
          </el-form-item>
        </el-form>
    </div>
    <span slot="footer" class="dialog-footer">
      <div class="button-con">
        <el-button type="success" @click="update()">Update</el-button>
        <el-button type="warning" @click="closeUpdate()">Cancel</el-button>
      </div>
    </span>
  </el-dialog>

  </div>
</template>

<script>
import { tableProps } from "@/components/settings/tableProps_brand.js";

export default {
  data() {
    var validateModel = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('Please input the model name'));
      } else {
        callback();
      }
    };
    return {
      search: '',
      tableProps: tableProps,
      tableData: [],
      showAddBrand: false,
      showUpdateBrand: false,
      ruleForm: {
        ID: '',
        Model: ''
      },
      rules: {
        Model: [
          { validator: validateModel, trigger: 'blur' }
        ],
      },
    }
  },
  methods: {
    close() {
      this.showAddBrand = false;
      this.$refs.ruleForm.resetFields();
    },
    save() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          let params = {
            request: 3,
            data: this.ruleForm
          };

          this.http
            .post(this.api.BrandServices, params)
            .then(response => {
              if (response.data.State == 1) {
                this.getModels();
                this.$message({
                  message: response.data.Message,
                  type: 'success'
                });
                this.$refs.ruleForm.resetFields();
              } else {
                this.$message.error('Error');
              }
            })
            .catch(error => {
              console.log(error);
            });

        } else {
          return false;
        }
      });
    },
    showUpdate(item) {
      this.showUpdateBrand = true;
      this.ruleForm.Model = item.Model;
      this.ruleForm.ID = item.ID;
    },
    update() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          let params = {
            request: 4,
            data: this.ruleForm
          };

          this.http
            .post(this.api.BrandServices, params)
            .then(response => {
              if (response.data.State == 1) {
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

        } else {
          return false;
        }
      });
    },
    closeUpdate() {
      this.showUpdateBrand = false;
      this.$refs.ruleForm.resetFields();
      this.modelItem = {};
    },
    tableRowClassName({row, rowIndex}) {
      if (rowIndex % 2 == 0) {
        return 'warning-row';
      }
      return '';
    },
    getModels() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.BrandServices, params)
        .then(response => {
          this.tableData = response.data;
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
        || item.Type.indexOf(this.search) > -1;
      });
    }
  },
  created() {
    this.getModels();
  }
}
</script>

<style lang="less" scoped>
  .table-options {
    height: 60px;
    padding: 0px 10px;
    line-height: 60px;
    text-align: left;
    border-bottom: 1px solid #E4E7ED;
    display: flex;
    button {
      height: 30px;
      padding: 0px 15px;
    }
  }

  .table-options>div {
    flex: 1;

    .el-tag {
      margin-right: 10px;
    }
  }

  .el-table .warning-row {
    background: #F2F6FC;
  }

  .el-table .success-row {
    background: #f0f9eb;
  }
</style>