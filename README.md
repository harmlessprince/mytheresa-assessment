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
  - [Docker](https://docs.docker.com/desktop/)
  ### Testing tools
  - [PHPUnit](https://phpunit.de) 

## Application Features
* Ability to view list of products
* Ability to filter products using category query param
* Ability to filter products using priceLessThan query param
* Ability to see applied discount details on product price
* Ability to paginate result using per_page quary param

## API Endpoints
### Base URL = http://localhost:5454/

#### NOTE : per_page has a default value of 5 as required in requirement

Method | Route | Description | Query Params
--- | --- | ---|---
`GET` | `/api/products` | View all products available |  priceLessThan, category, per_page |

For examples of payloads, response and available query. Visit [The Product API Postman Collection](https://documenter.getpostman.com/view/11352884/2s8YzRz3Cc)

## Setup
This instruction will get the project working on your local machine for DEVELOPMENT and TESTING purposes.

  #### Dependencies
  - [Docker](https://docs.docker.com/desktop/)
 
  #### Getting Started
  - Install and setup docker
  - Open terminal and run the following commands
    ```
    //clone repository
    $ git clone git@github.com:harmlessprince/mytheresa-assessment.git
    
    //move into clone repository
    $ cd mytheresa-assessment
    
    //create enviroment file
    $ touch .env
    
    //copy enviroment variables from .env.example to .env(DON'T CHANGE ANY VALUE except you have expertise in docker)
    $ cp .env.example .env
    
    //Build docker files 
    $ docker-compose build mytheresa
    
    //start application to see logs in none detached mode (recommended)
    $ docker-compose up
    
    //Or start application in detached mode (No Log, Not Recommended)
    $ docker-compose up -d
    
    NOTE: Open a new terminal and run below command if you start your app in none detached mode
    
    //Generate APP Key
    $ docker-compose exec mytheresa php artisan key:generate
    
    //migrate database and seed data 
    $ docker-compose exec mytheresa php artisan migrate --seed
    ```
    
    If all goes well 
  - Visit http://localhost:5454/ on your browser to view laravel home
  - Visit http://localhost:8200/ on your browser to view database using phpmyadmin
  

  ### Testing
  ```
  $ docker-compose exec mytheresa php artisan test
  ```
  If correctly setup, all tests should pass
  
  #### Start Application
  
  ```$ docker-compose up```
  
  #### Stop Application
  
  ```$ docker-compose down```
  
## Author
 Name: Adewuyi Taofeeq <br>
 Email: realolamilekan@gmail.com <br>
 LinkenIn:  <a href="#license">Adewuyi Taofeeq Olamikean</a> <br>

## License
ISC
