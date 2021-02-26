<?php
class ModelData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  function getAllModel() {
    $query = "Select * from `tbl_model`";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["ModelName"] = $row[1];
        $this->tempData["Description"] = $row[2];
        $this->tempData["BrandCategory"] = $row[3];
        $this->tempData["Price"] = $row[4];
        $this->tempData["Stocks"] = $row[5];
        $this->tempData["DateAdded"] = $row[6];
        $this->tempData["AddedBy"] = $row[7];
        $this->tempData["DateUpdated"] = $row[8];
        $this->tempData["UpdatedBy"] = $row[9];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  

  function setModel($params) {
    $ModelName = $params['ModelName'];
    $Description = $params['Description'];
    $BrandCategory = $params['BrandCategory'];
    $Price = $params['Price'];
    $Stocks = $params['Stocks'];
    // $DateAdded = $params['DateAdded'];
    $AddedBy = $params['AddedBy'];

    $query = "Insert into `tbl_model`
              (
                `ModelName`,
                `Description`,
                `BrandCategory`,
                `Price`,
                `Stocks`,
                `AddedBy`
              ) 
              values 
              (
                `$ModelName`,
                `$Description`,
                `$BrandCategory`,
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
    $ModelName = $params['ModelName'];
    $Description = $params['Description'];
    $BrandCategory = $params['BrandCategory'];
    $Price = $params['Price'];
    $Stocks = $params['Stocks'];
    // $DateAdded = $params['DateAdded'];
    // $AddedBy = $params['AddedBy'];
    $DateUpdated = $params['DateUpdated'];
    $UpdatedBy = $params['UpdatedBy'];

    $query = "Update `tbl_model` SET
              `ModelName`='$ModelName',
              `Description`='$Description',
              `BrandCategory`='$BrandCategory',
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