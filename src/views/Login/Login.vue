<template>
  <div class="login">
    <div class="login-wrapper">
      <div class="login-box">
        <div class="logo">
          <img :src="require('@/assets/login-logo.jpg')" alt="logo">
        </div>
        <div class="login-form">
            <div class="title">
              <h2>Login</h2>
            </div>
            <el-form
              :model="ruleForm"
              status-icon
              :rules="rules"
              size="medium"
              ref="ruleForm"
              label-position="top"
              label-width="150px" class="demo-ruleForm">
              <el-form-item label="Account Name:" prop="AccountName">
                <el-input type="text" v-model="ruleForm.AccountName" autocomplete="off"></el-input>
              </el-form-item>
              <el-form-item label="Account Password:" class="pass-con" prop="AccountPassword">
                <el-input type="password" v-model="ruleForm.AccountPassword" autocomplete="off"></el-input>
              </el-form-item>
              <el-form-item class="button-con">
                <el-button type="primary" @click="login()">Login</el-button>
              </el-form-item>
            </el-form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  components: {},
  data() {
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
    return {
        ruleForm: {
          AccountName: '',
          AccountPassword: '',
        },
        rules: {
          AccountName: [
            { validator: validateAccountName, trigger: 'blur' }
          ],
          AccountPassword: [
            { validator: validateAccountPassword, trigger: 'blur' }
          ],
        }
    };
  },
  methods: {
    login() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          let params = {
            request: 1,
            data: {
              AccountName: this.ruleForm.AccountName,
              AccountPassword: this.ruleForm.AccountPassword,
            }
          };

          this.http
            .post(this.api.LoginService, params)
            .then(response => {
              if (response.data.length > 0) {
                localStorage.setItem("userInfo", JSON.stringify(response.data[0]))
                this.loginLog();
              } else {
                alert('Invalid Account!');
                this.resetForm();
              }
            })
            .catch(error => {
              console.log(error);
            });

        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    loginLog() {
      let userInfo = JSON.parse(localStorage.getItem("userInfo"));
      let params = {
        request: 2,
        data: {
          AccountID: userInfo.AccountID,
        }
      };

      this.http
        .post(this.api.LoginService, params)
        .then(response => {
          if (response.data.State == 1) {
            this.$router.push({ name: 'Home' })
          } else {
            alert('Error!');
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    resetForm() {
      this.$refs.ruleForm.resetFields();
    }
  },
}
</script>

<style lang="less">
.login {
  height: 100vh;
  .login-wrapper {
    height: 100%;
    min-width: 1200px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #DCDFE6;
  }

  .login-box {
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #d2d4dd;
    border-radius: 5px;
    padding: 30px;
    box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.75);
    -webkit-box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.75);
  }

  .logo img {
    height: 300px;
    width: 300px;
  }

  .login-form {
    height: 100%;
    width: 300px;
    margin-left: 10px;


    .title {
      border-bottom: 1px solid #d2d4dd;
      padding-bottom: 10px;
    }
    .el-form {
      margin-top: 10px;
    }
    .el-form-item {
      text-align: left;
    }
    .pass-con {
      margin-bottom: 40px;
    }
    .button-con .el-button {
      width: 100%;
    }
    .el-form-item__label {
      padding-bottom: 0px;
    }
  }
}
</style>