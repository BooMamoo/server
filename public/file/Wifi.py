import socket
import requests
import datetime

TCP_IP = '10.206.113.132'
TCP_PORT = 33333
BUFFER_SIZE = 50

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((TCP_IP, TCP_PORT))
s.listen(1)

while 1:
	conn, addr = s.accept()

	while 1:
		data = conn.recv(BUFFER_SIZE)
		current = datetime.datetime.now()
		if not data: break

		tmp = data.split(',')
		device = tmp[0]
		device_type = tmp[1]
		value = tmp[2]

		req = requests.post("http://localhost/data", data = {'device' : device, 'type' : device_type, 'value' : value, 'date' : current})
		print data
		print(req.status_code, req.reason)

		conn.send(data)
	conn.close()