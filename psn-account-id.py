#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import sys
import requests

from urllib.parse import urlparse, parse_qs, quote, urljoin
import pprint
import base64

# Remote Play Windows Client
CLIENT_ID = "ba495a24-818c-472b-b12d-ff231c1b5745"
CLIENT_SECRET = "mvaiZkRsAsI1IBkY"

LOGIN_URL = "https://auth.api.sonyentertainmentnetwork.com/2.0/oauth/authorize?service_entity=urn:service-entity:psn&response_type=code&client_id={}&redirect_uri=https://remoteplay.dl.playstation.net/remoteplay/redirect&scope=psn:clientapp&request_locale=en_US&ui=pr&service_logo=ps&layout_type=popup&smcid=remoteplay&prompt=always&PlatformPrivacyWs1=minimal&".format(CLIENT_ID)
TOKEN_URL = "https://auth.api.sonyentertainmentnetwork.com/2.0/oauth/token"

print()

code_url_s = sys.argv[1]
code_url = urlparse(code_url_s)
query = parse_qs(code_url.query)
if "code" not in query or len(query["code"]) == 0 or len(query["code"][0]) == 0:
	print("-> Paste a valid url to have PSN ID")
	exit(1)
code = query["code"][0]


api_auth = requests.auth.HTTPBasicAuth(CLIENT_ID, CLIENT_SECRET)
body = "grant_type=authorization_code&code={}&redirect_uri=https://remoteplay.dl.playstation.net/remoteplay/redirect&".format(code)

token_request = requests.post(TOKEN_URL,
	auth = api_auth,
	headers = { "Content-Type": "application/x-www-form-urlencoded" },
	data = body.encode("ascii"))


if token_request.status_code != 200:
	print("-> Request failed with code {}:\n{}".format(token_request.status_code, token_request.text))
	exit(1)

token_json = token_request.json()
if "access_token" not in token_json:
	print("-> \"access_token\" is missing in response JSON:\n{}".format(token_request.text))
	exit(1)
token = token_json["access_token"]

account_request = requests.get(TOKEN_URL + "/" + quote(token), auth = api_auth)

if account_request.status_code != 200:
	print("-> Request failed with code {}:\n{}".format(account_request.status_code, account_request.text))
	exit(1)

account_info = account_request.json()

if "user_id" not in account_info:
	exit(1)

user_id = int(account_info["user_id"])
user_id_base64 = base64.b64encode(user_id.to_bytes(8, "little")).decode()

print()
print("-> This is your AccountID:")
print(user_id_base64)
exit(0)

