# Usar a imagem base PHP 7.4 com FPM
FROM php:7.4-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    && rm -rf /var/lib/apt/lists/*  # Limpar cache do apt para reduzir o tamanho da imagem

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto para o container
COPY . .

# Ajustar permissões no diretório de storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependências do Composer (se necessário)
RUN composer install --no-dev --optimize-autoloader

# Expor a porta 9000 (PHP-FPM)
EXPOSE 9000

# Rodar o PHP-FPM
CMD ["php-fpm"]
