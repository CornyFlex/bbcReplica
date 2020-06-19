This is a project I did for university which is based upon creating a replica site to its original with most of the features used by everday blogging sites. 
Yes, it is a blogging site.

It is important to know that this is not a standalone site, and it requires the use of a php server (XAMPP used for development).

Before running the site (running "index.php"), it's needed to import the "bbc.sql" inside of a database platform (PHPMyAdmin used for development).
The name of the database should be "bbc". If you're not using XAMPP with default configuration values as a PHP server, consider updating the file "connect.php" with your login credentials.

The project was made using the technologies of HTML, CSS, Javascript, PHP and MySQL. This is the final version and newer version may not be available (dummy project.)

Features of the project: 
- creating blog posts
- working login/register system
- viewing blogs
- searching by category
- deleting/editing blogs (admin privilege required, privilege can be added manually in the database)
- javascript validation (vanilla javascript used)
- archiving a blog (an archived blog will not be displayed on the site, only users with admin privileges can see archived posts and/or pull them from the archive
- prepared statements used for protecting from SQL injection on creating blog posts


Thank you for your understanding. Cheers.
