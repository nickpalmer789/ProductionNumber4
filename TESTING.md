Who:
    Nicholas Palmer
    Melissa Mantey
    Sophia Loughlin
    Kaelan Patel
    Chris Scarola

Title: Production Number 4

Vision: 
    We hope to develop an integrated platform on which one can set up their schedule, manage tasks, see their friends' schedules, and plan and collaborate with one another.

Automated Tests:
1. Clone Our Repository If Not Done Already...
	https://github.com/nickpalmer789/ProductionNumber4

2. Make sure you are in the develop branch
	git checkout develop

3. Go to the sql directory and create our database in mysql using the two files in the directory.
	cd /sql
	copy and paste create_db.sql in mysql
	copy and paste fill_db.sql in mysql
	use planit in mysql

4. Now navigate to tests fold
	cd ..
	cd /tests

5. Install selenium

	sudo pip install selenium

	sudo pip install requests

6. Run pythontester file

	python automated_tests.py

The test will run two tests: the first test makes sure that when you pull the website the Title is Planit. 
The second test attempts to log in as user mema0341 with password spring2017. It first looks for the login button, clicks it, then enters the parameters and clicks the login button again. After it logs in, it checks to see if the navbar has changed to include the settings and logout buttons. It then logs out and logs a new user in, john1. It checks that the user is successfully logged in and logs out again. Screenshots at various steps are provided.

7. Automated Testing Complete.


Unit Tests:
There are 3 different files in the tests folder of our repository for unit tests:
	Planit_UAT_CreateAccount.pdf
	Planit_UAT_Login.pdf
	Planit_UAT_CreateTask.pdf
Please read the pdfs and follow their instructions for our unit tests.

