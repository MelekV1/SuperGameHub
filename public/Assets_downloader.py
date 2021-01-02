import requests

def download_files(url):
    #Extract the file name
    local_filename = url.split('/')[-1]
    #use Get protocol method for requesting from the url
    #with statement in Python is cleaner and readable exception handling technique
    with requests.get(url, stream=True) as r:
        print("Downloading...")
        with open("C:/Users/user/SuperGameHub/public/images/"+local_filename, 'wb') as f:
            print("Writing data to file")
            #Best practice
            #download the data with chunck of 8192 kb at a time
            for chunk in r.iter_content(chunk_size=8192):
                f.write(chunk)
    f.close()
    print("Download complete")
    print("File saved as "+ local_filename)

while 1:
    print("Welcome to the image downloader")
    image_url = input(str("Image url : "))
    download_files(image_url)
    print("")