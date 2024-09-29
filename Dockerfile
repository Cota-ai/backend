ARG VERSION_TAG
FROM php:${VERSION_TAG} AS build

RUN apk update && apk add --no-cache curl \
    wget \
    postgresql-dev \
    git \
    openssh

RUN docker-php-ext-configure intl && docker-php-ext-install pdo pdo_pgsql intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ARG GID UUID
ENV GID=${GID:-1000}
ENV UUID=${UUID:-1000}

RUN addgroup -g ${GID} local && \
    adduser -D -u ${UUID} -G local local

FROM build AS final

WORKDIR /app
RUN chown -R local:local /app

USER local
EXPOSE 9000
CMD [ "php", "-S", "0.0.0.0:9000" ]