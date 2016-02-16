# Notice-Board
This is the notice board online version for the classes 

this project is under Apache License Version 2.0,

structure
./class/-- Contains the php classes which are defined based on database. Primarly Database tables can only be acessed by classes only (except some global functions).Classes are loaded automatically if an instant of it is created. 
	--/traits/-- contains the fucntion which are common to multiple classes without inheriting them.

./dbms-- Contains the configuration required to access the database including database name.

./display/-- Contains the HTML code in which php is embeded which to display the containts to the end user.
	--/forms/-- Contains the HTML forms used to take user input. 
	--/funtions/-- Contains the function written in PHP and HTML to display containts.
	--/<>.nav.func.php-- contains the buttons which are required to navigate the pages when the database size increase significantly.

./functions/-- Contains the global functions.

./images/-- Contains the images

./.htaccess-- it a file to overide apache server settings for that part of the site.

./head.php-- Contains the HTML head tag it conatins embeded PHP to customize according to the page.

./header.php-- Contains the HTML header tag it contains site title and dynamic menue according to the page and user.

./footer.php-- Contains the HTML footer tag which contains footer information.

./install.php-- Simple script to Create tables required by this site to work.

./*.css-- These are the style sheets base on Material Design Lite by Google

./core.php-- Contains the codes which are common to front line pages including codes to automatillay load the classes and global functions.

other file are the front line pages which are used to display to end user.  