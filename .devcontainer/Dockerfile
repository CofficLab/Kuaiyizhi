FROM php:fpm-alpine3.20

WORKDIR /workdir
RUN sed -i "s/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g" /etc/apk/repositories \
    && apk add autoconf g++ libzip-dev libpng-dev libjpeg-turbo-dev libxml2-dev make nginx caddy oniguruma-dev zlib-dev

RUN docker-php-ext-install bcmath

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

RUN apk add nodejs npm git python3 \
    && npm install cnpm -g --registry=https://registry.npmmirror.com

# RUN mv "$PHP_IaNI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN apk add zsh openssh \
    && git config --global url."https://gitclone.com/".insteadOf https:// \
    && sh -c "$(curl -fsSL https://gitee.com/mirrors/oh-my-zsh/raw/master/tools/install.sh)" \
    && git config --unset --global url."https://gitclone.com/".insteadOf \
    # oh my zsh会读取git信息导致终端响应慢，关掉部分功能
    && git config --system oh-my-zsh.hide-status 1 \
    && git config --system oh-my-zsh.hide-dirty 1 \
    && sed -i "s/# DISABLE_UPDATE_PROMPT/DISABLE_UPDATE_PROMPT/g" ~/.zshrc \
    # composer使用阿里云镜像
    && composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

RUN apk add caddy
RUN apk add nodejs-current
RUN npm i -g pnpm

ENV SHELL /bin/zsh
ENTRYPOINT php-fpm -D;caddy start --config /workdir/.devcontainer/Caddyfile --watch;tail -f /dev/null
