from bs4 import BeautifulSoup
import requests
from textblob import TextBlob
import json
import os
import pandas as pd

input = "schoenen"
page = 1
here = os.path.dirname(os.path.realpath(__file__))
subdir = "JSON"

url = 'https://www.amazon.nl/s?k=' + input + '&page=' + str(page)
print(url)
r = requests.get(url)
soup = BeautifulSoup(r.text, features="html.parser")

name = soup.find_all('span',{ "class" : "a-size-base-plus a-color-base a-text-normal" })
price = soup.find_all('span',{ "class" : "a-price-whole" })
urlItem = soup.find_all('a',{ "class" : "a-link-normal s-underline-text s-underline-link-text s-link-style a-text-normal" })

if len(name) > 0:
    print("OK!")
    counter = 0

    while counter < len(name):
        spanTxt = ""
        for span in name[counter]:
            spanTxt = str(span.text)

        imgSrc = ""
        picture = soup.find_all('img',{ "alt" : spanTxt})
        for image in picture:
            imgSrc = image["src"]

        spanPrice = ""
        for span in price[counter]:
            spanPrice = str(span.text)

        urlItem = soup.find_all('a',{ "class" : "a-link-normal s-underline-text s-underline-link-text s-link-style a-text-normal" })[counter]
        aHref = "https://amazon.nl" + str(urlItem["href"])

        newDictionary = {"img" : imgSrc, "name" : spanTxt, "price" : spanPrice, "href" : [aHref]}
        json_object = json.dumps(newDictionary, indent = 4)

        filename = str(counter) + ".json"
        filepath = os.path.join(here, subdir, filename)

        with open(filepath, "w") as outfile:
            outfile.write(json_object)

        newDictionary = {}
        counter += 1
    
    counter = 0
    mainDF = pd.DataFrame()
    while counter < len(name):
        filename = str(counter) + ".json"
        filepath = os.path.join(here, subdir, filename)
        print(filepath)
        
        df = pd.read_json(filepath)
        mainDF = pd.concat([mainDF, df])
        print(len(mainDF))

        os.remove(filepath)

        counter += 1

    filename = "Items.json"
    filepath = os.path.join(here, subdir, filename)
    mainDF.to_json(filepath, orient='records') 

else:
    print("Fuck you")