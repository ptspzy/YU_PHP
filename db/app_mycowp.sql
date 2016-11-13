-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 04 月 23 日 15:36
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_mycowp`
--

-- --------------------------------------------------------

--
-- 表的结构 `cp_temp`
--

CREATE TABLE IF NOT EXISTS `cp_temp` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(1000) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `time` datetime NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `cp_temp`
--

INSERT INTO `cp_temp` (`ID`, `url`, `title`, `time`, `note`) VALUES
(34, 'http://www.jikexueyuan.com/course/138.html', 'xcode使用技巧', '2015-10-24 11:03:00', '实用技巧'),
(29, 'http://www.imooc.com/article/1671', '高端唯有定制，把sublime打造成专属的IDE', '2015-10-21 09:33:05', 'sublime常用的插件'),
(33, 'http://www.tiobe.com/index.php/content/paperinfo/tpci/index.html', '编程语言排行', '2015-10-23 10:29:11', ''),
(32, 'http://ptspzy.com', '无', '2015-10-23 09:20:37', 'I:\\ptspzy\\BACKUP\\480_Backup\\pts\\PS\\a-ps素材\\pscs5教程数字艺术设计光盘\\Photoshop\\data\\视频\\基础知识'),
(31, 'http://www.awolau.com/hosts/google-hosts.html', 'Google hosts 2015 持续更新', '2015-10-22 07:29:45', '翻墙'),
(28, 'http://itellyou.cn/', '微软产品下载', '2015-10-21 08:37:59', '啦啦啦'),
(26, 'http://www.open-open.com/github/view/top', 'github热门项目排名', '2015-10-20 02:42:45', '不错的哦'),
(27, 'http://baike.baidu.com/link?url=B-5R5scTW3pay-JWBnjSlezS-cMwT-2B731qVuKuZvGv5qDVcOJhlCyZD991nf-MMlY66dyWmFIYhwPYhyz_Eq', '大明嘉靖往事', '2015-10-20 05:16:52', '不错的'),
(15, 'http://stackoverflow.com/questions/20760470/mysqlireal-connect-hy000-2005-unknown-mysql-server-host', 'mysqli::real_connect(): (HY000/2005): Unknown MySQL server host', '2015-10-16 10:54:20', 'mysqli与mysql连接主机有所不同'),
(16, 'http://group.mtime.com/duibai/discussion/171913/', '《老无所依》经典台词--个人版', '2015-10-16 03:01:05', '《老无所依》经典台词，不错的'),
(17, 'http://blog.csdn.net/jbb0523/article/details/42586749', '有关小波的几个术语及常见的小波基介绍', '2015-10-16 03:40:28', '对小波函数等的介绍'),
(21, 'http://pzy.iqiao.cc', '谯君梅是一只肥熊猫', '2015-10-17 01:41:28', '嘎嘎'),
(22, 'http://www.xiaopian.com/html/tv/hepai/20070328/720.html', '大明王朝1566(嘉靖与海瑞)', '2015-10-17 08:16:30', '下载地址'),
(23, 'https://github.com/justjavac/free-programming-books-zh_CN', '免费的编程中文书籍索引', '2015-10-17 08:25:05', '不错的编程书籍'),
(30, 'http://answers.microsoft.com/zh-hans/windows/forum/windows8_1-update/windows81/694d0ab6-1f2e-4481-94aa-203d6333b2a0?auth=1', '8.1', '2015-10-22 02:36:11', '修复电脑'),
(25, 'http://blog.csdn.net/yanhui_wei/article/details/8350880', 'PHP在线开发笔记', '2015-10-18 05:19:58', 'CSDN  php学习博客'),
(35, 'http://jingyan.baidu.com/article/3f16e003eac66e2591c103e0.html', '虚拟机安装mac 10.10', '2015-10-24 11:29:01', '不错'),
(36, 'http://www.webhek.com/', '骇客网', '2015-10-24 11:45:36', '不错的前端特效'),
(37, 'http://www.d1net.com/bigdata/news/345893.html ', '浅谈大数据（hadoop）和移动开发（Android、IOS）开发前景 ', '2015-10-25 01:10:01', '浅谈大数据（hadoop）和移动开发（Android、IOS）开发前景 '),
(38, 'http://blog.sina.cn/dpool/blog/s/blog_6ca360090100qd96.html?vt=4', '书籍推荐', '2015-10-27 02:29:15', '还不错吧'),
(39, 'http://www.2cto.com/kf/201405/299286.html', 'iOS 在 ARC 环境下 dealloc 的使用、理解误区', '2015-10-29 09:11:47', '初学'),
(40, 'http://pan.baidu.com/s/1ntqWb', '极客学院视频教程', '2015-10-30 10:12:14', '39w6'),
(41, 'http://wpchina.org/', 'wordpress中文网站', '2015-10-30 10:33:03', '之前没发现'),
(42, 'http://www.jikexueyuan.com/course/138.html', 'xcode使用技巧', '2015-10-24 11:03:00', '实用技巧'),
(69, 'http://blog.csdn.net/ppiao1970hank/article/details/6301812', ' WordPress数据库及各表结构', '2015-10-30 14:02:05', ''),
(65, 'http://blog.csdn.net/ppiao1970hank/article/details/6301812', 'WordPress数据库及各表结构', '2015-10-30 01:44:05', '');

-- --------------------------------------------------------

--
-- 表的结构 `cp_terms`
--

CREATE TABLE IF NOT EXISTS `cp_terms` (
  `term_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `term_time` datetime NOT NULL,
  `term_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `cp_terms`
--

INSERT INTO `cp_terms` (`term_id`, `name`, `term_time`, `term_count`) VALUES
(1, 'Uncategorized', '0000-00-00 00:00:00', 0),
(2, 'wordpress', '0000-00-00 00:00:00', 4),
(3, '教程视频', '0000-00-00 00:00:00', 0),
(4, 'IOS', '0000-00-00 00:00:00', 3),
(5, '下载推荐', '0000-00-00 00:00:00', 0),
(6, 'web前端', '0000-00-00 00:00:00', 1),
(7, '所谓的历史', '0000-00-00 00:00:00', 1),
(8, '不错的博客', '0000-00-00 00:00:00', 0),
(9, '雪姐推荐', '0000-00-00 00:00:00', 0),
(10, '工具', '0000-00-00 00:00:00', 2),
(11, 'IT文章', '0000-00-00 00:00:00', 0),
(12, '所谓的艺术', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `cp_urls`
--

CREATE TABLE IF NOT EXISTS `cp_urls` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `term_id` int(20) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `time` datetime NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `cp_urls`
--

INSERT INTO `cp_urls` (`ID`, `user_id`, `term_id`, `url`, `title`, `time`, `note`, `count`) VALUES
(34, 2, 4, 'http://www.jikexueyuan.com/course/138.html', 'xcode使用技巧', '2015-10-24 11:03:00', '实用技巧', 0),
(29, 2, 10, 'http://www.imooc.com/article/1671', '高端唯有定制，把sublime打造成专属的IDE', '2015-10-21 09:33:05', 'sublime常用的插件', 1),
(33, 2, 11, 'http://www.tiobe.com/index.php/content/paperinfo/tpci/index.html', '编程语言排行', '2015-10-23 10:29:11', '', 0),
(32, 2, 1, 'http://ptspzy.com', '无', '2015-10-23 09:20:37', 'I:\\ptspzy\\BACKUP\\480_Backup\\pts\\PS\\a-ps素材\\pscs5教程数字艺术设计光盘\\Photoshop\\data\\视频\\基础知识', 0),
(31, 2, 10, 'http://www.awolau.com/hosts/google-hosts.html', 'Google hosts 2015 持续更新', '2015-10-22 07:29:45', '翻墙', 2),
(28, 2, 5, 'http://itellyou.cn/', '微软产品下载', '2015-10-21 08:37:59', '啦啦啦', 0),
(26, 2, 10, 'http://www.open-open.com/github/view/top', 'github热门项目排名', '2015-10-20 02:42:45', '不错的哦', 0),
(27, 2, 7, 'http://baike.baidu.com/link?url=B-5R5scTW3pay-JWBnjSlezS-cMwT-2B731qVuKuZvGv5qDVcOJhlCyZD991nf-MMlY66dyWmFIYhwPYhyz_Eq', '大明嘉靖往事', '2015-10-20 05:16:52', '不错的', 1),
(15, 2, 1, 'http://stackoverflow.com/questions/20760470/mysqlireal-connect-hy000-2005-unknown-mysql-server-host', 'mysqli::real_connect(): (HY000/2005): Unknown MySQL server host', '2015-10-16 10:54:20', 'mysqli与mysql连接主机有所不同', 0),
(16, 2, 12, 'http://group.mtime.com/duibai/discussion/171913/', '《老无所依》经典台词--个人版', '2015-10-16 03:01:05', '《老无所依》经典台词，不错的', 0),
(17, 2, 11, 'http://blog.csdn.net/jbb0523/article/details/42586749', '有关小波的几个术语及常见的小波基介绍', '2015-10-16 03:40:28', '对小波函数等的介绍', 0),
(21, 2, 1, 'http://pzy.iqiao.cc', '谯君梅是一只肥熊猫', '2015-10-17 01:41:28', '嘎嘎', 0),
(22, 2, 7, 'http://www.xiaopian.com/html/tv/hepai/20070328/720.html', '大明王朝1566(嘉靖与海瑞)', '2015-10-17 08:16:30', '下载地址', 0),
(23, 2, 3, 'https://github.com/justjavac/free-programming-books-zh_CN', '免费的编程中文书籍索引', '2015-10-17 08:25:05', '不错的编程书籍', 0),
(30, 2, 1, 'http://answers.microsoft.com/zh-hans/windows/forum/windows8_1-update/windows81/694d0ab6-1f2e-4481-94aa-203d6333b2a0?auth=1', '8.1', '2015-10-22 02:36:11', '修复电脑', 0),
(25, 2, 8, 'http://blog.csdn.net/yanhui_wei/article/details/8350880', 'PHP在线开发笔记', '2015-10-18 05:19:58', 'CSDN  php学习博客', 0),
(35, 2, 4, 'http://jingyan.baidu.com/article/3f16e003eac66e2591c103e0.html', '虚拟机安装mac 10.10', '2015-10-24 11:29:01', '不错', 1),
(36, 2, 6, 'http://www.webhek.com/', '骇客网', '2015-10-24 11:45:36', '不错的前端特效', 1),
(37, 2, 11, 'http://www.d1net.com/bigdata/news/345893.html ', '浅谈大数据（hadoop）和移动开发（Android、IOS）开发前景 ', '2015-10-25 01:10:01', '浅谈大数据（hadoop）和移动开发（Android、IOS）开发前景 ', 0),
(38, 2, 3, 'http://blog.sina.cn/dpool/blog/s/blog_6ca360090100qd96.html?vt=4', '书籍推荐', '2015-10-27 02:29:15', '还不错吧', 0),
(39, 2, 4, 'http://www.2cto.com/kf/201405/299286.html', 'iOS 在 ARC 环境下 dealloc 的使用、理解误区', '2015-10-29 09:11:47', '初学', 2),
(40, 2, 3, 'http://pan.baidu.com/s/1ntqWb', '极客学院视频教程', '2015-10-30 10:12:14', '39w6', 0),
(41, 2, 2, 'http://wpchina.org/', 'wordpress中文网站', '2015-10-30 10:33:03', '之前没发现', 0),
(42, 2, 4, 'http://www.jikexueyuan.com/course/138.html', 'xcode使用技巧', '2015-10-24 11:03:00', '实用技巧', 0),
(69, 2, 2, 'http://blog.csdn.net/ppiao1970hank/article/details/6301812', ' WordPress数据库及各表结构', '2015-10-30 14:02:05', '', 4),
(80, 2, 6, 'http://www.karmaffne.com/#FlooringandWallCovering', 'fullpage 的一个网站', '2015-11-04 05:09:04', 'fullpage.js 不错的效果', 0),
(79, 2, 10, 'http://www.jb51.net/tools/editplus/', 'editplus破解', '2015-11-04 04:21:49', '可以用', 0),
(81, 2, 6, 'http://www.cnblogs.com/shanyou/archive/2011/07/11/2103422.html', 'jQuery操作Select', '2015-11-04 11:59:19', '无', 0),
(82, 2, 6, 'http://www.zhihu.com/question/19862294', '如何帮助前端新人入门和提高？', '2015-11-05 12:06:31', '第59个不错', 0);

-- --------------------------------------------------------

--
-- 表的结构 `cp_users`
--

CREATE TABLE IF NOT EXISTS `cp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cp_users`
--

INSERT INTO `cp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_registered`, `user_status`) VALUES
(2, 'ptspzy', 'qwer', 'qwer', 'ptspzy@126.com', '2015-10-30 00:00:00', 0);
