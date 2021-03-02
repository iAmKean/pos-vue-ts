<template>
  <div class="home admin-theme-main">
    <div class="home-wrapper">
      <el-container>
        <el-header>
          <Header />
        </el-header>
        <el-container>
          <el-aside width="200px">
            <Aside :activeTab="'7'" />
          </el-aside>
          <el-container>
            <el-main >
                    <el-form
                      :model="ruleForm"
                      status-icon
                      :rules="rules"
                      size="medium"
                      ref="ruleForm"
                      label-position="left"
                      label-width="150px"
                      class="back-up-form">
                      <p style="text-align:left;">The backup file will be saved automatically in this folder `db-backup`.</p>
                      <br>
                      <p style="text-align:left;">Path: xampp\htdocs\pos-vue-server\services\db-backup</p>
                      <br>
                      <el-form-item label="Database Name:" class="pass-con" prop="DatabaseName">
                        <el-input
                          type="text"
                          v-model="ruleForm.DatabaseName"
                          placeholder="Input database name"
                          autocomplete="off"></el-input>
                      </el-form-item>
                      <div class="button-con">
                          <el-button type="success" :disabled="ruleForm.DatabaseName ? false: true" @click="backup()">Backup</el-button>
                      </div>
                    </el-form>
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
  name: "BackupDatabase",
  components: {
    Header,
    Aside,
  },
  data() {
      var valDatabaseName = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('Please input the database name again'));
        }else {
          callback();
        }
      };
    return {
      ruleForm: {
        DatabaseName: '',
      },
      rules: {
        DatabaseName: [
          { validator: valDatabaseName, trigger: 'blur' }
        ],
      },
    };
  },
  methods: {
    backup() {
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
            let params = {
              request: 1,
              data: {
                DatabaseName: this.ruleForm.DatabaseName,
              }
            };

            this.http
              .post(this.api.BackupService, params)
              .then(response => {
                  this.$message({
                    type: "success",
                    message: "Database successfully backup"
                  });
                  this.$refs.ruleForm.resetFields();
              })
              .catch(error => {
                this.$message({
                  type: "danger",
                  message: "Connection Error!"
                });
                console.log(error);
              });
        } else {
          return false;
        }
      });
    },
  }
};
</script>
<style lang="less" scoped>
.home {

  .back-up-form {
    width: 50%;
    margin: auto;

    .button-con {
      margin-top: 50px;
      text-align: center;
    }
  }
  .home-wrapper {
    height: 100vh;
    min-width: 1200px;
    .el-container {
      height: 100%;
    }
  }

  .el-header {
    height: 50px !important;
  }
  .el-main {
    padding: 0px;
    display: flex;
    align-content: center;
  }

  .el-table td {
    padding: 5px 0px;
  }

  .el-tabs--border-card > .el-tabs__content {
    padding: 0px 10px 10px;
  }
}
</style>
