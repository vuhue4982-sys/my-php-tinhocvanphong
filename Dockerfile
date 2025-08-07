FROM php:8.1-apache

# Cài đặt dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql gd

# Bật mod_rewrite (nếu dùng .htaccess)
RUN a2enmod rewrite

# Copy source code vào container
COPY . /var/www/html/

# Cấp quyền cho thư mục
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Mở port 80 (Apache mặc định chạy trên port 80)
EXPOSE 80

# Lệnh khởi động Apache (PHẢI GIỐNG NGUYÊN VĂN)
CMD ["apache2ctl", "-D", "FOREGROUND"]
