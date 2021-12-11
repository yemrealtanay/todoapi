# Basic CRUD Todo API

[![Powered by Laravel](https://img.shields.io/badge/Powered%20by-Laravel-red)](
https://laravel.com/)
[![Timed with Carbon](https://img.shields.io/badge/Timed%20with-Carbon-yellowgreen)](
https://carbon.nesbot.com/docs/)
[![Yunus Emre Altanay](https://img.shields.io/badge/Developed%20by-YEA-critical)](
http://yemrealtanay.xyz)

# Libraries and API's

- Laravel's JWT library for authentication operations;
[Laravel/JWT](https://github.com/tymondesigns/jwt-auth)

- To make date operations and mathematical calculations between dates easy
[Carbon](https://carbon.nesbot.com/docs/)


## Features

- JWT Token Authentication system. You can use this API all platforms. 
>Thanks for the jwt we can use beraer token for authantication. There is no cookies so we can use the api every platform we need. If you want to learn about Jwt [Click Here](https://jwt.io/); 
- All Eloquent model CRUD operations from ITEM tag
- Please feel free to contribute and improve...

## Project Setup

- Clone the git repository: `git clone https://github.com/yemrealtanay/icebergEstateApi.git`
- Modify the  `.env`  file configure your database settings.
- Attach a fresh application key to the project with  `php artisan key:generate`
-   Install project dependencies with  `composer install`  and update if necessary  `composer update`
-   Generate the secret JWT key for initial auth token  `php artisan jwt:secret`
-   Run the migrations and seed the database  `php artisan migrate --seed`

## About Seeder
`Database Seeder` offers you a factory for 10 different users and 50 different Items.

## Other Links

> Postman Links: <<>>

> Heroku Deployment: <<>>

# API Documentation

It performs API authentication over JWT tokens. Available functions and usage details are given below.

### User Registration Routes

> POST										.../api/auth/register

```json 
{
    "message": "Agent successfully registered",
    "user": {
        "name": "Yunus Emre Altanay",
        "email": "y.emrealtanay@gmail.com",
        "updated_at": "Some Date",
        "created_at": "Some Date",
        "id": 10
    }
}
```

#### User Login Route

> POST														.../api/auth/login

```json  
{
    "access_token": "Some Long Berear Token",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 6,
        "name": "Yunus Emre Altanay",
        "email": "y.emrealtanay@gmail.com",
        "email_verified_at": "Some Date",
        "created_at": "Some Date",
        "updated_at": "Some Date"
    }
}
```

#### User Profile Route

> GET															.../api/auth/user-profile

```json 
{
   "id": 6,
    "name": "Yunus Emre Altanay",
    "email": "y.emrealtanay@gmail.com",
    "email_verified_at": "Some Date",
    "created_at": "Some Date",
    "updated_at": "Some Date"
}
```

#### User LogOut Route 

> POST														.../api/auth/logout

```json 
{
    "message": "User successfully signed out"
}
```

#### Token Refresh

> POST														.../api/auth/refresh


``` json
{
    "access_token": "Some Long Berear Token",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 6,
        "name": "Yunus Emre Altanay",
        "email": "y.emrealtanay@gmail.com",
        "email_verified_at": "Some Date",
        "created_at": "Some Date",
        "updated_at": "Some Date"
    }
}
```

### Items Routes

```
NOTE: Please do not forget use your authorization token while requesting.
```

#### List Items

```
NOTE: Items come with users. If you want to CRUD Items you need to login or take some fake user credentials from database.
```

> GET														.../api/items

```json
{
   "11": {
        "id": 12,
        "user_id": 1,
        "title": "Voluptas minima omnis temporibus et corrupti.",
        "description": "Nihil veniam ea neque quo adipisci cupiditate. Blanditiis explicabo illo cumque quaerat excepturi. Officiis perferendis vero fugit velit aperiam voluptatem praesentium a. Fuga quia quo placeat minima voluptatem.",
        "created_at": "16:45",
        "updated_at": "16:45"
    },
    "17": {
        "id": 18,
        "user_id": 1,
        "title": "Rerum aliquam temporibus hic.",
        "description": "Ex quia numquam voluptatem odio distinctio. Molestiae vel eius qui. Praesentium nihil fugiat ea in aliquam cupiditate omnis.",
        "created_at": "16:45",
        "updated_at": "16:45"
    },
```

#### Create Item

> POST														.../api/items

       | Key          | Type                        | Value                 |
       | ------------ | --------------------------- | --------------------- |
       | title        | string                      |   Item Title          |
       | description  | string                      |	Item Description    |
      


```json
{
    "message": "Item created successfully",
    "item": {
        "title": "Ekmek Al",
        "description": "en yakın fırından",
        "user_id": 1,
        "updated_at": "17:31",
        "created_at": "17:31",
        "id": 51
    }
}
```
#### Update Item

> PUT								.../api/items/{ item_id }

       | Key          | Type                        | Value                 |
       | ------------ | --------------------------- | --------------------- |
       | title        | string                      |   Item Title          |
       | description  | string                      |	Item Description    |


```json
{
    "message": "Item updated successfully",
    "item": {
        "id": 52,
        "user_id": 1,
        "title": "Yoğurt Al",
        "description": "Ekmek alma boşver",
        "created_at": "17:33",
        "updated_at": "17:37"
    }
}
```

#### Delete Item

> DELETE				.../api/items/{ item_id }

```json
{
    "message": "Item deleted"
}
```






