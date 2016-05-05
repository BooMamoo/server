import paho.mqtt.client as mqtt
import time
import requests
import datetime

BROKER_PORT = 1884
BROKER_HOST = "127.0.0.1"
KEEPALIVE = 60
TOPIC = 'IoTPlatform/#'
LOCAL = 'http://localhost'

def on_connect(client, userdata, results):
	print "Connected!!"
	client.subscribe(TOPIC, 0)
    
def on_message(client, userdata, msg):
	print "Incomming message is [TOPIC] " + msg.topic + " : " + "[message] " + msg.payload
	current = datetime.datetime.now()
	tmp = msg.topic.split('/')
	device = tmp[1]
	device_type = tmp[2]
	value = msg.payload
	print current
	req = requests.post(LOCAL + "/data", data = {'device' : device, 'type' : device_type, 'value' : value, 'date' : current})
	print "Send to local site"
	print (req.status_code, req.reason)
          
client = mqtt.Client()
client.on_connect =  on_connect    
client.on_message = on_message

client.connect(BROKER_HOST, BROKER_PORT, KEEPALIVE)
client.loop_start()

while True:
    try :
        time.sleep(0.01)
    except KeyboardInterrupt :
        client.unsubscribe(TOPIC)
        client.disconnect()
        break