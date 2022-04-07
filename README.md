# SocioPHP

<p align="center">
  <strong>Social application to share posts 📝</strong>
</p>

---

## Run locally?
1) Install dependencies with composer 
```sh
composer install
```
I assume that you have `composer` and `php` installed at this point.
2) Set up local-server and configure .env with your credentials 
3) Migrate tables to MYSQL
```sh
php artisan migrate
```



## Structure

| Codebase                          |                             Description                              |
|:----------------------------------|:--------------------------------------------------------------------:|
| [app](app)                        |                       Controllers, Middlewares                       |
| [config](config)                  |             Configurations (For File Storage and etc...)             |
| [migrations](database/migrations) |            MySQL Tables you can migrate with php artisan             |
| [public](public)                  |                  Static files as well as index file                  |
| [routes](routes)                  | Contains all routes with all requests that are handled in controller |
| [storage](storage/app)            | Application storage (Where we upload our Profile Picture and etc..)  |

