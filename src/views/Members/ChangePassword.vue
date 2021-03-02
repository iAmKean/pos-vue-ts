<template>
  <div class="members">
    <div class="members-wrapper">
      <el-container>
        <el-header>
          <Header />
        </el-header>
        <el-container>
          <el-aside width="200px">
            <Aside :activeTab="'-1'" />
          </el-aside>
          <el-container>
            <el-main>
              <div class="table-options">
                <div class="left">
                    <el-breadcrumb separator="/">
                      <el-breadcrumb-item>Change Password</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="right">

                </div>
              </div>
              <div class="main-content">
                <div class="main-content-wrapper">
                  <el-divider content-position="left">Password Details</el-divider>

                  <div class="acc-form">
                    <el-form
                      :model="ruleForm"
                      status-icon
                      :rules="rules"
                      size="medium"
                      ref="ruleForm"
                      label-position="left"
                      label-width="200px" class="demo-ruleForm">
                      <el-form-item label="Current Password:" class="pass-con" prop="CurrentAccountPassword">
                        <el-input type="password" v-model="ruleForm.CurrentAccountPassword" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="New Password:" class="pass-con" prop="NewAccountPassword">
                        <el-input type="password" v-model="ruleForm.NewAccountPassword" autocomplete="off"></el-input>
                      </el-form-item>
                        <el-form-item label="Confirm New Password:" class="pass-con" prop="ConfirmAccountPassword">
                        <el-input type="password" v-model="ruleForm.ConfirmAccountPassword" autocomplete="off"></el-input>
                      </el-form-item>
                      <div class="button-con">
                          <el-button type="success" @click="save()">Save</el-button>
                          <el-button type="warning" @click="$router.back()">Back</el-button>
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
  name: "AddMember",
  components: {
    Header,
    Aside,
  },
  data() {
      var valCurrentAccountPassword = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the current password again'));
        }else {
          callback();
        }
      };
      var valNewAccountPassword = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the new password password again'));
        }else {
          callback();
        }
      };
      var valConfirmAccountPassword = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the confirm password password again'));
        }else {
          callback();
        }
      };
    return {
        userInfo: {},
        ruleForm: {
          CurrentAccountPassword: '',
          NewAccountPassword: '',
          ConfirmAccountPassword: '',
        },
        rules: {
          CurrentAccountPassword: [
            { validator: valCurrentAccountPassword, trigger: 'blur' }
          ],
          NewAccountPassword: [
            { validator: valNewAccountPassword, trigger: 'blur' }
          ],
          ConfirmAccountPassword: [
            { validator: valConfirmAccountPassword, trigger: 'blur' }
          ],
        },
        currRole: '',
        roleList: [],
    };
  },
  methods: {
    save() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          if (this.ruleForm.NewAccountPassword != this.ruleForm.ConfirmAccountPassword ) {
            this.$message({
              type: "danger",
              message: 'New password does not match!'
            });
          } else {
            let params = {
              request: 6,
              data: {
                AccountID: this.userInfo.AccountID,
                currPassword: this.ruleForm.CurrentAccountPassword,
                newPass: this.ruleForm.NewAccountPassword,
              }
            };

            this.http
              .post(this.api.UserService, params)
              .then(response => {
                if (response.data.State == 1) {
                  this.$message({
                    type: "success",
                    message: "Password successfully changed"
                  });
                  this.$refs.ruleForm.resetFields();
                } else {
                  this.$message({
                    type: "danger",
                    message: response.data.Message
                  });
                }
              })
              .catch(error => {
                this.$message({
                  type: "danger",
                  message: "Connection Error!"
                });
                console.log(error);
              });
          }
        } else {
          return false;
        }
      });
    },
  },
  created() {
    this.userInfo = JSON.parse(localStorage.getItem("userInfo"));
  }
};
</script>
<style lang="less" scoped>
.members {

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
