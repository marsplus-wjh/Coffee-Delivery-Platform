-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-19 08:23:00
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tacoffee`
--

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `gid` int(11) NOT NULL,
  `candy` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `cold` tinyint(4) NOT NULL,
  `num` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`id`, `uid`, `phone`, `name`, `gid`, `candy`, `status`, `cold`, `num`, `time`) VALUES
(2, 6, 1, '1', 9, 1, 0, 1, 1, '2016-06-24 00:00:00'),
(3, 6, 1, '1', 9, 1, 1, 2, 3, '2016-06-22 00:00:00'),
(4, 6, 1, '1', 9, 1, 1, 1, 2, '2016-06-15 00:00:00'),
(5, 6, 1, '1', 9, 3, 0, 2, 1, '2016-06-15 00:00:00'),
(6, 6, 1, '1', 9, 1, 0, 1, 2, '2016-06-22 00:00:00'),
(7, 6, 18345151815, 'whatyouthink', 9, 2, 0, 2, 5, '2016-06-06 22:57:51'),
(8, 6, 3, '2', 9, 2, 0, 0, 2, '2016-06-06 23:06:00'),
(9, 11, 12345, '蛤蛤', 10, 2, 0, 1, 2, '2016-06-07 19:16:09'),
(10, 11, 1, '1', 13, 4, 0, 2, 2, '2016-06-07 19:16:44'),
(11, 12, 1, '1', 12, 3, 0, 2, 12, '2016-06-07 19:20:50'),
(12, 12, 1, '1', 11, 1, 0, 1, 11, '2016-06-07 19:26:21'),
(13, 12, 2, '1', 12, 2, 0, 0, 1, '2016-06-07 19:26:37'),
(14, 6, 123456, 'whatyouthink', 18, 1, 0, 2, 1, '2016-06-14 10:12:03');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL,
  `goodsname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goodsname`, `price`, `describe`, `pic`, `time`) VALUES
(7, '馥内白', 120, '夏日大作战', '575569a209118.jpg', '2016-06-14 09:40:23'),
(9, '黑糖玛奇朵', 60, '夏日大作战', '575569b8f0948.jpg', '2016-06-13 00:00:00'),
(10, '抹茶拿铁', 70, '夏日大作战', '575569cb940b8.jpg', '2016-06-14 09:40:41'),
(11, '浓郁咖啡摩卡', 40, '夏日大作战', '575569f57c681.jpg', '2016-06-14 09:40:54'),
(12, '抹茶星冰乐', 50, '夏日大作战', '57556a0e5aea1.jpg', '2016-06-14 09:41:09'),
(13, '焦糖浓缩咖啡星冰乐', 20, '夏日大作战', '57556a1cdf571.jpg', '2016-06-14 09:41:34'),
(14, '榛果风味拿铁', 40, '夏日大作战', '57556a308346b.jpg', '2016-06-14 09:41:52'),
(16, '星巴克冰淇淋', 80, '夏日大作战', '575f61234b32f.png', '2016-06-14 09:42:59'),
(17, '星冰粽', 30, '粽子', '575f6143a4e7c.png', '2016-06-14 09:43:31'),
(18, '美式咖啡', 50, '咖啡', '575f6159800a8.png', '2016-06-14 09:43:53'),
(19, '冰淇淋', 120, '冰淇淋', '575f6a7268f22.png', '2016-06-14 10:22:42');

-- --------------------------------------------------------

--
-- 表的结构 `use`
--

CREATE TABLE IF NOT EXISTS `use` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `kind` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(18) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `use`
--

INSERT INTO `use` (`id`, `username`, `password`, `kind`, `name`, `phone`) VALUES
(1, 'admin', 'tacoffee', 0, '', 0),
(7, 'test', '123456', 1, '蛤蛤', 18345151815),
(6, 'whatyouthink', '123456', 1, 'hai', 123456),
(5, '1', '1', 1, '1', 1),
(8, 'zerox', '123456', 1, '蛤蛤', 18345151815),
(9, 'haha', '123456', 1, '123', 12345),
(10, 'oyo', '123456', 1, '123', 111),
(11, 'justtest', '123456', 1, '哈哈', 12345),
(12, 'zero-x', '123456', 1, '123', 123456),
(13, '123', '123', 1, '123', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use`
--
ALTER TABLE `use`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `use`
--
ALTER TABLE `use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
