FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

# idコマンドでホスト側のuid, gidを確認すること
# USERNAME=ユーザー名を設定し、uid, gidを設定(uid, gidもホスト側のユーザーに合わせる)
# Laravelのプロジェクト作成前にchown -R <username> /composer/cache/
# 設定したユーザーでcomposer create-projectする
# /work/storage配下のすべてををchmod www-data:www-dataにする
ARG USERNAME=ec2-user
ARG uid=1000
ARG gid=1000

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get install -y gosu && \
  apt-get -y install git unzip libzip-dev libicu-dev libonig-dev && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  groupadd -g ${gid} ${USERNAME} && useradd -m ${USERNAME} -u ${uid} -g ${gid}

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work
