<?php
class StockData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  function getAllModel() {
    $query = "Select 
              `tbl_model`.`ID`,
              `tbl_brand`.`Brand`,
              `tbl_model`.`ModelName`,
              `tbl_model_parts`.`ModelPart`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`AvailableItems`,
              `tbl_model`.`SoldItems`
              from ((`tbl_model`
              Inner Join `tbl_brand` ON `tbl_model`.`BrandCategory`=`tbl_brand`.`ID`)
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)
              Where `tbl_model`.`isDelete`=1
              Order by ID Asc";
    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["BrandCategory"] = $row[1];
        $this->tempData["ModelName"] = $row[2];
        $this->tempData["ModelPartCategory"] = $row[3];
        $this->tempData["Stocks"] = $row[4];
        $this->tempData["AvailableItems"] = $row[5];
        $this->tempData["SoldItems"] = $row[6];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  
  function getModelsByBrandID($params) {
    $BrandCategory = $params['BrandCategory'];

    $query = "Select 
              `tbl_model`.`ID`,
              `tbl_brand`.`Brand`,
              `tbl_model`.`ModelName`,
              `tbl_model_parts`.`ModelPart`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`AvailableItems`,
              `tbl_model`.`SoldItems`
              from ((`tbl_model`
              Inner Join `tbl_brand` ON `tbl_model`.`BrandCategory`=`tbl_brand`.`ID`)
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)
              Where `tbl_model`.`isDelete`=1
              AND `tbl_model`.`BrandCategory`='$BrandCategory'
              Order by ID Asc";
    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["BrandCategory"] = $row[1];
        $this->tempData["ModelName"] = $row[2];
        $this->tempData["ModelPartCategory"] = $row[3];
        $this->tempData["Stocks"] = $row[4];
        $this->tempData["AvailableItems"] = $row[5];
        $this->tempData["SoldItems"] = $row[6];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function updateStock($params) {
    $ID = $params['ID'];
    $newAvailableItems = $params['newAvailableItems'];
    $newTotalStocks = $params['newTotalStocks'];

    $query = "Update `tbl_model` SET
              `Stocks`='$newTotalStocks',
              `AvailableItems`='$newAvailableItems'
              where ID=$ID";

    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "Record successfully updated!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error updating record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }

  function updateStockLess($params) {
    $ID = $params['ID'];
    // $newTotalStocks = $params['newTotalStocks'];
    $newAvailableStocks = $params['newAvailableStocks'];
    $SoldItems = $params['SoldItems'];


    $query = "Update `tbl_model` SET
              `AvailableItems`='$newAvailableStocks',
              `SoldItems`='$SoldItems'
              where ID=$ID";

    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "Record successfully updated!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error updating record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }


  function setStockLog($params) {
    $UpdatedBy = $params['UpdatedBy'];
    $Action = $params['Action'];
    $NewData = $params['NewData'];
    $PreviousData = $params['PreviousData'];
    $UpdateTime = $params['UpdateTime'];

    $query = "Insert into `tbl_stock_log`
              (
                `UpdatedBy`,
                `Action`,
                `NewData`,
                `PreviousData`,
                `UpdateTime`
              ) 
              values 
              (
                '$UpdatedBy',
                '$Action',
                '$NewData',
                '$PreviousData',
                '$UpdateTime'
              )";
    
    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "New record successfully updated!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error creating record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }

  function countLowTotalModel($params) {
    $query = "Select count(ID) from `tbl_model` where `AvailableItems` < 20 and `AvailableItems` <> 0 AND `tbl_model`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }


  function countLowTotalModelByBrandID($params) {
    $BrandCategory = $params['BrandCategory'];

    $query = "Select count(ID) from `tbl_model`
              where `AvailableItems` < 20
              and `AvailableItems` <> 0
              AND `tbl_model`.`isDelete`=1
              AND `tbl_model`.`BrandCategory`='$BrandCategory'";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function countOutTotalModel($params) {
    $query = "Select count(ID) from `tbl_model` where `AvailableItems` = 0 AND `tbl_model`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function countOutTotalModelByBrandID($params) {
    $BrandCategory = $params['BrandCategory'];

    $query = "Select count(ID) from `tbl_model`
              where `AvailableItems` = 0 
              AND `tbl_model`.`isDelete`=1
              AND `tbl_model`.`BrandCategory`='$BrandCategory'";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  
}
?>