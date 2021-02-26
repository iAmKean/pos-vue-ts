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
              Inner Join `tbl_model_parts` ON `tbl_model`.`ModelPartCategory`=`tbl_model_parts`.`ID`)";

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
    // $DateAdded = $params['DateAdded'];
    $AddedBy = $params['AddedBy'];

    $query = "Insert into `tbl_model`
              (
                `BrandCategory`,
                `ModelName`,
                `ModelPartCategory`,
                `Description`,
                `Price`,
                `Stocks`,
                `AddedBy`
              ) 
              values 
              (
                `$BrandCategory`,
                `$ModelName`,
                `$ModelPartCategory`,
                `$Description`,
                `$Price`,
                `$Stocks`,
                `$AddedBy`
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
              `UpdatedBy`='$UpdatedBy'
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

}
?>