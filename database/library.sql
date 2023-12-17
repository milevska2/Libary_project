-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sept 01, 2023 at 10:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `bio` varchar(1024) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `bio`, `is_deleted`) VALUES
(1, 'Mary', 'Shelly', 'Mary Shelley began writing Frankenstein when she was only eighteen. At once a Gothic thriller, a passionate romance, and a cautionary tale about the dangers of science, Frankenstein tells the story of committed science student Victor Frankenstein', 0),
(2, 'Robert', 'T.Kyosaki', 'Robert Toru Kiyosaki (born April 8, 1947) is an American entrepreneur, businessman and author.Kiyosaki is the founder of Rich Global LLC and the Rich Dad Company, a private financial education company that provides personal finance and business education to people through books and videos. The company\'s main revenues come from franchisees of the Rich Dad seminars that are conducted by independent individuals using Kiyosaki\'s brand name for a fee.He is also the creator of the Cashflow board and software games to educate adults and children about business and financial concepts.', 0),
(3, 'Duncan', 'Clark', 'An early advisor to leading China Internet entrepreneurs, Duncan is author of ‘Alibaba: The House That Jack Ma Built’, the definitive work on China’s e-commerce and technology giant, its founder Jack Ma, and the forces and people that propelled its rise.  Published in 2016 in English by HarperCollins, ‘Alibaba’ was named a Book of the Year by The Economist magazine and short-listed for ‘Business Book of the Year’ by the Financial Times/McKinsey.', 0),
(4, 'Carol S.', 'Dweck', 'Carol Susan Dweck (born October 17, 1946) is an American psychologist. She is the Lewis and Virginia Eaton Professor of Psychology at Stanford University. Dweck is known for her work on mindset. She was on the faculty at Columbia University, Harvard University, and the University of Illinois before joining the Stanford University faculty in 2004. She is a Fellow of the Association for Psychological Science.', 0),
(5, 'Stephe R.', 'Covey', 'Stephen Richards Covey (October 24, 1932 – July 16, 2012) was an American educator, author, businessman, and keynote speaker. His most popular book is The 7 Habits of Highly Effective People.[1] His other books include First Things First, Principle-Centered Leadership, The 7 Habits of Highly Effective Families, The 8th Habit, and The Leader In Me: How Schools and Parents Around the World Are Inspiring Greatness, One Child at a Time. In 1996, Time magazine named him one of the 25 most influential people.[2] He was a professor at the Jon M. Huntsman School of Business at Utah State University at the time of his death.', 0),
(7, 'Gillian', 'Flynn', 'Gillian Schieber Flynn is an American author, screenwriter, and producer. She is known for writing the thriller and mystery novels, Sharp Objects, Dark Places, and Gone Girl, which are all critically acclaimed.', 0),
(8, 'Nicholas', 'Sparks', 'Nicholas Charles Sparks (born 31 December 1965) is an American novelist, screenwriter, and philanthropist. He has published twenty-two novels and two non-fiction books, some of which have been New York Times bestsellers, with over 115 million copies sold worldwide in more than 50 languages. Eleven of his novels have been adapted to film, including The Choice, The Longest Ride, The Best of Me, Safe Haven (on all of which he served as a producer), The Lucky One, Message in a Bottle, A Walk to Remember, Nights in Rodanthe, Dear John, The Last Song, and The Notebook.', 0),
(9, 'George', 'Orwell', 'Eric Arthur Blair (25 June 1903 – 21 January 1950), known by his pen name George Orwell, was an English novelist, essayist, journalist and critic. His work is characterised by lucid prose, social criticism, opposition to totalitarianism, and support of democratic socialism.\r\nOrwell produced literary criticism and poetry, fiction and polemical journalism. He is known for the allegorical novella Animal Farm (1945) and the dystopian novel Nineteen Eighty-Four (1949). His non-fiction works, including The Road to Wigan Pier (1937), documenting his experience of working-class life in the industrial north of England, and Homage to Catalonia (1938), an account of his experiences soldiering for the Republican faction of the Spanish Civil War (1936–1939), are as critically respected as his essays on politics and literature, language and culture.', 0),
(10, 'Friedrich', 'Nietzsche', 'Friedrich Wilhelm Nietzsche (15 October 1844 – 25 August 1900) was a German philosopher, cultural critic and philologist whose work has exerted a profound influence on modern intellectual history. He began his career as a classical philologist before turning to philosophy. He became the youngest person ever to hold the Chair of Classical Philology at the University of Basel in 1869 at the age of 24.', 0),
(11, 'Bram', 'Stoker', 'Abraham Stoker was an Irish author who is celebrated for his 1897 Gothic horror novel Dracula. During his lifetime, he was better known as the personal assistant of actor Sir Henry Irving and business manager of the Lyceum Theatre, which Irving owned.', 0),
(12, 'James', 'Baraz', 'James Baraz is a founding teacher at the Spirit Rock Meditation Center, coauthor of Awakening Joy, a book that outlines happiness practices for adults. His immensely popular live and online course, Awakening Joy, has reached thousands of students since its inception in 2003.', 1),
(13, 'Igor', 'Dzmabazov', 'ivana Džambazov is a Macedonian actor, showman, TV presenter, comedian, singer, songwriter, and prosaist. He was born on July 15, 1963 in Skopje to composer Aleksandar Džambazov and actress Anče Džambazova. His grandfather was the renowned Macedonian actor Petre Prličko.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_of_issue` date NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `date_of_issue`, `number_of_pages`, `cover`, `category_id`, `description`, `is_deleted`) VALUES
(1, 'Frankenstein', 1, '1818-01-01', 280, 'https://mir-s3-cdn-cf.behance.net/project_modules/disp/b437287907675.560b3e56e18fa.jpg', 3, 'Frankenstein tells the story of gifted scientist Victor Frankenstein who succeeds in giving life to a being of his own creation. However, this is not the perfect specimen he imagines that it will be, but rather a hideous creature who is rejected by Victor and mankind in general.', 0),
(2, 'Rich Dad Poor Dad', 2, '0000-00-00', 336, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSuY9Zqj8XkQErwFDrTiwCuDzohe7skAFkcL0rcdqf9WaF0GTo-', 4, 'Rich Dad Poor Dad is a 1997 book written by Robert T. Kiyosaki and Sharon Lechter. It advocates the importance of financial literacy (financial education), financial independence and building wealth through investing in assets, real estate investing, starting and owning businesses, as well as increasing one\'s financial intelligence (financial IQ).\n\nRich Dad Poor Dad is written in the style of a set of parables, ostensibly based on Kiyosaki\'s life.[1] The titular \"rich dad\" is his friend\'s father who accumulated wealth due to entrepreneurship and savvy investing, while the \"poor dad\" is claimed to be Kiyosaki\'s own father who he says worked hard all his life but never obtained financial security.', 0),
(3, 'Alibaba: The House That Jack Ma Built', 3, '2016-03-12', 410, 'https://m.media-amazon.com/images/I/41GIQ4K-V1L.jpg', 5, 'In just a decade and half Jack Ma, a man who rose from humble beginnings and started his career as an English teacher, founded and built Alibaba into the second largest Internet company in the world. The company’s $25 billion IPO in 2014 was the world’s largest, valuing the company more than Facebook or Coca Cola. Alibaba today runs the e-commerce services that hundreds of millions of Chinese consumers depend on every day, providing employment and income for tens of millions more. A Rockefeller of his age, Jack has become an icon for the country’s booming private sector, and as the face of the new, consumerist China is courted by heads of state and CEOs from around the world.\n\nGranted unprecedented access to a wealth of new material including exclusive interviews, Clark draws on his own first-hand experience of key figures integral to Alibaba’s rise to create an authoritative, compelling narrative account of how Alibaba and its charismatic creator have transformed the way that Chinese exercise their new found economic freedom, inspiring entrepreneurs around the world and infuriating others, turning the tables on the Silicon Valley giants who have tried to stand in his way.', 0),
(4, 'Mindset: The New Psychology of Success', 4, '2008-02-28', 320, 'https://m.media-amazon.com/images/I/41vS70Qo3rL.jpg', 4, 'From the renowned psychologist who introduced the world to “growth mindset” comes this updated edition of the million-copy bestseller—featuring transformative insights into redefining success, building lifelong resilience, and supercharging self-improvement. After decades of research, world-renowned Stanford University psychologist Carol S. Dweck, Ph.D., discovered a simple but groundbreaking idea: the power of mindset. In this brilliant book, she shows how success in school, work, sports, the arts, and almost every area of human endeavor can be dramatically influenced by how we think about our talents and abilities. People with a fixed mindset—those who believe that abilities are fixed—are less likely to flourish than those with a growth mindset—those who believe that abilities can be developed. Mindset reveals how great parents, teachers, managers, and athletes can put this idea to use to foster outstanding accomplishment.  In this edition, Dweck offers new insights into her now famous and broadly embraced concept. She introduces a phenomenon she calls false growth mindset and guides people toward adopting a deeper, truer growth mindset. She also expands the mindset concept beyond the individual, applying it to the cultures of groups and organizations. With the right mindset, you can motivate those you lead, teach, and love—to transform their lives and your own.', 0),
(5, 'The 7 Habits of Highly Effective People', 5, '1989-07-17', 368, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRX2v6OWU0AJSBAUdaJUKMDoikeakJmS2bocwhipFZQxl0McJGe', 6, 'The 7 Habits of Highly Effective People, first published in 1989, is a business and self-help book written by Stephen R. Covey.[1] Covey presents an approach to being effective in attaining goals by aligning oneself to what he calls \"true north\" principles based on a character ethic that he presents as universal and timeless.\n\nCovey defines effectiveness as the balance of obtaining desirable results with caring for that which produces those results. He illustrates this by referring to the fable of the goose that laid the golden eggs. He further claims that effectiveness can be expressed in terms of the P/PC ratio, where P refers to getting desired results and PC is caring for that which produces the results.', 0),
(8, 'Gone Girl', 7, '2012-05-24', 432, 'https://m.media-amazon.com/images/I/71Q0+4VG1YL.jpg', 7, 'Gone Girl is a 2012 crime thriller novel by American writer Gillian Flynn. It was published by Crown Publishing Group in June 2012. The novel was popular and made the New York Times Best Seller list. The sense of suspense in the novel comes from whether Nick Dunne is responsible for the disappearance of his wife Amy.', 0),
(9, 'The Notebook', 8, '1996-10-01', 214, 'https://nicholassparks.com/wp-content/uploads/1996/07/201612-notebook.jpg', 8, 'In 1940s South Carolina, mill worker Noah Calhoun and rich girl Allie are desperately in love. But her parents don\'t approve. When Noah goes off to serve in World War II, it seems to mark the end of their love affair. In the interim, Allie becomes involved with another man. But when Noah returns to their small town years later, on the cusp of Allie\'s marriage, it soon becomes clear that their romance is anything but over.', 0),
(10, '1984', 9, '1949-06-08', 328, 'https://i.ebayimg.com/images/g/pq8AAOSwOZRfGfTY/s-l640.jpg', 3, 'A man loses his identity while living under a repressive regime. In a story based on George Orwell\'s classic novel, Winston Smith is a government employee whose job involves the rewriting of history in a manner that casts his fictional country\'s leaders in a charitable light. His trysts with Julia provide his only measure of enjoyment, but lawmakers frown on the relationship -- and in this closely monitored society, there is no escape from Big Brother.', 0),
(11, 'Beyond Good and Evil', 10, '1886-01-01', 939, 'https://m.media-amazon.com/images/I/41szolWxmgL.jpg', 10, 'Beyond Good and Evil: Prelude to a Philosophy of the Future is a book by philosopher Friedrich Nietzsche that covers ideas in his previous work Thus Spoke Zarathustra but with a more polemical approach. It was first published in 1886 under the publishing house C. G. Wikipedia', 0),
(12, 'Dracula', 11, '1897-05-26', 418, 'https://m.media-amazon.com/images/I/316QKUeAiUS._AC_SY780_.jpg', 11, 'Dracula is a novel by Bram Stoker, published in 1897. As an epistolary novel, the narrative is related through letters, diary entries, and newspaper articles. It has no single protagonist, but opens with solicitor Jonathan Harker taking a business trip to stay at the castle of a Transylvanian nobleman, Count Dracula. ', 0),
(13, 'Awakening Joy: 10 steps to Happiness', 12, '2012-11-15', 294, 'https://ik.imagekit.io/next/books/1654703283_FjWg5Lr76.jpg', 6, 'Awakening Joy is more than just another book about happiness. More than simply offering suggested strategies to change our behavior, it uses time-tested practices to train the mind to learn new ways of thinking. The principles of the course are universal, although much of the material includes Buddhist philosophy drawn from the author’s thirty years as a Buddhist meditation teacher and spiritual counselor.', 1),
(14, 'Gol Covek', 13, '2013-02-26', 250, 'https://shop.kniga.mk/media/catalog/product/cache/b47a71ccc15b7cd2d27472f26a084c24/k/o/korica-priprema_10.png', 5, 'This book is about auto biography from author, telling the naked truth about him.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_notes`
--

CREATE TABLE `book_notes` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_notes`
--

INSERT INTO `book_notes` (`id`, `book_id`, `user_id`, `note`, `created_at`) VALUES
(14, 1, 29, 'Very good book.', '2023-09-02 21:16:46');



-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_deleted`) VALUES
(3, 'Sci-Fi', 0),
(4, 'Business', 0),
(5, 'Biographies/AutoBiographies', 0),
(6, 'Self-Help', 0),
(7, 'Mystery', 0),
(8, 'Romance', 0),
(10, 'Philosophy', 0),
(11, 'Horror', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role_id`) VALUES
(28, 'ivana', 'milevska', 'Admin123', 'example@example.com', '$2y$10$N/gynzSMWIlX9Cf6ouBmQ.P1EoeZMG5Mh.LvsnBFSbPFJAVnylWiG', 2),
(29, 'ivana', 'milevska', 'Student', 'student@student.com', '$2y$10$G9VORgsNEpGv676FfJamy.deTycdx96ITrh3zXIptDSrXZoVfHIVG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_reviews_ibfk_1` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_notes`
--
ALTER TABLE `book_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `book_notes`
--
ALTER TABLE `book_notes`
  ADD CONSTRAINT `book_notes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
