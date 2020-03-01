## Task description
#### The Frontend team is working on a new application for accommodation listings, in this app any hotelier can manipulate the information that they want to display on our platforms

### Acceptance criteria
    * I can get all the items for the given hotelier.
    * I can get a single item.
    * I can create new entries.
    * I can update information of any of my items.
    * I can delete any item.
    * A booking endpoint than whenever is called reduces the accommodation availability, and that fails if there is no availability. 
    
## How to Execute code    
   * you must have composer installed in your machine.
   * Clone the project throught git clone https://github.com/progalaa/AccomodationListing.git
   * cpy .env.example to .env 
   * create database and add database credentials to .env file
   * run composer install
   * run php artisan key:generate 
   * run php artisan config:cache && clear
   * run php artisan serve to serve your application.
   * to run unit testing use vendor/bin/phpunit
   
 ## Available routes.
   * to get all hotels use GET `app_url/api/hotels` 
   * to get one hotel GET `app_url/api/hotels/{id}`
   * to delete hotel DELETE `app_url/api/hotels/{id}`
   * to update hotel PUT `app_url/api/hotels/{id}` and send data in the body
   * to save hotel POST `app_url/api/hotels` and send data in the body
        
        
   
