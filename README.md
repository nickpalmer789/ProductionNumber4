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
-content  
-php  
-templates  
-css  
-js  
-sql  
-assets  
-mandala  
-misc  
-tests  

The index.php is the main page of Planit and the only file left outside of a folder. All other pages for the website are distributed into the content and php folders. The content folder holds the static pages for our website, including the dashboard, which is the main page when you log in, as well as the calendar page, group calendar page, manage groups page, settings page, and a php file for the login module. The php folder contains all of the handlers for each page. An example file you will find there is the load_tasks handler, which pulls the user's tasks from MySQL and displays them in a table on the dashboard page.
The templates directory contains code included in most of the pages on the website, like the navbar and the header content. The code is contained in files that can be included easily in all of the website pages.

The js and css directories contain all of the css and javascript code needed for custom styling and interactivity on the website.  

The sql directory contains two files that build Planit's database, which will be described in detail in the next section.  

The assets directory contains icons and images, like the Planit icon that sophy designed and the pictures included on the front page.  

The mandala directory contains code for the secret feature hidden in Planit.  

The misc folder contains miscellaneous files from previous milestones that aren't very important for running the website.  

Finally, the tests folder contains all of the files needed for autotesting and unit testing from Milestone 5.  
	
# Description of where to find and how to build/run/test/etc code


