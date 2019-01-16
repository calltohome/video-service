# Video-Service

Video-Service is for uploading, viewing and live streaming video.

## Prerequisites

You will need: 

- A Linux distribution of your choice (Ubuntu 18.04 used in this case and is preferred)

- Python (usually preinstalled in many Linux distributions)

- PHP Hypertext Preprocessor and Nginx server

- FFmpeg

## Installing

### Installing Nginx and PHP

Here is a guide on how to install PHP and Nginx for this project:

* [Install PHP 7.1 with Nginx on Ubuntu 16.04]

### Installing Python (if needed) and FFmpeg

Python and FFmpeg can be installed easily in terminal with a single command, like this:

```sh
$ sudo apt update && apt install python3 && apt install ffmpeg
```

## Deployment

Run 'autosearch_script.py' (in upload/ ) to start searching for video files in upload folder. 

To live stream video, use 'ffmpeg_live_script.sh' (in convert/live/ ). Currently you have to manually change the RTMP URL in this file to the live stream source IP-address.

[Install PHP-7-1 with Nginx on Ubuntu 16.04]: <https://www.rosehosting.com/blog/install-php-7-1-with-nginx-on-an-ubuntu-16-04-vps/>