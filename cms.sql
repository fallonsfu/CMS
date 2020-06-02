-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-06-02 02:59:10
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Java'),
(2, 'HTML'),
(3, 'C+'),
(4, 'PHP'),
(15, 'example');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(13, 18, 'Fallon', 'fallonsfu@gmail.com', '<p>example comment</p>', 'unapproved', '2020-03-30');

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views`) VALUES
(18, 1, 'Example post', 'fallon', '', '2020-03-29', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 14),
(19, 2, 'Example post 2', 'Edwin', '', '2020-03-29', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 2),
(23, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 4),
(24, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 2),
(25, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 2),
(26, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 2),
(27, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 1),
(28, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(29, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(30, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 1),
(31, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 1),
(32, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(33, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(34, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(35, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(36, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(37, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(38, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(39, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(40, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(41, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(42, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(43, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(44, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(45, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(47, 2, 'Example post 2', 'Edwin', '', '2020-03-30', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p>', 'HTML', 0, 'draft', 0),
(49, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'draft', 0),
(50, 3, 'Example post 2', 'Edwin', '', '2020-04-02', 'ccd75d610c338744f921d916570fd9f9d52aa0ec.jpg', '<p>FOR TEST</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', 'HTML', 0, 'draft', 0),
(52, 1, 'Example post', 'fallon', '', '2020-03-30', '96452680AE12C54B14EFD44BD8AB0FEA.jpg', '<p>This is an example</p>', '', 0, 'published', 7),
(57, 1, 'dsf', '', 'new', '2020-03-31', '', '<p>dsaaf</p>', 'asdf', 0, 'draft', 2),
(59, 1, 'dsf', '', 'new', '2020-04-02', '', '<p>dsaaf</p>', 'asdf', 0, 'draft', 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(20, 'fallon', '$2y$12$kAn5lPe3JiDb7y85mmfIAuGgaYXxOIElAs/zJ.NvujOhQ.Eyd5.Kq', '', '', 'fallonsfu@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(25, 'new', '$2y$12$wn2zp/l2/WuqaFQDkT5D5uWpTFKVn8BGq7ddqi3jVJX.HySsiuLgi', '', '', 'new@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(26, 'Peter', '$2y$12$3Ev.NI0BSn8P.8LRVEQvweW8TWsYkQFij7DFGsBsbn.sABNFZAym2', '', '', 'peter@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystring22');

-- --------------------------------------------------------

--
-- 表的结构 `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(7, '156mf9n5b0q56s3s5prkl4jd3m', 1585798053),
(8, '8155tea21f8t944nbbh3031mj7', 1585908557);

--
-- 转储表的索引
--

--
-- 表的索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- 表的索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- 表的索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 表的索引 `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用表AUTO_INCREMENT `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
