FROM php:7.4-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer 

ENV MAGICK_HOME=/usr

RUN apk --update add $PHPIZE_DEPS
RUN apk --update add freetype-dev
RUN apk --update add libjpeg-turbo-dev
RUN apk --update add libpng-dev
RUN apk --update add libxml2-dev
RUN apk --update add libzip-dev
RUN apk --update add openssh-client
RUN apk --update add php7-openssl
RUN apk --update add php7-json
RUN apk --update add php7-pdo
RUN apk --update add php7-pdo_mysql
RUN apk --update add php7-session
RUN apk --update add php7-simplexml
RUN apk --update add php7-tokenizer
RUN apk --update add php7-xml
RUN apk --update add php7-pcntl
RUN apk --update add php7-zip
RUN apk --update add php7-iconv
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
