<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Minesweeper API

API based in Laravel 5.8

### Installation instructions

- Clone project
- Create a new mysql database
- Run migrations
- Configure email in your .env (due email notifications from system)
- Test api responses

### Methods

---------------
#### POST /api/register
Register new user


Params:
```sh
{
    "name": "Fernando Castillo"
    "email": "something@email.com"
    "password: "12345678",
    "password_confirm": "12345678"
}
```

 ---------------
#### GET /api/login
Get api token.

Params:
```sh
{    
    "email": "something@email.com"
    "password: "12345678",    
}
```


---------------
#### GET /api/test (Bearer token required)
Test your api token.


---------------
#### GET /api/game (Bearer token required)
Get all current games from user authenticated. I am using uuid instead id in order to difficult to guess ID request from any other user.

---------------
#### POST /api/game (Bearer token required)
Create a new game

Params (Optional):
```sh
{    
    "rows": "6"
    "cols: "6",
    "mines": "2"    
}
```


### Author

Fernando Castillo <desarrollo@freengers.com>
