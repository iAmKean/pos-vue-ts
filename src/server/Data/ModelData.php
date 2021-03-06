<?php
class ModelData {
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
              `tbl_model`.`Description`,
              `tbl_model`.`Price`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`DateAdded`,
              `tbl_model`.`AddedBy`,
              `tbl_model`.`DateUpdated`,
              `tbl_model`.`UpdatedBy`
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
        $this->tempData["Description"] = $row[4];
        $this->tempData["Price"] = $row[5];
        $this->tempData["Stocks"] = $row[6];
        $this->tempData["DateAdded"] = $row[7];
        $this->tempData["AddedBy"] = $row[8];
        $this->tempData["DateUpdated"] = $row[9];
        $this->tempData["UpdatedBy"] = $row[10];
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
              `tbl_model`.`Description`,
              `tbl_model`.`Price`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`DateAdded`,
              `tbl_model`.`AddedBy`,
              `tbl_model`.`DateUpdated`,
              `tbl_model`.`UpdatedBy`
              from ((`tbl_model`
              Inner Join `tbl_brand` ON `tbl_model`.`BrandCategory`=`tbl_brand`.`ID`)
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)
              Where `tbl_model`.`isDelete`=1 
              AND
              `tbl_model`.`BrandCategory`='$BrandCategory'
              Order by ID Asc";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["BrandCategory"] = $row[1];
        $this->tempData["ModelName"] = $row[2];
        $this->tempData["ModelPartCategory"] = $row[3];
        $this->tempData["Description"] = $row[4];
        $this->tempData["Price"] = $row[5];
        $this->tempData["Stocks"] = $row[6];
        $this->tempData["DateAdded"] = $row[7];
        $this->tempData["AddedBy"] = $row[8];
        $this->tempData["DateUpdated"] = $row[9];
        $this->tempData["UpdatedBy"] = $row[10];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function deletedModel() {
    $query = "Select 
              `tbl_model`.`ID`,
              `tbl_brand`.`Brand`,
              `tbl_model`.`ModelName`,
              `tbl_model_parts`.`ModelPart`,
              `tbl_model`.`Description`,
              `tbl_model`.`Price`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`DateAdded`,
              `tbl_model`.`AddedBy`,
              `tbl_model`.`DateUpdated`,
              `tbl_model`.`UpdatedBy`
              from ((`tbl_model`
              Inner Join `tbl_brand` ON `tbl_model`.`BrandCategory`=`tbl_brand`.`ID`)
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)
              Where `tbl_model`.`isDelete`=2
              Order by ID Asc";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["BrandCategory"] = $row[1];
        $this->tempData["ModelName"] = $row[2];
        $this->tempData["ModelPartCategory"] = $row[3];
        $this->tempData["Description"] = $row[4];
        $this->tempData["Price"] = $row[5];
        $this->tempData["Stocks"] = $row[6];
        $this->tempData["DateAdded"] = $row[7];
        $this->tempData["AddedBy"] = $row[8];
        $this->tempData["DateUpdated"] = $row[9];
        $this->tempData["UpdatedBy"] = $row[10];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function getModelByID($params) {
    $ID = $params['ID'];

    $query = "Select 
              `tbl_model`.`ID`,
              `tbl_brand`.`Brand`,
              `tbl_model`.`ModelName`,
              `tbl_model_parts`.`ModelPart`,
              `tbl_model`.`Description`,
              `tbl_model`.`Price`,
              `tbl_model`.`Stocks`,
              `tbl_model`.`DateAdded`,
              `tbl_model`.`AddedBy`,
              `tbl_model`.`DateUpdated`,
              `tbl_model`.`UpdatedBy`
              from ((`tbl_model`
              Inner Join `tbl_brand` ON `tbl_model`.`BrandCategory`=`tbl_brand`.`ID`)
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)
              Where `tbl_model`.`ID`='$ID'
              And `tbl_model`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["BrandCategory"] = $row[1];
        $this->tempData["ModelName"] = $row[2];
        $this->tempData["ModelPartCategory"] = $row[3];
        $this->tempData["Description"] = $row[4];
        $this->tempData["Price"] = $row[5];
        $this->tempData["Stocks"] = $row[6];
        $this->tempData["DateAdded"] = $row[7];
        $this->tempData["AddedBy"] = $row[8];
        $this->tempData["DateUpdated"] = $row[9];
        $this->tempData["UpdatedBy"] = $row[10];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function setModel($params) {

    $BrandCategory = $params['BrandCategory'];
    $ModelName = $params['ModelName'];
    $ModelPartCategory = $params['ModelPartCategory'];
    $Description = $params['Description'];
    $Price = $params['Price'];
    $Stocks = $params['Stocks'];
    $AddedBy = $params['AddedBy'];
    $AvailableItems = $params['Stocks'];
    $SoldItems = "0";

    $query = "Insert into `tbl_model`
              (
                `BrandCategory`,
                `ModelName`,
                `ModelPartCategory`,
                `Description`,
                `Price`,
                `Stocks`,
                `AddedBy`,
                `AvailableItems`,
                `SoldItems`
              ) 
              values 
              (
                '$BrandCategory',
                '$ModelName',
                '$ModelPartCategory',
                '$Description',
                '$Price',
                '$Stocks',
                '$AddedBy',
                '$AvailableItems',
                '$SoldItems'
              )";
    
    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "New record successfully created!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error creating record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }

  function updateModel($params) {
    $ID = $params['ID'];
    $BrandCategory = $params['BrandCategory'];
    $ModelName = $params['ModelName'];
    $ModelPartCategory = $params['ModelPartCategory'];
    $Description = $params['Description'];
    $Price = $params['Price'];
    $Stocks = $params['Stocks'];
    // $DateAdded = $params['DateAdded'];
    // $AddedBy = $params['AddedBy'];
    $DateUpdated = $params['DateUpdated'];
    $UpdatedBy = $params['UpdatedBy'];

    $query = "Update `tbl_model` SET
              `BrandCategory`='$BrandCategory',
              `ModelName`='$ModelName',
              `ModelPartCategory`='$ModelPartCategory',
              `Description`='$Description',
              `Price`='$Price',
              `Stocks`='$Stocks',
              `DateUpdated`='$DateUpdated',
              `UpdatedBy`='$UpdatedBy',
              `AvailableItems`='$Stocks'
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

  function countTotalModel($params) {
    $query = "Select count(ID) from `tbl_model` Where `tbl_model`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function countTotalModelByBrandCat($params) {
    $BrandCategory = $params['BrandCategory'];

    $query = "Select count(ID) from `tbl_model` 
              Where `tbl_model`.`isDelete`=1
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

  function countLowTotalModel($params) {
    $query = "Select count(ID) from `tbl_model` where `Stocks` < 20 and `Stocks` <> 0 AND `tbl_model`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function countLowTotalModelByBrandCat($params) {
    $BrandCategory = $params['BrandCategory'];

    $query = "Select count(ID) from `tbl_model` 
              where `Stocks` < 20 and `Stocks` <> 0 
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

  function removeItem($params) {
    $ID = $params['ID'];

    $query = "Update `tbl_model` SET
              `tbl_model`.`isDelete`=2 
              where `tbl_model`.`ID`=$ID";

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

  function restoreItem($params) {
    $ID = $params['ID'];

    $query = "Update `tbl_model` SET
              `tbl_model`.`isDelete`=1 
              where `tbl_model`.`ID`=$ID";

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


}
?>