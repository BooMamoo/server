import serial
import requests
import datetime

while(1):	
	current = datetime.datetime.now()
	serial_value = serial.Serial('/dev/ttyUSB0', 9600)
	data = serial_value.readline()
	serial_value.close()
	tmp = data.split(',')
	device = tmp[0]
	device_type = tmp[1]
	value = tmp[2]

	req = requests.post("http://localhost/data", data = {'device' : device, 'type' : device_type, 'value' : value, 'date' : current})
	print(req.status_code, req.reason)