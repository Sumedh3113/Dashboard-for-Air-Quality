from selenium import webdriver;
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
import time
import unittest

class AssertInput(unittest.TestCase):
	
	def setup(self):
		global browser 
		browser= webdriver.Chrome()
		browser.maximize_window()
		browser.get('http://iotdashboard.atwebpages.com/')
		
	def AssetTitle(self):
		#self.browser = getBrowser()
		self.assertEqual(browser.title,"IoT Dashboard")

	def date(self):
		self.select =browser.find_element_by_name("from")
		time.sleep(1)
		self.select.send_keys("04/01/2019")

		self.selectTo = browser.find_element_by_name("to")
		time.sleep(1)
		self.selectTo.send_keys("04/30/2019")

		self.submits = browser.find_element_by_name("submit")
		self.submits.click()

		time.sleep(1)
		self.check = browser.find_element_by_name("Date_title")
		self.assertEqual(self.check.text, "Date Graph")

	def back(self):
		self.back = browser.find_element_by_xpath("/html/body/a")
		time.sleep(1)
		self.back.send_keys(Keys.RETURN)


		

	def button(self):
		element = browser.find_element_by_name("humidity")
		self.assertEqual(element.is_enabled(),True)
	
	
	def exitcode(self):
	 	browser.quit()
		
if __name__ == "__main__":
	import sys;sys.argv=["", 'AssertInput.setup', 'AssertInput.AssetTitle','AssertInput.date','AssertInput.back','AssertInput.button', 'AssertInput.exitcode']
	unittest.main()