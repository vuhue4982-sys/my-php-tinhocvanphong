FROM php:8.1-apache

# Cài các gói hỗ trợ cần thiết để cài được extension PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy mã nguồn vào thư mục web của Apache
COPY . /var/www/html/

# Thay đổi quyền để Apache đọc được
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80
EXPOSE 80

# ⚠️ Dòng này rất quan trọng cho Render:
CMD ["apache2-foreground"]

