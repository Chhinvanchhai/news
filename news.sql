/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB : Database - news
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`news` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `news`;

/*Table structure for table `tblcategory` */

DROP TABLE IF EXISTS `tblcategory`;

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tblcategory` */

insert  into `tblcategory`(`id`,`CategoryName`,`Description`,`PostingDate`,`UpdationDate`,`Is_Active`) values 
(8,'Information  Technology','Relate with technology','2020-08-13 15:46:17',NULL,1),
(9,'Enterainment','Well','2020-10-08 21:17:54',NULL,1),
(10,'Sport','sport descript','2020-10-08 21:18:27',NULL,1),
(11,'Sciences','Well','2020-10-08 21:59:22',NULL,1);

/*Table structure for table `tblcomments` */

DROP TABLE IF EXISTS `tblcomments`;

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tblcomments` */

insert  into `tblcomments`(`id`,`postId`,`name`,`email`,`comment`,`postingDate`,`status`) values 
(2,'12','Test user','test@gmail.com','This is sample text for testing.','2018-11-21 18:25:56',1),
(3,'7','ABC','abc@test.com','This is sample text for testing.','2018-11-21 18:27:06',1),
(4,'10','Chhin vanchhai','vanchhai@gmail.com','test','2020-07-25 17:39:07',1),
(5,'24','Chhin vanchhai','chhai@gmail.com','goode','2020-08-08 13:03:41',1),
(6,'11','Vanchhai','chhai@gmail.com','Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeeping','2020-08-16 12:02:39',1),
(7,'32','Good','chhai@gmail.com','Well tutorial\r\nYou will need some JavaScript knowledge to be able to follow this tutorial. Knowledge about some backend ','2020-10-08 22:17:05',1),
(8,'29','Chhin vanchhai','chhinvangchay@yahoo.com','Well documentary','2020-10-08 22:18:01',0);

/*Table structure for table `tblpages` */

DROP TABLE IF EXISTS `tblpages`;

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblpages` */

insert  into `tblpages`(`id`,`PageName`,`PageTitle`,`Description`,`PostingDate`,`UpdationDate`) values 
(1,'aboutus','About News ','<div style=\"text-align: center;\"><font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">The best of news website that you can link you life to the world.</span></font></div><div style=\"text-align: left;\"><font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">&nbsp; &nbsp;</span></font><font face=\"Arial\">In the 2020 technology have reached to new level of innovation. That why we create create the website for make you life more easy, and discover the world by you finger. The site will provide you of variety of news such technology, entertainment, movies, sport and so on.</font></div><div style=\"text-align: left;\"><font face=\"Arial\">&nbsp;.....&nbsp;</font></div>','2020-10-04 21:21:34','2020-10-08 21:21:42'),
(2,'contactus','Contact Details','<p><br></p><p><b>Address :&nbsp; </b>Mekong Universtiy</p><p><b>Phone Number : </b>16283621</p><p><b>Email -id :</b> chhai@gmail.com</p>','2018-07-01 01:01:36','2020-08-08 12:47:18');

/*Table structure for table `tblposts` */

DROP TABLE IF EXISTS `tblposts`;

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` blob DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `featureText` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `tblposts` */

insert  into `tblposts`(`id`,`PostTitle`,`CategoryId`,`SubCategoryId`,`PostDetails`,`PostingDate`,`UpdationDate`,`Is_Active`,`PostUrl`,`PostImage`,`featureText`) values 
(26,'Albert Estien',11,16,'<p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching.</span></p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/CRybfpQSfn8?start=316\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching</span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching</span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching</span></p><hr><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching</span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span></p>','2020-10-08 21:46:58','2020-10-08 22:12:41',1,'Albert-Estien','a752f2424f9d3f08a2849912d287b057.jpg','The son of a salesman who later operated an electrochemical factory, Einstein was born in the German Empire but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching'),
(27,'Test me',9,12,'Good','2020-10-08 21:47:00',NULL,1,'Test-me','9f3520ffbf142f144aa7d84071d63e6e.jpg','good'),
(28,'Foodball 2020',10,14,'<p>Good</p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/kjNcnqj8vmg\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p>','2020-10-08 21:47:22','2020-10-08 21:56:54',1,'Foodball-2020','1a4e9ade8407f3700eec949054e861bb.jpg','good'),
(29,'Wild Life',9,12,'<p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/-o2o91UIjPk?start=410\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe></p><p>The tiger (Panthera tigris) is the largest extant cat species and a member of the genus Panthera.&nbsp;</p><p>The tiger (Panthera tigris) is the largest extant cat species and a member of the genus Panthera.&nbsp;</p><p>The tiger (Panthera tigris) is the largest extant cat species and a member of the genus Panthera.&nbsp;<br></p>','2020-10-08 21:48:17','2020-10-08 21:54:14',1,'Wild-Life','9f3520ffbf142f144aa7d84071d63e6e.jpg','The tiger (Panthera tigris) is the largest extant cat species and a member of the genus Panthera. '),
(30,'Nature',9,12,'<p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/PwwuYp5vVPI\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching.</span></p><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching.</span></p><hr><p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">The son of a salesman who later operated an electrochemical factory, Einstein was born in the&nbsp;</span><a href=\"https://en.wikipedia.org/wiki/German_Empire\" title=\"German Empire\" style=\"color: rgb(11, 0, 128); background: none rgb(255, 255, 255); font-family: sans-serif;\">German Empire</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\">&nbsp;but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching.</span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span><span style=\"color: rgb(32, 33, 34); font-family: sans-serif;\"><br></span><br></p>','2020-10-08 22:06:18','2020-10-08 22:07:06',1,'Nature','b60a97b147bc589fc3a8fd285cf4cfbd.jpg','nature now are go The son of a salesman who later operated an electrochemical factory, Einstein was born in the German Empire but moved to Switzerland in 1895 and renounced his German citizenship in 1896. Specializing in physics and mathematics, he received his academic teaching.'),
(31,'Dynamodb',8,10,'<p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">DynamoDB is a fully-managed NoSQL database service designed to deliver fast and predictable performance. It uses the Dynamo model in the essence of its design, and improves those features. It began as a way to manage website scalability challenges presented by the holiday season load.</p><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">This tutorial introduces you to key DynamoDB concepts necessary for creating and deploying a highly-scalable and performance-focused database.</p><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">Before using DynamoDB, you must familiarize yourself with its basic components and ecosystem. In the DynamoDB ecosystem, you work with tables, attributes, and items. A table holds sets of items, and items hold sets of attributes. An attribute is a fundamental element of data requiring no further decomposition, i.e., a field.</p><h2 style=\"margin-top: 1.25rem; margin-bottom: 0.625rem; font-size: 23px; line-height: 2rem; color: rgba(0, 0, 0, 0.87); font-family: Arial, Verdana, Tahoma;\">Primary Key</h2><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">The Primary Keys serve as the means of unique identification for table items, and secondary indexes provide query flexibility. DynamoDB streams record events by modifying the table data.</p><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">The Table Creation requires not only setting a name, but also the primary key; which identifies table items. No two items share a key. DynamoDB uses two types of primary keys</p><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\"></p>','2020-10-08 22:08:41','2020-10-08 22:11:50',1,'Dynamodb','604a383e93e41fd8b5d0f2ca285a3ae2.png','DynamoDB is a fully-managed NoSQL database service designed to deliver fast and predictable performance. It uses the Dynamo model in the essence of its design, and improves those features. It began as a way to manage website scalability challenges presented by the holiday season load.\r\nThis tutorial introduces you to key DynamoDB concepts necessary for creating and deploying a highly-scalable and performance-focused database.'),
(32,'Firebase is a backend platform for building Web, Android and IOS applications.',8,11,'<p><br></p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/jm66TSlVtcc?start=185\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br></p><p><span style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, Tahoma; font-size: 16px; text-align: justify;\">Firebase is a backend platform for building Web, Android and IOS applications. It offers real time database, different APIs, multiple authentication types and hosting platform. This is an introductory tutorial, which covers the basics of the Firebase platform and explains how to deal with its various components and sub-components</span></p><h1 style=\"font-size: 28px; margin-top: 0px; margin-bottom: 0px; line-height: 24px; text-align: center; color: rgb(121, 121, 121); font-family: Arial, Verdana, Tahoma; padding: 35px 0px 20px !important;\">Audience</h1><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">This tutorial is directed towards developers in need for a simple, user-friendly backend platform. After you finish this tutorial, you will be familiar with the Firebase Web Platform. You can also use this as a reference in your future development.</p><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">This tutorial is intended to make you comfortable in getting started with the Firebase backend platform and its various functions.</p><h1 style=\"font-size: 28px; margin-top: 0px; margin-bottom: 0px; line-height: 24px; text-align: center; color: rgb(121, 121, 121); font-family: Arial, Verdana, Tahoma; padding: 35px 0px 20px !important;\">Prerequisites</h1><p style=\"margin: 0.5em 0.2em 0.6em; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-size: 16px; font-family: Arial, Verdana, Tahoma;\">You will need some JavaScript knowledge to be able to follow this tutorial. Knowledge about some backend platform is not necessary, but it could help you to understand the various Firebase concepts.</p><p><br></p>','2020-10-08 22:15:10','2020-10-08 22:16:18',1,'Firebase-is-a-backend-platform-for-building-Web,-Android-and-IOS-applications.','5017a38035f48029213844b30ee39d76.png','Firebase is a backend platform for building Web, Android and IOS applications. It offers real time database, different APIs, multiple authentication types and hosting platform. This is an introductory tutorial, which covers the basics of the Firebase platform and explains how to deal with its various components and sub-components');

/*Table structure for table `tblsubcategory` */

DROP TABLE IF EXISTS `tblsubcategory`;

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`SubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tblsubcategory` */

insert  into `tblsubcategory`(`SubCategoryId`,`CategoryId`,`Subcategory`,`SubCatDescription`,`PostingDate`,`UpdationDate`,`Is_Active`) values 
(10,8,'Java','Java','2020-08-13 15:46:48',NULL,1),
(11,8,'Javascript','javascript','2020-08-13 15:47:06',NULL,1),
(12,9,'Video','collect of video','2020-10-08 21:19:23',NULL,1),
(13,9,'Comedy','comende','2020-10-08 21:19:44',NULL,1),
(14,10,'Football','dd','2020-10-08 21:20:00',NULL,1),
(15,10,'Game','Good','2020-10-08 21:20:11',NULL,1),
(16,11,'Top Sciences','Top','2020-10-08 21:59:45',NULL,1),
(17,11,'Current Sciences','2020','2020-10-08 22:00:22',NULL,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`is_active`,`created_at`,`updated_at`,`type`,`image`) values 
(5,'test','123','',0,'2020-08-11 18:34:57',NULL,'creator','cat.jpg20200811.jpg'),
(6,'admin','12345','',0,'2020-08-11 18:51:22',NULL,'admin','chhai2.PNG20200811.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
