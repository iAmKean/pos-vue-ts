

CREATE TABLE `tbl_accounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountID` varchar(50) DEFAULT NULL,
  `AccountName` varchar(50) DEFAULT NULL,
  `AccountPassword` varchar(50) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `MiddleName` varchar(120) DEFAULT NULL,
  `ExtName` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Icon` varchar(200) DEFAULT NULL,
  `Status` int(1) DEFAULT 1,
  `Role` int(1) DEFAULT 1,
  `isDelete` int(1) unsigned zerofill DEFAULT 1 COMMENT '1 - not delete 2- deleted',
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdateTime` varchar(200) DEFAULT NULL,
  `AddedBy` int(20) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`,`CreateTime`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_accounts VALUES("1","202000001","admin","admin","dela cruz1","keanu1","tagumasi1","sr","cauayan city","data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSEhMVFhUXFhUXFxUYFhcaGhgYFxcXFxcYGBgYHighGBolHRgXIjEhJSkrLi4uFyAzODMtNygtLi0BCgoKDg0OGxAQGzUlICUtLS0vLy03LS0tLS0tLS0tLy0tLS0tLS0vLS0tL","1","1","1","2021-03-01 18:24:11","","202000001","09876543211");
INSERT INTO tbl_accounts VALUES("2","202000002","keanu","keanu","dela cruz","keanu","tagumasi","","","","1","2","1","2021-02-19 15:38:02","","202000001","");
INSERT INTO tbl_accounts VALUES("3","202000003","test","test","test","","","","","","2","3","1","2021-02-19 15:38:07","","202000002","");
INSERT INTO tbl_accounts VALUES("4","202000004","keanu","keanu","dela cruz","keanu","tagumasi","","cyn","","1","3","1","2021-02-26 13:03:53","","202000001","");
INSERT INTO tbl_accounts VALUES("5","202000005","test1","t","ad","asd","asd","","asdsa","data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAoAAAAKACAYAAAAMzckjAAAgAElEQVR4nOy9d6AkaV3v/flV53Bynhx3Z/MMG9hl2UDWlSAg8SISlCAoWRYuV1QEJfiC4hpegSt65SKgKLgYEQER2Zxnd2c2TY5nzpxz5uTu5/7xVHVXdTodq7v6PJ/dmq","1","3","1","2021-02-26 13:07:03","","202000001","");
INSERT INTO tbl_accounts VALUES("6","202000006","qweqw","qwe","qwe","qwqwe","qwe","qwe","qweqw","","1","3","1","2021-02-26 13:08:44","","202000001","");
INSERT INTO tbl_accounts VALUES("7","202000007","qwe","e","qwe","qwe","qwe","sr","qwewqe","","1","3","1","2021-02-26 13:11:30","","202000001","");
INSERT INTO tbl_accounts VALUES("8","202000008","qweqwe","aa","asd","asd","asd","","sadas","","1","3","1","2021-02-26 13:12:40","","202000001","");
INSERT INTO tbl_accounts VALUES("9","202000009","qweqw","a","asd","asd","as","","asdsad","data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUF","1","3","1","2021-02-26 13:13:39","","202000001","");
INSERT INTO tbl_accounts VALUES("10","202000010","keanu10","keanu10","dela cruz","keanu","tagumasi","sr","address","data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUF","1","2","1","2021-02-26 14:37:52","","202000001","123456789");
INSERT INTO tbl_accounts VALUES("11","202000011","keanu11","keanu111","dela cruz","keanu","tagumasi","jr","cyn","","1","3","2","2021-02-26 14:46:02","","202000001","09958406050");



CREATE TABLE `tbl_brand` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_brand VALUES("1","iPhone");
INSERT INTO tbl_brand VALUES("2","Samsung");
INSERT INTO tbl_brand VALUES("3","Huawei");
INSERT INTO tbl_brand VALUES("4","Poco");
INSERT INTO tbl_brand VALUES("5","sadsa");
INSERT INTO tbl_brand VALUES("6","qweqw");
INSERT INTO tbl_brand VALUES("7","qweqw");
INSERT INTO tbl_brand VALUES("8","qweqwe");
INSERT INTO tbl_brand VALUES("9","aaaaaaaaa");
INSERT INTO tbl_brand VALUES("10","qweqwe");
INSERT INTO tbl_brand VALUES("11","asdda");
INSERT INTO tbl_brand VALUES("12","11111");
INSERT INTO tbl_brand VALUES("13","");



CREATE TABLE `tbl_inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandID` int(11) DEFAULT NULL,
  `ModelName` varchar(120) DEFAULT NULL,
  `ModelPartID` int(11) DEFAULT NULL,
  `ItemQuantity` varchar(250) DEFAULT NULL,
  `ItemAvailable` varchar(250) DEFAULT NULL,
  `ItemSold` varchar(250) DEFAULT NULL,
  `CreatedTime` timestamp NULL DEFAULT NULL,
  `UpdatedTime` varchar(250) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tbl_inventory_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountID` varchar(200) DEFAULT NULL,
  `LogDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Data` time DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tbl_login_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountID` int(11) DEFAULT NULL,
  `LogTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_login_log VALUES("1","202000001","2021-02-16 18:28:07");
INSERT INTO tbl_login_log VALUES("2","202000001","2021-02-16 18:37:06");
INSERT INTO tbl_login_log VALUES("3","202000001","2021-02-19 10:49:47");
INSERT INTO tbl_login_log VALUES("4","202000001","2021-02-19 15:48:09");
INSERT INTO tbl_login_log VALUES("5","202000001","2021-02-20 10:26:29");
INSERT INTO tbl_login_log VALUES("6","202000001","2021-02-26 12:19:37");
INSERT INTO tbl_login_log VALUES("7","202000004","2021-02-26 13:02:47");
INSERT INTO tbl_login_log VALUES("8","202000001","2021-02-26 21:15:01");
INSERT INTO tbl_login_log VALUES("9","202000001","2021-02-27 16:01:44");
INSERT INTO tbl_login_log VALUES("10","202000001","2021-02-27 16:45:50");
INSERT INTO tbl_login_log VALUES("11","202000001","2021-02-27 18:57:49");
INSERT INTO tbl_login_log VALUES("12","202000001","2021-03-01 12:36:48");
INSERT INTO tbl_login_log VALUES("13","202000002","2021-03-01 16:55:41");
INSERT INTO tbl_login_log VALUES("14","202000002","2021-03-01 16:55:41");
INSERT INTO tbl_login_log VALUES("15","202000003","2021-03-01 16:56:21");
INSERT INTO tbl_login_log VALUES("16","202000001","2021-03-01 17:03:20");
INSERT INTO tbl_login_log VALUES("17","202000001","2021-03-01 18:23:45");
INSERT INTO tbl_login_log VALUES("18","202000001","2021-03-01 18:24:01");
INSERT INTO tbl_login_log VALUES("19","202000001","2021-03-01 18:24:50");
INSERT INTO tbl_login_log VALUES("20","202000001","2021-03-02 09:59:04");
INSERT INTO tbl_login_log VALUES("21","202000002","2021-03-02 11:24:49");
INSERT INTO tbl_login_log VALUES("22","202000003","2021-03-02 11:24:58");
INSERT INTO tbl_login_log VALUES("23","202000001","2021-03-02 11:25:27");
INSERT INTO tbl_login_log VALUES("24","202000001","2021-03-02 11:56:00");
INSERT INTO tbl_login_log VALUES("25","202000003","2021-03-02 12:23:28");
INSERT INTO tbl_login_log VALUES("26","202000001","2021-03-02 12:25:44");



CREATE TABLE `tbl_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandCategory` int(11) DEFAULT NULL,
  `ModelName` varchar(200) DEFAULT NULL,
  `ModelPartCategory` int(11) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Price` varchar(20) DEFAULT NULL,
  `Stocks` varchar(200) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AddedBy` varchar(200) DEFAULT NULL,
  `DateUpdated` varchar(200) DEFAULT NULL,
  `UpdatedBy` varchar(200) DEFAULT NULL,
  `AvailableItems` varchar(50) DEFAULT '0',
  `SoldItems` varchar(50) DEFAULT '0',
  `isDelete` int(1) DEFAULT 1 COMMENT '1 not deleted 2 deleted',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_model VALUES("1","1","Iphone 5","1","","700","51","2021-03-02 14:39:55","202000001","","","16","35","1");
INSERT INTO tbl_model VALUES("2","2","J7","1","","1200","265","2021-03-02 14:40:04","202000001","","","195","70","1");
INSERT INTO tbl_model VALUES("3","1","qwe","1","qwe","22","22","2021-03-02 14:23:51","202000001","","","0","22","1");
INSERT INTO tbl_model VALUES("4","1","gsdfds","1","erqwe","5","30","2021-03-02 14:38:17","202000001","","","24","6","1");
INSERT INTO tbl_model VALUES("5","1","eqwe","1","qweqw","22","22","2021-03-02 14:40:12","202000001","","","5","17","1");
INSERT INTO tbl_model VALUES("6","4","pico","2","werwe","2000","200","2021-03-02 13:55:42","202000001","","","200","0","1");
INSERT INTO tbl_model VALUES("7","2","were","1","ert","200","77","2021-03-02 13:55:40","202000001","","","77","0","1");



CREATE TABLE `tbl_model_parts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ModelPart` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_model_parts VALUES("1","LCD");
INSERT INTO tbl_model_parts VALUES("2","Battery");



CREATE TABLE `tbl_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_role VALUES("1","Owner");
INSERT INTO tbl_role VALUES("2","Administrator");
INSERT INTO tbl_role VALUES("3","Staff");



CREATE TABLE `tbl_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_status VALUES("1","Active");
INSERT INTO tbl_status VALUES("2","Inactive");



CREATE TABLE `tbl_stock_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UpdatedBy` varchar(200) DEFAULT NULL,
  `Action` varchar(200) DEFAULT NULL,
  `NewData` text DEFAULT NULL,
  `PreviousData` text DEFAULT NULL,
  `UpdateTime` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_stock_log VALUES("1","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"5s","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":50,"SoldItems":5,"LessStock":1,"newTotalStocks":49}","{"ID":"1","BrandCategory":"iPhone","ModelName":"5s","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"50","SoldItems":"0"}","2021-02-27 18:51:28");
INSERT INTO tbl_stock_log VALUES("2","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"Battery","Stocks":25,"AvailableItems":25,"SoldItems":3,"LessStock":3,"newTotalStocks":22}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"Battery","Stocks":"25","AvailableItems":"25","SoldItems":"0"}","2021-02-27 18:55:14");
INSERT INTO tbl_stock_log VALUES("3","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"5s","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":49,"SoldItems":10,"LessStock":5,"newTotalStocks":45}","{"ID":"1","BrandCategory":"iPhone","ModelName":"5s","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"49","SoldItems":"5"}","2021-03-01 12:38:13");
INSERT INTO tbl_stock_log VALUES("4","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":20,"SoldItems":2,"LessStock":2,"newTotalStocks":18}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"20","SoldItems":"0"}","2021-03-01 12:38:49");
INSERT INTO tbl_stock_log VALUES("5","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":5,"LessStock":3,"newTotalStocks":17}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"18","SoldItems":"2"}","2021-03-01 12:40:56");
INSERT INTO tbl_stock_log VALUES("6","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":2,"LessStock":2,"newTotalStocks":18}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"20","SoldItems":"0"}","2021-03-01 12:55:14");
INSERT INTO tbl_stock_log VALUES("7","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":6,"LessStock":4,"newAvailableStocks":14}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"18","SoldItems":"2"}","2021-03-01 13:14:47");
INSERT INTO tbl_stock_log VALUES("8","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":10,"LessStock":4,"newAvailableStocks":14}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"18","SoldItems":"6"}","2021-03-01 13:15:21");
INSERT INTO tbl_stock_log VALUES("9","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":6,"LessStock":4,"newAvailableStocks":14}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"18","SoldItems":"2"}","2021-03-01 13:16:12");
INSERT INTO tbl_stock_log VALUES("10","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":14,"SoldItems":11,"LessStock":9,"newAvailableStocks":5}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"14","SoldItems":"6"}","2021-03-01 13:16:23");
INSERT INTO tbl_stock_log VALUES("11","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":18,"SoldItems":5,"LessStock":0,"newAvailableStocks":15}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"18","SoldItems":"2"}","2021-03-01 13:17:29");
INSERT INTO tbl_stock_log VALUES("12","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":15,"SoldItems":8,"LessStock":0,"newAvailableStocks":12}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"15","SoldItems":"5"}","2021-03-01 13:17:38");
INSERT INTO tbl_stock_log VALUES("13","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":12,"SoldItems":8,"LessStock":0,"newAvailableStocks":1.9000000000000004}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"12","SoldItems":"8"}","2021-03-01 13:49:50");
INSERT INTO tbl_stock_log VALUES("14","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":12,"SoldItems":8,"LessStock":0,"newAvailableStocks":11}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"12","SoldItems":"8"}","2021-03-01 14:02:46");
INSERT INTO tbl_stock_log VALUES("15","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":11,"SoldItems":12,"LessStock":0,"newAvailableStocks":9}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"11","SoldItems":"8"}","2021-03-01 14:03:02");
INSERT INTO tbl_stock_log VALUES("16","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":9,"SoldItems":12,"LessStock":0,"newAvailableStocks":8}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"9","SoldItems":"12"}","2021-03-01 14:06:17");
INSERT INTO tbl_stock_log VALUES("17","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":8,"SoldItems":12,"LessStock":0,"newAvailableStocks":6}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"8","SoldItems":"12"}","2021-03-01 14:06:31");
INSERT INTO tbl_stock_log VALUES("18","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":6,"SoldItems":12,"LessStock":0,"newAvailableStocks":0}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"6","SoldItems":"12"}","2021-03-01 14:08:49");
INSERT INTO tbl_stock_log VALUES("19","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":30,"AvailableItems":30,"SoldItems":6,"LessStock":0,"newAvailableStocks":24}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"30","AvailableItems":"30","SoldItems":"0"}","2021-03-01 15:21:00");
INSERT INTO tbl_stock_log VALUES("20","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":20,"SoldItems":3,"LessStock":0,"newAvailableStocks":17}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"20","SoldItems":"0"}","2021-03-01 15:25:00");
INSERT INTO tbl_stock_log VALUES("21","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":17,"SoldItems":10,"LessStock":0,"newAvailableStocks":10}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"17","SoldItems":"3"}","2021-03-01 15:25:08");
INSERT INTO tbl_stock_log VALUES("22","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":10,"SoldItems":20,"LessStock":0,"newAvailableStocks":0}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"10","SoldItems":"10"}","2021-03-01 15:25:14");
INSERT INTO tbl_stock_log VALUES("23","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":30,"AvailableItems":24,"SoldItems":9,"LessStock":0,"newAvailableStocks":21}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"30","AvailableItems":"24","SoldItems":"6"}","2021-03-01 15:25:25");
INSERT INTO tbl_stock_log VALUES("24","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":20,"AvailableItems":0,"SoldItems":20,"newStock":0,"newTotalStocks":30,"newAvailableItems":10}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"20","AvailableItems":"0","SoldItems":"20"}","2021-03-01 15:35:08");
INSERT INTO tbl_stock_log VALUES("25","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":30,"AvailableItems":10,"SoldItems":20,"newStock":0,"newTotalStocks":35,"newAvailableItems":15}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"30","AvailableItems":"10","SoldItems":"20"}","2021-03-01 15:35:27");
INSERT INTO tbl_stock_log VALUES("26","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":35,"AvailableItems":15,"SoldItems":20,"newStock":0,"newTotalStocks":40,"newAvailableItems":20}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"35","AvailableItems":"15","SoldItems":"20"}","2021-03-01 15:35:37");
INSERT INTO tbl_stock_log VALUES("27","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":40,"AvailableItems":20,"SoldItems":21,"LessStock":0,"newAvailableStocks":19}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"40","AvailableItems":"20","SoldItems":"20"}","2021-03-01 15:35:51");
INSERT INTO tbl_stock_log VALUES("28","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":40,"AvailableItems":19,"SoldItems":21,"newStock":0,"newTotalStocks":41,"newAvailableItems":21.2}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"40","AvailableItems":"19","SoldItems":"21"}","2021-03-01 15:37:57");
INSERT INTO tbl_stock_log VALUES("29","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":41,"AvailableItems":20,"SoldItems":21,"newStock":0,"newTotalStocks":42,"newAvailableItems":21}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"41","AvailableItems":"20","SoldItems":"21"}","2021-03-01 15:39:27");
INSERT INTO tbl_stock_log VALUES("30","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":42,"AvailableItems":21,"SoldItems":21,"newStock":0,"newTotalStocks":43,"newAvailableItems":43}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"42","AvailableItems":"21","SoldItems":"21"}","2021-03-01 15:39:43");
INSERT INTO tbl_stock_log VALUES("31","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":43,"AvailableItems":22,"SoldItems":21,"newStock":0,"newTotalStocks":44,"newAvailableItems":23}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"43","AvailableItems":"22","SoldItems":"21"}","2021-03-01 15:41:07");
INSERT INTO tbl_stock_log VALUES("32","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":44,"AvailableItems":23,"SoldItems":21,"newStock":0,"newTotalStocks":50,"newAvailableItems":29}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"44","AvailableItems":"23","SoldItems":"21"}","2021-03-01 15:41:39");
INSERT INTO tbl_stock_log VALUES("33","admin","Add Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":30,"AvailableItems":21,"SoldItems":9,"newStock":0,"newTotalStocks":50,"newAvailableItems":41}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"30","AvailableItems":"21","SoldItems":"9"}","2021-03-01 15:41:59");
INSERT INTO tbl_stock_log VALUES("34","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":41,"SoldItems":11,"LessStock":0,"newAvailableStocks":39}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"41","SoldItems":"9"}","2021-03-01 15:47:21");
INSERT INTO tbl_stock_log VALUES("35","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":39,"SoldItems":11,"LessStock":0,"newAvailableStocks":30}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"39","SoldItems":"11"}","2021-03-01 15:47:35");
INSERT INTO tbl_stock_log VALUES("36","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":32,"SoldItems":22,"LessStock":0,"newAvailableStocks":28}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"32","SoldItems":"18"}","2021-03-01 15:49:35");
INSERT INTO tbl_stock_log VALUES("37","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":28,"SoldItems":22,"LessStock":0,"newAvailableStocks":25}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"28","SoldItems":"22"}","2021-03-01 15:49:51");
INSERT INTO tbl_stock_log VALUES("38","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":25,"SoldItems":27,"LessStock":0,"newAvailableStocks":23}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"25","SoldItems":"25"}","2021-03-01 15:55:39");
INSERT INTO tbl_stock_log VALUES("39","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":23,"SoldItems":29,"LessStock":0,"newAvailableStocks":21}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"23","SoldItems":"27"}","2021-03-01 15:55:49");
INSERT INTO tbl_stock_log VALUES("40","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":21,"SoldItems":32,"LessStock":0,"newAvailableStocks":18}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"21","SoldItems":"29"}","2021-03-01 15:56:12");
INSERT INTO tbl_stock_log VALUES("41","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":18,"SoldItems":50,"LessStock":0,"newAvailableStocks":0}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"18","SoldItems":"32"}","2021-03-01 15:56:19");
INSERT INTO tbl_stock_log VALUES("42","admin","Add Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":0,"SoldItems":50,"newStock":0,"newTotalStocks":60,"newAvailableItems":10}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"0","SoldItems":"50"}","2021-03-01 15:56:25");
INSERT INTO tbl_stock_log VALUES("43","admin","Add Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":60,"AvailableItems":10,"SoldItems":50,"newStock":0,"newTotalStocks":65,"newAvailableItems":15}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"60","AvailableItems":"10","SoldItems":"50"}","2021-03-01 16:28:02");
INSERT INTO tbl_stock_log VALUES("44","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":65,"AvailableItems":15,"SoldItems":55,"LessStock":0,"newAvailableStocks":10}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"65","AvailableItems":"15","SoldItems":"50"}","2021-03-01 16:28:42");
INSERT INTO tbl_stock_log VALUES("45","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":65,"AvailableItems":10,"SoldItems":60,"LessStock":0,"newAvailableStocks":5}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"65","AvailableItems":"10","SoldItems":"55"}","2021-03-01 16:28:51");
INSERT INTO tbl_stock_log VALUES("46","admin","Add Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":65,"AvailableItems":5,"SoldItems":60,"newStock":0,"newTotalStocks":265,"newAvailableItems":205}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"65","AvailableItems":"5","SoldItems":"60"}","2021-03-02 11:27:54");
INSERT INTO tbl_stock_log VALUES("47","admin","Add Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":5,"AvailableItems":5,"SoldItems":0,"newStock":0,"newTotalStocks":17,"newAvailableItems":17}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"5","AvailableItems":"5","SoldItems":"0"}","2021-03-02 14:22:31");
INSERT INTO tbl_stock_log VALUES("48","admin","Add Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":17,"AvailableItems":17,"SoldItems":0,"newStock":0,"newTotalStocks":22,"newAvailableItems":22}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"17","AvailableItems":"17","SoldItems":"0"}","2021-03-02 14:22:35");
INSERT INTO tbl_stock_log VALUES("49","admin","Less Stock","{"ID":"3","BrandCategory":"iPhone","ModelName":"qwe","ModelPartCategory":"LCD","Stocks":22,"AvailableItems":22,"SoldItems":22,"LessStock":0,"newAvailableStocks":0}","{"ID":"3","BrandCategory":"iPhone","ModelName":"qwe","ModelPartCategory":"LCD","Stocks":"22","AvailableItems":"22","SoldItems":"0"}","2021-03-02 14:23:51");
INSERT INTO tbl_stock_log VALUES("50","admin","Less Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":22,"AvailableItems":22,"SoldItems":3,"LessStock":0,"newAvailableStocks":19}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"22","AvailableItems":"22","SoldItems":"0"}","2021-03-02 14:35:33");
INSERT INTO tbl_stock_log VALUES("51","admin","Add Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":22,"AvailableItems":19,"SoldItems":3,"newStock":0,"newTotalStocks":23,"newAvailableItems":20}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"22","AvailableItems":"19","SoldItems":"3"}","2021-03-02 14:37:07");
INSERT INTO tbl_stock_log VALUES("52","admin","Add Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":23,"AvailableItems":20,"SoldItems":3,"newStock":0,"newTotalStocks":24,"newAvailableItems":21}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"23","AvailableItems":"20","SoldItems":"3"}","2021-03-02 14:37:14");
INSERT INTO tbl_stock_log VALUES("53","admin","Less Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":24,"AvailableItems":21,"SoldItems":6,"LessStock":0,"newAvailableStocks":18}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"24","AvailableItems":"21","SoldItems":"3"}","2021-03-02 14:37:42");
INSERT INTO tbl_stock_log VALUES("54","admin","Add Stock","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":24,"AvailableItems":18,"SoldItems":6,"newStock":0,"newTotalStocks":30,"newAvailableItems":24}","{"ID":"4","BrandCategory":"iPhone","ModelName":"gsdfds","ModelPartCategory":"LCD","Stocks":"24","AvailableItems":"18","SoldItems":"6"}","2021-03-02 14:38:18");
INSERT INTO tbl_stock_log VALUES("55","admin","Add Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":50,"AvailableItems":30,"SoldItems":20,"newStock":0,"newTotalStocks":51,"newAvailableItems":31}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"50","AvailableItems":"30","SoldItems":"20"}","2021-03-02 14:38:59");
INSERT INTO tbl_stock_log VALUES("56","admin","Less Stock","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":51,"AvailableItems":31,"SoldItems":35,"LessStock":0,"newAvailableStocks":16}","{"ID":"1","BrandCategory":"iPhone","ModelName":"Iphone 5","ModelPartCategory":"LCD","Stocks":"51","AvailableItems":"31","SoldItems":"20"}","2021-03-02 14:39:55");
INSERT INTO tbl_stock_log VALUES("57","admin","Less Stock","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":265,"AvailableItems":205,"SoldItems":70,"LessStock":0,"newAvailableStocks":195}","{"ID":"2","BrandCategory":"Samsung","ModelName":"J7","ModelPartCategory":"LCD","Stocks":"265","AvailableItems":"205","SoldItems":"60"}","2021-03-02 14:40:04");
INSERT INTO tbl_stock_log VALUES("58","admin","Less Stock","{"ID":"5","BrandCategory":"iPhone","ModelName":"eqwe","ModelPartCategory":"LCD","Stocks":22,"AvailableItems":22,"SoldItems":17,"LessStock":0,"newAvailableStocks":5}","{"ID":"5","BrandCategory":"iPhone","ModelName":"eqwe","ModelPartCategory":"LCD","Stocks":"22","AvailableItems":"22","SoldItems":"0"}","2021-03-02 14:40:12");



CREATE TABLE `tbl_uploads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Data` text DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_uploads VALUES("1","Array");
INSERT INTO tbl_uploads VALUES("2","Array");
INSERT INTO tbl_uploads VALUES("3","Array");
INSERT INTO tbl_uploads VALUES("4","Array");
INSERT INTO tbl_uploads VALUES("5","Array");

