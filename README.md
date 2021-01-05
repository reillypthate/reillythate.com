# reillythate.com
A full-stack project in which I construct a responsive personal website with a fully-customized back-end system written in PHP.

## Goals
+ Develop a solid backend system for my personalized website.
+ Develop a workflow that enables me to convert dynamic pages into static pages.
+ Create a great-looking website that reflects my talent as a developer, artist, and scientist.

## Skills Developed
Front-end: HTML, CSS, and JavaScript.
Back-end: PHP, MySQL, Google Apps Script

## Front-End Skills

### HTML
I extend my HTML knowledge by strategically organizing the content of each page to boost the efficiency of my design workflow and to solidify the SEO potential of my pages.

### CSS
I use SASS to keep my design code well-organized and dry. An efficient design workflow leads to speedy updates whenever I want to make simple design changes, and if I have more ambitious goals, I have a solid foundation on which I can implement those design choices.
Whenever I have design choices that go beyond the scope of CSS, I start messing around with JavaScript.

### JavaScript
Let's just say JQuery has made my life a whole lot easier.

#### Menu Button
I'm able to save screen space with a hamburger menu button that toggles the visibility of the main navigation menu; JavaScript enables accurate height calculations that keep the design clean.

#### Contact Form Validation/Submission

For the form on my Contact page, my code prioritizes completion and validation of the form's fields: once each required field has been filled and unique fields (e.g. email) have been validated, the form submit button is enabled.

The secondary priority is to respond to progress: when the user switches successfully completes a field and switches focus to another, the completed field's border turns green. A red border (and error message) appears when an invalid field entry occurs.

Finally, once the form is submitted, I use JavaScript to pipe the form information to a customized Google Apps script that places it into a Google Sheets table, and I notify the user that their message was successfully sent.

## Back-End Skills

### PHP
PHP drew me in with the potential for consolidating repetitive HTML elements into separate pages I can call with a simple require_once() call. Its potential went *way* beyond that. By integrating database functionality into the code, I can populate an entire page with unique content and detailed meta information by simply adding a slug variable to the top of the page.

### MySQL
A simple slug can be used as the precursor for fully-automating the construction of my web pages with information stored in a MySQL database. What I'm able to do with PHP/MySQL integration would completely blow the mind of my younger self.

## Front-End / Back-End Integration
PHP has output buffers that can be used to generate static HTML files. On their own, these pages would be fine for a smaller website. However, I'll be consistently updating my website with new work and blogs, so I need to be able to implement some dynamic elements if I want to reduce the number of "updates" I need to make.

Let's say I make a new blog post; I already have a few pages I'll have to add/update: adding the "new" blog page, my Home and Blog pages to update my "featured" blog, my "All Blogs" page, and the previous blog so I can add a pagination button that links to the new blog, and whichever other pages may be relevant to that blog... Wouldn't I be happier if I could update a single file that manages the references within these other pages?

### Strategy
I can name these references in a single JSON file, and I can use JavaScript to process the references on the front end. The end result: a static website that uses JavaScript to provide dynamic functionality.

Static websites are cheap to host, and the scale of my website's operations aren't large enough to justify investing in a dedicated server despite my desire for dynamic functionality. The whole point of dynamic functionality is to separate content from the code that showcases it, but I don't need to separate *everything*; a complete blog page will be 99% static and 1% dynamic via a simple JavaScript function that places reference links in the right places. If I need to update the blog itself, that's a single-page update; if I need to update the references, that's a single-page update.

Bringing it all together, this whole project is about developing a methodology for maintaining and expanding a cheap personal website after it's been launched with as little effort as possible. Whenever I finish a new dynamic page on my backend site, it shouldn't take me more than a minute to generate a static HTML file from it, update the master reference JSON, and upload those two pages to the Amazon Web Services S3 bucket that hosts my static site.
