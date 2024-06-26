# :construction:Projeto de notas-fiscais:construction:

## Objetivo
O presente projeto tem como objetivo em realizar um ecossistema composto de frontend, backend, microserviço e db para simular o registro de uma nota-fiscal. O ambiente foi projetado para rodar em cima do Docker.

## Como rodar
1. Faça o clone do repositório - de preferência em seu diretório raiz:
```sh
git clone git@github.com:Eflorscuk/notas-fiscais.git
```

2. Entre no projeto:
```sh
cd notas-fiscais
```

3. Dê as permissões ao projeto:
```sh
sudo chown -R usuario:usuario .
```

4. Vá para a pasta backend

5. Faça a cópia do .env.example para .env dentro da pasta backend:
```sh
cp .env.example .env
```

6. Atualize as variáveis de ambiente no arquivo .env:
```dosini
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=loja
DB_USERNAME=admin
DB_PASSWORD=admin
```
7. Realize o build dos containers dentro da pasta backend:
```sh 
docker-compose build
```
8. Suba o conjuto de conteiners:
```sh
docker-compose up -d
```
9. Gere a chave para o laravel:
```sh
docker-compose exec app php artisan key:generate
```

10. Realizar o cache dos settings:
```sh
docker-composer exec app php artisan config:cache
```

11. Acesse o http://localhost:8081/ para verificar se está funcionando a parte do laravel.

12. Acesse http://localhost:8081/api/nota-fiscal para acessar a rota para adicionar uma nova nota no sistema.

13. Exemplo de dado para ser enviado via postman (POST) para nota-fiscal:
```dosini
{
    "chave": "kHHJffbBPx9kTXacr7cDtKX6FeUk7CJXo4wuyMNkKvSa,
    "data_emissao": "2024-04-17",
    "data_recebimento": "2024-04-17",
    "cnpj": "10490181000569"
}
```
14. Acesse http://localhost:8081/api/nota-fiscal/{chave} para fazer uma consulta no banco de dados para verificar se determinada nota-fiscal existe.

## Configuração do DB
1. Acesse o serviço de DB:
```sh
docker-compose exec db bash
```
2. Dentro do container de DB, acesse o root do MySQL:
```sh
mysql -u root -p
```
3. Verifique se o database loja existe no sistema:
```sh
show databases
```
4. Agora, é necessário criar o usuário admin:
```sh
GRANT ALL ON loja.* TO 'admin'@'%' IDENTIFIED BY 'sua_senha';
```
5. Dê um flush nas mudanças realizadas:
```sh
FLUSH PRIVILEGES;
```
6. E saia do MySQL e do container, respectivamente, com os comandos ```exit;``` e ```exit```.

## Serviço JS - Verificador-nota
Será executado quando os containers estiverem up.

## Frontend
http://localhost:8080/buscar este é o link para acessar o frontend.
O frontend foi construído em Vue e está dividido em 2 partes: Buscar e Sobre.
Em "buscar" é possível verificar se existe ou não alguma nota-fiscal com determinada chave no banco de dados.

## Testes
### Verificador-notas
Para executar testes unitários no Verificador-notas execute na raiz deste serviço npm test. 


