# MyTheresa Product API

## Introduction

This is a mini rest api that provides endpoints to fetch a list of seeded products, filter by category and price. Also applies discount were applicable

## Table of Contents
1. <a href="#how-it-works">How it works</a>
2. <a href="#technology-stack">Technology Stack</a>
3. <a href="#application-features">Application Features</a>
4. <a href="#api-endpoints">API Endpoints</a>
5. <a href="#setup">Setup</a>
6. <a href="#author">Author</a>
7. <a href="#license">License</a>

## Technology Stack
  - [PHP](https://www.php.net)
  - [Laravel](https://laravel.com)
  - [MySQL](https://www.mysql.com)
  ### Testing tools
  - [PHPUnit](https://phpunit.de) 

## Application Features
* Ability to view list of products
* Ability to filter products using category query param
* Ability to filter products using priceLessThan query param
* Ability to see applied discount details on product price
* Ability to paginate result using per_page quary param

## API Endpoints
### Base URL = http://localhost:6060/

#### NOTE : per_page has a default value of 5 as required in requirement

Method | Route | Description | Query Params
--- | --- | ---|---
`GET` | `/api/v1/books` | View all products available |  priceLessThan, category, per_page |

For examples of payloads, response and available query. Visit [The Product API Postman Collection](https://documenter.getpostman.com/view/11352884/2s8YzRz3Cc)

## Setup
This instruction will get the project working on your local machine for development and testing purposes.

  #### Dependencies
  - [Docker](https://docs.docker.com/desktop/)
 
  #### Getting Started
  - Install and setup docker
  - Open terminal and run the following commands
    ```
    $ git clone git@github.com:harmlessprince/mytheresa-assessment.git
    $ cd mytheresa-assessment
    $ cp .env.example .env
    $ docker-compose build app
    $ docker-compose up
    $ docker-compose exec app composer install
    $ docker-compose exec app php artisan key:generate
    $ docker-compose exec app php artisan migrate --seed
    ```
    
    If you are on a windows machine
    ```
    Step 1: clone the repository
    Step 2: Open cloned application with any code editor of your choice
    Step 3: Create a .env file at the root of your application
    Setp 4: Copy the content of the .env.example file into the .env file
    Step 5: Open your windows terminal and cd into the the directory of the cloned app
    Step 6: run "docker-compose build app" to build application docker dependencies
    Step 7: run "docker-compose up" to start app docker container
    Step 8: run "docker-compose exec app composer install" to install docker depencencies
    Step 9: run "docker-compose exec app php artisan key:generate" to generate app key
    Step 10: run "docker-compose exec app php artisan migrate" to run migrations
    ```
    If all goes well 
  - Visit http://localhost:6060/ on your browser to view laravel home
  - Visit http://localhost:8200/ on your browser to view database using phpmyadmin
  

  ### Testing
  ```
  $ docker-compose exec app php artisan test
  ```
  If correctly setup, all tests should pass
  
  #### Stop Application
  
  ```$ docker-compose down```
  
## Author
 Name: Adewuyi Taofeeq <br>
 Email: realolamilekan@gmail.com <br>
 LinkenIn:  <a href="#license">Adewuyi Taofeeq Olamikean</a> <br>

## License
ISC
