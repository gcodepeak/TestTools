CREATE DATABASE IF NOT EXISTS `meilizhubo`;
use meilizhubo;
--
-- Table structure for table `zhubo`
--

/*DROP TABLE IF EXISTS `user`;*/
CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(64),
  `password` varchar(64),
  `register_time` datetime,
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the user';

/*DROP TABLE IF EXISTS `zhubo`;*/
CREATE TABLE IF NOT EXISTS `zhubo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `local_id` int unsigned DEFAULT NULL,
  `url` varchar(64) ,
  `name` varchar(64) ,
  `head_img` varchar(128),
  `site_name` varchar(64),
  `level` tinyint ,
  `wealth_level` tinyint ,
  `time_level` tinyint ,
  `sex` tinyint ,
  `region` varchar(32) ,
  `familys` varchar(128) ,
  `constellation` varchar(16) ,
  `age` tinyint unsigned ,
  `hots` int unsigned ,
  `fans` int unsigned ,
  `orignal_tags` varchar(128) ,
  `news_num` int unsigned ,
  `news_photo_num` int unsigned ,
  `is_live` tinyint ,
  `last_live_time` datetime ,
  `photos` mediumtext 
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the zhubo';

/*DROP TABLE IF EXISTS `tag`;*/
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tag_name` varchar(64),
  `class_1` varchar(32),
  `class_2` varchar(32),
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the tag';

/*DROP TABLE IF EXISTS `zhubo_tag`;*/
CREATE TABLE IF NOT EXISTS `zhubo_tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tag_id` int unsigned,
  `zhubo_id` int unsigned,
  `user_id` int unsigned,
  `tag_time` datetime,
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the zhubo_tag';
