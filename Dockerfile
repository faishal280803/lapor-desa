# 1. Menggunakan PHP 8.2 dengan Apache sebagai basis
FROM php:8.2-apache

# 2. Instal library sistem yang dibutuhkan Laravel dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Aktifkan modul Apache Rewrite agar route Laravel (URL) tidak error
RUN a2enmod rewrite

# 4. Tentukan folder kerja di dalam container
WORKDIR /var/www/html

# 5. Salin semua file project Lapor Desa ke dalam container
COPY . .

# 6. Instal Composer untuk mengelola library Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. Atur izin akses (permission) agar Laravel bisa menulis log dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Ubah Document Root Apache agar mengarah ke folder /public milik Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 9. Buka port 80 untuk akses web
EXPOSE 80

# 10. Perintah untuk menjalankan server Apache
CMD ["apache2-foreground"]