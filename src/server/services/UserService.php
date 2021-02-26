<?php
require_once("../config/index.php");
require_once("../Data/UserData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
      // select user
        $data = new UserData($conn);
        echo json_encode($data->getUsers($params['data']));
        break;
    case 2:
      // set user
        $data = new UserData($conn);
        echo json_encode($data->setUser($params['data']));
        break;  
    case 3:
      // get role
        $data = new UserData($conn);
        echo json_encode($data->getRole($params['data']));
        break;    
    case 4:
      // update user
        $data = new UserData($conn);
        echo json_encode($data->updateUser($params['data']));
        break;   
    case 5:
      // update user
        $data = new UserData($conn);
        echo json_encode($data->updateUserAccount($params['data']));
        break; 
    case 6:
      // update user
        $data = new UserData($conn);
        echo json_encode($data->updateUserPassword($params['data']));
        break;
    case 7:
      // count active user
        $data = new UserData($conn);
        echo json_encode($data->countActiveUser($params['data']));
        break;
    case 8:
      // count user
        $data = new UserData($conn);
        echo json_encode($data->countUser($params['data']));
        break;
    case 9:
      // remove user
        $data = new UserData($conn);
        echo json_encode($data->removeUser($params['data']));
        break;
    case 10:
      // select latest user
        $data = new UserData($conn);
        echo json_encode($data->latestUser($params['data']));
        break;
    case 11:
      // select user by accountid
        $data = new UserData($conn);
        echo json_encode($data->selectUserByAccountID($params['data']));
        break; 
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
  return;
}
?>