from selenium import webdriver;
from selenium.webdriver.common.keys import Keys
import time


browser= webdriver.Chrome();
browser.maximize_window();
browser.get('http://iotdashboard.atwebpages.com/');

def backButton():
	backButton = browser.find_element_by_xpath("/html/body/a")
	backButton.send_keys(Keys.RETURN)

	

selectButton1 =browser.find_element_by_xpath("/html/body/div[3]/div[1]/div[1]/form/input")
time.sleep(3)
selectButton1.send_keys(Keys.RETURN)
time.sleep(3)
browser.get_screenshot_as_file("D:/Python_leet/mathworks/Humidity.png")
backButton()

selectButton1 =browser.find_element_by_xpath("/html/body/div[3]/div[1]/div[2]/form/input")
time.sleep(3)
selectButton1.send_keys(Keys.RETURN)
time.sleep(3)
#browser.get_screenshot_as_file("D:/Python_leet/mathworks/Temp.png")
backButton()




	
