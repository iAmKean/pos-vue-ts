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
                  <el-row>
                    <el-button type="success" @click="goPage('AddMember')">New</el-button>
                    <el-button type="warning" @click="goPage('ArchiveMembers')">Archives</el-button>
                    <el-button type="primary">Print</el-button>
                  </el-row>
                </div>
                <div class="right">
                  <el-tag type="success">Active User(s): {{ activeUserCount }}</el-tag>
                  <el-tag>Number of User(s): {{ userCount }}</el-tag>
                </div>
              </div>
              <Table @updateData="updateData()"/>
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
import Table from '@/components/members/Table.vue'

export default {
  name: "Members",
  components: {
    Header,
    Aside,
    Table
  },
  data() {
    return {
      activeUserCount: '',
      userCount: '',
    };
  },
  methods: {
    countUserActive() {
      let params = {
        request: 7,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.activeUserCount = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    countUser() {
      let params = {
        request: 8,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.userCount = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateData() {
      this.countUserActive();
      this.countUser();
    },
    goPage(url) {
      this.$router.push({ name: url });
    },
  },
  created() {
    this.countUserActive();
    this.countUser();
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
    .el-container {
      height: 100%;
    }
  }

  .el-header {
    height: 50px !important;
  }
  .el-main {
    padding: 0px;
  }

  .el-table td {
    padding: 5px 0px;
  }

  .el-tabs--border-card > .el-tabs__content {
    padding: 0px 10px 10px;
  }
}
</style>
