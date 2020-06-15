FROM nginx

COPY src /var/www 
COPY site.conf /etc/nginx/conf.d
