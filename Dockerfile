FROM webdevops/php-nginx:latest

RUN git clone https://github.com/smarty-php/smarty.git /tmp/smarty && mkdir -p /usr/share/php/smarty3 && cp -r /tmp/smarty/libs/* /usr/share/php/smarty3

COPY --chown=application src /app 
