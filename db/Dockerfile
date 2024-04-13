FROM mysql:5.7.22

ENV MYSQL_DATABASE loja
ENV MYSQL_ROOT_PASSWORD root
ENV MYSQL_PASSWORD admin
ENV MYSQL_USER admin

COPY ./script/ /docker-entrypoint-initdb.d/

#docker run -d -p 3306:3306 -e MYSQL_ROOT_PASSWORD=RootPassword -e MYSQL_DATABASE=Backoffice -e MYSQL_USER=MainUser -e MYSQL_PASSWORD=MainPassword backoffice-db
