<template>
  <div class="members">
    <div class="members-wrapper">
      <el-container>
        <el-header>
          <Header />
        </el-header>
        <el-container>
          <el-aside width="200px">
            <Aside :activeTab="'3'" />
          </el-aside>
          <el-container>
            <el-main>
              <div class="table-options">
                <div class="left">
                    <el-breadcrumb separator="/">
                      <el-breadcrumb-item :to="{ name: 'Members' }">Members</el-breadcrumb-item>
                      <el-breadcrumb-item>Add Member</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="right">

                </div>
              </div>
              <div class="main-content">
                <div class="main-content-wrapper">
                  <el-divider content-position="left">Account Details</el-divider>
                  <div class="icon">
                    <div class="upload">
                      <el-upload
                        class="avatar-uploader"
                        action="#"
                        :auto-upload="false"
                        :show-file-list="false"
                        list-type="picture-card"
                        :on-change="handleAvatarSuccess"
                      >
                        <img
                          v-if="ruleForm.Icon"
                          width="148"
                          height="148"
                          :src="ruleForm.Icon"
                          class="avatar"
                        />
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                      </el-upload>
                    </div>
                    <div class="account-status">
                      <div class="radio">
                          <label class="label-c">Account Status:</label>
                          <el-radio-group v-model="ruleForm.Status" size="mini">
                            <el-radio :label="1" border>Active</el-radio>
                            <el-radio :label="2" border>Inactive</el-radio>
                          </el-radio-group>
                      </div>

                      <div class="dropdown-c">
                        <label class="label-c">Account Role:</label>
                        <el-dropdown trigger="click" @command="selectRole">
                          <el-button type="primary">
                            {{ currRole }}
                            <i class="el-icon-arrow-down el-icon--right"></i>
                          </el-button>
                          <el-dropdown-menu slot="dropdown">
                            <el-dropdown-item
                              v-for="(typeItem, typeKey) in roleList"
                              :key="typeKey"
                              :command="typeItem"
                            >
                              {{ typeItem.Role }}
                            </el-dropdown-item>
                          </el-dropdown-menu>
                        </el-dropdown>
                      </div>
              
                    </div>
                  </div>
                  <div class="acc-form">
                    <el-form
                      :model="ruleForm"
                      status-icon
                      :rules="rules"
                      size="medium"
                      ref="ruleForm"
                      label-position="left"
                      label-width="200px" class="demo-ruleForm">
                      <el-form-item label="Account ID:" prop="AccountID">
                        <el-input type="text" v-model="ruleForm.AccountID" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Account Name:" prop="AccountName">
                        <el-input type="text" v-model="ruleForm.AccountName" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Account Password:" class="pass-con" prop="AccountPassword">
                        <el-input type="password" v-model="ruleForm.AccountPassword" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Confirm Account Password:" class="pass-con" prop="AccountConfirmPassword">
                        <el-input type="password" v-model="ruleForm.AccountConfirmPassword" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Last Name:" prop="LastName">
                        <el-input type="text" v-model="ruleForm.LastName" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="First Name:" prop="FirstName">
                        <el-input type="text" v-model="ruleForm.FirstName" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Middle Name:" prop="MiddleName">
                        <el-input type="text" v-model="ruleForm.MiddleName" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Extension Name:">
                        <el-input type="text" v-model="ruleForm.ExtName" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Phone Number:" prop="Phone">
                        <el-input type="text" v-model="ruleForm.Phone" autocomplete="off"></el-input>
                      </el-form-item>
                      <el-form-item label="Address:" prop="Address">
                        <el-input type="textarea" rows="5" v-model="ruleForm.Address"></el-input>
                      </el-form-item>

                      <div class="button-con">
                          <el-button type="success" @click="save()">Save</el-button>
                          <el-button type="warning" @click="clear()">Clear All</el-button>
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
      var validateAccountID = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the account id'));
        } else {
          callback();
        }
      };
      var validateAccountName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the account name'));
        } else {
          callback();
        }
      };
      var validateAccountPassword = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the password again'));
        }else {
          callback();
        }
      };
      var validateAccountConfirmPassword = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the confirm password again'));
        }else {
          callback();
        }
      };
      var validateLastName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the last name again'));
        }else {
          callback();
        }
      };
      var validateFirstName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the first name again'));
        }else {
          callback();
        }
      };
      var validateMiddleName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the middle name again'));
        }else {
          callback();
        }
      };
      var validateAddress = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the address again'));
        }else {
          callback();
        }
      };
      var validatePhone = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the phone number again'));
        }else {
          callback();
        }
      };
    return {
        ruleForm: {
          AccountID: '',
          AccountName: '',
          AccountPassword: '',
          AccountConfirmPassword: '',
          LastName: '',
          FirstName: '',
          MiddleName: '',
          ExtName: '',
          Phone: '',
          Address: '',
          Icon: '',
          Status: 1,
          Role: 1,
          AddedBy: '',
        },
        rules: {
          AccountID: [
            { validator: validateAccountID, trigger: 'blur' }
          ],
          AccountName: [
            { validator: validateAccountName, trigger: 'blur' }
          ],
          AccountPassword: [
            { validator: validateAccountPassword, trigger: 'blur' }
          ],
          AccountConfirmPassword: [
            { validator: validateAccountConfirmPassword, trigger: 'blur' }
          ],
          LastName: [
            { validator: validateLastName, trigger: 'blur' }
          ],
          FirstName: [
            { validator: validateFirstName, trigger: 'blur' }
          ],
          MiddleName: [
            { validator: validateMiddleName, trigger: 'blur' }
          ],
          Address: [
            { validator: validateAddress, trigger: 'blur' }
          ],
          Phone: [
            { validator: validatePhone, trigger: 'blur' }
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
          if (this.ruleForm.AccountPassword != this.ruleForm.AccountConfirmPassword) {
            this.$message({
              message: 'Password not match',
              type: 'warning'
            });
          } else {
            let params = {
              request: 2,
              data: this.ruleForm
            };

            this.http
              .post(this.api.UserService, params)
              .then(response => {
                if (response.data.State == 1) {
                  this.$message({
                    message: response.data.Message,
                    type: 'success'
                  });
                  this.resetForm();
                  this.getLatestUserAccountID();
                  this.getRole();
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
    resetForm() {
      this.$refs.ruleForm.resetFields();
      this.ruleForm.Status = 1;
      this.ruleForm.ExtName = '';
      this.ruleForm.Icon = '';
    },
    selectRole(val) {
      this.currRole = val.Role; 
      this.ruleForm.Role = val.ID; 
    },
    getRole() {
      let params = {
        request: 3,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.roleList = response.data;
          this.currRole = this.roleList[2].Role; 
          this.ruleForm.Role = this.roleList[2].ID; 
        })
        .catch(error => {
          console.log(error);
        });
    },
    getLatestUserAccountID() {
      let params = {
        request: 10,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.ruleForm.AccountID = Number(response.data.maxAccountID) + 1;
        })
        .catch(error => {
          console.log(error);
        });
    },
    handleAvatarSuccess(file) {
      this.getBase64(file.raw).then(res => {
        this.ruleForm.Icon = res;
      });
    },
    getBase64(file) {
      return new Promise(function(resolve, reject) {
        let reader = new FileReader();
        let imgResult = "";
        reader.readAsDataURL(file);
        reader.onload = function() {
          imgResult = reader.result;
        };
        reader.onerror = function(error) {
          reject(error);
        };
        reader.onloadend = function() {
          resolve(imgResult);
        };
      });
    },
  },
  created() {
    let userInfo = JSON.parse(localStorage.getItem("userInfo"));
    this.getLatestUserAccountID();
    this.getRole();
    this.ruleForm.AddedBy = userInfo.AccountID
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
