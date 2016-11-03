-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 08 2016 г., 11:13
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dwmvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `title`, `url`) VALUES
(1, 'Новости', '/news'),
(2, 'Общий', '/common');

-- --------------------------------------------------------

--
-- Структура таблицы `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `thread`
--

INSERT INTO `thread` (`id`, `section_name`, `section_id`, `type`, `title`, `text`) VALUES
(1, 'news', 1, 0, 'Первая новость', 'новост раз раз'),
(2, 'news', 1, 0, 'Вторая новость', 'фвлдофлдыв'),
(3, '', 2, 0, 'Общие вопросы', 'По игре'),
(4, '', 2, 0, 'Еще фигня', 'выываыва');

-- --------------------------------------------------------

--
-- Структура таблицы `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `type` enum('topic','reply','','') NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `user` varchar(256) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Дамп данных таблицы `threads`
--

INSERT INTO `threads` (`id`, `mid`, `fid`, `type`, `title`, `text`, `user`, `date`) VALUES
(1, 0, 1, 'topic', 'Первая новость', 'Текст первой новости', '1', '25/11, 05:04'),
(2, 1, 0, 'reply', '', 'Респект', '1', '25/11, 05:04'),
(3, 0, 1, 'topic', 'Вторая новость', 'Текст', '1', '25/11, 05:04'),
(4, 3, 0, 'reply', '', 'Отвечаю', '1', '25/11, 05:04'),
(5, 0, 3, 'topic', '123', '321', 'admin', '25/11, 05:04'),
(6, 0, 2, 'topic', 'Правила общего форума', 'Первое правило', '1', '25/11, 05:04'),
(7, 1, 0, 'reply', '', 'ва', '1', '25/11, 05:04'),
(8, 1, 0, 'reply', '', 'ваыва', '1', '25/11, 05:04'),
(9, 0, 1, 'topic', 'ыва', 'ыва', '1', '25/11, 05:04'),
(10, 0, 1, 'topic', 'еув', 'еу', '1', '25/11, 05:04'),
(11, 10, 0, 'reply', '', 'увку', '1', '25/11, 05:04'),
(12, 10, 0, 'reply', '', '345', '1', '25/11, 05:04'),
(13, 0, 1, 'topic', 'ап', 'па', '1', '25/11, 05:04'),
(14, 0, 1, 'topic', '123', '321', 'admin', '25/11, 05:04'),
(15, 0, 4, 'topic', 'Всем привет', 'Знакомимся )\r\nыфв', '1', '25/11, 05:04'),
(16, 15, 0, 'reply', '', 'уцк\r\n\r\nцук', '1', '25/11, 05:04'),
(17, 15, 0, 'reply', '', 'ывач\r\n\r\n\r\nчсм', '1', '25/11, 05:04'),
(18, 15, 0, 'reply', '', 'ыва\r\nыва', '1', '25/11, 05:04'),
(19, 15, 0, 'reply', '', 'выа\r\nыва', '1', '25/11, 05:04'),
(20, 15, 0, 'reply', '', 'авпвап\r\n\r\nпарр', '1', '25/11, 05:04'),
(21, 3, 0, 'reply', '', 'RFC Destination: XYZ_TRUST\r\nConnection Type 3: ABAP Connection\r\nDescription: Trusted RFC connection for XYZ System Client 100\r\nTarget host: <target hostname>\r\nSystem Number: Instance number of XYZ\r\nGateway Host: Recommended to provide the gateway host\r\nGateway Service: sapgw<nn> where <nn> is the instance number of XYZ\r\nUnder the Logon & Security tab:\r\nEnter the Language\r\nEnter the client\r\nUser: Specify a user with Admin access (SAP_ALL / SAP_NEW) on XYZ\r\nPassword: Password for above user\r\nTrust Relationship: No\r\nSave and perform an authorization test (Ctrl + F4)', '1', '25/11, 05:04'),
(22, 1, 0, 'reply', '', 'ва', '1', '25/11, 05:04'),
(23, 1, 0, 'reply', '', 'Привет', '1', '25/11, 05:04'),
(24, 0, 2, 'topic', 'По игре', 'че скажете?', '1', '25/11, 05:04'),
(25, 24, 0, 'reply', '', 'ва', '1', '25/11, 05:04'),
(26, 24, 0, 'reply', '', 'фы', '1', '25/11, 05:04'),
(27, 1, 0, 'reply', '', 'факт', '1', '25/11, 05:04'),
(28, 14, 0, 'reply', '', 'цук', '1', '25/11, 05:04'),
(29, 14, 0, 'reply', '', 'авп', '1', '25/11, 05:04'),
(30, 0, 3, 'topic', 'вап', 'вап', '1', '25/11, 05:04'),
(31, 0, 1, 'topic', 'Тест', 'Времени', '1', '25/11, 05:04'),
(32, 0, 3, 'topic', 'Новая', 'тема', '1', '25/11, 05:34'),
(33, 32, 0, 'reply', '', 'Новая', '1', '25/11, 05:34'),
(34, 32, 0, 'reply', '', 'ва', '1', '25/11, 05:34'),
(35, 32, 0, 'reply', '', 'ва', '1', '25/11, 05:35'),
(36, 32, 0, 'reply', '', 'ва', '1', '25/11, 11:38'),
(37, 0, 3, 'topic', '444', '444', '1', '25/11, 11:39'),
(38, 0, 1, 'topic', 'sdf', 'sdf', '1', '25/11, 11:52'),
(39, 0, 1, 'topic', '234', '234', '1', '25/11, 11:55'),
(40, 0, 1, 'topic', 'sdf', 'sdf', '1', '25/11, 11:56'),
(41, 0, 5, 'topic', 'Первая тема', 'раз', '1', '25/11, 15:45'),
(42, 0, 4, 'topic', 'Проверка логина', 'раз \r\nраз', 'admin', '26/11, 14:25'),
(43, 42, 0, 'reply', '', 'выа', '', '26/11, 14:26'),
(44, 42, 0, 'reply', '', 'ва', '', '26/11, 14:32'),
(45, 42, 0, 'reply', '', 'ва', 'admin', '26/11, 14:32'),
(46, 0, 1, 'topic', 'Новая тема', 'раз ращ', 'admin', '26/11, 16:42'),
(48, 0, 1, 'topic', 'Д''артаньян', 'кцу', 'admin', '27/11, 08:36'),
(51, 48, 0, 'reply', '', '<script>alert("У вас XSS протек.");</script>', 'admin', '27/11, 08:51'),
(52, 48, 0, 'reply', '', 'alert("У вас XSS протек.");', 'admin', '27/11, 08:52'),
(53, 0, 1, 'topic', 'ыва', 'ыва', 'admin', '27/11, 09:27'),
(54, 53, 0, 'reply', '', 'фвфыв', 'admin', '27/11, 09:43'),
(55, 0, 1, 'topic', 'Hfp', 'hfdk', 'user3', '30/11, 14:32'),
(56, 0, 4, 'topic', 'asd', 'asd', 'admin', '09/12, 12:25'),
(57, 56, 0, 'reply', '', 'asd', 'admin', '09/12, 12:25'),
(58, 56, 0, 'reply', '', 'fds', 'admin', '09/12, 12:25'),
(59, 58, 0, 'reply', '', 'sdf', 'admin', '02/02, 17:25'),
(60, 58, 0, 'reply', '', 'fgh', 'admin', '02/02, 17:25'),
(61, 0, 1, 'topic', 'sdf', 'sdf', 'admin', '03/02, 08:12'),
(62, 24, 0, 'reply', '', 'adasd\r\nasdasd\r\nasd', 'admin', '03/02, 08:14'),
(63, 0, 6, 'topic', 'выа', 'ываыва', 'admin', '03/02, 09:19'),
(64, 63, 0, 'reply', '', 'ва', 'admin', '03/02, 09:20'),
(65, 0, 1, 'topic', '123', '123', 'admin', '03/02, 09:31'),
(66, 65, 0, 'reply', '', 'лрлр', 'admin', '04/02, 10:20'),
(67, 0, 1, 'topic', '123', '123', 'admin', '04/02, 15:32'),
(68, 0, 1, 'topic', '321', '321', 'admin', '04/02, 15:32'),
(69, 0, 1, 'topic', 'asd', 'asd', 'admin', '04/02, 15:35'),
(70, 0, 1, 'topic', 'zxc', 'zxc', '', '04/02, 15:37'),
(71, 0, 1, 'topic', 'dsa', 'dsa', 'admin', '04/02, 15:37'),
(72, 6, 0, 'reply', '', 'Ы', 'admin', '05/02, 09:12'),
(73, 56, 0, 'reply', '', 'ф', 'admin', '05/02, 10:44'),
(74, 41, 0, 'reply', '', 'выа', 'admin', '05/02, 10:45'),
(75, 0, 1, 'topic', 'sdf', 'gf', 'admin', '08/02, 09:51'),
(76, 0, 1, 'topic', 'fghfgh', 'gffhjhgj', 'admin', '08/02, 09:51'),
(77, 0, 1, 'topic', 'werw234', '234234', 'admin', '08/02, 09:52'),
(78, 0, 1, 'topic', 'ываапвап', 'вап', 'admin', '08/02, 11:35'),
(79, 0, 1, 'topic', 'вро', 'рппр', 'admin', '08/02, 11:37'),
(80, 0, 1, 'topic', 'лролл', 'орол', 'admin', '08/02, 11:38'),
(81, 0, 1, 'topic', 'олдолд', 'олдолд', 'admin', '08/02, 11:38'),
(82, 0, 1, 'topic', 'ролр', 'ро', 'admin', '08/02, 11:38'),
(83, 0, 1, 'topic', '677', '567567', 'admin', '08/02, 11:38'),
(84, 0, 1, 'topic', 'енг', 'енг', 'admin', '08/02, 11:38'),
(85, 1, 0, 'reply', '', 'dsf', 'admin', '08/02, 14:21'),
(86, 1, 0, 'reply', '', 'sdf', 'admin', '08/02, 14:21'),
(87, 1, 0, 'reply', '', 'wer', 'admin', '08/02, 14:21'),
(88, 1, 0, 'reply', '', 'wer', 'admin', '08/02, 14:21'),
(89, 1, 0, 'reply', '', 'tyr', 'admin', '08/02, 14:21'),
(90, 1, 0, 'reply', '', 'ghj', 'admin', '08/02, 14:21'),
(91, 1, 0, 'reply', '', 'dfg', 'admin', '08/02, 14:21'),
(92, 1, 0, 'reply', '', 'sdf', 'admin', '08/02, 14:28'),
(93, 1, 0, 'reply', '', 'fdfdf', 'admin', '08/02, 14:28');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
