# Sử dụng image PHP có Apache
FROM php:8.1-apache

# Copy toàn bộ mã nguồn vào thư mục Apache
COPY . /var/www/html/

# Mở port 80 (Render sử dụng)
EXPOSE 80
