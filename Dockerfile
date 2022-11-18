FROM php:8.1.4-fpm
WORKDIR /var/www
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
USER 1000
EXPOSE 9010
ENTRYPOINT ["php-fpm"]