<template>
  <div class="members">
    <div class="members-wrapper">
      <el-container>
        <el-header>
          <Header />
        </el-header>
        <el-container>
          <el-aside width="200px">
            <Aside :activeTab="'0'" />
          </el-aside>
          <el-container>
            <el-main>
              <div class="table-options">
                <div class="left">
                    <el-breadcrumb separator="/">
                      <el-breadcrumb-item :to="{ name: 'Home' }">Items</el-breadcrumb-item>
                      <el-breadcrumb-item>Detail Item</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="right">

                </div>
              </div>
              <div class="main-content">
                <div class="main-content-wrapper">
                  <el-divider content-position="left">Item Details</el-divider>
                  <div class="acc-form">
                    <el-form
                      :model="ruleForm"
                      status-icon
                      :rules="rules"
                      size="medium"
                      ref="ruleForm"
                      label-position="left"
                      label-width="150px" class="demo-ruleForm">
                      <el-form-item label="Brand Category:" class="brand-cat">
                        <el-dropdown trigger="click" @command="selectBrand" disabled>
                          <el-button type="primary" disabled>
                            {{ currBrand }}
                            <i class="el-icon-arrow-down el-icon--right"></i>
                          </el-button>
                          <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item
                              v-for="(brandItem, brandKey) in brandList"
                              :key="brandKey"
                              :command="brandItem"
                            >
                              {{ brandItem.Brand }}
                            </el-dropdown-item>
                          </el-dropdown-menu>
                        </el-dropdown>
                      </el-form-item>
                      <el-form-item label="Model Name:" prop="ModelName">
                        <el-input type="text" v-model="ruleForm.ModelName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Model Part:" class="brand-cat">
                        <el-dropdown trigger="click" @command="selectPart" disabled>
                          <el-button type="primary" disabled>
                            {{ currPart }}
                            <i class="el-icon-arrow-down el-icon--right"></i>
                          </el-button>
                          <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item
                              v-for="(partItem, partKey) in partList"
                              :key="partKey"
                              :command="partItem"
                            >
                              {{ partItem.ModelPart }}
                            </el-dropdown-item>
                          </el-dropdown-menu>
                        </el-dropdown>
                      </el-form-item>
                      <el-form-item label="Description:" >
                        <el-input type="textarea" rows="5" v-model="ruleForm.Description" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Price:" prop="Price" >
                        <el-input type="text" v-model="ruleForm.Price" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Stocks:" prop="Stocks">
                        <el-input type="text" v-model="ruleForm.Stocks" autocomplete="off" readonly></el-input>
                      </el-form-item>

                      <div class="button-con">
                          <el-button type="success" @click="$router.back()">Back</el-button>
                      </div>
                    </el-form>
                  </div>
                </div>
              </div>
            </el-main>
          </el-container>
        </el-container>
      </el-container>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Header from "@/components/common/Header.vue";
import Aside from "@/components/common/Aside.vue";

export default {
  name: "AddItem",
  components: {
    Header,
    Aside,
  },
  data() {
      var validateModelName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the model name'));
        } else {
          callback();
        }
      };
      var validatePrice = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the price'));
        } else {
          callback();
        }
      };
      var validateStock = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the stock'));
        } else {
          callback();
        }
      };
    return {
        ruleForm: {
          BrandCategory: '',
          ModelName: '',
          ModelPartCategory: '',
          Description: '',
          Price: '',
          Stocks: '',
          AddedBy: '',
        },
        rules: {
          ModelName: [
            { validator: validateModelName, trigger: 'blur' }
          ],
          Price: [
            { validator: validatePrice, trigger: 'blur' }
          ],
          Stocks: [
            { validator: validateStock, trigger: 'blur' }
          ],
        },
        currBrand: '',
        currPart: '',
        brandList: [],
        partList: [],
    };
  },
  methods: {
    selectBrand(val) {
      this.currBrand = val.Brand; 
      this.ruleForm.BrandCategory = val.ID; 
    },
    getBrands() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.BrandServices, params)
        .then(response => {
          this.brandList = response.data;
          this.currBrand = this.brandList[0].Brand;
          this.ruleForm.BrandCategory = this.brandList[0].ID; 
        })
        .catch(error => {
          console.log(error);
        });
    },
    selectPart(val) {
      this.currPart = val.ModelPart; 
      this.ruleForm.ModelPartCategory = val.ID; 
    },
    getModelParts() {
      let params = {
        request: 6,
        data: {}
      };

      this.http
        .post(this.api.BrandServices, params)
        .then(response => {
          this.partList = response.data;
          this.currPart = this.partList[0].ModelPart;
          this.ruleForm.ModelPartCategory = this.partList[0].ID; 
        })
        .catch(error => {
          console.log(error);
        });
    },
  },
  created() {
    let userInfo = JSON.parse(localStorage.getItem("userInfo"));
    this.getBrands();
    this.getModelParts();
    this.ruleForm.AddedBy = userInfo.AccountID
  }
};
</script>
<style lang="less" scoped>
.members {

.brand-cat {
  ::v-deep.el-form-item__content {
    text-align: left;
  }
}
  .table-options {
    height: 60px;
    padding: 0px 10px;
    line-height: 60px;
    text-align: left;
    border-bottom: 1px solid #E4E7ED;
    display: flex;
    .el-breadcrumb {
    line-height: 60px;

    }
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
  .members-wrapper {
    height: 100vh;
    min-width: 1200px;
    overflow: hidden;
    .el-container {
      height: 100%;
    }
  }

  .el-header {
    height: 50px !important;
  }
  .el-main {
    padding: 0px;
    height: 100%;
    overflow-y: auto;
  }

  .label-c {
    font-size: 14px;
    color: #606266;
    margin-right: 20px;
    min-width: 100px;
    display: inline-block;
  }

  .main-content-wrapper {
    padding: 10px 10px 100px;

    .icon {
      display: flex;
      justify-content: flex-start;
      margin-bottom: 20px;
      border-bottom: 1px solid #DCDFE6;
      padding-bottom: 20px;
    }

    .icon .upload {
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .icon>div {
      justify-content: flex-start;
      display: flex;
    }

    .icon .account-status {
      flex: 3;
      text-align: left;
    }

    .icon .radio {
      margin-bottom: 22px;
    }

    .icon .account-status {
      display: block;
    }


    .acc-form {
      width: 50%;
      padding: 0px 20px;
    }

    .button-con {
      display: flex;
      justify-content: center;
      padding-left: 200px;
    }

    .button-con>div {
      width: 100px;
    }
  }
}
</style>
