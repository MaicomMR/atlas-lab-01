FROM php:8.1.4-fpm
WORKDIR /var/www
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    npm \
    yarn \
    libzip-dev
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#Install NodeJS
#RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
#RUN apt-get update && apt-get install -y nodejs
# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
# Copy existing application directory contents
#COPY . /var/www
# Copy existing application directory permissions
#COPY --chown=www:www . /var/www
# Change current user to www
USER www
EXPOSE 9000
ENTRYPOINT ["php-fpm"]