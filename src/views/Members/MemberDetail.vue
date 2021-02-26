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
                      <el-breadcrumb-item>Member Detail</el-breadcrumb-item>
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
                        disabled
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
                            <el-radio :label="'Active'" border disabled>Active</el-radio>
                            <el-radio :label="'Inactive'" border disabled>Inactive</el-radio>
                          </el-radio-group>
                      </div>

                      <div class="dropdown-c">
                        <label class="label-c">Account Role:</label>
                        <el-dropdown trigger="click">
                          <el-button type="primary" disabled>
                            {{ ruleForm.Role }}
                            <i class="el-icon-arrow-down el-icon--right"></i>
                          </el-button>
                        </el-dropdown>
                      </div>
              
                    </div>
                  </div>
                  <div class="acc-form">
                    <el-form
                      :model="ruleForm"
                      status-icon
                      size="medium"
                      ref="ruleForm"
                      label-position="left"
                      label-width="200px" class="demo-ruleForm">
                      <el-form-item label="Account ID:" prop="AccountID">
                        <el-input type="text" v-model="ruleForm.AccountID" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Account Name:" prop="AccountName">
                        <el-input type="text" v-model="ruleForm.AccountName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Account Password:" class="pass-con" prop="AccountPassword">
                        <el-input type="password" v-model="ruleForm.AccountPassword" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Last Name:" prop="LastName">
                        <el-input type="text" v-model="ruleForm.LastName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="First Name:" prop="FirstName">
                        <el-input type="text" v-model="ruleForm.FirstName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Middle Name:" prop="MiddleName">
                        <el-input type="text" v-model="ruleForm.MiddleName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Extension Name:">
                        <el-input type="text" v-model="ruleForm.ExtName" autocomplete="off" readonly></el-input>
                      </el-form-item>
                      <el-form-item label="Address:" prop="Address">
                        <el-input type="textarea" rows="5" v-model="ruleForm.Address" readonly></el-input>
                      </el-form-item>

                      <div class="button-con">
                          <el-button type="primary" @click="back()">Back</el-button>
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
  name: "MemberDetail",
  components: {
    Header,
    Aside,
  },
  data() {
    return {
        ruleForm: {
          AccountID: null,
          AccountName: null,
          AccountPassword: null,
          AccountConfirmPassword: null,
          LastName: null,
          FirstName: null,
          MiddleName: null,
          ExtName: null,
          Address: null,
          Icon: null,
          Status: null,
          Role: null,
          AddedBy: null,
        },
    };
  },
  methods: {
    back() {
      this.$router.back();
    },
    getUser() {
      let params = {
        request: 11,
        data: {
          AccountID: this.$route.params.accountid,
        }
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.ruleForm = response.data[0];
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.getUser();
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
