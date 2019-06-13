from selenium import webdriver;
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.by import By
import time
import unittest

class AssertInput(unittest.TestCase):
	

	def setup(self):
		global browser 
		browser= webdriver.Chrome()
		browser.maximize_window()
		browser.get('http://iotdashboard.atwebpages.com/connect.php')
		
	def Message(self):
		self.select = browser.find_element_by_xpath("/html/body")
		time.sleep(2)
		#print(self.select)
		self.assertEqual(self.select.text,"Connected successfully")		
	
	def exitcode(self):
	 	browser.quit()
		
if __name__ == "__main__":
	import sys;sys.argv=["", 'AssertInput.setup','AssertInput.Message', 'AssertInput.exitcode']
	unittest.main()