#!/usr/bin/python
import time, os, subprocess, sys
arr = os.listdir("/usr/share/nginx/html/upload")

try:
	files = open("files.txt","r+")
except IOError:
	files = 2

if files != None:
	while True:
		arr = os.listdir("/usr/share/nginx/html/upload")
		time.sleep(5)
		#for f in *.mp4:
		#os.popen(ffmpeg_script.sh)
		subprocess.call("/usr/share/nginx/html/upload/ffmpeg_script.sh", shell=True)
		print (arr)
 	   	#break
		for listitem in arr:
			if listitem.endswith(".sh") or listitem.endswith(".py"):
				print "working as intended"
			else:
				os.remove(os.path.join("/usr/share/nginx/html/upload/", listitem))
else:
	print("error")
