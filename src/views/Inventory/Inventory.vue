<template>
  <div class="inventory admin-theme-main">
    <div class="home-wrapper">
      <el-container>
        <el-header>
          <Header />
        </el-header>
        <el-container>
          <el-aside width="200px">
            <Aside :activeTab="'1'" />
          </el-aside>
          <el-container>
            <el-main>
              <div class="table-options">
                <div class="left">
                  <el-row>
                    <!-- <el-button type="success">New</el-button> -->
                    <!-- <el-button v-if="userInfo.Role != '3'" type="warning">Logs</el-button> -->
                    <download-excel
                      class="el-button export-btn"
                      :data="json_data"
                      :fields="json_fields"
                      worksheet="My Worksheet"
                      name="stock-list.xls">
                      <el-button type="primary" @click="getModels()">Export</el-button>
                    </download-excel>
                  </el-row>
                </div>
                <div class="right">
                  <el-tag type="warning">Low in available stock(s): {{ numberLowStock }} <i class="el-icon-question"></i></el-tag>
                  <el-tag type="danger">No available stock(s): {{ numberOutofStock }} <i class="el-icon-question"></i></el-tag>
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
import Table from '@/components/inventory/Table.vue'

export default {
  name: "Inventory",
  components: {
    Header,
    Aside,
    Table
  },
  data() {
    return {
      numberLowStock: '',
      numberOutofStock: '',
      userInfo: {},
      json_fields: {
        ID: "ID",
        "Brand Category": "BrandCategory",
        "Model Name": "ModelName",
        "Model Part": "ModelPartCategory",
        "Total Stocks": "Stocks",
        "Sold Stocks": "AvailableItems",
        "Stocks": "SoldItems",
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
    countLowTotalModel() {
      let params = {
        request: 9,
        data: {}
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {
          this.numberLowStock = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    countOutTotalModel() {
      let params = {
        request: 10,
        data: {}
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {
          this.numberOutofStock = response.data.count;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getModels() {
      let params = {
        request: 1,
        data: {}
      };

      this.http
        .post(this.api.StockService, params)
        .then(response => {
          this.json_data = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    updateData() {
      console.log("asda");
      this.countLowTotalModel();
      this.countOutTotalModel();
      this.getModels();
    }
  },
  created() {
    this.userInfo = JSON.parse(localStorage.getItem("userInfo"));
    this.countLowTotalModel();
    this.countOutTotalModel();
    this.getModels();
  }
};
</script>
<style lang="less">
.inventory {
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

  .right .el-tag {
    cursor: pointer;
  }
  .export-btn {
    padding: 0;
  }
}
</style>
