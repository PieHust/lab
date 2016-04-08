-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-08 04:48:12
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlab`
--

-- --------------------------------------------------------

--
-- 表的结构 `lab_admin`
--

CREATE TABLE `lab_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `logintime` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `lock` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lab_admin_role`
--

CREATE TABLE `lab_admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lab_info`
--

CREATE TABLE `lab_info` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `pic` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `lab_info`
--

INSERT INTO `lab_info` (`id`, `date`, `content`, `pic`) VALUES
(1, 1458560305, '<p>华中科技</p>', './Public/Uploads/2016-03-21/1458560317.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `lab_news`
--

CREATE TABLE `lab_news` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_bin NOT NULL,
  `date` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `pic` mediumtext COLLATE utf8_bin NOT NULL,
  `tag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `lab_news`
--

INSERT INTO `lab_news` (`id`, `class_id`, `title`, `date`, `content`, `pic`, `tag`) VALUES
(1, 1, '测试新闻', 1458560976, '<p>测试新闻</p>', './Public/Uploads/2016-03-21/1458560976.jpg', 0),
(2, 1, '我是测试新闻2', 1458561795, '', './Public/Uploads/2016-03-21/1458561795.jpg', 0),
(3, 1, '测试新闻3', 1458561843, '<p>见谅见谅</p>', './Public/Uploads/2016-03-21/1458561843.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lab_news_class`
--

CREATE TABLE `lab_news_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `lab_news_class`
--

INSERT INTO `lab_news_class` (`id`, `class_name`) VALUES
(1, '新闻资讯'),
(2, '通知公告');

-- --------------------------------------------------------

--
-- 表的结构 `lab_node`
--

CREATE TABLE `lab_node` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `url` varchar(200) NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lab_role`
--

CREATE TABLE `lab_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lab_role_node`
--

CREATE TABLE `lab_role_node` (
  `role_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `lab_show`
--

CREATE TABLE `lab_show` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `url` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `lab_show`
--

INSERT INTO `lab_show` (`id`, `class_id`, `title`, `url`) VALUES
(3, 1, '我是测试成果3', 'Public/Uploads/1458558799/index'),
(4, 2, '我是测试结果4', 'Public/Uploads/1458559519/index');

-- --------------------------------------------------------

--
-- 表的结构 `lab_show_class`
--

CREATE TABLE `lab_show_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `lab_show_class`
--

INSERT INTO `lab_show_class` (`id`, `class_name`) VALUES
(1, '课题组'),
(2, '研究成果');

-- --------------------------------------------------------

--
-- 表的结构 `lab_user`
--

CREATE TABLE `lab_user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_admin`
--
ALTER TABLE `lab_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_info`
--
ALTER TABLE `lab_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_news`
--
ALTER TABLE `lab_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_news_class`
--
ALTER TABLE `lab_news_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_node`
--
ALTER TABLE `lab_node`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_role`
--
ALTER TABLE `lab_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_show`
--
ALTER TABLE `lab_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_show_class`
--
ALTER TABLE `lab_show_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_user`
--
ALTER TABLE `lab_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `lab_admin`
--
ALTER TABLE `lab_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `lab_info`
--
ALTER TABLE `lab_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `lab_news`
--
ALTER TABLE `lab_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `lab_news_class`
--
ALTER TABLE `lab_news_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `lab_node`
--
ALTER TABLE `lab_node`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `lab_role`
--
ALTER TABLE `lab_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `lab_show`
--
ALTER TABLE `lab_show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `lab_show_class`
--
ALTER TABLE `lab_show_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `lab_user`
--
ALTER TABLE `lab_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
