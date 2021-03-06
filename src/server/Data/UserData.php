<?php
class UserData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }

  function getUsers($params) {
    $query = "Select
              `tbl_accounts`.`ID`,
              `tbl_accounts`.`AccountID`,
              `tbl_accounts`.`AccountName`,
              `tbl_accounts`.`AccountPassword`,
              `tbl_accounts`.`LastName`,
              `tbl_accounts`.`FirstName`,
              `tbl_accounts`.`MiddleName`,
              `tbl_accounts`.`ExtName`,
              `tbl_accounts`.`Icon`,
              `tbl_accounts`.`Address`,
              `tbl_status`.`Status`,
              `tbl_role`.`Role`,
              `tbl_accounts`.`isDelete`,
              `tbl_accounts`.`CreateTime`,
              `tbl_accounts`.`UpdateTime`,
              ( Select `tbl_accounts`.`AccountName` from `tbl_accounts` where `tbl_accounts`.`AccountID`=`tbl_accounts`.`AddedBy`) AS AddedBy,
              `tbl_accounts`.`Phone`
              From ((`tbl_accounts`
              Inner Join `tbl_status` ON `tbl_accounts`.`Status`=`tbl_status`.`ID`)
              Inner Join `tbl_role` ON `tbl_accounts`.`Role`=`tbl_role`.`ID`)
              where `tbl_accounts`.`isDelete`=1
              ORDER BY `tbl_accounts`.`ID` ASC";

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
        $this->tempData["isDelete"] = $row[12];
        $this->tempData["CreateTime"] = $row[13];
        $this->tempData["UpdateTime"] = $row[14];
        $this->tempData["AddedBy"] = $row[15];
        $this->tempData["Phone"] = $row[16];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function getUsersByDelete($params) {
    $query = "Select
              `tbl_accounts`.`ID`,
              `tbl_accounts`.`AccountID`,
              `tbl_accounts`.`AccountName`,
              `tbl_accounts`.`AccountPassword`,
              `tbl_accounts`.`LastName`,
              `tbl_accounts`.`FirstName`,
              `tbl_accounts`.`MiddleName`,
              `tbl_accounts`.`ExtName`,
              `tbl_accounts`.`Icon`,
              `tbl_accounts`.`Address`,
              `tbl_status`.`Status`,
              `tbl_role`.`Role`,
              `tbl_accounts`.`isDelete`,
              `tbl_accounts`.`CreateTime`,
              `tbl_accounts`.`UpdateTime`,
              ( Select `tbl_accounts`.`AccountName` from `tbl_accounts` where `tbl_accounts`.`AccountID`=`tbl_accounts`.`AddedBy`) AS AddedBy,
              `tbl_accounts`.`Phone`
              From ((`tbl_accounts`
              Inner Join `tbl_status` ON `tbl_accounts`.`Status`=`tbl_status`.`ID`)
              Inner Join `tbl_role` ON `tbl_accounts`.`Role`=`tbl_role`.`ID`)
              where `tbl_accounts`.`isDelete`=2
              ORDER BY `tbl_accounts`.`ID` ASC";

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
        $this->tempData["isDelete"] = $row[12];
        $this->tempData["CreateTime"] = $row[13];
        $this->tempData["UpdateTime"] = $row[14];
        $this->tempData["AddedBy"] = $row[15];
        $this->tempData["Phone"] = $row[16];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function selectUserByAccountID($params) {
    $AccountID = $params['AccountID'];

    
    $query = "Select
              `tbl_accounts`.`ID`,
              `tbl_accounts`.`AccountID`,
              `tbl_accounts`.`AccountName`,
              `tbl_accounts`.`AccountPassword`,
              `tbl_accounts`.`LastName`,
              `tbl_accounts`.`FirstName`,
              `tbl_accounts`.`MiddleName`,
              `tbl_accounts`.`ExtName`,
              `tbl_accounts`.`Icon`,
              `tbl_accounts`.`Address`,
              `tbl_status`.`Status`,
              `tbl_role`.`Role`,
              `tbl_accounts`.`isDelete`,
              `tbl_accounts`.`CreateTime`,
              `tbl_accounts`.`UpdateTime`,
              ( Select `tbl_accounts`.`AccountName` from `tbl_accounts` where `tbl_accounts`.`AccountID`=`tbl_accounts`.`AddedBy`) AS AddedBy,
              `tbl_accounts`.`Phone`
              From ((`tbl_accounts`
              Inner Join `tbl_status` ON `tbl_accounts`.`Status`=`tbl_status`.`ID`)
              Inner Join `tbl_role` ON `tbl_accounts`.`Role`=`tbl_role`.`ID`)
              where `tbl_accounts`.`AccountID`='$AccountID'
              And `tbl_accounts`.`isDelete`=1
              ORDER BY `tbl_accounts`.`ID` ASC";

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
        $this->tempData["isDelete"] = $row[12];
        $this->tempData["CreateTime"] = $row[13];
        $this->tempData["UpdateTime"] = $row[14];
        $this->tempData["AddedBy"] = $row[15];
        $this->tempData["Phone"] = $row[16];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function setUser($params) {
    // $ID = $params['ID'];
    $AccountID = $params['AccountID'];
    $AccountName = $params['AccountName'];
    $AccountPassword = $params['AccountPassword'];
    $LastName = $params['LastName'];
    $FirstName = $params['FirstName'];
    $MiddleName = $params['MiddleName'];
    $ExtName = $params['ExtName'];
    $Icon = $params['Icon'];
    $Phone = $params['Phone'];
    $Address = $params['Address'];
    $Status = $params['Status'];
    $Role = $params['Role'];
    $AddedBy = $params['AddedBy'];

    $query = "Select * From `tbl_accounts` Where `tbl_accounts`.`AccountID`='$AccountID'";
    $result = $this->link->query($query);
    $row = mysqli_fetch_row($result);

    if ($row != null) {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Account ID already exist!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $query = "Insert into `tbl_accounts`
              (
                AccountID,
                AccountName,
                AccountPassword,
                LastName,
                FirstName,
                MiddleName,
                ExtName,
                Icon,
                Address,
                Role,
                Status,
                AddedBy,
                Phone
              )
              values
              (
                '$AccountID',
                '$AccountName',
                '$AccountPassword',
                '$LastName',
                '$FirstName',
                '$MiddleName',
                '$ExtName',
                '$Icon',
                '$Address',
                '$Role',
                '$Status',
                '$AddedBy',
                '$Phone'
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

  function countActiveUser($params) {
    $query = "Select count(ID) from `tbl_accounts`
              where `tbl_accounts`.`isDelete`=1
              and `tbl_accounts`.`Status`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function countUser($params) {
    $query = "Select count(ID) from `tbl_accounts`
              where `tbl_accounts`.`isDelete`=1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["count"] = $row[0];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function latestUser($params) {
    $query = "SELECT * FROM `tbl_accounts` ORDER BY AccountID DESC LIMIT 0, 1";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["maxAccountID"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response[0];
  }

  function getRole($params) {
    $query = "Select * from `tbl_role`";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["Role"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }

  function removeUser($params) {
    $AccountID = $params['AccountID'];

    $query = "Update `tbl_accounts` SET
              `tbl_accounts`.`isDelete`=2 
              where `tbl_accounts`.`AccountID`=$AccountID";

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

  function updateUser($params) {
    $AccountID = $params['AccountID'];
    $AccountName = $params['AccountName'];
    $AccountPassword = $params['AccountPassword'];
    $LastName = $params['LastName'];
    $FirstName = $params['FirstName'];
    $MiddleName = $params['MiddleName'];
    $ExtName = $params['ExtName'];
    $Icon = $params['Icon'];
    $Address = $params['Address'];
    $Status = $params['Status'];
    $Role = $params['Role'];
    $Phone = $params['Phone'];

    $query = "Update `tbl_accounts` SET
      `AccountID`='$AccountID',
      `AccountName`='$AccountName',
      `AccountPassword`='$AccountPassword',
      `LastName`='$LastName',
      `FirstName`='$FirstName',
      `MiddleName`='$MiddleName',
      `ExtName`='$ExtName',
      `Icon`='$Icon',
      `Icon`='$Icon',
      `Address`='$Address',
      `Status`='$Status',
      `Role`='$Role',
      `Phone`='$Phone'
      where AccountID=$AccountID";

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

  function updateUserAccount($params) {
    $AccountID = $params['AccountID'];
    $LastName = $params['LastName'];
    $FirstName = $params['FirstName'];
    $MiddleName = $params['MiddleName'];
    $ExtName = $params['ExtName'];
    $Icon = $params['Icon'];
    $Phone = $params['Phone'];
    $Address = $params['Address'];

    $query = "Update `tbl_accounts` SET
      `LastName`='$LastName',
      `FirstName`='$FirstName',
      `MiddleName`='$MiddleName',
      `ExtName`='$ExtName',
      `Address`='$Address',
      `Phone`='$Phone',
      `Icon`='$Icon'
      where AccountID=$AccountID";

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

  function updateUserPassword($params) {
    $AccountID = $params['AccountID'];
    $currPassword = $params['currPassword'];
    $newPass = $params['newPass'];

    $query = "Select * From `tbl_accounts`
              Where `tbl_accounts`.`AccountID`='$AccountID'
              And  `tbl_accounts`.`AccountPassword`='$currPassword'";
    $result = $this->link->query($query);
    $row = mysqli_fetch_row($result);

    if ($row != null) {
      $rowStudentID = $row[0];

      $query = "Update `tbl_accounts` SET `AccountPassword`='$newPass'
      where `ID`=$rowStudentID";

      if ($this->link->query($query) === TRUE) {
        $this->successTemp["State"] = 1;
        $this->successTemp["Message"] = "Password successfully changed, please log in again.";
        $this->response[] = $this->successTemp;
        return $this->response[0];
      } else {
        $this->successTemp["State"] = 0;
        $this->successTemp["Message"] = "Error updating password.";
        $this->response[] = $this->successTemp;
        return $this->response[0];
      }
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Incorrect current password.";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }

  }

}
?>