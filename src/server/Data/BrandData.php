<?php
class BrandData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  function getAllBrand() {
    $query = "Select * from `tbl_models`";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["Model"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  

  function setBrand($params) {
    $Model = $params['Model'];
    $query = "Insert into `tbl_models`
              (
                `Model`
              ) 
              values 
              (
                '$Model'
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
    $Model = $params['Model'];

    $query = "Update `tbl_models` SET
              `Model`=$Model
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