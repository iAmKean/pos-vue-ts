<template>
  <div class="home admin-theme-main">
    <div class="home-wrapper">
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
                      <el-breadcrumb-item>Archives</el-breadcrumb-item>
                    </el-breadcrumb>
                </div>
                <div class="right">
                  
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
import Table from '@/components/home/TableArchive.vue'

export default {
  name: "ItemArchive",
  components: {
    Header,
    Aside,
    Table
  },
  data() {
    return {
      numberItems: '',
      numberLowStock: '',
      numberOutofStock: '',
      userInfo: {},
      json_fields: {
        ID: "ID",
        "Brand Category": "BrandCategory",
        "Model Name": "ModelName",
        "Model Part": "ModelPartCategory",
        "Description": "Description",
        "Price": "Price",
        "Stocks": "Stocks",
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
    countTotalModel() {
      let params = {
        request: 6,
        data: {}
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          this.numberItems = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    countLowTotalModel() {
      let params = {
        request: 7,
        data: {}
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          this.numberLowStock = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    countOutTotalModel() {
      let params = {
        request: 8,
        data: {}
      };

      this.http
        .post(this.api.ModelService, params)
        .then(response => {
          this.numberOutofStock = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateData() {
      this.countTotalModel();
      this.countLowTotalModel();
      this.countOutTotalModel();
    },
    async getModels() {
      let params = {
        request: 1,
        data: {}
      };

      await this.http
        .post(this.api.ModelService, params)
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
    this.countTotalModel();
    this.countLowTotalModel();
    this.countOutTotalModel();
  }
};
</script>
<style lang="less">
.home {
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
  }

  .el-table td {
    padding: 5px 0px;
  }

  .el-tabs--border-card > .el-tabs__content {
    padding: 0px 10px 10px;
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

  .right .el-tag:not(:first-child) {
    cursor: pointer;
  }

  .export-btn {
    padding: 0;
  }
}
</style>
