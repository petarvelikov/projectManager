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

3. Create new environment (.env) file and use your data for database
```
cp .env.example .env
```

4. Generate application key
```
php artisan key:generate
```

5. Install dependencies
```
composer install
```

6. Create all table in database
```
php artisan migrate
```

7. Start project
```
php artisan serve
```

## License

This project is licensed under the MIT License.
