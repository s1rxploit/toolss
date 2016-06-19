<?php
$host = "localhost";         //server mysql default pada cpanel : localhost
$username = "tr564675_rintoar"; //user database mysql
$password = "rinto1233";  //password database mysql
$dbname = "tr564675_rintoar"; //nama database mysql
mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `api` ( `api` varchar(32) NOT NULL, `author` varchar(32) NOT NULL, `status` varchar(32) NOT NULL, `date` varchar(255), PRIMARY KEY (`api`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `invitecode` ( `Num` varchar(32) NOT NULL, `Author` varchar(32) NOT NULL, `Registered` varchar(32) NOT NULL, `Date` varchar(255), `Regby` varchar(255) NOT NULL, PRIMARY KEY (`Num`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `invitecodepaid` ( `Num` varchar(32) NOT NULL, `Author` varchar(32) NOT NULL, `Registered` varchar(32) NOT NULL, `Date` varchar(255), `Regby` varchar(255) NOT NULL, PRIMARY KEY (`Num`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `invitecodeforpaid` ( `Num` varchar(32) NOT NULL, `Author` varchar(32) NOT NULL, `Registered` varchar(32) NOT NULL, `Date` varchar(255), `Regby` varchar(255) NOT NULL, PRIMARY KEY (`Num`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `giftcode` ( `num` varchar(32) NOT NULL, `author` varchar(32) NOT NULL, `amount` varchar(32) NOT NULL, `registered` varchar(32) NOT NULL, `date` varchar(255), `regby` varchar(255) NOT NULL, PRIMARY KEY (`num`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `orders` ( `id` varchar(32) NOT NULL, `email` varchar(32) NOT NULL, `amount` varchar(32) NOT NULL, `credit` varchar(32) NOT NULL,  `payment` varchar(255) NOT NULL, `date` varchar(255), PRIMARY KEY (`id`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `user` (`email` varchar(32) NOT NULL, `password` varchar(255) NOT NULL, `credits` varchar(255) NOT NULL, `banned` varchar(255) NOT NULL, `admin` varchar(255) NOT NULL, `regby` varchar(32) NOT NULL, `invitecode` varchar(255) NOT NULL, PRIMARY KEY (`email`) ) ENGINE=MyISAM DEFAULT CHARSET=utf8");
mysql_query("CREATE TABLE IF NOT EXISTS `news`( `id` int(5) NOT NULL auto_increment,`message` varchar(300) NOT NULL, `date` varchar(300) NOT NULL, PRIMARY KEY (`id`)  ) ENGINE=MyISAM DEFAULT CHARSET=utf8");



?>