SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `User ID` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-----------------------------------------------------------

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(4) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `num_comments` int(100) NOT NULL,
  `time_created` datetime NOT NULL,
  PRIMARY KEY (`topic_id`),
  FOREIGN KEY (`created_by`) REFERENCES user_info(`user_id`) ON UPDATE CASCADE,
  KEY `Topic ID` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-----------------------------------------------------------

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(4) NOT NULL AUTO_INCREMENT,
  `topic_id` int(4) NOT NULL,
  `posted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `time_posted` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  FOREIGN KEY (`posted_by`) REFERENCES user_info(`user_id`) ON UPDATE CASCADE,
  KEY `Comment ID` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-----------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;
DROP TABLE IF NOT EXISTS `rooms`(
  `room_id` int(4) NOT NULL AUTO_INCREMENT,
  `room_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `time_created`datetime NOT NULL,
  PRIMARY KEY (`room_id`),
  FOREIGN KEY (`create_by`) REFERENCES user_info(`user_id`) ON UPDATE CASCADE,
  KEY `Room ID` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-----------------------------------------------------------

DROP TABLE IF EXISTS `chat`;
DROP TABLE IF NOT EXISTS `chat`(
  `chat_id` int(4) NOT NULL AUTO_INCREMENT,
  `posted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `time_posted` datetime NOT NULL,
  `message` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`chat_id`),
  FOREIGN KEY (`posted_by`) REFERENCES user_info(`user_id`),
  KEY `Chat ID` (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
