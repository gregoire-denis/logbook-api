FROM alpine:3.19

RUN apk add --update --no-cache nginx

COPY docker/nginx/conf/server.nginx /etc/nginx/nginx.conf
COPY docker/nginx/conf/api.nginx /etc/nginx/conf.d/api.conf

RUN adduser -D -g '' -G www-data www-data

CMD nginx