-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 11:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reillythate.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `slug` varchar(75) NOT NULL,
  `title` varchar(75) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `slug`, `title`, `description`, `image_id`) VALUES
(1, 'project-birthday-toast', 'Birthday Toast', '<p>When an 18th birthday party doesn\'t go quite according to plan, the partygoers find themselves ill-equipped to deal with the consequences.</p>', 1),
(2, 'project-night-lift', 'Night Lift', '<p>It\'s the middle of the night. You\'re out in the cold. You\'re lifting weights.</p><p>You\'re by yourself — or so it seems...</p>', 3),
(3, 'project-ruthless-the-final-chapter', 'Ruthless: The Final Chapter', '<p>A trailer for a fake slasher.</p><p>Set to the song “Marceline” by <em>Vista Kicks</em>.</p>', 4),
(4, 'project-bud-light-for-a-soul', 'Bud Light (For a Soul)', '<p>Your typical basement dweller finds himself on the wrong side of a bargain...</p>', 2),
(5, 'about', 'About', '<p>Reilly Thate is an artist with a background in science.</p>', 13),
(6, 'blog', 'Blog', '<p>Reilly maintains a well-written blog that reflects his thought processes.</p><p>His blog enables him to document his workflows, discuss his ideas, and offer his unique perspective on a variety of topics.</p>', 9),
(7, 'portfolio', 'Portfolio', '<p>Reilly maintains an impressive portfolio that showcases his work in a variety of contexts.</p>', 5),
(8, 'education', 'Education', '<p>An overview of Reilly\'s academic career.</p>', 8),
(9, 'rit', 'Rochester Institute of Technology', '<p>An overview of Reilly Thate\'s experience at Rochester Institute of Technology.</p>', 6),
(10, 'aacc', 'Anne Arundel Community College', '<p>An overview of Reilly Thate\'s experience at Anne Arundel Community College.</p>', 7),
(11, 'experience', 'Experience', '<p>An overview of Reilly Thate\'s experience across a range of subjects.</p>', 9),
(12, 'film', 'Film', '<p>An overview of Reilly Thate\'s filmmaking experience.</p>', 11),
(13, 'science', 'Science', '<p>An overview of Reilly Thate\'s scientific background.</p>', 10),
(14, 'design', 'Design', '<p>An overview of Reilly Thate\'s background as an artist.</p>', 12);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `summary` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Master table for site content.';

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `slug`, `title`, `summary`) VALUES
(1, 'birthday-toast', 'Birthday Toast', '&lt;p&gt;When an 18th birthday party doesn\'t go quite according to plan, the party-goers find themselves ill-equipped to deal with the consequences.&lt;/p&gt;'),
(2, 'night-lift', 'Night Lift', '&lt;p&gt;It’s the middle of the night. You’re out in the cold. You’re lifting weights.&lt;/p&gt;&lt;p&gt;You’re by yourself — or so it seems...&lt;/p&gt;'),
(3, 'ruthless-the-final-chapter', 'Ruthless: The Final Chapter', '&lt;p&gt;A trailer for a fake slasher.&lt;/p&gt;&lt;p&gt;Set to the song “Marceline” by Vista Kicks.&lt;/p&gt;'),
(4, 'bud-light-for-a-soul', 'Bud Light (For a Soul)', '&lt;p&gt;Your typical basement dweller finds himself on the wrong side of a bargain...&lt;/p&gt;'),
(5, 'travelers-screensaver', 'Travelers Screensaver', '&lt;p&gt;Inspired by the futuristic computer interface used in the Netflix show “Travelers”.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `content_entity`
--

CREATE TABLE `content_entity` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_entity`
--

INSERT INTO `content_entity` (`id`, `content_id`, `entity_id`, `position`) VALUES
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_image`
--

CREATE TABLE `content_image` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_image`
--

INSERT INTO `content_image` (`id`, `content_id`, `image_id`, `position`) VALUES
(1, 1, 17, 1),
(2, 1, 17, 2),
(3, 2, 18, 1),
(4, 3, 19, 1),
(5, 4, 2, 1),
(6, 5, 16, 1),
(7, 1, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `content_post`
--

CREATE TABLE `content_post` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_post`
--

INSERT INTO `content_post` (`id`, `content_id`, `post_id`, `position`) VALUES
(2, 1, 1, 1),
(3, 4, 4, 1),
(4, 3, 3, 1),
(5, 2, 2, 1),
(6, 5, 5, 1),
(7, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `content_tag`
--

CREATE TABLE `content_tag` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_tag`
--

INSERT INTO `content_tag` (`id`, `content_id`, `tag_id`, `position`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 2, 1),
(13, 1, 6, 3),
(14, 1, 7, 4),
(15, 4, 5, 2),
(16, 4, 6, 3),
(17, 2, 5, 2),
(18, 3, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `content_video`
--

CREATE TABLE `content_video` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_video`
--

INSERT INTO `content_video` (`id`, `content_id`, `video_id`, `position`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE `directory` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL COMMENT 'ID of parent directory.',
  `slug` varchar(90) NOT NULL COMMENT 'Sub-directory name.',
  `title` varchar(90) NOT NULL COMMENT 'Page title for <title> element.',
  `description` varchar(250) NOT NULL COMMENT 'For <meta description> element.',
  `robots` varchar(90) DEFAULT NULL COMMENT 'For <meta robots> element.',
  `public` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'To differentiate between public and private directory.',
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`id`, `p_id`, `slug`, `title`, `description`, `robots`, `public`, `published`, `last_updated`) VALUES
(1, NULL, 'reillythate.com', 'Home', 'Featuring the creative and professional work of Reilly Thate.', '', 1, 1, '2020-12-14 19:56:56'),
(2, 1, 'about', 'About', 'A unique look into the background of Reilly Thate.', '', 1, 1, '2020-12-30 09:09:53'),
(3, 1, 'blog', 'Blog', 'A well-written blog by Reilly Thate featuring posts about a broad variety of topics.', NULL, 1, 1, '2020-12-14 19:57:35'),
(4, 1, 'contact', 'Contact', 'Get in touch with Reilly Thate!', 'noindex', 1, 1, '2020-12-13 14:16:52'),
(9, 1, 'portfolio', 'Portfolio', 'A curated selection of Reilly Thate\'s works.', NULL, 1, 1, '2020-12-30 09:09:42'),
(10, 9, 'project-birthday-toast', 'Birthday Toast', 'A short film by Reilly Thate about an 18th birthday toast gone wrong.', '', 1, 1, '2020-12-30 09:10:08'),
(11, 9, 'project-night-lift', 'Night Lift', 'A short film by Reilly Thate in which a weightlifter encounters a bloody psycho after a night lift.', '', 1, 1, '2020-12-30 09:10:10'),
(12, 9, 'project-ruthless-the-final-chapter', 'Ruthless: The Final Chapter', 'A trailer by Reilly Thate for a fake slasher film, set to the song “Marceline” by Vista Kicks.', '', 1, 1, '2020-12-30 09:10:13'),
(13, 9, 'project-bud-light-for-a-soul', 'Bud Light (For a Soul)', 'A short film by Reilly Thate in which a guy who loves drinking Bud Light sells his soul for another can.', '', 1, 1, '2020-12-30 09:10:15'),
(14, 2, 'education', 'Education', 'An overview of Reilly Thate\'s academic career at Rochester Institute of Technology and Anne Arundel Community College.', NULL, 1, 1, '2020-12-13 14:23:48'),
(15, 14, 'rit', 'Rochester Institute of Technology', 'An overview of Reilly Thate\'s academic experience at Rochester Institute of Technology.', NULL, 1, 1, '2020-12-30 09:10:18'),
(16, 14, 'aacc', 'Anne Arundel Community College', 'An overview of Reilly Thate\'s academic experience at Anne Arundel Community College.', NULL, 1, 1, '2020-12-30 09:10:21'),
(17, 2, 'experience', 'Experience', 'An overview of Reilly Thate\'s experience across different fields.', NULL, 1, 1, '2020-12-14 19:57:38'),
(18, 17, 'film', 'Film', 'An overview of Reilly Thate\'s experience in film, ranging from his coursework at AACC to his filmmaking endeavors and professional gigs.', '', 1, 1, '2020-12-14 19:57:41'),
(19, 17, 'science', 'Science', 'An overview of Reilly Thate\'s experience as a scientist, ranging from the scope of his university study to personal research.', NULL, 1, 1, '2020-12-13 14:24:04'),
(20, 17, 'design', 'Design', 'An overview of Reilly Thate\'s experience in design, ranging from class projects to personal and professional endeavors.', NULL, 1, 1, '2020-12-14 19:57:43'),
(21, 1, 'admin', 'Admin', 'The admin dashboard for ReillyThate.com\'s backend.', 'noindex, noimageindex', 0, 1, '0000-00-00 00:00:00'),
(22, 21, 'directory', 'Directory Manager', 'A backend page dedicated to organizing the site directory for ReillyThate.com.', 'noindex', 0, 1, '0000-00-00 00:00:00'),
(23, 21, 'media', 'Media Manager', 'A backend page dedicated to organizing the image directory for ReillyThate.com.', 'noindex, noimageindex', 0, 1, '0000-00-00 00:00:00'),
(24, 21, 'card', 'Card Manager', 'A backend page dedicated to organizing the card modules for ReillyThate.com.', '', 0, 1, '0000-00-00 00:00:00'),
(26, 1, 'private', 'Private', 'The private part of ReillyThate.com. No access; helper files only.', 'noindex', 0, 1, '0000-00-00 00:00:00'),
(27, 26, 'shared', 'Shared', 'Shared content on the website. Helper functions only.', 'noindex', 0, 1, '0000-00-00 00:00:00'),
(28, 27, 'errors', 'Errors', 'Default index file for errors subdirectory. Inaccessible.', 'noindex', 0, 1, '0000-00-00 00:00:00'),
(29, 26, 'database_functions', 'Database Functions', 'This is the directory containing database functions. Should be invisible.', '', 0, 1, '0000-00-00 00:00:00'),
(30, 21, 'html5-elements', 'HTML5 Elements', 'A list of all the HTML5 elements that can be used in this website.', '', 0, 1, '0000-00-00 00:00:00'),
(31, 21, 'site-builder', 'Site Builder', 'For development purposes, this page will form the basis for a site-builder.', 'noindex, noindeximage', 0, 1, '0000-00-00 00:00:00'),
(32, 21, 'blog-admin', 'Blog Manager', 'This admin page organizes Reilly Thate\'s blog posts.', 'noindex, noindeximage', 0, 1, '0000-00-00 00:00:00'),
(33, 32, 'post', 'Post Editor', 'This backend page is designed to allow Reilly Thate to edit his blog posts.', '', 0, 1, '0000-00-00 00:00:00'),
(34, 27, 'public-foot', 'Public Foot', 'This is the index page that will be \"included\" at the foot of every public page.', '', 0, 1, '2020-12-30 08:22:11'),
(35, 27, 'public-head', 'Public Head', 'This is the index page that will be \"included\" in the beginning of every public page.', '', 0, 1, '2020-12-30 08:54:00'),
(36, 1, 'static', 'Static', 'A non-public subdirectory that contains static elements.', 'noindex, noimageindex', 0, 0, '2020-12-14 19:12:26'),
(37, 36, 'stylesheets', 'Stylesheets', 'A non-public subdirectory that contains stylesheets.', 'noindex, noimageindex', 0, 0, '2020-12-14 19:14:02'),
(38, 36, 'scripts', 'Scripts', 'A non-public sub-directory that contains scripts.', 'noindex, noimageindex', 0, 0, '2020-12-14 19:14:02'),
(39, 36, 'images', 'Images', 'A non-public subdirectory that contains images.', 'noindex, noimageindex', 0, 0, '2020-12-14 19:14:56'),
(40, 3, 'birthday-toast', 'Birthday Toast', 'Blog for “Birthday Toast”. REPLACE.', '', 1, 1, '2020-12-30 09:09:59'),
(41, 3, 'night-lift', 'Night Lift', 'Blog for \"Night Lift\". REPLACE.', NULL, 1, 1, '2020-12-30 09:10:01'),
(42, 3, 'ruthless-the-final-chapter', 'Ruthless: The Final Chapter', 'Blog for \"Ruthless: The Final Chapter\". REPLACE.', NULL, 1, 1, '2020-12-30 09:10:03'),
(43, 3, 'bud-light-for-a-soul', 'Bud Light (For a Soul)', 'Blog for \"Bud Light (For a Soul)\". REPLACE.', NULL, 1, 1, '2020-12-30 09:10:05'),
(68, 3, 'meeting-with-zoe', 'Meeting With Zoe', 'A blog about Reilly\'s last meeting with Zoe for the fall semester of 2020.', '', 1, 0, '2021-01-04 18:18:12'),
(69, 9, 'travelers-screensaver', 'Travelers Screensaver', 'A screensaver inspired by the futuristic deep web backend system in “Travelers”.', '', 1, 0, '2021-01-17 12:09:48'),
(70, 36, 'misc', 'Miscellaneous', 'This non-public section of the ReillyThate.com site is reserved for unusual file types, like font files.', '', 0, 0, '2021-01-21 01:46:02'),
(71, 36, 'documents', 'Documents', 'This non-public section of the ReillyThate.com site is reserved for document files like PDFs.', '', 0, 0, '2021-01-21 01:47:12'),
(72, 9, 'portfolio-piece', 'Portfolio Piece', 'A template page used for portfolio piece items.', '', 1, 0, '2021-01-22 00:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attributes`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`id`, `title`, `type`, `attributes`) VALUES
(1, 'Travelers Screensaver', 'canvas', '{\r\n\"id\": \"travelers-screensaver\",\r\n\"class\": \"project-canvas\",\r\n\"script-name\": \"page-specific/travelers-screensaver.js\"}');

-- --------------------------------------------------------

--
-- Table structure for table `html5_elements`
--

CREATE TABLE `html5_elements` (
  `id` int(3) NOT NULL,
  `group_id` int(2) DEFAULT NULL,
  `element` varchar(10) NOT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Pulled from developer.mozilla.org.';

--
-- Dumping data for table `html5_elements`
--

INSERT INTO `html5_elements` (`id`, `group_id`, `element`, `description`) VALUES
(1, 1, 'html', 'The HTML &lt;html&gt; element represents the root (top-level element) of an HTML document, so it is also referred to as the root element. All other elements must be descendants of this element.'),
(2, 2, 'base', 'The HTML &lt;base&gt; element specifies the base URL to use for all relative URLS in a document.'),
(3, 2, 'head', 'The HTML &lt;head&gt; element contains machine-readable information (metadata) about the document, like its title, scripts, and style sheets.'),
(4, 2, 'link', 'The HTML External Resource Link element (&lt;link&gt;) specifies relationships between the current document and an external resource. This element is most commonly used to link to stylesheets, but is also used to establish site icons (both &quot;favicon&quot; style icons and icons for the home screen and apps on mobile devices) among other things.'),
(5, 2, 'meta', 'The HTML &lt;meta&gt; element represents metadata that cannot be represented by other HTML meta-related elements, like &lt;base&gt;, &lt;link&gt;, &lt;script&gt;, &lt;style&gt; or &lt;title&gt;.'),
(6, 2, 'style', 'The HTML &lt;style&gt; element contains style information for a document, or part of a document.'),
(7, 2, 'title', 'The HTML Title element (&lt;title&gt;) defines the document\'s title that is shown in a browser\'s title bar or a page\'s tab.'),
(8, 3, 'body', 'The HTML &lt;body&gt; Element represents the content of an HTML document. There can be only one &lt;body&gt; element in a document.'),
(9, 4, 'address', 'The HTML &lt;address&gt; element indicates that the enclosed HTML provides contact information for a person or people, or for an organization.'),
(10, 4, 'article', 'The HTML &lt;article&gt; element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication).'),
(11, 4, 'aside', 'The HTML &lt;aside&gt; element represents a portion of a document whose content is only indirectly related to the document\'s main content.'),
(12, 4, 'footer', 'The HTML &lt;footer&gt; element represents a footer for its nearest sectioning content or sectioning root element. A footer typically contains information about the author of the section, copyright data or links to related documents.'),
(13, 4, 'header', 'The HTML &lt;header&gt; element represents introductory content, typically a group of introductory or navigational aids. It may contain some heading elements but also a logo, a search form, an author name, and other elements.'),
(14, 4, 'h1', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(15, 4, 'h2', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(16, 4, 'h3', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(17, 4, 'h4', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(18, 4, 'h5', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(19, 4, 'h6', 'The HTML &lt;h1&gt;&ndash;&lt;h6&gt; elements represent six levels of section headings. &lt;h1&gt; is the highest section level and &lt;h6&gt; is the lowest.'),
(20, 4, 'hgroup', 'The HTML &lt;hgroup&gt; element represents a multi-level heading for a section of a document. It groups a set of &lt;h1&gt;&ndash;&lt;h6&gt; elements.'),
(21, 4, 'main', 'The HTML &lt;main&gt; element represents the dominant content of the &lt;body&gt; of a document. The main content area consists of content that is directly related to or expands upon the central topic of a document, or the central functionality of an application.'),
(22, 4, 'nav', 'The HTML &lt;nav&gt; element represents a section of a page whose purpose is to provide navigation links, either within the current document or to other documents. Common examples of navigation sections are menus, tables of contents, and indexes.'),
(23, 4, 'section', 'The HTML &lt;section&gt; element represents a standalone section &mdash; which doesn\'t have a more specific semantic element to represent it &mdash; contained within an HTML document.'),
(24, 5, 'blockquote', 'The HTML &lt;blockquote&gt; Element (or HTML Block Quotation Element) indicates that the enclosed text is an extended quotation. Usually, this is rendered visually by indentation (see Notes for how to change it). A URL for the source of the quotation may be given using the cite attribute, while a text representation of the source can be given using the &lt;cite&gt; element.'),
(25, 5, 'dd', 'The HTML &lt;dd&gt; element provides the description, definition, or value for the preceding term (&lt;dt&gt;) in a description list (&lt;dl&gt;).'),
(26, 5, 'div', 'The HTML Content Division element (&lt;div&gt;) is the generic container for flow content. It has no effect on the content or layout until styled using CSS.'),
(27, 5, 'dl', 'The HTML &lt;dl&gt; element represents a description list. The element encloses a list of groups of terms (specified using the &lt;dt&gt; element) and descriptions (provided by &lt;dd&gt; elements). Common uses for this element are to implement a glossary or to display metadata (a list of key-value pairs).'),
(28, 5, 'dt', 'The HTML &lt;dt&gt; element specifies a term in a description or definition list, and as such must be used inside a &lt;dl&gt; element.'),
(29, 5, 'figcaption', 'The HTML &lt;figcaption&gt; or Figure Caption element represents a caption or legend describing the rest of the contents of its parent &lt;figure&gt; element.'),
(30, 5, 'figure', 'The HTML &lt;figure&gt; (Figure With Optional Caption) element represents self-contained content, potentially with an optional caption, which is specified using the (&lt;figcaption&gt;) element.'),
(31, 5, 'hr', 'The HTML &lt;hr&gt; element represents a thematic break between paragraph-level elements: for example, a change of scene in a story, or a shift of topic within a section.'),
(32, 5, 'li', 'The HTML &lt;li&gt; element is used to represent an item in a list.'),
(33, 5, 'ol', 'The HTML &lt;ol&gt; element represents an ordered list of items &mdash; typically rendered as a numbered list.'),
(34, 5, 'p', 'The HTML &lt;p&gt; element represents a paragraph.'),
(35, 5, 'pre', 'The HTML &lt;pre&gt; element represents preformatted text which is to be presented exactly as written in the HTML file.'),
(36, 5, 'ul', 'The HTML &lt;ul&gt; element represents an unordered list of items, typically rendered as a bulleted list.'),
(37, 6, 'a', 'The HTML &lt;a&gt; element (or anchor element), with its href attribute, creates a hyperlink to web pages, files, email addresses, locations in the same page, or anything else a URL can address.'),
(38, 6, 'abbr', 'The HTML Abbreviation element (&lt;abbr&gt;) represents an abbreviation or acronym; the optional title attribute can provide an expansion or description for the abbreviation.'),
(39, 6, 'b', 'The HTML Bring Attention To element (&lt;b&gt;) is used to draw the reader\'s attention to the element\'s contents, which are not otherwise granted special importance.'),
(40, 6, 'bdi', 'The HTML Bidirectional Isolate element (&lt;bdi&gt;)  tells the browser\'s bidirectional algorithm to treat the text it contains in isolation from its surrounding text.'),
(41, 6, 'bdo', 'The HTML Bidirectional Text Override element (&lt;bdo&gt;) overrides the current directionality of text, so that the text within is rendered in a different direction.'),
(42, 6, 'br', 'The HTML &lt;br&gt; element produces a line break in text (carriage-return). It is useful for writing a poem or an address, where the division of lines is significant.'),
(43, 6, 'cite', 'The HTML Citation element (&lt;cite&gt;) is used to describe a reference to a cited creative work, and must include the title of that work.'),
(44, 6, 'code', 'The HTML &lt;code&gt; element displays its contents styled in a fashion intended to indicate that the text is a short fragment of computer code.'),
(45, 6, 'data', 'The HTML &lt;data&gt; element links a given piece of content with a machine-readable translation. If the content is time- or date-related, the &lt;time&gt; element must be used.'),
(46, 6, 'dfn', 'The HTML Definition element (&lt;dfn&gt;) is used to indicate the term being defined within the context of a definition phrase or sentence.'),
(47, 6, 'em', 'The HTML &lt;em&gt; element marks text that has stress emphasis. The &lt;em&gt; element can be nested, with each level of nesting indicating a greater degree of emphasis.'),
(48, 6, 'i', 'The HTML Idiomatic Text element (&lt;i&gt;) represents a range of text that is set off from the normal text for some reason, such as idiomatic text, technical terms, taxonomical designations, among others.'),
(49, 6, 'kbd', 'The HTML Keyboard Input element (&lt;kbd&gt;) represents a span of inline text denoting textual user input from a keyboard, voice input, or any other text entry device.'),
(50, 6, 'mark', 'The HTML Mark Text element (&lt;mark&gt;) represents text which is marked or highlighted for reference or notation purposes, due to the marked passage\'s relevance or importance in the enclosing context.'),
(51, 6, 'q', 'The HTML &lt;q&gt; element indicates that the enclosed text is a short inline quotation. Most modern browsers implement this by surrounding the text in quotation marks.'),
(52, 6, 'rb', 'The HTML Ruby Base (&lt;rb&gt;) element is used to delimit the base text component of a  &lt;ruby&gt; annotation, i.e. the text that is being annotated.'),
(53, 6, 'rp', 'The HTML Ruby Fallback Parenthesis (&lt;rp&gt;) element is used to provide fall-back parentheses for browsers that do not support display of ruby annotations using the &lt;ruby&gt; element.'),
(54, 6, 'rt', 'The HTML Ruby Text (&lt;rt&gt;) element specifies the ruby text component of a ruby annotation, which is used to provide pronunciation, translation, or transliteration information for East Asian typography. The &lt;rt&gt; element must always be contained within a &lt;ruby&gt; element.'),
(55, 6, 'rtc', 'The HTML Ruby Text Container (&lt;rtc&gt;) element embraces semantic annotations of characters presented in a ruby of &lt;rb&gt; elements used inside of &lt;ruby&gt; element. &lt;rb&gt; elements can have both pronunciation (&lt;rt&gt;) and semantic (&lt;rtc&gt;) annotations.'),
(56, 6, 'ruby', 'The HTML &lt;ruby&gt; element represents small annotations that are rendered above, below, or next to base text, usually used for showing the pronunciation of East Asian characters. It can also be used for annotating other kinds of text, but this usage is less common.'),
(57, 6, 's', 'The HTML &lt;s&gt; element renders text with a strikethrough, or a line through it. Use the &lt;s&gt; element to represent things that are no longer relevant or no longer accurate. However, &lt;s&gt; is not appropriate when indicating document edits; for that, use the &lt;del&gt; and &lt;ins&gt; elements, as appropriate.'),
(58, 6, 'samp', 'The HTML Sample Element (&lt;samp&gt;) is used to enclose inline text which represents sample (or quoted) output from a computer program.'),
(59, 6, 'small', 'The HTML &lt;small&gt; element represents side-comments and small print, like copyright and legal text, independent of its styled presentation. By default, it renders text within it one font-size smaller, such as from small to x-small.'),
(60, 6, 'span', 'The HTML &lt;span&gt; element is a generic inline container for phrasing content, which does not inherently represent anything. It can be used to group elements for styling purposes (using the class or id attributes), or because they share attribute values, such as lang.'),
(61, 6, 'strong', 'The HTML Strong Importance Element (&lt;strong&gt;) indicates that its contents have strong importance, seriousness, or urgency. Browsers typically render the contents in bold type.'),
(62, 6, 'sub', 'The HTML Subscript element (&lt;sub&gt;) specifies inline text which should be displayed as subscript for solely typographical reasons.'),
(63, 6, 'sup', 'The HTML Superscript element (&lt;sup&gt;) specifies inline text which is to be displayed as superscript for solely typographical reasons.'),
(64, 6, 'time', 'The HTML &lt;time&gt; element represents a specific period in time.'),
(65, 6, 'u', 'The HTML Unarticulated Annotation element (&lt;u&gt;) represents a span of inline text which should be rendered in a way that indicates that it has a non-textual annotation.'),
(66, 6, 'var', 'The HTML Variable element (&lt;var&gt;) represents the name of a variable in a mathematical expression or a programming context.'),
(67, 6, 'wbr', 'The HTML &lt;wbr&gt; element represents a word break opportunity&mdash;a position within text where the browser may optionally break a line, though its line-breaking rules would not otherwise create a break at that location.'),
(68, 7, 'area', 'The HTML &lt;area&gt; tag defines an area inside an image map that has predefined clickable areas. An image map allows geometric areas on an image to be associated with hypertext link.'),
(69, 7, 'audio', 'The HTML &lt;audio&gt; element is used to embed sound content in documents. It may contain one or more audio sources, represented using the src attribute or the &lt;source&gt; element: the browser will choose the most suitable one. It can also be the destination for streamed media, using a MediaStream.'),
(70, 7, 'img', 'The HTML &lt;img&gt; element embeds an image into the document.'),
(71, 7, 'map', 'The HTML &lt;map&gt; element is used with &lt;area&gt; elements to define an image map (a clickable link area).'),
(72, 7, 'track', 'The HTML &lt;track&gt; element is used as a child of the media elements, &lt;audio&gt; and &lt;video&gt;. It lets you specify timed text tracks (or time-based data), for example to automatically handle subtitles.'),
(73, 7, 'video', 'The HTML Video element (&lt;video&gt;) embeds a media player which supports video playback into the document. You can use &lt;video&gt; for audio content as well, but the &lt;audio&gt; element may provide a more appropriate user experience.'),
(74, 8, 'embed', 'The HTML &lt;embed&gt; element embeds external content at the specified point in the document. This content is provided by an external application or other source of interactive content such as a browser plug-in.'),
(75, 8, 'iframe', 'The HTML Inline Frame element (&lt;iframe&gt;) represents a nested browsing context, embedding another HTML page into the current one.'),
(76, 8, 'object', 'The HTML &lt;object&gt; element represents an external resource, which can be treated as an image, a nested browsing context, or a resource to be handled by a plugin.'),
(77, 8, 'param', 'The HTML &lt;param&gt; element defines parameters for an &lt;object&gt; element.'),
(78, 8, 'picture', 'The HTML &lt;picture&gt; element contains zero or more &lt;source&gt; elements and one &lt;img&gt; element to offer alternative versions of an image for different display/device scenarios.'),
(79, 8, 'source', 'The HTML &lt;source&gt; element specifies multiple media resources for the &lt;picture&gt;, the &lt;audio&gt; element, or the &lt;video&gt; element.'),
(80, 9, 'canvas', 'Use the HTML &lt;canvas&gt; element with either the canvas scripting API or the WebGL API to draw graphics and animations.'),
(81, 9, 'noscript', 'The HTML &lt;noscript&gt; element defines a section of HTML to be inserted if a script type on the page is unsupported or if scripting is currently turned off in the browser.'),
(82, 9, 'script', 'The HTML &lt;script&gt; element is used to embed executable code or data; this is typically used to embed or refer to JavaScript code.'),
(83, 10, 'del', 'The HTML &lt;del&gt; element represents a range of text that has been deleted from a document.'),
(84, 10, 'ins', 'The HTML &lt;ins&gt; element represents a range of text that has been added to a document.'),
(85, 11, 'caption', 'The HTML &lt;caption&gt; element specifies the caption (or title) of a table.'),
(86, 11, 'col', 'The HTML &lt;col&gt; element defines a column within a table and is used for defining common semantics on all common cells. It is generally found within a &lt;colgroup&gt; element.'),
(87, 11, 'colgroup', 'The HTML &lt;colgroup&gt; element defines a group of columns within a table.'),
(88, 11, 'table', 'The HTML &lt;table&gt; element represents tabular data &mdash; that is, information presented in a two-dimensional table comprised of rows and columns of cells containing data.'),
(89, 11, 'tbody', 'The HTML Table Body element (&lt;tbody&gt;) encapsulates a set of table rows (&lt;tr&gt; elements), indicating that they comprise the body of the table (&lt;table&gt;).'),
(90, 11, 'td', 'The HTML &lt;td&gt; element defines a cell of a table that contains data. It participates in the table model.'),
(91, 11, 'tfoot', 'The HTML &lt;tfoot&gt; element defines a set of rows summarizing the columns of the table.'),
(92, 11, 'th', 'The HTML &lt;th&gt; element defines a cell as header of a group of table cells. The exact nature of this group is defined by the scope and headers attributes.'),
(93, 11, 'thead', 'The HTML &lt;thead&gt; element defines a set of rows defining the head of the columns of the table.'),
(94, 11, 'tr', 'The HTML &lt;tr&gt; element defines a row of cells in a table. The row\'s cells can then be established using a mix of &lt;td&gt; (data cell) and &lt;th&gt; (header cell) elements.'),
(95, 12, 'button', 'The HTML &lt;button&gt; element represents a clickable button, used to submit forms or anywhere in a document for accessible, standard button functionality.'),
(96, 12, 'datalist', 'The HTML &lt;datalist&gt; element contains a set of &lt;option&gt; elements that represent the permissible or recommended options available to choose from within other controls.'),
(97, 12, 'fieldset', 'The HTML &lt;fieldset&gt; element is used to group several controls as well as labels (&lt;label&gt;) within a web form.'),
(98, 12, 'form', 'The HTML &lt;form&gt; element represents a document section containing interactive controls for submitting information.'),
(99, 12, 'input', 'The HTML &lt;input&gt; element is used to create interactive controls for web-based forms in order to accept data from the user; a wide variety of types of input data and control widgets are available, depending on the device and user agent.'),
(100, 12, 'label', 'The HTML &lt;label&gt; element represents a caption for an item in a user interface.'),
(101, 12, 'legend', 'The HTML &lt;legend&gt; element represents a caption for the content of its parent &lt;fieldset&gt;.'),
(102, 12, 'meter', 'The HTML &lt;meter&gt; element represents either a scalar value within a known range or a fractional value.'),
(103, 12, 'optgroup', 'The HTML &lt;optgroup&gt; element creates a grouping of options within a &lt;select&gt; element.'),
(104, 12, 'option', 'The HTML &lt;option&gt; element is used to define an item contained in a &lt;select&gt;, an &lt;optgroup&gt;, or a &lt;datalist&gt; element. As such, &lt;option&gt; can represent menu items in popups and other lists of items in an HTML document.'),
(105, 12, 'output', 'The HTML Output element (&lt;output&gt;) is a container element into which a site or app can inject the results of a calculation or the outcome of a user action.'),
(106, 12, 'progress', 'The HTML &lt;progress&gt; element displays an indicator showing the completion progress of a task, typically displayed as a progress bar.'),
(107, 12, 'select', 'The HTML &lt;select&gt; element represents a control that provides a menu of options.'),
(108, 12, 'textarea', 'The HTML &lt;textarea&gt; element represents a multi-line plain-text editing control, useful when you want to allow users to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.'),
(109, 13, 'details', 'The HTML Details Element (&lt;details&gt;) creates a disclosure widget in which information is visible only when the widget is toggled into an &quot;open&quot; state.'),
(110, 13, 'dialog', 'The HTML &lt;dialog&gt; element represents a dialog box or other interactive component, such as a dismissable alert, inspector, or subwindow.'),
(111, 13, 'menu', 'The HTML &lt;menu&gt; element represents a group of commands that a user can perform or activate. This includes both list menus, which might appear across the top of a screen, as well as context menus, such as those that might appear underneath a button after it has been clicked.'),
(112, 13, 'summary', 'The HTML Disclosure Summary element (&lt;summary&gt;) element specifies a summary, caption, or legend for a &lt;details&gt; element\'s disclosure box.'),
(113, 14, 'slot', 'The HTML &lt;slot&gt; element&mdash;part of the Web Components technology suite&mdash;is a placeholder inside a web component that you can fill with your own markup, which lets you create separate DOM trees and present them together.'),
(114, 14, 'template', 'The HTML Content Template (&lt;template&gt;) element is a mechanism for holding HTML that is not to be rendered immediately when a page is loaded but may be instantiated subsequently during runtime using JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `html5_groups`
--

CREATE TABLE `html5_groups` (
  `id` int(2) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Pulled from developer.mozilla.org.';

--
-- Dumping data for table `html5_groups`
--

INSERT INTO `html5_groups` (`id`, `slug`, `name`, `description`) VALUES
(1, 'main-root', 'Main root', 'Reserved for the root (top-level) element of an HTML document, so it is also referred to as the root element. All other elements must be descendants of this element.'),
(2, 'document-metadata', 'Document metadata', 'Metadata contains information about the page. This includes information about styles, scripts, and data to help software(search engines, browsers, etc.) use and render the page. Metadata for styles and scripts may be defined in the page or link to another file that has the information.'),
(3, 'sectioning-root', 'Sectioning root', 'Reserved for the html body element, representing the content of the HTML document. There can only be one body element in a document.'),
(4, 'content-sectioning', 'Content sectioning', 'Content sectioning elements allow you to organize the document content into logical pieces. Use the sectioning elements to create a broad outline for your page content, including header and footer navigation, and heading elements to identify sections of content.'),
(5, 'text-content', 'Text content', 'Use HTML text content elements to organize blocks or sections of content placed between the opening and closing body tags. Important for accessibility and SEO, these elements identify the purpose or structure of that content.'),
(6, 'inline-text-semantics', 'Inline text semantics', 'Use the HTML inline text semantic to define the meaning, structure, or style of a word, line, or any arbitrary piece of text.'),
(7, 'image-and-multimedia', 'Image and multimedia', 'HTML supports various multimedia resources such as images, audio, and video.'),
(8, 'embedded-content', 'Embedded content', 'In addition to regular multimedia content, HTML can include a variety of other content, even if it\'s not always easy to interact with.'),
(9, 'scripting', 'Scripting', 'In order to create dynamic content and Web applications, HTML supports the use of scripting languages, most prominently JavaScript. Certain elements support this capability.'),
(10, 'demarcating-edits', 'Demarcating edits', 'These elements let you provide indications that specific parts of the text have been altered.'),
(11, 'table-content', 'Table content', 'The elements here are used to create and handle tabular data.'),
(12, 'forms', 'Forms', 'HTML provides a number of elements which can be used together to create forms which the user can fill out and submit to the Web site or application. There\'s a great deal of further information about this available in the HTML forms guide on developer.mozilla.org.'),
(13, 'interactive-elements', 'Interactive elements', 'HTML offers a selection of elements which help to create interactive user interface objects.'),
(14, 'web-components', 'Web components', 'Web Components is an HTML-related technology which makes it possible to, essentially, create and use custom elements as if it were regular HTML. In addition, you can create custom versions of standard HTML elements.');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `path` varchar(75) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` varchar(8) NOT NULL,
  `alt` varchar(125) DEFAULT NULL COMMENT 'For accessibility and SEO. Use descriptive keywords.',
  `srcset` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`srcset`)),
  `class` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `slug`, `path`, `name`, `type`, `alt`, `srcset`, `class`) VALUES
(1, 'poster-birthday-toast', '', 'BANNER_BirthdayToast.jpg', '', 'Four young adults stressed out at an 18th birthday party.', NULL, NULL),
(2, 'poster-bud-light-for-a-soul', '', 'BANNER_BudLightFAS.jpg', '', 'A scared alcoholic looking away from a demon with whom he made a bad bargain; his soul for a bottle of Bud Light.', NULL, NULL),
(3, 'poster-night-lift', '', 'BANNER_NightLift.jpg', '', 'A film poster featuring a weightlifter in the dark and a phone being picked up.', NULL, NULL),
(4, 'poster-ruthless-the-final-chapter', '', 'BANNER_Ruthless.jpg', '', 'A film poster featuring an axe murderer in various stages of his criminal decline.', NULL, NULL),
(5, 'renegade-blues', '', 'Renegade_Blues.svg', '', 'A composition featuring Reilly Thate\'s Renegade logo with blue echoes.', NULL, NULL),
(6, 'intro-bio2-presentation', '', 'GALLERY_RIT-SPR16-Project-Presentation.jpg', '', 'Reilly Thate standing next to his presentation for an Introductory Biology project.', NULL, NULL),
(7, 'aacc-video-editing-screenshot', '', 'GALLERY_AACC-VideoEditing-Screenshot.jpg', '', 'Reilly Thate shaking hands with a fellow student during a shoot for their Video Editing class project.', NULL, NULL),
(8, 'graduation-reilly-lucas', '', 'GALLERY_Reilly-Lucas-Graduation.jpg', '', 'Reilly Thate and his roommate Lucas posing in their caps and gowns for a post-college graduation celebration.', NULL, NULL),
(9, 'experience-books', '', 'GALLERY_Experience-Books.jpg', '', 'A stack of books read by Reilly Thate about a variety of topics including Science, Math, and Filmmaking.', NULL, NULL),
(10, 'science-culture', '', 'GALLERY_Science-Culture.jpg', '', 'A cell culture containing genetically-modified bacteria that produces proteins that glow under fluorescent light', NULL, NULL),
(11, 'birthday-toast-rehearsal', '', 'GALLERY_Birthday-Toast-Rehearsal.jpg', '', 'Reilly Thate rehearses a scene from \'Birthday Toast\' with co-star Emily with scripts in hand in front of a softbox light.', NULL, NULL),
(12, 'renegade-spray-design', '', 'GALLERY_Renegade-Spray-Design.jpg', '', 'The Renegade logo incorporated into a brilliant galactic spray-paint piece of art.', NULL, NULL),
(13, 'reilly-thate-profile-01', '', 'PROFILE_ReillyThate.jpg', '', 'A portrait shot of Reilly Thate in a blue button-up shirt.', NULL, NULL),
(14, 'renegade-blues', '', 'Renegade_Blues.svg', '', 'Reilly Thate\'s Renegade logo placed in front of blue Renegade echoes. Test final!', NULL, ''),
(15, 'renegade-stroke', '', 'Renegade_Stroke.svg', '', 'The Renegade logo, represented as simple line strokes.', NULL, ''),
(16, 'travelers-interface', '', 'Travelers.jpg', '', 'Futuristic orange symbols on a black background.', NULL, NULL),
(17, 'birthday-toast-banner', 'film/birthday-toast', 'BirthdayToastBanner', '.jpg', 'A theatrical poster with four stressed-out young adults: three angry men and one angrier woman.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL),
(18, 'night-lift-banner', 'film/night-lift', 'NightLiftBanner', '.jpg', 'A theatrical poster featuring a man hiding in the shadows and a hand being illuminated by a phone flashlight.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL),
(19, 'ruthless-trailer-banner', 'film/ruthless-trailer', 'RuthlessTrailerBanner', '.jpg', 'A theatrical poster depicting an angry man bringing an axe down toward the viewer.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_directory`
--

CREATE TABLE `image_directory` (
  `id` int(11) NOT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `path` varchar(75) NOT NULL,
  `name` varchar(75) NOT NULL,
  `type` varchar(8) NOT NULL,
  `alt` varchar(125) DEFAULT NULL COMMENT 'For accessibility and SEO. Use descriptive keywords.',
  `srcset` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`srcset`)),
  `class` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_directory`
--

INSERT INTO `image_directory` (`id`, `slug`, `path`, `name`, `type`, `alt`, `srcset`, `class`) VALUES
(1, 'poster-birthday-toast', '', 'BANNER_BirthdayToast.jpg', '', 'Four young adults stressed out at an 18th birthday party.', NULL, NULL),
(2, 'poster-bud-light-for-a-soul', '', 'BANNER_BudLightFAS.jpg', '', 'A scared alcoholic looking away from a demon with whom he made a bad bargain; his soul for a bottle of Bud Light.', NULL, NULL),
(3, 'poster-night-lift', '', 'BANNER_NightLift.jpg', '', 'A film poster featuring a weightlifter in the dark and a phone being picked up.', NULL, NULL),
(4, 'poster-ruthless-the-final-chapter', '', 'BANNER_Ruthless.jpg', '', 'A film poster featuring an axe murderer in various stages of his criminal decline.', NULL, NULL),
(5, 'renegade-blues', '', 'Renegade_Blues.svg', '', 'A composition featuring Reilly Thate\'s Renegade logo with blue echoes.', NULL, NULL),
(6, 'intro-bio2-presentation', '', 'GALLERY_RIT-SPR16-Project-Presentation.jpg', '', 'Reilly Thate standing next to his presentation for an Introductory Biology project.', NULL, NULL),
(7, 'aacc-video-editing-screenshot', '', 'GALLERY_AACC-VideoEditing-Screenshot.jpg', '', 'Reilly Thate shaking hands with a fellow student during a shoot for their Video Editing class project.', NULL, NULL),
(8, 'graduation-reilly-lucas', '', 'GALLERY_Reilly-Lucas-Graduation.jpg', '', 'Reilly Thate and his roommate Lucas posing in their caps and gowns for a post-college graduation celebration.', NULL, NULL),
(9, 'experience-books', '', 'GALLERY_Experience-Books.jpg', '', 'A stack of books read by Reilly Thate about a variety of topics including Science, Math, and Filmmaking.', NULL, NULL),
(10, 'science-culture', '', 'GALLERY_Science-Culture.jpg', '', 'A cell culture containing genetically-modified bacteria that produces proteins that glow under fluorescent light', NULL, NULL),
(11, 'birthday-toast-rehearsal', '', 'GALLERY_Birthday-Toast-Rehearsal.jpg', '', 'Reilly Thate rehearses a scene from \'Birthday Toast\' with co-star Emily with scripts in hand in front of a softbox light.', NULL, NULL),
(12, 'renegade-spray-design', '', 'GALLERY_Renegade-Spray-Design.jpg', '', 'The Renegade logo incorporated into a brilliant galactic spray-paint piece of art.', NULL, NULL),
(13, 'reilly-thate-profile-01', '', 'PROFILE_ReillyThate.jpg', '', 'A portrait shot of Reilly Thate in a blue button-up shirt.', NULL, NULL),
(14, 'renegade-blues', '', 'Renegade_Blues.svg', '', 'Reilly Thate\'s Renegade logo placed in front of blue Renegade echoes. Test final!', NULL, ''),
(15, 'renegade-stroke', '', 'Renegade_Stroke.svg', '', 'The Renegade logo, represented as simple line strokes.', NULL, ''),
(16, 'travelers-interface', '', 'Travelers.jpg', '', 'Futuristic orange symbols on a black background.', NULL, NULL),
(17, 'birthday-toast-banner', 'film/birthday-toast', 'BirthdayToastBanner', '.jpg', 'A theatrical poster with four stressed-out young adults: three angry men and one angrier woman.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL),
(18, 'night-lift-banner', 'film/night-lift', 'NightLiftBanner', '.jpg', 'A theatrical poster featuring a man hiding in the shadows and a hand being illuminated by a phone flashlight.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL),
(19, 'ruthless-trailer-banner', 'film/ruthless-trailer', 'RuthlessTrailerBanner', '.jpg', 'A theatrical poster depicting an angry man bringing an axe down toward the viewer.', '{\r\n\"640\": \"640w\", \r\n\"768\": \"768w\", \r\n\"1024\": \"1024w\", \r\n\"1366\": \"1366w\", \r\n\"1600\": \"1600w\"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `element` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `position` tinyint(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `flexible_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`flexible_content`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `slug`, `p_id`, `element`, `class`, `position`, `content`, `flexible_content`) VALUES
(6, 'zoe-text-1', 2, 2, 10, 1, '<h3>Introduction</h3>\r\n\r\n<p>My meeting with Zoe on Dec. 8, 2020 was a good follow-up to the first meeting we had.</p>\r\n\r\n<p>I went into the meeting with a pretty all-over-the-place approach.</p>\r\n\r\n<ul>\r\n	<li>We started off by talking about how I&rsquo;ve been doing this semester.</li>\r\n	<li>She asked me about my future plans.\r\n	<ul>\r\n		<li>I&rsquo;m taking some classes next semester to graduate:\r\n		<ul>\r\n			<li>Animation 1</li>\r\n			<li>Web Design 2</li>\r\n			<li>Women&rsquo;s Health!?!</li>\r\n		</ul>\r\n		</li>\r\n		<li>I&rsquo;m applying to the Film &amp; Animation MFA program at RIT.</li>\r\n		<li>I&rsquo;m&nbsp;going to hang out at Ventana Productions in D.C. this winter.</li>\r\n	</ul>\r\n	</li>\r\n	<li>We talked about my portfolio... AKA my Behanced portfolio, my personal website (production mode), and my personal website (public view).\r\n	<ul>\r\n		<li>She thinks that the painting is distracting from my overall purpose.\r\n		<ul>\r\n			<li>My purpose is to demonstrate my skill as a filmmaker/web developer to potential employers.</li>\r\n			<li>My design stuff is cool, but it doesn&rsquo;t totally demonstrate my skill as a professional in the fields I&rsquo;m specializing in.</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Personal Website</h3>\r\n\r\n<p>We discussed my personal website and how I should lay it out and organize it.</p>\r\n\r\n<p>K.I.S.S.!!!</p>\r\n\r\n<ul>\r\n	<li>My Home Page can be as simple as the three buttons:\r\n	<ul>\r\n		<li>Portfolio</li>\r\n		<li>Education</li>\r\n		<li>About</li>\r\n	</ul>\r\n	</li>\r\n	<li>I need to keep the focus on my most relevant and recent attributes.</li>\r\n	<li>Everything else about me is cool (like my time at R.I.T.), but it&rsquo;s background. It&rsquo;s not 100% relevant to my life as a filmmaker/web developer.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', NULL),
(7, 'night-text-1', 3, 2, 10, 1, '<h3>Cinematography</h3>\r\n\r\n<p>I spent more time considering how the shots should be framed and how to block those shots in&nbsp;<em>Night Lift</em>&nbsp;than I did in previous projects, and part of that was due to the solo nature of this film.</p>\r\n\r\n<p>Compared to my basic shot wishlist in&nbsp;<em>Birthday Toast</em>&nbsp;that the cinematographer was able to improve upon, I dedicated more time during this project to make my shots look as good as possible.</p>\r\n\r\n<h3>Lighting</h3>\r\n\r\n<p>As a general rule of thumb for this film, if you could see something in the dark (the grass, the trees, the house, or the treehouse), I made an effort to cast light on it.</p>\r\n\r\n<p>I was generous with the gaffing around the weight set, given the presence of the porch light, but this led to an issue with an extra shadow being cast on the wall. I ended up writing this off as a &ldquo;missable detail&rdquo;; the average viewer wouldn&#39;t notice it if they weren&#39;t looking for it.</p>\r\n\r\n<h3>Sound</h3>\r\n\r\n<p>The primary inspiration for this project was the idea of using diegetic music as a horror element.</p>\r\n\r\n<p>I establish that the song playing throughout the film is coming from my phone; this pays off when I realize that the bloody psycho is using&nbsp;<em>my</em>&nbsp;phone&rsquo;s flashlight to search for me because the song is playing in the distance.</p>\r\n\r\n<p>The suspense theme that plays during the &ldquo;run-and-hide&rdquo; sequence is non-diegetic, but I cut it out the minute the protagonist realizes the bloody psycho is looking for him.</p>\r\n\r\n<p>Everything else was pure foley sound; instead of worrying about recording the sounds during&nbsp;each shot, I waited until after the film was cut to record the various sounds (e.g. the weights being racked, the glass door being pounded, etc.).</p>\r\n', NULL),
(9, 'ruthless-text-1', 4, 2, 10, 1, '<p>For a video editing project, I cut my own version of a movie trailer from footage I collected with other students to the song &quot;Marceline&quot; by Vista Kicks.</p>\r\n\r\n<h3>Song Choice:&nbsp;<a href=\"https://youtu.be/rPTCv2lxNF8\">&ldquo;Marceline&rdquo; by&nbsp;<em>Vista Kicks</em></a></h3>\r\n\r\n<p>&ldquo;Marceline&rdquo;&nbsp;was the&nbsp;best song for this project -- from the beginning of the song to the middle of the first chorus, it transformed my incomplete and uninformed vision into a stroke of genius.</p>\r\n\r\n<p>When Spotify recommended &ldquo;Marceline&rdquo;, I had a burst of inspiration that led to a two-day editing binge in which I cut beats of the story to the beats of the song.</p>\r\n\r\n<p>The end result&nbsp;is this awesome movie trailer for a fake slasher I titled &ldquo;Ruthless: The Final Chapter&rdquo;.</p>\r\n\r\n<h3>Cutting &ldquo;Ruthless&rdquo; to &ldquo;Marceline&rdquo;</h3>\r\n\r\n<p>The song&nbsp;has an amazing flow from verse to chorus, which goes to show that if your execution is solid, a simple structure&nbsp;<em>works</em>. That informed the way I structured my trailer, which is chunked into 5 &ldquo;beats&rdquo;.</p>\r\n\r\n<p>I cut the opening beats of the trailer (the ominous introduction of my slasher character and his pre-rampage calm) to the 1st verse and pre-chorus of the song. That verse works amazingly well for setting the tone, and then its transition into the pre-chorus lets you know there&#39;s going to be a build-up.</p>\r\n\r\n<p>Naturally, the song itself goes from pre-chorus to chorus, and it works when you&#39;re listening to it on its own. But in the context of the trailer, I needed more build-up: a jump from a visual calm to a visual storm doesn&#39;t work if the exposition is incomplete. At the end of the pre-chorus, my character has been introduced &mdash; but we need to introduce the conflict. Since the conflict involves a murderous rampage, we need to introduce the victims!</p>\r\n\r\n<p>The best way to handle the character introductions was to do so by injecting their footage with name cards. I&#39;m introducing the characters, laying the groundwork for a conflict, and maintaining the &ldquo;trailer&rdquo;&nbsp;vibe of the video. The song&#39;s introduction has a sick guitar solo that just so happens to end with a climax, which was the perfect opportunity to lay in the shot of me bringing the ax down on the camera in an epic segue.</p>\r\n\r\n<p>The song&#39;s chorus alternates between a &ldquo;march&rdquo;&nbsp;and a &ldquo;dynamic&rdquo;&nbsp;tone, which I used in tandem with the alternating shots of Dylan and me, respectively. The post-chorus solo was the perfect time to end the visual conflict on a climax (with me bringing the ax down on Trevor) and transition immediately into the trailer&rsquo;s title card.</p>\r\n\r\n<p>Finally, the second verse on its own made for a solid outro, which brings the &ldquo;story&rdquo;&nbsp;of the trailer full-circle: just like the way we started, we end with the slow reveal of a blood-stained psycho.</p>\r\n', NULL),
(11, 'birthday-text-1', 1, 2, 10, 1, '<h3>Introduction</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus magna fringilla urna porttitor rhoncus dolor purus. Morbi tincidunt augue interdum velit euismod in. Sed nisi lacus sed viverra tellus in hac habitasse. Vivamus arcu felis bibendum ut tristique et. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique. Sem integer vitae justo eget magna fermentum. Sed id semper risus in hendrerit gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Fermentum dui faucibus in ornare quam viverra orci. Eget nulla facilisi etiam dignissim diam. Arcu risus quis varius quam quisque id. Dictum sit amet justo donec enim diam vulputate. Sit amet cursus sit amet dictum sit amet justo. Sit amet est placerat in egestas erat imperdiet.</p>\r\n', NULL),
(12, 'birthday-text-2', 1, 2, 10, 2, '<h3>Part 1</h3>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus magna fringilla urna porttitor rhoncus dolor purus. Morbi tincidunt augue interdum velit euismod in.</p>\r\n\r\n<h4>Part 1-1</h4>\r\n\r\n<p>Sed nisi lacus sed viverra tellus in hac habitasse. Vivamus arcu felis bibendum ut tristique et. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique. Sem integer vitae justo eget magna fermentum. Sed id semper risus in hendrerit gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Fermentum dui faucibus in ornare quam viverra orci. Eget nulla facilisi etiam dignissim diam. Arcu risus quis varius quam quisque id. Dictum sit amet justo donec enim diam vulputate. Sit amet cursus sit amet dictum sit amet justo. Sit amet est placerat in egestas erat imperdiet.</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_class`
--

CREATE TABLE `module_class` (
  `id` int(11) NOT NULL,
  `class` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_class`
--

INSERT INTO `module_class` (`id`, `class`) VALUES
(1, 'blog'),
(10, 'blog__text'),
(11, 'blog__image-single'),
(12, 'blog__image-gallery'),
(13, 'blog__embed');

-- --------------------------------------------------------

--
-- Table structure for table `module_element`
--

CREATE TABLE `module_element` (
  `id` int(11) NOT NULL,
  `element` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_element`
--

INSERT INTO `module_element` (`id`, `element`) VALUES
(1, 'section'),
(2, 'article'),
(3, 'div'),
(4, 'img');

-- --------------------------------------------------------

--
-- Table structure for table `module_gallery`
--

CREATE TABLE `module_gallery` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `element` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_gallery`
--

INSERT INTO `module_gallery` (`id`, `p_id`, `element`, `class`, `position`) VALUES
(1, 1, 3, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module_image`
--

CREATE TABLE `module_image` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `element` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `position` tinyint(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_image`
--

INSERT INTO `module_image` (`id`, `p_id`, `element`, `class`, `position`, `image`) VALUES
(1, 1, 4, 11, 1, 1),
(2, 1, 4, 11, 2, 7),
(3, 1, 4, 11, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `module_parent`
--

CREATE TABLE `module_parent` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `element` int(11) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_parent`
--

INSERT INTO `module_parent` (`id`, `slug`, `element`, `class`) VALUES
(1, 'module-test', 1, 1),
(2, 'meeting-with-zoe', 1, 1),
(3, 'night-lift', 1, 1),
(4, 'ruthless-the-final-chapter', 1, 1),
(5, 'bud-light-for-a-soul', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `content_id`, `image_id`) VALUES
(1, 1, 17),
(2, 2, 18),
(3, 3, 19),
(4, 4, 2),
(5, 5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_card`
--

CREATE TABLE `portfolio_card` (
  `id` int(11) NOT NULL,
  `slug` varchar(75) NOT NULL,
  `title` varchar(75) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_card`
--

INSERT INTO `portfolio_card` (`id`, `slug`, `title`, `description`, `image_id`) VALUES
(1, 'birthday-toast', 'Birthday Toast', '<p>When an 18th birthday party doesn\'t go quite according to plan, the partygoers find themselves ill-equipped to deal with the consequences.</p>', 1),
(2, 'night-lift', 'Night Lift', '<p>It\'s the middle of the night. You\'re out in the cold. You\'re lifting weights.</p><p>You\'re by yourself &mdash; or so it seems...</p>', 3),
(3, 'ruthless-the-final-chapter', 'Ruthless: The Final Chapter', '<p>A trailer for a fake slasher.</p><p>Set to the song &ldquo;Marceline&rdquo; by <em>Vista Kicks</em>.</p>', 4),
(4, 'bud-light-for-a-soul', 'Bud Light (For a Soul)', '<p>Your typical basement dweller finds himself on the wrong side of a bargain...</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `content_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `read_time` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{\'x\': \'y\'}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `slug`, `content_id`, `image_id`, `read_time`, `created_at`, `updated_at`, `published`, `body`) VALUES
(1, 'birthday-toast', 1, 17, 5, '2021-01-23 00:53:05', '2021-01-23 00:53:05', 1, '{\"1\": {\"type\": \"text\", \"content\": \"&lt;h3&gt;Test&lt;/h3&gt;&lt;p&gt;This is a test section.&lt;/p&gt;\"}, \"2\": {\"type\": \"gallery\", \"content\": [17, 18, 19]}}'),
(2, 'night-lift', 2, 18, 5, '2021-01-23 00:53:05', '2021-01-23 00:53:05', 1, '{\"1\": {\"type\": \"text\", \"content\": \"&lt;h3&gt;Introduction&lt;/h3&gt;&lt;p&gt;This was an AWESOME film!&lt;/p&gt;\"}, \"2\": {\"type\": \"gallery\", \"content\": [17, 18, 19]}}'),
(3, 'ruthless-the-final-chapter', 3, 19, 5, '2021-01-23 00:53:05', '2021-01-23 00:53:05', 1, '{\"1\": {\"type\": \"text\", \"content\": \"&lt;h3&gt;Introduction&lt;/h3&gt;&lt;p&gt;This was an AWESOME film!&lt;/p&gt;\"}, \"2\": {\"type\": \"gallery\", \"content\": [17, 18, 19]}}'),
(4, 'bud-light-for-a-soul', 4, 2, 5, '2021-01-23 00:53:05', '2021-01-23 00:53:05', 1, '{\"1\": {\"type\": \"text\", \"content\": \"&lt;h3&gt;Introduction&lt;/h3&gt;&lt;p&gt;This was an AWESOME film!&lt;/p&gt;\"}, \"2\": {\"type\": \"gallery\", \"content\": [17, 18, 19]}}'),
(5, 'travelers-screensaver', 5, 16, 5, '2021-01-23 00:53:05', '2021-01-23 00:53:05', 1, '{\"1\": {\"type\": \"text\", \"content\": \"&lt;h3&gt;Introduction&lt;/h3&gt;&lt;p&gt;Travelers was a damn awesome show, wasn\'t it?&lt;/p&gt;\"}, \"2\": {\"type\": \"gallery\", \"content\": [16, 10]}}');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `read_time` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `banner` int(11) DEFAULT NULL,
  `summary` varchar(256) DEFAULT '<p class="warning">Insert Summary Here</p>',
  `body` text DEFAULT NULL,
  `module` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `read_time`, `created_at`, `updated_at`, `published`, `banner`, `summary`, `body`, `module`) VALUES
(2, 'Final Meeting w/ Zoe Friedman', 'meeting-with-zoe', 2, '2020-12-08 16:04:01', '2021-01-06 19:23:53', 1, NULL, '<p>New summary! Testing to see if I need &quot;content-editable&quot;...</p>\r\n', '<h3>Introduction</h3>\r\n\r\n<p>My meeting with Zoe on Dec. 8, 2020 was a good follow-up to the first meeting we had. ADDING THIS!</p>\r\n\r\n<p>I went into the meeting with a pretty all-over-the-place approach.</p>\r\n\r\n<ul>\r\n	<li>We started off by talking about how I&#39;ve been doing this semester.</li>\r\n	<li>She asked me about my future plans.\r\n	<ul>\r\n		<li>I&#39;m taking some classes next semester to graduate:\r\n		<ul>\r\n			<li>Animation 1</li>\r\n			<li>Web Design 2</li>\r\n			<li>Women&#39;s Health!?!</li>\r\n		</ul>\r\n		</li>\r\n		<li>I&#39;m applying to the Film &amp; Animation MFA program&nbsp;at RIT.</li>\r\n		<li>I&#39;m going to hang out at Ventana Productions in D.C. this winter.</li>\r\n	</ul>\r\n	</li>\r\n	<li>We talked about my portfolio... AKA my Behanced portfolio, my personal website (production mode), and my personal website (public view).\r\n	<ul>\r\n		<li>She thinks that the painting is distracting from my overall purpose.</li>\r\n		<li>My purpose is to demonstrate my skill as a filmmaker/web developer to potential employers.</li>\r\n		<li>My design stuff is cool, but it doesn&#39;t totally demonstrate my skill as a professional in the fields I&#39;m specializing in.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Personal Website</h3>\r\n\r\n<p>We discussed my personal website and how I should lay it out and organize it.</p>\r\n\r\n<p>K.I.S.S.!!!</p>\r\n\r\n<ul>\r\n	<li>My Home Page can be as simple as the three buttons:\r\n	<ul>\r\n		<li>Portfolio</li>\r\n		<li>Education</li>\r\n		<li>About</li>\r\n	</ul>\r\n	</li>\r\n	<li>I need to keep the focus on my most relevant and recent attributes.</li>\r\n	<li>Everything else about me is cool (like my time at R.I.T.), but it&#39;s background. It&#39;s not 100% relevant to my life as a filmmaker/web developer.</li>\r\n</ul>\r\n', 2),
(3, 'Birthday Toast', 'birthday-toast', 5, '2020-12-13 16:20:37', '2021-01-21 04:22:08', 1, 17, '<p>When an 18th birthday party doesn&#39;t go quite according to plan, the partygoers find themselves ill-equipped to deal with the consequences.</p>\r\n', '<p>{~poster-birthday-toast~}{~graduation-reilly-lucas~}{~birthday-toast-rehearsal~}</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus magna fringilla urna porttitor rhoncus dolor purus. Morbi tincidunt augue interdum velit euismod in. Sed nisi lacus sed viverra tellus in hac habitasse. Vivamus arcu felis bibendum ut tristique et. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique. Sem integer vitae justo eget magna fermentum. Sed id semper risus in hendrerit gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Fermentum dui faucibus in ornare quam viverra orci. Eget nulla facilisi etiam dignissim diam. Arcu risus quis varius quam quisque id. Dictum sit amet justo donec enim diam vulputate. Sit amet cursus sit amet dictum sit amet justo. Sit amet est placerat in egestas erat imperdiet.</p>\r\n\r\n<p>Ut sem viverra aliquet eget sit. In nibh mauris cursus mattis molestie a. Nibh tellus molestie nunc non blandit. Eget magna fermentum iaculis eu non diam phasellus vestibulum lorem. At risus viverra adipiscing at in tellus. Facilisis gravida neque convallis a cras. Leo duis ut diam quam nulla porttitor massa. Sagittis orci a scelerisque purus semper eget duis. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Placerat duis ultricies lacus sed turpis tincidunt id. Mauris vitae ultricies leo integer malesuada nunc vel risus. Viverra vitae congue eu consequat ac felis donec et odio. Faucibus turpis in eu mi bibendum neque egestas. Venenatis a condimentum vitae sapien pellentesque habitant. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Cras pulvinar mattis nunc sed blandit libero volutpat.</p>\r\n\r\n<p>Venenatis lectus magna fringilla urna. Ut placerat orci nulla pellentesque dignissim enim sit. Amet consectetur adipiscing elit duis tristique. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Tincidunt vitae semper quis lectus. Rhoncus urna neque viverra justo nec ultrices dui sapien. In cursus turpis massa tincidunt. Maecenas volutpat blandit aliquam etiam erat velit scelerisque. Enim nunc faucibus a pellentesque sit amet. Sem integer vitae justo eget magna fermentum. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Porttitor rhoncus dolor purus non. Sodales ut etiam sit amet nisl. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat. Dolor purus non enim praesent elementum facilisis.</p>\r\n\r\n<p>Amet facilisis magna etiam tempor orci eu. Duis at tellus at urna condimentum mattis pellentesque. Magna fermentum iaculis eu non. Sodales ut etiam sit amet nisl purus in. Et ultrices neque ornare aenean. Arcu dictum varius duis at consectetur lorem donec. Turpis massa sed elementum tempus egestas sed sed risus. Mauris sit amet massa vitae tortor condimentum lacinia. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Arcu dui vivamus arcu felis bibendum ut tristique et. Nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae.</p>\r\n\r\n<p>Lectus sit amet est placerat in egestas erat. Convallis tellus id interdum velit laoreet id. Turpis egestas integer eget aliquet nibh praesent. Consequat interdum varius sit amet mattis vulputate enim nulla. Ullamcorper morbi tincidunt ornare massa eget. Pretium lectus quam id leo in vitae turpis massa. Proin nibh nisl condimentum id venenatis a condimentum vitae. At consectetur lorem donec massa sapien. Sed felis eget velit aliquet sagittis id consectetur purus. Egestas maecenas pharetra convallis posuere morbi leo. Dolor purus non enim praesent elementum. Suspendisse ultrices gravida dictum fusce ut. Mauris in aliquam sem fringilla ut morbi. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n', 1),
(4, 'Night Lift', 'night-lift', 2, '2020-12-13 16:27:36', '2021-01-21 04:24:17', 1, 18, '<p>It&rsquo;s the middle of the night. You&rsquo;re out in the cold. You&rsquo;re lifting weights.</p>\r\n\r\n<p>You&rsquo;re by yourself &mdash; or so it seems...</p>\r\n', '<h3>Cinematography</h3>\r\n\r\n<p>I spent more time considering how the shots should be framed and how to block those shots in <em>Night Lift</em> than I did in previous projects, and part of that was due to the solo nature of this film.</p>\r\n\r\n<p>Compared to my basic shot wishlist in <em>Birthday Toast</em> that the cinematographer was able to improve upon, I dedicated more time during this project to make my shots look as good as possible.</p>\r\n\r\n<h3>Lighting</h3>\r\n\r\n<p>As a general rule of thumb for this film, if you could see something in the dark (the grass, the trees, the house, or the treehouse), I made an effort to cast light on it.</p>\r\n\r\n<p>I was generous with the gaffing around the weight set, given the presence of the porch light, but this led to an issue with an extra shadow being cast on the wall. I ended up writing this off as a &ldquo;missable detail&rdquo;; the average viewer wouldn&#39;t notice it if they weren&#39;t looking for it.</p>\r\n\r\n<h3>Sound</h3>\r\n\r\n<p>The primary inspiration for this project was the idea of using diegetic music as a horror element.</p>\r\n\r\n<p>I establish that the song playing throughout the film is coming from my phone; this pays off when I realize that the bloody psycho is using&nbsp;<em>my</em>&nbsp;phone&rsquo;s flashlight to search for me because the song is playing in the distance.</p>\r\n\r\n<p>The suspense theme that plays during the &ldquo;run-and-hide&rdquo; sequence is non-diegetic, but I cut it out the minute the protagonist realizes the bloody psycho is looking for him.</p>\r\n\r\n<p>Everything else was pure foley sound; instead of worrying about recording the sounds during&nbsp;each shot, I waited until after the film was cut to record the various sounds (e.g. the weights being racked, the glass door being pounded, etc.).</p>\r\n\r\n<div class=\"blog-gallery cols-3 rows-1\">{~poster-night-lift~}{~poster-birthday-toast~}{~poster-ruthless-the-final-chapter~}</div>\r\n', 3),
(5, 'Ruthless: The Final Chapter', 'ruthless-the-final-chapter', 4, '2020-12-13 16:45:02', '2021-01-21 04:24:23', 1, 19, '<p>A trailer for a fake slasher.</p>\r\n\r\n<p>Set to the song &ldquo;Marceline&rdquo; by&nbsp;<em>Vista Kicks</em>.</p>\r\n', '<p>For a video editing project, I cut my own version of a movie trailer from footage I collected with other students to the song &quot;Marceline&quot; by Vista Kicks.</p>\r\n\r\n<h3>Song Choice: <a href=\"https://youtu.be/rPTCv2lxNF8\">&ldquo;Marceline&rdquo; by <em>Vista Kicks</em></a></h3>\r\n\r\n<p>&ldquo;Marceline&rdquo;&nbsp;was the&nbsp;best song for this project -- from the beginning of the song to the middle of the first chorus, it transformed my incomplete and uninformed vision into a stroke of genius.</p>\r\n\r\n<p>When Spotify recommended &ldquo;Marceline&rdquo;, I had a burst of inspiration that led to a two-day editing binge in which I cut beats of the story to the beats of the song.</p>\r\n\r\n<p>The end result&nbsp;is this awesome movie trailer for a fake slasher I titled &ldquo;Ruthless: The Final Chapter&rdquo;.</p>\r\n\r\n<h3>Cutting &ldquo;Ruthless&rdquo; to &ldquo;Marceline&rdquo;</h3>\r\n\r\n<p>The song&nbsp;has an amazing flow from verse to chorus, which goes to show that if your execution is solid, a simple structure <em>works</em>. That informed the way I structured my trailer, which is chunked into 5 &ldquo;beats&rdquo;.</p>\r\n\r\n<p>I cut the opening beats of the trailer (the ominous introduction of my slasher character and his pre-rampage calm) to the 1st verse and pre-chorus of the song. That verse works amazingly well for setting the tone, and then its transition into the pre-chorus lets you know there&#39;s going to be a build-up.</p>\r\n\r\n<p>Naturally, the song itself goes from pre-chorus to chorus, and it works when you&#39;re listening to it on its own. But in the context of the trailer, I needed more build-up: a jump from a visual calm to a visual storm doesn&#39;t work if the exposition is incomplete. At the end of the pre-chorus, my character has been introduced &mdash; but we need to introduce the conflict. Since the conflict involves a murderous rampage, we need to introduce the victims!</p>\r\n\r\n<p>The best way to handle the character introductions was to do so by injecting their footage with name cards. I&#39;m introducing the characters, laying the groundwork for a conflict, and maintaining the &ldquo;trailer&rdquo;&nbsp;vibe of the video. The song&#39;s introduction has a sick guitar solo that just so happens to end with a climax, which was the perfect opportunity to lay in the shot of me bringing the ax down on the camera in an epic segue.</p>\r\n\r\n<p>The song&#39;s chorus alternates between a &ldquo;march&rdquo;&nbsp;and a &ldquo;dynamic&rdquo;&nbsp;tone, which I used in tandem with the alternating shots of Dylan and me, respectively. The post-chorus solo was the perfect time to end the visual conflict on a climax (with me bringing the ax down on Trevor) and transition immediately into the trailer&rsquo;s title card.</p>\r\n\r\n<p>Finally, the second verse on its own made for a solid outro, which brings the &ldquo;story&rdquo;&nbsp;of the trailer full-circle: just like the way we started, we end with the slow reveal of a blood-stained psycho.</p>\r\n', 4),
(6, 'Bud Light (For a Soul)', 'bud-light-for-a-soul', 8, '2020-12-13 16:48:16', '2021-01-21 04:24:42', 1, 2, '<p>Your typical basement dweller finds himself on the wrong side of a bargain...</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus magna fringilla urna porttitor rhoncus dolor purus. Morbi tincidunt augue interdum velit euismod in. Sed nisi lacus sed viverra tellus in hac habitasse. Vivamus arcu felis bibendum ut tristique et. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique. Sem integer vitae justo eget magna fermentum. Sed id semper risus in hendrerit gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Fermentum dui faucibus in ornare quam viverra orci. Eget nulla facilisi etiam dignissim diam. Arcu risus quis varius quam quisque id. Dictum sit amet justo donec enim diam vulputate. Sit amet cursus sit amet dictum sit amet justo. Sit amet est placerat in egestas erat imperdiet.</p>\r\n\r\n<p>Ut sem viverra aliquet eget sit. In nibh mauris cursus mattis molestie a. Nibh tellus molestie nunc non blandit. Eget magna fermentum iaculis eu non diam phasellus vestibulum lorem. At risus viverra adipiscing at in tellus. Facilisis gravida neque convallis a cras. Leo duis ut diam quam nulla porttitor massa. Sagittis orci a scelerisque purus semper eget duis. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Placerat duis ultricies lacus sed turpis tincidunt id. Mauris vitae ultricies leo integer malesuada nunc vel risus. Viverra vitae congue eu consequat ac felis donec et odio. Faucibus turpis in eu mi bibendum neque egestas. Venenatis a condimentum vitae sapien pellentesque habitant. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Cras pulvinar mattis nunc sed blandit libero volutpat.</p>\r\n\r\n<p>Venenatis lectus magna fringilla urna. Ut placerat orci nulla pellentesque dignissim enim sit. Amet consectetur adipiscing elit duis tristique. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Tincidunt vitae semper quis lectus. Rhoncus urna neque viverra justo nec ultrices dui sapien. In cursus turpis massa tincidunt. Maecenas volutpat blandit aliquam etiam erat velit scelerisque. Enim nunc faucibus a pellentesque sit amet. Sem integer vitae justo eget magna fermentum. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Porttitor rhoncus dolor purus non. Sodales ut etiam sit amet nisl. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat. Dolor purus non enim praesent elementum facilisis.</p>\r\n\r\n<p>Amet facilisis magna etiam tempor orci eu. Duis at tellus at urna condimentum mattis pellentesque. Magna fermentum iaculis eu non. Sodales ut etiam sit amet nisl purus in. Et ultrices neque ornare aenean. Arcu dictum varius duis at consectetur lorem donec. Turpis massa sed elementum tempus egestas sed sed risus. Mauris sit amet massa vitae tortor condimentum lacinia. Scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Arcu dui vivamus arcu felis bibendum ut tristique et. Nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae.</p>\r\n\r\n<p>Lectus sit amet est placerat in egestas erat. Convallis tellus id interdum velit laoreet id. Turpis egestas integer eget aliquet nibh praesent. Consequat interdum varius sit amet mattis vulputate enim nulla. Ullamcorper morbi tincidunt ornare massa eget. Pretium lectus quam id leo in vitae turpis massa. Proin nibh nisl condimentum id venenatis a condimentum vitae. At consectetur lorem donec massa sapien. Sed felis eget velit aliquet sagittis id consectetur purus. Egestas maecenas pharetra convallis posuere morbi leo. Dolor purus non enim praesent elementum. Suspendisse ultrices gravida dictum fusce ut. Mauris in aliquam sem fringilla ut morbi. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus magna fringilla urna porttitor rhoncus dolor purus. Morbi tincidunt augue interdum velit euismod in. Sed nisi lacus sed viverra tellus in hac habitasse. Vivamus arcu felis bibendum ut tristique et. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique. Sem integer vitae justo eget magna fermentum. Sed id semper risus in hendrerit gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut. Fermentum dui faucibus in ornare quam viverra orci. Eget nulla facilisi etiam dignissim diam. Arcu risus quis varius quam quisque id. Dictum sit amet justo donec enim diam vulputate. Sit amet cursus sit amet dictum sit amet justo. Sit amet est placerat in egestas erat imperdiet.</p>\r\n\r\n<p>Ut sem viverra aliquet eget sit. In nibh mauris cursus mattis molestie a. Nibh tellus molestie nunc non blandit. Eget magna fermentum iaculis eu non diam phasellus vestibulum lorem. At risus viverra adipiscing at in tellus. Facilisis gravida neque convallis a cras. Leo duis ut diam quam nulla porttitor massa. Sagittis orci a scelerisque purus semper eget duis. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Placerat duis ultricies lacus sed turpis tincidunt id. Mauris vitae ultricies leo integer malesuada nunc vel risus. Viverra vitae congue eu consequat ac felis donec et odio. Faucibus turpis in eu mi bibendum neque egestas. Venenatis a condimentum vitae sapien pellentesque habitant. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Cras pulvinar mattis nunc sed blandit libero volutpat.</p>\r\n\r\n<p>Venenatis lectus magna fringilla urna. Ut placerat orci nulla pellentesque dignissim enim sit. Amet consectetur adipiscing elit duis tristique. Quis risus sed vulputate odio ut enim blandit volutpat maecenas. Tincidunt vitae semper quis lectus. Rhoncus urna neque viverra justo nec ultrices dui sapien. In cursus turpis massa tincidunt. Maecenas volutpat blandit aliquam etiam erat velit scelerisque. Enim nunc faucibus a pellentesque sit amet. Sem integer vitae justo eget magna fermentum. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Porttitor rhoncus dolor purus non. Sodales ut etiam sit amet nisl. Aliquet porttitor lacus luctus accumsan tortor posuere ac ut consequat. Dolor purus non enim praesent elementum facilisis.</p>\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'film'),
(2, 'web development'),
(3, 'art'),
(4, 'web design'),
(5, 'horror'),
(6, 'comedy'),
(7, 'mystery'),
(8, 'thriller'),
(9, 'music video'),
(10, 'music');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `src` varchar(128) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attributes`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `src`, `attributes`) VALUES
(1, 'Birthday Toast', 'https://player.vimeo.com/video/460666013', '{\r\n\"allow\": \"autoplay; fullscreen; picture-in-picture\",\r\n\"allowfullscreen\": \"\"}'),
(2, 'Night Lift', 'https://player.vimeo.com/video/467477083', '{\r\n\"allow\": \"autoplay; fullscreen; picture-in-picture\",\r\n\"allowfullscreen\": \"\"}'),
(3, 'Ruthless: The Final Chapter', 'https://player.vimeo.com/video/465210163', '{\r\n\"allow\": \"autoplay; fullscreen; picture-in-picture\",\r\n\"allowfullscreen\": \"\"}'),
(4, 'Bud Light (For a Soul)', 'https://www.youtube.com/embed/o-0vCYiBWtA', '{\r\n\"allow\": \"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\",\r\n\"allowfullscreen\": \"\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_card_to_img` (`image_id`) USING BTREE;

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_entity`
--
ALTER TABLE `content_entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_image`
--
ALTER TABLE `content_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_post`
--
ALTER TABLE `content_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_tag`
--
ALTER TABLE `content_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_tag_by_content` (`content_id`,`position`),
  ADD UNIQUE KEY `unique_tag_per_content` (`content_id`,`tag_id`);

--
-- Indexes for table `content_video`
--
ALTER TABLE `content_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory`
--
ALTER TABLE `directory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_parent_path` (`p_id`,`slug`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `html5_elements`
--
ALTER TABLE `html5_elements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `element` (`element`),
  ADD KEY `fk_group_id` (`group_id`);

--
-- Indexes for table `html5_groups`
--
ALTER TABLE `html5_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `element` (`slug`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_directory`
--
ALTER TABLE `image_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_class`
--
ALTER TABLE `module_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_element`
--
ALTER TABLE `module_element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_gallery`
--
ALTER TABLE `module_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_image`
--
ALTER TABLE `module_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_parent`
--
ALTER TABLE `module_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_card`
--
ALTER TABLE `portfolio_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pc_to_id` (`image_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_has_media` (`banner`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content_entity`
--
ALTER TABLE `content_entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_image`
--
ALTER TABLE `content_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content_post`
--
ALTER TABLE `content_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content_tag`
--
ALTER TABLE `content_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `content_video`
--
ALTER TABLE `content_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `directory`
--
ALTER TABLE `directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `html5_elements`
--
ALTER TABLE `html5_elements`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `html5_groups`
--
ALTER TABLE `html5_groups`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `image_directory`
--
ALTER TABLE `image_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `module_class`
--
ALTER TABLE `module_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `module_element`
--
ALTER TABLE `module_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `module_gallery`
--
ALTER TABLE `module_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module_image`
--
ALTER TABLE `module_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module_parent`
--
ALTER TABLE `module_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolio_card`
--
ALTER TABLE `portfolio_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image_directory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directory`
--
ALTER TABLE `directory`
  ADD CONSTRAINT `rk_parentdir_id` FOREIGN KEY (`p_id`) REFERENCES `directory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `html5_elements`
--
ALTER TABLE `html5_elements`
  ADD CONSTRAINT `fk_group_id` FOREIGN KEY (`group_id`) REFERENCES `html5_groups` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `portfolio_card`
--
ALTER TABLE `portfolio_card`
  ADD CONSTRAINT `fk_pc_to_id` FOREIGN KEY (`image_id`) REFERENCES `image_directory` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_blog_has_media` FOREIGN KEY (`banner`) REFERENCES `image_directory` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
