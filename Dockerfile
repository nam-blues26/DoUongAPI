# Sử dụng hình ảnh PHP với Apache
FROM php:apache

# Cài đặt và kích hoạt module MySQLi
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy các tệp PHP của bạn vào thư mục /var/www/html trên container
COPY . /var/www/html

# Expose cổng 80 để có thể truy cập ứng dụng từ bên ngoài container
EXPOSE 80
