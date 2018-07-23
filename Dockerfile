FROM nickistre/ubuntu-lamp-xdebug
MAINTAINER Dmytro Tkach <dimafreund@ukr.net>
ADD . /var/www/html
ADD 000-default.conf /etc/apache2/sites-available
#RUN apt-get update
#RUN apt-get install nano
RUN rm /var/www/html/index.html
RUN a2enmod rewrite
RUN service apache2 restart

RUN /bin/bash -c "/usr/bin/mysqld_safe --skip-grant-tables &" && \
  sleep 5 && \
  mysql -u root -e "CREATE DATABASE wmetier" && \
  mysql -u root wmetier < /var/www/html/wmetier.sql

EXPOSE 80
