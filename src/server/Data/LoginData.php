<?php
class LoginData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }

  function Login($params) {
    $AccountName = $params['AccountName'];
    $AccountPassword = $params['AccountPassword'];

    $query = "Select * From `tbl_accounts`
              Where `tbl_accounts`.`AccountName`='$AccountName'
              And `tbl_accounts`.`AccountPassword`='$AccountPassword'";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["AccountID"] = $row[1];
        $this->tempData["AccountName"] = $row[2];
        $this->tempData["AccountPassword"] = $row[3];
        $this->tempData["LastName"] = $row[4];
        $this->tempData["FirstName"] = $row[5];
        $this->tempData["MiddleName"] = $row[6];
        $this->tempData["ExtName"] = $row[7];
        $this->tempData["Icon"] = $row[8];
        $this->tempData["Address"] = $row[9];
        $this->tempData["Status"] = $row[10];
        $this->tempData["Role"] = $row[11];
        $this->tempData["CreateTime"] = $row[12];
        $this->tempData["UpdateTime"] = $row[13];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function LoginLog($params) {
    $AccountID = $params['AccountID'];

    $query = "Insert into `tbl_login_log`
              (
                `AccountID`
              ) 
              values 
              (
                '$AccountID'
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