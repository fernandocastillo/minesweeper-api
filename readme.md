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

### Methods with API TOKEN REQUIRED

---------------
#### GET /api/test
Test your api token.



### Author

Fernando Castillo <desarrollo@freengers.com>
