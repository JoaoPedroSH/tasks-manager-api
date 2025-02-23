FROM php:8.2-cli

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o token OAuth do GitHub para repositórios privados
ARG GITHUB_TOKEN
RUN composer config --global --auth github-oauth.github.com ${GITHUB_TOKEN}

# Copia os arquivos do projeto para o container
WORKDIR /preflex-api
COPY . .

# Instala as dependências do Composer
RUN composer install --no-interaction --no-progress --prefer-dist

CMD ["php", "-S", "localhost:8080", "-t", "public"]
