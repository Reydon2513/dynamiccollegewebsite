-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 05:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balakrishna`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `heading` text NOT NULL,
  `paragraph` longtext,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `start`, `end`, `status`) VALUES
(16, '2019-08-01', '2020-05-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `sitemap` longtext NOT NULL,
  `mailid` text NOT NULL,
  `phonenumber1` varchar(20) DEFAULT NULL,
  `phonenumber2` varchar(20) DEFAULT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `address`, `sitemap`, `mailid`, `phonenumber1`, `phonenumber2`, `facebook`, `twitter`, `linkedin`) VALUES
(1, '', '<iframe src=\" width=\"350\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'college@gmail.com', '144-9012-1212', '1234567890', 'college', '@college', 'college');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `graduation` varchar(10) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `syllabus` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `place` text NOT NULL,
  `image` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `id` int(11) NOT NULL,
  `logo` longtext NOT NULL,
  `name` text NOT NULL,
  `activity` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`) VALUES
(2, 'Are Christian Colleges Accredited?', 'Attending a Christian college will appeal to students who are interested in things like quiet dignity, academic integrity, wholesome values and community engagement. Christian colleges are not boring, conservative and unaccredited institutions that exclude non-members. Most Christian colleges successfully integrate secular learning and academic standards with theological concepts and positive religious values.', 1),
(3, 'Are Extracurricular Activities in College Important?', 'Many high school students know how much emphasis is placed on extracurricular activities for college admissions, but some question the value of participating in college extracurricular activities. Students are tempted to focus solely on doing well in their school work and may consider participation in extracurricular activities a hindrance. This is especially true of students who are on scholarships and must meet certain academic requirements to keep their student loan debts to a minimum. However, students who join groups for extracurricular activities can improve their overall learning experiences and future careers depending on the activities chosen. Here are some examples of extracurricular activities that could be considered value added endeavors in the long-term.', 1),
(4, 'Are Online Colleges Accredited?', 'The proliferation of online degree programs is arguably one of the most important shifts in higher education of the last 50 years, and accredited online colleges have helped many industry professionals further their career aspirations. The flexible formats and increasingly effective curricula found within today’s online degree programs are major attractions for adult students who often juggle full time work schedules and family responsibilities. For these students, homework starts early because they must perform research to find out if their schools of choice are legitimately accredited. Many times this just takes a few internet searches or some phone calls.', 1),
(5, 'Are Private Colleges Always More Expensive?', 'When it comes to selecting colleges or universities, there is one thing you have probably heard time and time again: private institutions are always more expensive than public. Though it can be the case that private college tuition is higher, it’s not always true. Read on to learn about the differences in tuition and fees for public and private colleges and universities so you may make an informed decision about where to apply if your choices are ruled by weighing the cost.', 1),
(6, 'Can I Find a Job on Campus?', 'Many college students need to work during the school year to receive the funding to cover rising tuition costs and build an impressive resume with great references, but too many overlook the tremendous benefit of working a job on campus. Often, an on-campus job is part of the package when considering financial aid that’s available to students. In fact, a report from the U.S. Census shows that 71% of undergraduate students are working while being enrolled full or part-time in college courses. Students who work between 10 to 15 hours per week on campus are generally much more likely than their classmates to persist in earning their degree. If you are looking for ways to expand both your resume and your wallet while studying, read on to learn everything you should know about finding student jobs on your college campus.', 1),
(7, 'Can I Make a Living with an Art Degree?', 'Many people think an art degree is a bad choice in terms of potential income, but this belief isn’t necessarily true. There is always a demand for art, and to be a professional artist, you need training. There are times when a fine arts or design degree is a bad choice, but the reason many artists don’t make good careers for themselves is that they don’t know how to make money from art. There are many possible career paths in this field, and as well as teaching you the fundamental principles of color theory, composition and visual rendering, a design degree teaches you how to think of art as a business.', 1),
(8, 'How Can I Make Sure My Credits will Transfer if I Start at a Community College?', 'A common complaint of community college students who are on track to attain an undergraduate degree is that many four-year universities limit transferable credits from the colleges where they attend. Community colleges are great launch pads for earning undergraduate degrees while on a budget. Students who attend community college take undergraduate freshman and sophomore level courses and finish out their junior and senior years at a four-year university. This strategy when performed successfully allows a student to earn their undergraduate degree at a much lower cost than simply attending a university for all four years. Here are some ways that experts suggest will help smooth out the credit transfer process.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `path` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `id` varchar(20) NOT NULL,
  `name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `name`) VALUES
('1247265119', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `logo` longtext NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`logo`, `name`, `description`) VALUES
('img/default_logo.png', 'College Name', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `title` text NOT NULL,
  `summary` mediumtext,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panorama`
--

CREATE TABLE `panorama` (
  `iframe` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `placementstudents`
--

CREATE TABLE `placementstudents` (
  `id` int(11) NOT NULL,
  `profile` longtext NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `rule` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rule_category`
--

CREATE TABLE `rule_category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_category`
--

INSERT INTO `rule_category` (`id`, `category`) VALUES
(1, 'Payment Fee');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `profile` longtext NOT NULL,
  `name` text NOT NULL,
  `description` longtext,
  `age` text NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `mailid` longtext,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `textcontent`
--

CREATE TABLE `textcontent` (
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `quotes` text NOT NULL,
  `craft` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `textcontent`
--

INSERT INTO `textcontent` (`mission`, `vision`, `quotes`, `craft`) VALUES
('Ensuring quality in all aspects of the activities nurturing the entrepreneurial skills of the rural youth creating competency to meet global challenges imbibing social awareness and social responsibilities.', 'To impart quality higher education to produce highly talented rural youth capable of developing the nation.', '“Every beginner possesses a great potential to be an expert in his or her chosen field.”', '1. <b>Sun Races indicate</b> brightness in all endeavors.<br>\r\n2. <b>Bharathiyar</b> signifies patriotism in the minds of students.<br>\r\n3. <b>Lotus</b> denotes uniqueness.<br>\r\n4. <b>Open Book</b> stands for readiness to share gained knowledge.   <br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `placementstudents`
--
ALTER TABLE `placementstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_category`
--
ALTER TABLE `rule_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placementstudents`
--
ALTER TABLE `placementstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule_category`
--
ALTER TABLE `rule_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
