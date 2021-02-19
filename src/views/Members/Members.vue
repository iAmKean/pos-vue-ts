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
                    <el-button type="success">New</el-button>
                    <el-button type="warning">Archives</el-button>
                    <el-button type="primary">Print</el-button>
                  </el-row>
                </div>
                <div class="right">
                  <el-tag type="success">Active User(s): 1</el-tag>
                  <el-tag>Number of User(s): 1</el-tag>
                </div>
              </div>
              <Table />
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
    return {};
  },
  methods: {}
};
</script>
<style lang="less">
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
