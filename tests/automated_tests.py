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
        self.driver.get('http://73.14.69.109/index.php')
        self.assertEqual("Planit", self.driver.title)
        self.test_result = 'pass'
        self.driver.quit()
       
    def test_login(self):
        print("Testing login...")
        self.driver.get('http://73.14.69.109/index.php')
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
            self.driver.get("http://73.14.69.109/content/dashboard.php")
            print("check break time")
            self.driver.find_element_by_id('breakTime')
            print("Checking for Settings button")
            self.driver.find_element_by_name('settings_button')
            print("found settings button...")
            self.driver.find_element_by_name('logout_button')
            print("found logout button!")
        finally:
            self.test_result='pass'
            self.driver.quit()
        


if __name__ == '__main__':
    unittest.main()

