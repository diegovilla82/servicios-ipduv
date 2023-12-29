FROM php:8.0-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer 

ENV MAGICK_HOME=/usr

RUN apk --update add $PHPIZE_DEPS
RUN apk --update add freetype-dev
RUN apk --update add libjpeg-turbo-dev
RUN apk --update add libpng-dev
RUN apk --update add libxml2-dev
RUN apk --update add libzip-dev
RUN apk --update add openssh-client
RUN apk --update add php8-openssl
RUN apk --update add php8-json
RUN apk --update add php8-pdo
RUN apk --update add php8-pdo_mysql
RUN apk --update add php8-session
RUN apk --update add php8-simplexml
RUN apk --update add php8-tokenizer
RUN apk --update add php8-xml
RUN apk --update add php8-pcntl
RUN apk --update add php8-zip
RUN apk --update add php8-iconv
RUN apk --update add imagemagick
RUN apk --update add imagemagick-libs
RUN apk --update add imagemagick-dev


RUN pecl install imagick
RUN docker-php-ext-enable imagick

RUN docker-php-ext-install pdo 
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install sockets
RUN docker-php-ext-install soap  
RUN docker-php-ext-install exif 
RUN docker-php-ext-install bcmath  
RUN docker-php-ext-install pcntl
RUN docker-php-ext-configure gd --with-jpeg --with-freetype
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip

RUN apk --update add nodejs 
RUN apk --update add yarn 
RUN apk --update add git 

#sh alias
ENV ENV=/etc/profile
COPY ./aliases/alias.sh /etc/profile.d/alias.sh


