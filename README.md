
## Student Search

Created one API for searching of the student from the student table

## How to run the project

First clone the project from the repository

- git clone https://github.com/dan89farhan/mymedisage.git

Create a copy from .env.example to .env file

Set the proper configure in the .env file

Run following command
- composer install
- php artisan s:l
- php artisan migrate
- php artisan tinker
- User::factory()->count(10)->create()
- use App\Models\Student;
- Student::factory()->count(20)->create()

## API endpoints
- [localhost:8000/api/search_student](http://localhost:8000/api/search_student)

Curl Request

    curl --location --request POST 'localhost:8000/api/search_student' \
    --header 'Accept: application/json' \
    --header 'Authorization: Basic b2JlcmJydW5uZXIubGF6YXJvQGV4YW1wbGUubmV0OnBhc3N3b3Jk' \
    --form 'country="IN"' \
    --form 'email="anabelle"' \
    --form 'phone_number="707"' \
    --form 'country="pore"' \
    --form 'take="5"' \
    --form 'skip="20"'

