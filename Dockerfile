FROM php:8.2-apache

# =====================================================
# Arahkan Apache langsung ke folder public Laravel
# =====================================================
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf

# =====================================================
# Install dependency sistem
# =====================================================
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# =====================================================
# Apache config (Laravel perlu rewrite)
# =====================================================
RUN a2enmod rewrite

# =====================================================
# PHP extensions
# =====================================================
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# =====================================================
# Working directory
# =====================================================
WORKDIR /var/www/html

# =====================================================
# Copy project
# =====================================================
COPY . .

# =====================================================
# Composer
# =====================================================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# =====================================================
# Permission Laravel
# =====================================================
RUN chown -R www-data:www-data storage bootstrap/cache

# =====================================================
# Port & Start
# =====================================================
EXPOSE 80
CMD ["apache2-foreground"]
