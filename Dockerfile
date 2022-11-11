FROM php:7.4.3-fpm
WORKDIR /var/www
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
USER 1000
EXPOSE 9000
ENTRYPOINT ["php-fpm"]