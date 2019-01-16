#!/bin/bash
FILES=/usr/share/nginx/html/upload/*;
for f in $FILES; do

mkdir "${f%%.*}"
mkdir "${f%%.*}"/thumbnail/
ffmpeg -i "$f" \
 -vf scale=w=640:h=360:force_original_aspect_ratio=decrease -c:a aac -ar 48000 -c:v h264 -profile:v main -preset ultrafast -crf 22 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod  -b:v 800k -maxrate 856k -bufsize 1200k -b:a 96k -hls_segment_filename "${f%%.*}"/360p_%03d.ts "${f%%.*}"/360p.m3u8 \
  -vf scale=w=842:h=480:force_original_aspect_ratio=decrease -c:a aac -ar 48000 -c:v h264 -profile:v main -preset ultrafast -crf 22 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 1400k -maxrate 1498k -bufsize 2100k -b:a 128k -hls_segment_filename "${f%%.*}"/480p_%03d.ts "${f%%.*}"/480p.m3u8 \
  -vf scale=w=1280:h=720:force_original_aspect_ratio=decrease -c:a aac -ar 48000 -c:v h264 -profile:v main -preset ultrafast -crf 22 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 2800k -maxrate 2996k -bufsize 4200k -b:a 128k -hls_segment_filename "${f%%.*}"/720p_%03d.ts "${f%%.*}"/720p.m3u8 \
  -vf scale=w=1920:h=1080:force_original_aspect_ratio=decrease -c:a aac -ar 48000 -c:v h264 -profile:v main -preset ultrafast  -crf 22 -sc_threshold 0 -g 48 -keyint_min 48 -hls_time 4 -hls_playlist_type vod -b:v 5000k -maxrate 5350k -bufsize 7500k -b:a 192k -hls_segment_filename "${f%%.*}"/1080p_%03d.ts "${f%%.*}"/1080p.m3u8;

ffmpeg -i "${f%%.*}"/360p.m3u8 -vf fps=1/20 "${f%%.*}"/thumbnail/thumb%03d.jpg;

master_playlist="#EXTM3U
#EXT-X-VERSION:3
#EXT-X-STREAM-INF:BANDWIDTH=800000,RESOLUTION=640x360
360p.m3u8
#EXT-X-STREAM-INF:BANDWIDTH=1400000,RESOLUTION=842x480
480p.m3u8
#EXT-X-STREAM-INF:BANDWIDTH=2800000,RESOLUTION=1280x720
720p.m3u8
#EXT-X-STREAM-INF:BANDWIDTH=5000000,RESOLUTION=1920x1080
1080p.m3u8";

echo -e "$master_playlist" > "${f%%.*}"/playlist.m3u8;

mv "${f%%.*}" /usr/share/nginx/html/convert/;

rm -r "${f%%.*}"

done
