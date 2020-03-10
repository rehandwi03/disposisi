FROM creativitykills/nginx-php-server:2.0.0
MAINTAINER Neo Ighodaro <neo@hotels.ng>
COPY . /var/www/
RUN chmod -Rf 777 /var/www/storage/