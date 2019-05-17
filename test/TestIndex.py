from selenium import webdriver;
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
import time


browser= webdriver.Chrome();
browser.maximize_window();
browser.get('http://iotdashboard.atwebpages.com/');



select =browser.find_element_by_name("from")
time.sleep(3)
select.send_keys("04/01/2019")

selectTo =browser.find_element_by_name("to")
time.sleep(3)
selectTo.send_keys("04/30/2019")

# to keep proof of outcome after the dates are selected
#browser.get_screenshot_as_file("D:/Python_leet/mathworks/graphScreen.png")

submits =browser.find_element_by_name("submit")
submits.send_keys(Keys.RETURN)

back =browser.find_element_by_xpath("/html/body/a")
time.sleep(3)
back.send_keys(Keys.RETURN)


#browser.close()
