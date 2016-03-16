import paho.mqtt.client as mqtt
import time
import requests

BROKER_PORT = 44445
BROKER_HOST = "158.108.181.235"
KEEPALIVE = 60
TOPIC = 'IoTPlatform/#'
SERVER = 'http://158.108.34.49/boo/iotserver'

def register(parameter, local, data):
    req = requests.post(SERVER + '/data/store', data = {'parameter' : parameter, 'local' : local, 'data' : data})
    print "Register"
    print (req.status_code, req.reason)

def edit(parameter, local, data):
    req = requests.post(SERVER + '/data/edit', data = {'parameter' : parameter, 'local' : local, 'data' : data})
    print "Edit"
    print (req.status_code, req.reason)

def delete(parameter, local, data):
    req = requests.post(SERVER + '/data/delete', data = {'parameter' : parameter, 'local' : local, 'data' : data})
    print "Delete"
    print (req.status_code, req.reason)

def on_connect(client, userdata, results):
    print "Connected!!"
    client.subscribe(TOPIC, 1)
    
def on_message(client, userdata, msg):
    print "Incomming message is [TOPIC] " + msg.topic + " : " + "[Message] " + msg.payload
    
    tmp = msg.topic.split('/')
    action = tmp[1]
    parameter = tmp[2]
    local = tmp[3]

    if(action == 'regis'):
        register(parameter, local, msg.payload)
    elif(action == 'edit'):
        edit(parameter, local, msg.payload)
    elif(action == 'delete'):
        delete(parameter, local, msg.payload)
     
client = mqtt.Client(client_id = "subscribe", clean_session = False)
client.on_connect =  on_connect    
client.on_message = on_message

client.connect(BROKER_HOST, BROKER_PORT, KEEPALIVE)
client.loop_start()

while True:
    try :
        time.sleep(0.01)
    except KeyboardInterrupt :
        client.unsubscribe(TOPIC, 1)
        client.disconnect()
        break