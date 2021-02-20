<?php
class UploadData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }

  function uploadImage($params) {
    $Data = $params['Data'];

    $query = "Insert into `tbl_uploads`
              (
                Data
              )
              values
              (
                '$Data'
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

}
?>