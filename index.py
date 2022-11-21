from apscheduler.schedulers.background import BackgroundScheduler
import requests
import json

url = "http://localhost:8888/orders/v1/index.php"
payload = json.dumps({
  "expected_delivery": "11/25/2022",
  "delivery_address": "Gujrat",
  "billing_address": "Ahmdabad",
  "customer_id": 1,
  "order_items": {
    "id": 1,
    "qty": 5
  },
  "status": 1,
  "is_delayed": 1
})
headers = {
  'Content-Type': 'application/json'
}
scheduler = BackgroundScheduler(daemon=True)
def deplayed_order():
    response = requests.request("POST", url, headers=headers, data=payload)
    print(response.text)
scheduler.add_job(deplayed_order,'interval',seconds=5)

scheduler.start()


count = 0








response = requests.request("POST", url, headers=headers, data=payload)

print(response.text)
