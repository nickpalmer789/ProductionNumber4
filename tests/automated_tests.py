import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import requests

class SeleniumCBT(unittest.TestCase):
    def setUp(self):

        self.username = "mmantey9@gmail.com"
        self.authkey  = "uc3530e35d02ec2c"

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

    def test_CBT(self):
        print("Testing Title of Webiste...")
        self.driver.get('http://73.14.69.109/index.php')
        self.assertEqual("Planit", self.driver.title)
        print("Planit = " + self.driver.title)
        print("Success!")
        self.test_result = 'pass'
        self.driver.quit()
       
    def test_login(self):
        print("Testing login...")
        self.driver.get('http://73.14.69.109/index.php')
        self.driver.save_screenshot('screenshot.png')
        print("Success! Took screenshot")
        try:
            login_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "login_button"))
            )
            login_button.click()
            print("Getting username and password...")
            self.driver.find_element_by_name('username').send_keys('mema0341')
            self.driver.find_element_by_name('password').send_keys('spring2017')
            self.driver.save_screenshot('screenshot1.png')
            print("Success! Took screenshot1")
            self.driver.find_element_by_id('login_button_1').submit()
            print("Checking if we redirect to Dashboard")
            self.driver.get("http://73.14.69.109/content/dashboard.php")
            print("Success! Took screenshot2")
            self.driver.save_screenshot('screenshot2.png')
            print("Checking for Settings Button and Logout Button")
            self.driver.find_element_by_id('settings_button')
            self.driver.find_element_by_id('logout_button').submit()
            self.driver.save_screenshot('screenshot3.png')
            print("Success! Took screenshot3")
            print("logging in john1...")
            login_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "login_button"))
            )
            login_button.click()
            self.driver.find_element_by_name('username').send_keys('john1')
            self.driver.find_element_by_name('password').send_keys('password')
            self.driver.save_screenshot('screenshot4.png')
            self.driver.find_element_by_id('login_button_1').submit()
            print("Success! Took screenshot4")
            print("Checking if we redirect to Dashboard")
            self.driver.get("http://73.14.69.109/content/dashboard.php")
            self.driver.save_screenshot('screenshot5.png')
            print("Success! Took screenshot5")
            print("Checking for Settings Button and Logout Button")
            self.driver.find_element_by_id('settings_button')
            self.driver.find_element_by_id('logout_button').submit()
            print("Success! Took screenshot6")
            self.driver.save_screenshot('screenshot6.png')
            print("Test complete.")
        finally:
            self.test_result='pass'
            self.driver.quit()

    def test_newtask(self):
        print("Testing Create New Task...")
        self.driver.get('http://73.14.69.109/index.php')
#        try:
        login_button = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.ID, "login_button"))
        )
        login_button.click()
        print("Sending username and password...")
        self.driver.find_element_by_name('username').send_keys('mema0341')
        self.driver.find_element_by_name('password').send_keys('spring2017')
        self.driver.find_element_by_id('login_button_1').submit()
        print("Checking if we redirect to Dashboard")
        self.driver.get("http://73.14.69.109/content/dashboard.php")
        print("Success! Took screenshot7")
        self.driver.save_screenshot('screenshot7.png')  
        print("pressing new task button")
        task_button = WebDriverWait(self.driver, 10).until(
            EC.presence_of_element_located((By.ID, "new_task_button"))
        )
        task_button.click()
        print("Success! Took screenshot8")
        self.driver.save_screenshot('screenshot8.png')
        print("Filling out new user form...")
        self.driver.find_element_by_name('taskName').send_keys('automatedtask')
        self.driver.find_element_by_id('describe').send_keys('automatedtaskdescription')
        self.driver.find_element_by_name('deadlineDate').send_keys('12/02/2017')
        self.driver.find_element_by_name('deadlineTime').send_keys('11:55:00PM')
        self.driver.find_element_by_name('eta').send_keys('3 hours')
        print("Success! Took screenshot9")
        self.driver.save_screenshot('screenshot9.png')
        print("submitting form")
        self.driver.find_element_by_name('createTask').submit()
        print("Success! Took screenshot10")
        self.driver.save_screenshot('screenshot10.png')            
#        finally:
        self.test_result='pass'
        self.driver.quit() 


    def test_create_account(self):
        print("Testing Create Account...")
        self.driver.get('http://73.14.69.109/index.php')
        try:
            start_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "get_started_button"))
            )
            start_button.click()
            print("pressed button! Took screenshot11")
            self.driver.save_screenshot('screenshot11.png')
            print("Switching to new user page..")
            self.driver.get('http://73.14.69.109/content/new_user.php')
            print("Creating username: autobot and password:auto ...")
            self.driver.find_element_by_name('firstname').send_keys('bobautobot')
            self.driver.find_element_by_name('lastname').send_keys('autobot')
            self.driver.find_element_by_name('email').send_keys('mrautobot@colorado.edu')            
            self.driver.find_element_by_id('usname').send_keys('autobot_test')
            self.driver.find_element_by_id('pass').send_keys('auto')
            self.driver.find_element_by_name('confirmpassword').send_keys('auto')
            self.driver.save_screenshot('screenshot12.png')
            print("Success! Took screenshot 12")
            self.driver.find_element_by_name('login').submit()
            print("Success! Took screenshot 13")
            self.driver.save_screenshot('screenshot13.png')
            print("Test complete.")
        finally:
            self.test_result='pass'
            self.driver.quit() 


if __name__ == '__main__':
    unittest.main()

