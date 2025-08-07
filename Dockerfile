FROM php:8.1-apache

# Cài các extension cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy source code vào thư mục web
COPY . /var/www/html/

# Set quyền cho Apache đọc
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80
EXPOSE 80

# ✅ Lệnh này rất quan trọng để Apache khởi động
CMD ["apache2-foreground"]
