# Project Manager

Laravel (5.7) example project. [Demo](http://project-manager.eu5.org/)


## How to install

1. Clone or download this repository
```
git clone https://github.com/petarvelikov/projectManager.git
```

2. Go to folder  
```
cd projectManager
```

3. Install dependencies
```
composer install
```

4. Create new environment (.env) file and use your data for database
```
cp .env.example .env
```

5. Generate application key
```
php artisan key:generate
```

6. Create all tables in database
```
php artisan migrate
```

7. Start the project
```
php artisan serve
```


## License

This project is licensed under the MIT License.
