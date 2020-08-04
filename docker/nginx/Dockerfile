FROM nginx:1.17-alpine

COPY app /var/www/html
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html/public

ADD app/public /var/www/html/public