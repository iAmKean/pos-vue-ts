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
                  <el-row>
                    <el-button type="success" @click="$router.push({ name: 'AddItem' })">New</el-button>
                    <el-button type="warning" @click="goPage('MembersArchive')">Logs</el-button>
                    <el-button type="primary">Print</el-button>
                  </el-row>
                </div>
                <div class="right">
                  <el-tag type="success">No. of Item(s): {{ numberItems }}</el-tag>
                  <el-tag type="warning">Low in Stock(s): {{ numberLowStock }} <i class="el-icon-question"></i></el-tag>
                  <el-tag type="danger">Out of Stock(s): {{ numberOutofStock }} <i class="el-icon-question"></i></el-tag>
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
import Table from '@/components/home/Table.vue'

export default {
  name: "Home",
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
    }
  },
  created() {
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
}
</style>
