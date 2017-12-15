# Team Name
Production Number 4

# Members
Nicholas Palmer  
Melissa Mantey  
Sophia Loughlin  
Kaelan Patel  
Chris Scarola  

#Important Testing Requirements
-Planit has been tested on Chrome. Please use Chrome while testing the website.  
-Server hours: Not available between 11pm to 7am. This is when Chris is sleeping, and so his computer will be off and no access to the server. Please do not test website then.  

# Description of Repo Organization
List of Folders in Repo:  
-**content,** **php,** **and** **templates:** The index.php is the main page of Planit and the only file left outside of a folder. All other pages for the website are distributed into the content and php folders. The content folder holds the static pages for our website, including the dashboard, which is the main page when you log in, as well as the calendar page, group calendar page, manage groups page, settings page, and a php file for the login module. The php folder contains all of the handlers for each page. An example file you will find there is the load_tasks handler, which pulls the user's tasks from MySQL and displays them in a table on the dashboard page.
The templates directory contains code included in most of the pages on the website, like the navbar and the header content. The code is contained in files that can be included easily in all of the website pages.
-**js** **and** **css:** The js and css directories contain all of the css and javascript code needed for custom styling and interactivity on the website.   
-**sql:** The sql directory contains two files that build Planit's database, which will be described in detail in the next section.  
-**assets:** The assets directory contains icons and images, like the Planit icon that sophy designed and the pictures included on the front page.  
-**mandala:** The mandala directory contains code for the secret feature hidden in Planit.  
-**misc:** The misc folder contains miscellaneous files from previous milestones that aren't very important for running the website.  
-**tests:** Finally, the tests folder contains all of the files needed for autotesting and unit testing from Milestone 5.  
	
# Description of where to find and how to build/run/test/etc code
How to build database:  
1. Make sure MySQL is open in one terminal and your password for it is "password"  
2. Create a database called Planit  
3. In another terminal window, change to the sql directory: 
	cd /php/  
4. Copy everything from file called create_db.sql and paste into MySQL. It will create the database for you.  
5. Copy everything from file called fill_db.sql and paste into MySQL. It will fill the database for you.  

How to access the website:  
1. Clone the repository: https://github.com/nickpalmer789/ProductionNumber4.git  
	git clone https://github.com/nickpalmer789/ProductionNumber4.git  
2. Change directory to repository  
	cd /ProductionNumber4  
3. Run this command to use PHP's built-in Web Server
	php -S localhost:8000  
4. In chrome, go to this website:  
	http://73.14.69.109/index.php  

How to do Testing: 
1. Change to the testing directory  
2. Follow README instructions in that directory.   
