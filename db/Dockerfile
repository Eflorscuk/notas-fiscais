FROM mysql:5.7.22

COPY .env /usr/src/app/.env

RUN set -o allexport && . /usr/src/app/.env && set +o allexport

COPY ./schema.sql /docker-entrypoint-initdb.d/

ENV MYSQL_ROOT_PASSWORD=$MYSQL_ROOT_PASSWORD
