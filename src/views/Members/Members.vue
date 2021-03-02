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
                    <el-button v-if="userInfo.Role != '3'" type="success" @click="goPage('AddMember')">New</el-button>
                    <el-button v-if="userInfo.Role != '3'" type="warning" @click="goPage('MembersArchive')">Archives</el-button>
                    <download-excel
                      v-if="userInfo.Role != '3'"
                      class="el-button export-btn"
                      :data="json_data"
                      :fields="json_fields"
                      worksheet="My Worksheet"
                      name="member-list.xls">
                      <el-button type="primary" @click="getUsers()">Export</el-button>
                    </download-excel>
                  </el-row>
                </div>
                <div class="right">
                  <el-tag type="success">Active user(s): {{ activeUserCount }}</el-tag>
                  <el-tag>Number of user(s): {{ userCount }}</el-tag>
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
import Vue from "vue";
import JsonExcel from "vue-json-excel";

Vue.component("downloadExcel", JsonExcel);

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
      userInfo: {},
      json_fields: {
        "ID": "ID",
        "AccountID": "AccountID",
        "Account Name": "AccountName",
        "Last Name": "LastName",
        "First Name": "FirstName",
        "Middle Name": "MiddleName",
        "Extension Name": "ExtName",
        "Address": "Address",
        "Phone": "Phone",
        "Status": "Status",
        "Account Role": "Role",
        "Added By": "AddedBy",
        "Date Added": "CreateTime"
      },
      json_data: [],
      json_meta: [
        [
          {
            key: "charset",
            value: "utf-8",
          },
        ],
      ],
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
    getUsers() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.UserService, params)
        .then(response => {
          this.json_data = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.userInfo = JSON.parse(localStorage.getItem("userInfo"));
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
  .export-btn {
    padding: 0;
  }
}
</style>
