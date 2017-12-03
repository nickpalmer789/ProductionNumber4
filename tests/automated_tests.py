import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import requests

class SeleniumCBT(unittest.TestCase):
    def setUp(self):

        self.username = "scarolac@colorado.edu"
        self.authkey  = "ue6d54cff39ce185"

        self.api_session = requests.Session()
        self.api_session.auth = (self.username,self.authkey)
        self.test_result = None

        caps = {}
        caps['browserName'] = 'Chrome'
        caps['version'] = '60x64'
        caps['platform'] = 'Windows 10'
        caps['screenResolution'] = '1366x768'

        self.driver = webdriver.Remote(
            desired_capabilities=caps,
            command_executor="http://%s:%s@hub.crossbrowsertesting.com:80/wd/hub"%(self.username,self.authkey)
        )

        self.driver.implicitly_wait(20)

#    def test_CBT(self):
#        print("Testing Title of Webiste...")
#        self.driver.get('http://73.14.69.109/index.php')
#        self.assertEqual("Planit", self.driver.title)
#        print("Planit = " + self.driver.title)
#        print("Success!")
#        self.test_result = 'pass'
#        self.driver.quit()
#       
#    def test_login(self):
#        print("Testing login...")
#        self.driver.get('http://73.14.69.109/index.php')
#        self.driver.save_screenshot('screenshot.png')
#        print("Success! Took screenshot")
#        try:
#            login_button = WebDriverWait(self.driver, 10).until(
#                EC.presence_of_element_located((By.ID, "login_button"))
#            )
#            login_button.click()
#            print("Getting username and password...")
#            self.driver.find_element_by_name('username').send_keys('mema0341')
#            self.driver.find_element_by_name('password').send_keys('spring2017')
#            self.driver.save_screenshot('screenshot1.png')
#            print("Success! Took screenshot1")
#            self.driver.find_element_by_id('login_button_1').submit()
#            print("Checking if we redirect to Dashboard")
#            self.driver.get("http://73.14.69.109/content/dashboard.php")
#            print("Success! Took screenshot2")
#            self.driver.save_screenshot('screenshot2.png')
#            print("Checking for Settings button")
#            self.driver.find_element_by_id('settings_button')
#            print("found settings button...")
#            self.driver.find_element_by_id('logout_button').submit()
#            print("found logout button! clicking and checking if we see login button... ")
#            self.driver.save_screenshot('screenshot3.png')
#            print("Success! Took screenshot3")
#            print("logging in john1...")
#            login_button = WebDriverWait(self.driver, 10).until(
#                EC.presence_of_element_located((By.ID, "login_button"))
#            )
#            login_button.click()
#            self.driver.find_element_by_name('username').send_keys('john1')
#            self.driver.find_element_by_name('password').send_keys('password')
#            self.driver.save_screenshot('screenshot4.png')
#            self.driver.find_element_by_id('login_button_1').submit()
#            print("Success! Took screenshot4")
#            print("Checking if we redirect to Dashboard")
#            self.driver.get("http://73.14.69.109/content/dashboard.php")
#            self.driver.save_screenshot('screenshot5.png')
#            print("Success! Took screenshot5")
#            print("Checking for Settings button")
#            self.driver.find_element_by_id('settings_button')
#            print("found settings button...")
#            self.driver.find_element_by_id('logout_button').submit()
#            print("found logout button! clicking ... ")
#            print("Success! Took screenshot6")
#            self.driver.save_screenshot('screenshot6.png')
#            print("Test complete.")
#        finally:
#            self.test_result='pass'
#            self.driver.quit()
        
    def test_create_task(self):
        print("Navigating to tasks...")
        self.driver.get('http://73.14.69.109/index.php')
        try:
            login_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "login_button"))
            )
            login_button.click()
            self.driver.find_element_by_name('username').send_keys('mema0341')
            self.driver.find_element_by_name('password').send_keys('spring2017')
            self.driver.find_element_by_id('login_button_1').submit()
            self.driver.get("http://73.14.69.109/content/dashboard.php")
            print("adding task called 'automated test task'...")
            self.driver.save_screenshot('screenshot9.png')
            
            task_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "new_task_button"))
            )
            task_button.click()
            self.driver.save_screenshot('screenshot10.png')

            self.driver.find_element_by_name('taskName').send_keys('automated test task')
            print("added name")
            self.driver.find_element_by_name('description').send_keys('automated description')
            print("added description")
            self.driver.find_element_by_name('deadlineDate').send_keys('12/02/2017')
            print("added deadline date")
            self.driver.find_element_by_name('deadlineTime').send_keys('11:55:00 PM')
            print("added deadline time")
            self.driver.find_element_by_name('eta').send_keys('3 hours')
            print("added eta")
            self.driver.save_screenshot('screenshot7.png')
            self.driver.find_element_by_name('createTask').submit()
            print("Success! Took screenshot7 and screenshot8.png")
            self.driver.save_screenshot('screenshot8.png')
            
            print("Test complete.")
        finally:
            self.test_result='pass'
            self.driver.quit() 
        
#    def test_create_account(self):
#        print("Testing Create Account...")
#        self.driver.get('http://73.14.69.109/index.php')
#        self.driver.save_screenshot('screenshot.png')
#        print("Success! Took screenshot")
#        try:
#            login_button = WebDriverWait(self.driver, 10).until(
#                EC.presence_of_element_located((By.ID, "login_button"))
#            )
#            login_button.click()
#            print("Getting username and password...")
#            self.driver.find_element_by_name('username').send_keys('mema0341')
#            self.driver.find_element_by_name('password').send_keys('spring2017')
#            self.driver.save_screenshot('screenshot1.png')
#            print("Success! Took screenshot1")
#            self.driver.find_element_by_id('login_button_1').submit()
#            print("Checking if we redirect to Dashboard")
#            self.driver.get("http://73.14.69.109/content/dashboard.php")
#            print("Success! Took screenshot2")
#            self.driver.save_screenshot('screenshot2.png')
#            print("Test complete.")
#        finally:
#            self.test_result='pass'
#            self.driver.quit() 


if __name__ == '__main__':
    unittest.main()

