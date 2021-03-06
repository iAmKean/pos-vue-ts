<?php
require_once("../config/index.php");
require_once("../Data/StockData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
    // select all
      $data = new StockData($conn);
      echo json_encode($data->getAllModel());
      break;
    case 2:
    // select by
      $data = new StockData($conn);
      echo json_encode($data->getModelsByBrandID($params['data']));
      break;
    case 3:
    // inserta data
      $data = new StockData($conn);
      echo json_encode($data->setModel($params['data']));
      break;
    case 4:
    // update data
      $data = new StockData($conn);
      echo json_encode($data->updateModel($params['data']));
      break;
    case 5:
    // delete data
      $data = new StockData($conn);
      echo json_encode($data->deleteStockData($params['data']));
      break;
    case 6:
      // update stock and available count
        $data = new StockData($conn);
        echo json_encode($data->updateStock($params['data']));
        break;
    case 7:
      // insert stock log
        $data = new StockData($conn);
        echo json_encode($data->setStockLog($params['data']));
        break;
    case 8:
      // update less stock and available count
        $data = new StockData($conn);
        echo json_encode($data->updateStockLess($params['data']));
        break;
    case 9:
      // delete data
        $data = new StockData($conn);
        echo json_encode($data->countLowTotalModel($params['data']));
        break;
    case 10:
      // delete data
        $data = new StockData($conn);
        echo json_encode($data->countOutTotalModel($params['data']));
        break;
    case 11:
      // delete data
        $data = new StockData($conn);
        echo json_encode($data->countLowTotalModelByBrandID($params['data']));
        break;
    case 12:
      // delete data
        $data = new StockData($conn);
        echo json_encode($data->countOutTotalModelByBrandID($params['data']));
        break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
}
?>