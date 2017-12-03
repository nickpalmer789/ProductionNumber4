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

    def test_CBT(self):
        print("Trying to get localhost...")
        self.driver.get('http://127.0.0.1/index.php')
        print("Got it, checking name...")
        self.assertEqual("Planit", self.driver.title)
        self.test_result = 'pass'
        self.driver.quit()
       
    def test_login(self):
        print("Testing login...")
        self.driver.get('http://127.0.0.1/index.php')
        try:
            login_button = WebDriverWait(self.driver, 10).until(
                EC.presence_of_element_located((By.ID, "login_button"))
            )
            login_button.click()
            print("Getting username and password...")
            self.driver.find_element_by_name('username').send_keys('mema0341')
            self.driver.find_element_by_name('password').send_keys('spring2017')
            self.driver.find_element_by_id('login_button_1').click()
            print("Checking if we redirect to Dashboard")
            self.driver.get("http://127.0.0.1//content/dashboard.php")
            print("Checking if navbar updated buttons")
            self.driver.find_element_by_name('settings_button')
            self.driver.find_element_by_name('login_button')
        finally:
            self.driver.quit()
        


if __name__ == '__main__':
    unittest.main()

