CREATE DATABASE IF NOT EXISTS `meilizhubo`;
use meilizhubo;
--
-- Table structure for table `zhubo`
--

/*DROP TABLE IF EXISTS `User`;*/
CREATE TABLE IF NOT EXISTS `User` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `register_time` datetime
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the user';

DROP TABLE IF EXISTS `ShowSite`;
CREATE TABLE IF NOT EXISTS `ShowSite` (
  `id` tinyint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `weight` float DEFAULT 0
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the show site';

DROP TABLE IF EXISTS `zhubo`;
CREATE TABLE IF NOT EXISTS `zhubo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `local_id` int unsigned DEFAULT NULL,
  `url` varchar(64) ,
  `name` varchar(64) ,
  `head_img` varchar(128),
  `site_id` tinyint,
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
  `photos` mediumtext,
  primary key(id),
  foreign key (site_id) references ShowSite(id)
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the zhubo';

/*ALTER TABLE zhubo ADD CONSTRAINT fk_site_id
FOREIGN KEY (site_id)
REFERENCES ShowSite(id)
ON UPDATE CASCADE;*/

/*DROP TABLE IF EXISTS `Tag`;*/
CREATE TABLE IF NOT EXISTS `Tag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64),
  `class_1` varchar(32),
  `class_2` varchar(32)
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the tag';

/*DROP TABLE IF EXISTS `ZhuboTag`;*/
CREATE TABLE IF NOT EXISTS `ZhuboTag` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tag_id` int unsigned,
  `zhubo_id` int unsigned,
  `user_id` int unsigned,
  `tag_time` datetime,
  foreign key (tag_id) references Tag(id),
  foreign key (zhubo_id) references zhubo(id),
  foreign key (user_id) references User(id)
)
ENGINE=InnoDB,
DEFAULT CHARSET=utf8,
COMMENT = 'the pm add tag to zhubo';
