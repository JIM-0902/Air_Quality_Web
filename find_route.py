import os
import csv
import time
import pyautogui
import pandas as pd
from sqlalchemy import create_engine
from selenium import webdriver
from selenium.webdriver import ActionChains
from selenium.webdriver.support.ui import Select

Year=input('請輸入搜尋年份:')
Month=input('請輸入搜尋月份:')
Date=input('請輸入搜尋日期:')
Time=input('請輸入搜尋時間:')

result='空氣品質指標(AQI)(歷史資料)'+' '+'('+Year+'/'+Month+')'
Search=Year+'-'+Month+'-'+Date+' '+Time
print(result)
print(Search)


driver=webdriver.Chrome('/Users/jimmy/Downloads/chromedriver-2')
driver.fullscreen_window() # 如果沒這行，mac打開Chrome會有問題
driver.get('https://data.epa.gov.tw/dataset/aqx_p_488')

# 利用xpth進行網頁自動化操作

driver.find_element_by_link_text(result).click()
driver.find_element_by_xpath("/html//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']//div[@class='btn-toggle-filter-wrap']/a[@href='#']").click()
driver.find_element_by_xpath("/html//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']//div[@class='resource-view-filters']//label/span").click()
driver.find_element_by_xpath("/html//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']/div[1]/div[1]/div[@class='query-wrap']/div[2]/a[@href='#']").click()
select=Select(driver.find_element_by_xpath("/html//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']/div[1]/div[1]//select[@class='field']"))
select.select_by_index(16)
driver.find_element_by_xpath("/html//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']/div[1]/div[1]//input[@placeholder='請輸入條件']").send_keys(Search)
time.sleep(5)
driver.find_element_by_xpath("//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']/div[1]/div[1]/a[@href='#']").click()
driver.find_element_by_xpath("//div[@id='view']/section[@class='module']/div/div[@class='resource-view']/div[@class='resource-view']//div[@class='resource-dowloads']/a[2]").click()
time.sleep(5)

driver.quit()


infn='/Users/jimmy/Downloads/null.csv'
outfn='/Users/jimmy/Desktop/自動化下載環保局空氣品質資料-組合資料/test3.csv'

with open(infn)as csvrfile:
    csvReader=csv.reader(csvrfile)
    listReport=list(csvReader)
with open (outfn,'w',newline='')as cvsofile:
    csvwrite=csv.writer(cvsofile)
    for row in listReport:
        csvwrite.writerow(row)

# 複製完成後，將下載的null.csv刪除，以免下次再執行時造成檔案讀取的問題
os.remove('/Users/jimmy/Downloads/null.csv')

# 將csv檔存入MySQL資料庫中

data=pd.read_csv("test3.csv") #把cvs格式的檔案讀取成一個DataFrame

data.index.name="id"

engine=create_engine("mysql+mysqlconnector://root:oiet123456@127.0.0.1:3306/TEST",echo=False)

data.to_sql(name='Airpollution',con=engine,if_exists="replace")

os.remove('/Users/jimmy/Desktop/自動化下載環保局空氣品質資料-組合資料/test3.csv')


# 開啟瀏覽頁面的HTML網頁
driver=webdriver.Chrome('/Users/jimmy/Downloads/chromedriver-2')
driver.fullscreen_window() # 如果沒這行，mac打開Chrome會有問題
driver.get('http://localhost:8888/Airpollution.html')

