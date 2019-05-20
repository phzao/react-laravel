# Big Screen - A simple website using PHP and ReactJs

The goal of this project is to show a simple application for using an AIP from Themoviedb.org. 
To consume this API was used the Laravel Framework in the backend and ReactJs in the frontend.
All necessary instances are started together. There is a online version on http://18.191.115.171

## Getting Started

To run this project you need a git, docker and docker-compose.

### Cloning and Installing

To clone

```
git clone https://github.com/mrcodecorp/arctouch-test.git
```

Changing the branch

```
git checkout development
```

Creating and running on background 

```
docker-compose up -d --build
```

Connecting on Laravel instance 

```
docker exec -it -u dev archtouch-php bash
```

Installing Laravel packages

```
composer install
```

Installing Laravel packages

```
composer install
```

Generating key

```
php artisan key:generate
```

Set the right permissions to Storage. Leave container and run

```
$ chmod -R 777 storage/
```

*Notes: if you are running on AWS server you need open the traffic ports to HTTP.

Now the application is running, go to a browser an open http://localhost or your http://IP

## Requirements

The layout was designed thinking on simplicity, one button.


### The list of upcoming movies

To solve this problem, I created a loop to get the first 3 pages and add to the array. That way
I send the frontend to organize the records they want. 

### The details problem

The path to the image in each record is not complete, I had to interact with each record and put the 
full path.


## Authors

* **Paulo Henrique** - *Initial work* - [PurpleBooth](https://github.com/phzao)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
