import requests
import urllib.parse
from bs4 import BeautifulSoup

url = "http://web_container:8000/install/install.php"
sess = requests.Session()
response = sess.get(url)
soup = BeautifulSoup(response.text, 'html.parser')
csrf_input = soup.find('input', {'name': '__csrf_magic'})
csrf_token = csrf_input['value'] if csrf_input else None
csrf = csrf_token.split(";")
print("CSRF token:", csrf)



url = "http://web_container:8000/"
login_url = url + "install/install.php"


login_data = {
    "__csrf_magic": csrf[0],
    "action": "login",
    "login_username": "admin",
    "login_password": "admin"
}
print(login_data)
post_response = sess.post(login_url, data=login_data)



for i in range(1,11):
    step_url=url+"/install/step_json.php"
    step1={
        "data[Step]": i,
        "data[Eula]": "true",
        "data[Theme]": "modern",
        "data[Language]": "en-US",
        "__csrf_magic": csrf[0]
    }
    print(i)
    post_response = sess.post(step_url, data=step1)
for i in range(5):
    step1={
        "data[Step]": 97,
        "data[Eula]": "true",
        "data[Theme]": "modern",
        "data[Language]": "en-US",
        "__csrf_magic": csrf[0]
    }
    post_response = sess.post(step_url, data=step1)
    print(post_response.text)
