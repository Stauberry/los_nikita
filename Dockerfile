#FROM php:8.2-apache
#
## Устанавливаем PDO
#RUN docker-php-ext-install pdo pdo_mysql
#
## Устанавливаем DocumentRoot на /public
#ENV APACHE_DOCUMENT_ROOT /var/www/html/public
#
## Меняем DocumentRoot в конфиге Apache
#RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
#
## Включаем mod_rewrite для роутинга
#RUN a2enmod rewrite


## Используем официальный образ PHP с Apache
#FROM php:8.2-apache
#
## Устанавливаем расширения PHP (в т.ч. PDO и MySQL)
#RUN docker-php-ext-install pdo pdo_mysql
#
## Указываем, что DocumentRoot будет /var/www/html/public
#ENV APACHE_DOCUMENT_ROOT /var/www/html/public
#
## Меняем конфиг Apache на новый DocumentRoot
#RUN sed -ri \
#    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
#    /etc/apache2/sites-available/000-default.conf \
# && sed -ri \
#    -e 's!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}>!g' \
#    /etc/apache2/apache2.conf
#
## Включаем модуль mod_rewrite для .htaccess
#RUN a2enmod rewrite
#
## Копируем всё содержимое проекта внутрь контейнера
#COPY . /var/www/html
#
## Убедимся, что у public/index.php будут нужные права (опционально)
#RUN chown -R www-data:www-data /var/www/html


FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
 && sed -ri \
    -e 's!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}>!g' \
    /etc/apache2/apache2.conf

RUN a2enmod rewrite

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html
