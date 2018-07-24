-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2018 at 11:04 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tuteler`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `favuser` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `postid`, `favuser`, `datetime`) VALUES
(2, 9, 1, '2017-09-22 12:13:31'),
(4, 9, 3, '2018-04-28 11:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `references` text NOT NULL,
  `forkid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `uid`, `title`, `description`, `category`, `references`, `forkid`, `datetime`) VALUES
(1, 1, 'Visual impairment', 'Visual impairment, also known as vision impairment or vision loss, is a decreased ability to see to a degree that causes problems not fixable by usual means, such as glasses.[1][2] Some also include those who have a decreased ability to see because they do not have access to glasses or contact lenses.[1] Visual impairment is often defined as a best corrected visual acuity of worse than either 20/40 or 20/60.[5] The term blindness is used for complete or nearly complete vision loss.[5] Visual impairment may cause people difficulties with normal daily activities such as driving, reading, socializing, and walking.[2]', 'health', 'https://en.wikipedia.org/wiki/Visual_impairment', 0, '2017-09-10 16:17:47'),
(2, 1, 'Global Water, Sanitation, & Hygiene', 'Global access to safe water, adequate sanitation, and proper hygiene education can reduce illness and death from disease, leading to improved health, poverty reduction, and socio-economic development. However, many countries are challenged to provide these basic necessities to their populations, leaving people at risk for water, sanitation, and hygiene (WASH)-related diseases. CDC programs such as the Safe Water System can empower communities to improve their water by using household treatment options.', 'water', 'https://www.cdc.gov/healthywater/global/index.html', 0, '2017-09-10 16:19:00'),
(3, 1, 'The problem with current education system around the world', 'Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include storytelling, discussion, teaching, training, and directed research. \r\n\r\nThe above-mentioned methods altogether comprise of what education stands for. But is the world really being up to date with what is required by the students? \r\n\r\nThe contemporary education remains exam-oriented, relying on rote memorization and mechanical drills as the primary approach, and uses test scores as the primary or only criterion to evaluate students. Thus, education around the world is authoritarian in nature and produces good test scores but not a citizenry of diverse, creative and innovative talent. It feels like a monopoly whereas the provider (seller) doesnâ€™t really care much about the needs of its target audience (consumers), and continues to sell the â€œoutdatedâ€ product because the consumers would buy it nonetheless. Methods like storytelling, discussion, training and research are majorly ignored or inadequately utilized. \r\n\r\nCountries like China, Singapore have tried focusing on Skill Development which has been instrumental in their exorbitant industrial growth. However, there is still a huge gap which is easily identified. An army can win a battle with the help of its troops but it still requires some support from the Airforce and the Marine. Hence, the world needs an education system that excites and stimulates children, providing them with the learning they need - and deserve - to fulfill their potential.  This means providing a curriculum of practical and vocational learning alongside theoretical study. \r\n\r\nThis need for change has never been more pressing.  It is not due to the fault of any individual, any school or even any one political party but due to the simple fact the world has changed - and our education system has not changed fast enough.  Indeed, it is largely based on a system developed over a century ago; a factory manufacturing model where children are placed on a learning conveyor belt, then sorted, packaged and labelled according to their so-called intelligence.\r\n\r\nHowever, in this day and age, there is no excuse for such a top-down, one-size-fits-all education system that does not enable all children to thrive in their own way.  We must recognise that young people are individuals with different talents and dreams.  As such, not all children learn in the same way.  We need to move towards a system of mass customization, based on a strong common core of essential skills and knowledge, which allows young people to develop their own particular talents and aspirations.', 'education', 'https://www.linkedin.com/pulse/problem-current-education-system-around-world-gaurav-goswami', 0, '2017-09-10 16:22:09'),
(6, 1, 'Electronics for A/L Physics', 'Projects related to learning electronics for A/L physics', 'education', '', 0, '2017-09-22 08:10:32'),
(7, 1, 'A/L ICT', 'Problems related to A/L ICT', 'education', '', 0, '2017-09-22 08:14:35'),
(8, 1, 'Natural Disasters ', 'Natural disasters happen during the year. Solutions to reduce the effects of these problems', 'water', '', 0, '2017-09-22 08:33:36'),
(9, 1, 'Electronics for A/L Physics', 'Projects related to learning electronics for A/L physics', 'education', '', 6, '2017-09-22 12:05:04'),
(10, 3, 'Electronics for A/L Physics', 'Projects related to learning electronics for A/L physics', 'education', '', 9, '2018-04-28 11:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `solution` text NOT NULL,
  `time` varchar(50) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `team` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `uid`, `title`, `solution`, `time`, `cost`, `pid`, `team`, `datetime`) VALUES
(1, 1, 'Project Blind Vision', 'Visual impairment is a term experts use to describe any kind of vision loss, whether it\'s someone who cannot see at all or someone who has partial vision loss. Some people are completely blind, but many others have what\'s called legal blindness.\r\n\r\nSome people are completely blind, but many others have what\'s called legal blindness. They haven\'t lost their sight completely but have lost enough vision that they\'d have to stand 20 feet from an object to see it as well as someone with perfect vision could from 200 feet away.\r\n\r\nThe Project that we are going to implement is an alternative way of giving vision to blind people by the use of Cognitive Technologies. Vision will be transmitted for the user by the use of audio signals. \r\nBasically this device is going to be a headset which describes the surroundings near you.\r\n\r\nMicrosoft Azure Cognitive Services will be used in this solution. Raspberry Pi GSM module will be used for uninterruptible internet connection. As well as there will be a mobile app to be given for the personâ€™s relatives or guardians in order to track his location and communicate with the person.', '1 Week', '15000 LKR', 1, 'kushansworldofspace@gmail.com,dilina.desilva@gmail.com,chanukagurusinghe@gmail.com', '2017-09-10 16:48:36'),
(2, 1, 'Making a automated alarm system', 'Using integrated circuits I want to make an alarm system which will work automatically. It would be great if I could get an idea as to how I could practically implement this. ', '3 weeks', 'Rs. 1000', 6, '', '2017-09-22 08:10:54'),
(3, 1, 'Creating a database using Python', 'I\'ve created a database in the firm of a txt file using python. However I can\'t find a way to update the data within the application I\'ve built', '1 week', 'Rs. 0', 7, '', '2017-09-22 08:25:48'),
(4, 1, 'Solution for distance learning', 'This solution is going to be a RaspberryPi based computer which will run using a linux based operating system that will be created by us specified for the purpose of learning. ', '3 months', 'Rs. 10000', 3, '', '2017-09-22 08:30:54'),
(5, 1, 'Disaster management system', 'We\'ve worked on a solution that will help report natural disasters instantly. What are the other features that can be added to improve this solution', '2 months', 'Rs. 4000', 8, '', '2017-09-22 08:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `desc` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `pid`, `uid`, `desc`, `datetime`) VALUES
(1, 5, 1, 'Hosting a marketing campaign via social media', '2017-09-14 12:04:08'),
(2, 8, 1, 'Test solution', '2017-09-22 12:12:33'),
(3, 10, 3, 'This is a test', '2018-04-28 11:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acctype` enum('student','teacher','company','individual') NOT NULL,
  `interests` text NOT NULL,
  `verified` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `acctype`, `interests`, `verified`) VALUES
(1, 'Suresh Peiris', 'tsmpmail@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'teacher', 'agriculture,computers,education,health,media', '0'),
(2, 'Suresh Michael Peiris', 'bla@bla.com', 'e316ffac70bb7b5ed2a42427a44e14e8', 'student', '', '0'),
(3, 'Suresh M. Peiris', 'suresh@stcicts.org', '25d55ad283aa400af464c76d713c07ad', 'student', '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;