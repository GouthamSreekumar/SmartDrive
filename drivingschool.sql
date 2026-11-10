-- SmartDrive Database Schema (Sanitized for Open Source / Production)
-- Database: `drivingschool`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table structure for table `bank`
-- --------------------------------------------------------

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `card_number` varchar(200) NOT NULL,
  `expiry` varchar(200) NOT NULL,
  `cvv` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample test card data for demo payments
INSERT INTO `bank` (`bank_id`, `name`, `card_number`, `expiry`, `cvv`, `amount`) VALUES
(1, 'Test Cardholder', '12345', '12/2030', 123, 100000);

-- --------------------------------------------------------
-- Table structure for table `batch`
-- --------------------------------------------------------

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `course_id` int(200) NOT NULL,
  `max_no_student` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `b_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `batch` (`batch_id`, `course_id`, `max_no_student`, `title`, `instructor_id`, `b_status`) VALUES
(1, 1, 10, 'Batch Morning A', 1, 'active');

-- --------------------------------------------------------
-- Table structure for table `batch_student`
-- --------------------------------------------------------

CREATE TABLE `batch_student` (
  `batch_student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `client_transaction`
-- --------------------------------------------------------

CREATE TABLE `client_transaction` (
  `trans_id` int(11) NOT NULL,
  `fk_client_email` varchar(200) NOT NULL,
  `trans_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `course`
-- --------------------------------------------------------

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `duration` text NOT NULL,
  `c_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `course` (`course_id`, `name`, `rate`, `duration`, `c_status`) VALUES
(1, 'Two Wheeler (Motorcycle)', 3500, '1 month', 'active'),
(2, 'Four Wheeler (Light Motor Vehicle)', 6000, '2 months', 'active'),
(3, 'Commercial / Heavy Vehicle', 12000, '3 months', 'active');

-- --------------------------------------------------------
-- Table structure for table `demo_exam`
-- --------------------------------------------------------

CREATE TABLE `demo_exam` (
  `demo_exam_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `answer` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `demo_exam` (`demo_exam_id`, `question_text`, `option1`, `option2`, `option3`, `answer`) VALUES
(1, 'What is the legal minimum age to ride a motorcycle without gear?', '18 years', '16 years', '20 years', '16 years'),
(2, 'What does a red traffic light indicate?', 'Stop', 'Proceed with caution', 'Speed up', 'Stop'),
(3, 'When approaching an intersection without traffic signals, you must give way to:', 'Traffic from your right', 'Traffic from your left', 'Any heavy vehicle', 'Traffic from your right');

-- --------------------------------------------------------
-- Table structure for table `demo_exam_mark`
-- --------------------------------------------------------

CREATE TABLE `demo_exam_mark` (
  `demo_mark_id` int(11) NOT NULL,
  `student_email` varchar(70) NOT NULL,
  `total_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `exam_student`
-- --------------------------------------------------------

CREATE TABLE `exam_student` (
  `exam_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `demo_exam_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `feedback`
-- --------------------------------------------------------

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `forgotpassword`
-- --------------------------------------------------------

CREATE TABLE `forgotpassword` (
  `forgotpassword_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `random_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `instructor`
-- --------------------------------------------------------

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `instructor` (`instructor_id`, `st_name`, `address`, `email`, `password`, `contact_no`) VALUES
(1, 'Demo Instructor', 'Driving Academy Campus', 'instructor@example.com', 'instructor123', '9876543210');

-- --------------------------------------------------------
-- Table structure for table `login`
-- Default accounts:
-- Admin: admin@gmail.com / admin
-- Instructor: instructor@example.com / instructor123
-- --------------------------------------------------------

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `login` (`username`, `password`, `usertype`, `status`) VALUES
('admin@gmail.com', 'admin', 'admin', 'active'),
('instructor@example.com', 'instructor123', 'instructor', 'active');

-- --------------------------------------------------------
-- Table structure for table `notification`
-- --------------------------------------------------------

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `n_title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `n_status` varchar(20) NOT NULL,
  `post_date` date NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `notification` (`notif_id`, `n_title`, `description`, `n_status`, `post_date`, `instructor_id`, `batch_id`) VALUES
(1, 'Welcome to SmartDrive', 'Welcome to the driving academy management portal.', 'active', '2026-01-01', 1, 1);

-- --------------------------------------------------------
-- Table structure for table `pdf_resources`
-- --------------------------------------------------------

CREATE TABLE `pdf_resources` (
  `resourse_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `registration`
-- --------------------------------------------------------

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `usertype` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `schedule`
-- --------------------------------------------------------

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_date` date NOT NULL,
  `sch1_time` time NOT NULL,
  `sch_time` time NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------
-- Table structure for table `test_results`
-- --------------------------------------------------------

CREATE TABLE `test_results` (
  `result_id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `date_taken` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Indexes for dumped tables
-- --------------------------------------------------------

ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

ALTER TABLE `batch_student`
  ADD PRIMARY KEY (`batch_student_id`);

ALTER TABLE `client_transaction`
  ADD PRIMARY KEY (`trans_id`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

ALTER TABLE `demo_exam`
  ADD PRIMARY KEY (`demo_exam_id`);

ALTER TABLE `demo_exam_mark`
  ADD PRIMARY KEY (`demo_mark_id`);

ALTER TABLE `exam_student`
  ADD PRIMARY KEY (`exam_student_id`);

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`forgotpassword_id`);

ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

ALTER TABLE `pdf_resources`
  ADD PRIMARY KEY (`resourse_id`);

ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

ALTER TABLE `test_results`
  ADD PRIMARY KEY (`result_id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT for dumped tables
-- --------------------------------------------------------

ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `batch_student`
  MODIFY `batch_student_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `client_transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `demo_exam`
  MODIFY `demo_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `demo_exam_mark`
  MODIFY `demo_mark_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `exam_student`
  MODIFY `exam_student_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `forgotpassword`
  MODIFY `forgotpassword_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `pdf_resources`
  MODIFY `resourse_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `test_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

