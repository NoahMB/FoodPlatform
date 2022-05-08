from selectorlib import Extractor
import requests 
import json 
import urllib3
http = urllib3.PoolManager()
import sys
import nltk

# Create an Extractor by reading from the YAML file
e = Extractor.from_yaml_file('includes/Python/search_results.yml')

def scrape(url):  

    headers = {
        'dnt': '1',
        'upgrade-insecure-requests': '1',
        'user-agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36',
        'accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'sec-fetch-site': 'same-origin',
        'sec-fetch-mode': 'navigate',
        'sec-fetch-user': '?1',
        'sec-fetch-dest': 'document',
        'referer': 'https://www.amazon.com/',
        'accept-language': 'en-GB,en-US;q=0.9,en;q=0.8',
    }

    # Download the page using requests
    r = requests.get(url, headers=headers)
    # Simple check to check if page was blocked (Usually 503)
    if r.status_code > 500:
        if "To discuss automated access to Amazon data please contact" in r.text:
            print("Page %s was blocked by Amazon. Please try using better proxies\n"%url)
        else:
            print("Page %s must have been blocked by Amazon as the status code was %d"%(url,r.status_code))
        return None
    # Pass the HTML of the page and create 
    return e.extract(r.text)

id = sys.argv[1]

urlName = "includes/Python/" + str(id) + "_urls.txt"
outputName = "includes/Python/" + str(id) + "_output.json"

# product_data = []
with open(urlName,'r') as urllist, open(outputName,'w') as outfile:
    outfile.write("{\n")
    outfile.write("\"items\": [\n")
    for url in urllist.read().splitlines():
        data = scrape(url) 
        if data:
            for product in data['products']:
                product['search_url'] = url
                json.dump(product,outfile)
                if data['products'].index(product) != len(data['products']) - 1:
                    outfile.write(",")
                outfile.write("\n")
                # sleep(5)
    outfile.write("]\n")
    outfile.write("}")