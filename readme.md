# Lumen API (with Laravel Passport)

[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

This is a simple example to show a Lumen App (API) which works with Laravel Passport (OAuth 2.0).

It uses service provider from : https://github.com/dusterio/lumen-passport 

### Installation
Clone this repository. Run the following commands:

```sh
$ cd homework
$ cp .env.example .env
$ php artisan key:generate
```

Create your database and enter the details in your `.env` file. Now run the following commands:

```sh
$ php artisan migrate --seed
$ php artisan passport:install
```
You will get this set of messages:
```sh
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client Secret: aW1qHacErLrFquQfjoAuVIO0cWnlKNXM5LDhXjLi
Password grant client created successfully.
Client ID: 2
Client Secret: dYl1Fgom4LjdkOkvZmhhSMdFDZGQLVnapFokWtMW
```

You should see two client ID and secret pairs.
The first one is Personal Access Client and second one is Password Grant Client.
The Password Grant Client will allow us to generate new tokens for users.

for created new client: 
```php artisan passport:client --password```

for run to test: 

```php -S localhost:8000 -t public```

### Testing the API

I user postman for test: 
We have 3 api via you request : 

post register:

```http://localhost:8000/api/register?email=chitrung44@gmail.com&password=1234567&name=chitrung```
return json : 

```json
 {
     "data": "The user with with id chitrung44@gmail.com has been created"
 }
```

post login get token:
```http://localhost:8000/api/login?client_id=3&client_secret=FTjxubbk0H9DHcZ0T3Lm151HPzlbzYWYWbW7fZfd&grant_type=password&username=haylie86@gmail.com&password=123456&scope=*```

return : 
```json
{
    "token_type": "Bearer",
    "expires_in": 31622400,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI0ZWIxNzc1NzA0ZTQzMjMxZGRiMWI1NzE1ZDJiMmNmMmY4NzQzMDYxMTJjN2E4MjJiZGIzY2FhMTYwOGI3ZTJkNWZjMzgwNzg1NWVhODA2In0.eyJhdWQiOiIzIiwianRpIjoiYjRlYjE3NzU3MDRlNDMyMzFkZGIxYjU3MTVkMmIyY2YyZjg3NDMwNjExMmM3YTgyMmJkYjNjYWExNjA4YjdlMmQ1ZmMzODA3ODU1ZWE4MDYiLCJpYXQiOjE1NjUwNjgzMDgsIm5iZiI6MTU2NTA2ODMwOCwiZXhwIjoxNTk2NjkwNzA4LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.SkFQ-COXSj7CKumJSzSL22tspEuBQ6pMeRGv_kCXBEVaV-9QeXySqBFujhi3RztO2EnqOCSirvrTkAAeVRcyAFtgQ5L7BXRab2jctRKBDBRPr-GF0V3UVQqb1gjnPMrs_cDNQCwwSavX3hzg43lR95Wo-0sTz9h31dFVxokfbc_uJjWqPIB43kBxv6rZpXsYt_7572qH3V_PsrSLpJUWAH9V1-kixwGqRKDlILQEfGFXfU7zmf1q3Kt9Xv40xJZ--rEt5LKT9ObJ4MOtOnx9Dga0ZSY8GseowjCQHhAzflfEZa9Sutp5uNcISF1qP0xBIfM8kpeUcWylP776HwsCUejva68YBlkUoeYHkNi34JuxWUxBp9_PUN4jiboTYsLjZJpa8eCrUb-4VzmnXkWJiqd9KaS3nCkl3KITQ9pc12lTiaIKyH61bFX5QR9RI97y_faLm8h87PvANeagRQW6w2auajZwzSOVy8M7S62mbCUq8x9GOzQK9Tomsu0eJlSHp56MN6GjllWAODnaueHxlVaEYk6UNZao5ShaS2yBlf3leMq265Cmq3FQL-bL5Tpl-G1v_m7DkQULeFy93eeaJsPrij18JGRgilK57zRpRunCE-5c-CxbhjPkRCAQM5FsNPxXF8oGT9qjPY1w8xoj8WYeJ-136Sy6V7zliOikCRc",
    "refresh_token": "def50200f7b71d0c61c3219cfaecb1bc07c6fe69ff1789ae19e36c8d5cca7aaf8674a9afc51bbc42ef372ec2ecc5f683132998f028a2ac1343b42c4324c0638b3ee10b7e6ec3874aa8d4b09a018b82b6c09da9c11dfc75b40f7eee155e082859bb50b977771e9a1f15c7610057c228d9e6cdf64a27b0cf2b4b0a3fcd87c59ebe6859311dcc88ebdf2e6d11bcd7395f8d21853a098196dd6305fcd805a583f7826343dd87ac4171aee0e63565378878937e6d9f5cab064959e6ad7c471f6d5e41c392a40afb70cd02a5ae61c5e64413390012aad76daf5b745f9aa273f16f719dbf9700532db5510ca1c3f60a030c337ab8eadeddaccebb95321ae1843560969be9ba06d73462c911ac3d1b1ad416505233bcf74e3055628da2cca0066938faf2083aadbb48935c89c5ce4526a63e9031861c854dd2c3e26eaf19f569da9e475a1c1f008f58c2c9a8c58bb6a83456c272303b4354d9ad467c0158c79ed060c77930a9aabb"
}
```
Get user details :

```
http://localhost:8000/api/users?authorization=Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI0ZWIxNzc1NzA0ZTQzMjMxZGRiMWI1NzE1ZDJiMmNmMmY4NzQzMDYxMTJjN2E4MjJiZGIzY2FhMTYwOGI3ZTJkNWZjMzgwNzg1NWVhODA2In0.eyJhdWQiOiIzIiwianRpIjoiYjRlYjE3NzU3MDRlNDMyMzFkZGIxYjU3MTVkMmIyY2YyZjg3NDMwNjExMmM3YTgyMmJkYjNjYWExNjA4YjdlMmQ1ZmMzODA3ODU1ZWE4MDYiLCJpYXQiOjE1NjUwNjgzMDgsIm5iZiI6MTU2NTA2ODMwOCwiZXhwIjoxNTk2NjkwNzA4LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.SkFQ-COXSj7CKumJSzSL22tspEuBQ6pMeRGv_kCXBEVaV-9QeXySqBFujhi3RztO2EnqOCSirvrTkAAeVRcyAFtgQ5L7BXRab2jctRKBDBRPr-GF0V3UVQqb1gjnPMrs_cDNQCwwSavX3hzg43lR95Wo-0sTz9h31dFVxokfbc_uJjWqPIB43kBxv6rZpXsYt_7572qH3V_PsrSLpJUWAH9V1-kixwGqRKDlILQEfGFXfU7zmf1q3Kt9Xv40xJZ--rEt5LKT9ObJ4MOtOnx9Dga0ZSY8GseowjCQHhAzflfEZa9Sutp5uNcISF1qP0xBIfM8kpeUcWylP776HwsCUejva68YBlkUoeYHkNi34JuxWUxBp9_PUN4jiboTYsLjZJpa8eCrUb-4VzmnXkWJiqd9KaS3nCkl3KITQ9pc12lTiaIKyH61bFX5QR9RI97y_faLm8h87PvANeagRQW6w2auajZwzSOVy8M7S62mbCUq8x9GOzQK9Tomsu0eJlSHp56MN6GjllWAODnaueHxlVaEYk6UNZao5ShaS2yBlf3leMq265Cmq3FQL-bL5Tpl-G1v_m7DkQULeFy93eeaJsPrij18JGRgilK57zRpRunCE-5c-CxbhjPkRCAQM5FsNPxXF8oGT9qjPY1w8xoj8WYeJ-136Sy6V7zliOikCRc
```
```json
{
    "data": {
        "id": 1,
        "name": "Dr. Bernard Ryan",
        "email": "haylie86@gmail.com",
        "password": "$2y$10$GWKNLaCqV3Z3kWgZu6USL.IhqfD2alrdNogCYGW9cwZTakCqZZVti",
        "remember_token": null,
        "created_at": "2019-08-06 03:23:02",
        "updated_at": "2019-08-06 03:23:02"
    }
}
```

### License

MIT License.
