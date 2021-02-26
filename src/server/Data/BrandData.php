<?php
class BrandData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  function getAllBrand() {
    $query = "Select * from `tbl_brand`";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["Brand"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  

  function setBrand($params) {
    $Brand = $params['Brand'];
    $query = "Insert into `tbl_brand`
              (
                `Brand`
              ) 
              values 
              (
                '$Brand'
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

  function updateBrand($params) {
    $ID = $params['ID'];
    $Brand = $params['Brand'];

    $query = "Update `tbl_brand` SET
              `Brand`='$Brand'
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


  function selectBrandPart() {
    $query = "Select * from `tbl_model_parts`";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["ModelPart"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  
  function setBrandPart($params) {
    $ModelPart = $params['ModelPart'];
    $query = "Insert into `tbl_model_parts`
              (
                `ModelPart`
              ) 
              values 
              (
                '$ModelPart'
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

  function updateBrandPart($params) {
    $ID = $params['ID'];
    $ModelPart = $params['ModelPart'];

    $query = "Update `tbl_model_parts` SET
              `ModelPart`='$ModelPart'
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