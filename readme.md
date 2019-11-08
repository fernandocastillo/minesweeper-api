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
Create a new game and retrieve a json object with a cells representation and state of game. Check the file config/mine.php to see all possible cell values. Positive values mean mines discovered.

Note: Internal cell representation (json_cells field in table games) is lineal not as a grid/matrix.

Params (Optional):
```sh
{    
    "rows": "6"
    "cols: "6",
    "mines": "2"    
}
```


---------------
#### POST /api/game/explore (Bearer token required)
Explore cell based in X, Y position as real grid/matrix. It responses with a current game state representation.

Params:
```sh
{        
    "x": 1
    "y: 1,        
}
```

Response:
```sh
{
    "game": {
    "uuid": "e34b8fbf-cb3b-4d47-a4ca-6ad92905efe0",
    "current_state": "lost",
    "rows": 5,
    "cols": 5,
    "mines": 2,
    "total_time": null,
    "cells": [
          -1, //Undiscovered
          -1, //Undiscovered
          -2, //Mine undiscovered
          0,  //Discovered without mine
          -5, //Mine discovered (==GAME OVER==) 
       ],
    }
}
```

### Author

Fernando Castillo <desarrollo@freengers.com>
