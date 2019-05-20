## Larastarter

Laravel's clean project with Docker....

### Starting

- Clone this repository;
- To Build docker run on terminal:
```
$ docker-compose up -d
```
######*You can omit the '-d' and show the servers running.
- Copy .env.example to .env before do something

- If you know what are you doing change the .env file

- Now we need to check if the VM is running:
```
$ docker ps
```
```
$ docker-compose exec app composer install
```
```
$ docker-compose exec app php artisan key:generate
```
```
$ docker-compose exec app php artisan optimize
```
###### *you can run this commands from Docker laravel-php
###### Done.

- Go to the browser and open http://localhost/ default. If it's okay, congratulations, if not, I do not know how you screwed it up! Fix it. ;)

### Access the database from outside the docker

- Connect on the mysql docker:
```
$ docker exec -it larastarter_database_1 bash
```
- Access mysql:
```
$ mysql -u root -p
```
- The password is 123
- Run the commands:
```
mysql> GRANT ALL PRIVILEGES ON * . * TO 'admin'@'%';
```
```
mysql> GRANT ALL PRIVILEGES ON * . * TO 'root'@'%';
```
```
mysql> FLUSH PRIVILEGES;
```
##### Done. Now you can access through the workbench or others.

### Some problem with the MySQL

- If any of these errors appear:
* ERROR 1449 (HY000): The user specified as a definer ('mysql.infoschema'@'localhost') does not exist
* ERROR 1044 (42000): Access denied for user 'admin'@'%' to database 'mysql'

- Do this inside mysql docker:
```
$ mysql -u root -p
```
```
mysql> SET GLOBAL innodb_fast_shutdown = 1;
```
```
mysql> exit;
```
```
$ mysql_upgrade -u root -p
```
##### Now you can repeat the steps to Access outside.
