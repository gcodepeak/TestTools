CREATE DATABASE IF NOT EXISTS `meilizhubo`;
use meilizhubo;
--
-- Table structure for table `zhubo`
--

DROP TABLE IF EXISTS `zhubo`;
CREATE TABLE IF NOT EXISTS `zhubo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `local_id` int unsigned DEFAULT NULL,
  `url` varchar(64) ,
  `name` varchar(64) ,
  `head_img` varchar(128),
  `site_id` tinyint ,
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
  `tags` varchar(128) ,
  `news_num` int unsigned ,
  `news_photo_num` int unsigned ,
  `is_live` tinyint ,
  `last_live_time` datetime ,
  `photos` mediumtext 
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the zhubo';
