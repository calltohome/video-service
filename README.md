# Video-Service

Video-Service is for uploading, viewing and live streaming video.

### Prerequisites

```
A Linux distribution of your choice

Python (usually preinstalled)

PHP and Nginx

FFmpeg
```

### Installing

Installing Nginx and PHP

```
Here is a guide on how to install PHP and Nginx for this project: 
https://www.rosehosting.com/blog/install-php-7-1-with-nginx-on-an-ubuntu-16-04-vps/
```

Installing Python (if needed) and FFmpeg
```
Python and FFmpeg can be installed easily in terminal with a single command, here's an example:

sudo apt update && apt install python3 && apt install ffmpeg
```

End with an example of getting some data out of the system or using it for a little demo

## Deployment

Run 'autosearch_script.py' (in upload/ ) to start searching for video files in upload folder. 

To live stream video, use 'ffmpeg_live_script.sh' (in convert/live/ ). Currently you have to manually change the RTMP URL in this file to the live stream source IP-address.