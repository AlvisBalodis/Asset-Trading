# Asset-Trading

**Asset Trading** is simple CRUD web App, which is
built based on [Laravel](https://laravel.com/) architecture.
It's mockup of cryptocurrencies trading website.
You can get the list of top 50 latest cryptocurrencies selected by seven categories,
add and remove from cart your favorite crypto in local MySQL database which is connected
with [Algolia](https://www.algolia.com/) indexing.
You need to register so your account is permitted to connect your cart.

### Setting up.

- Clone and open project in your preferred IDE.
  Enter **Your API Key** from [Coinmarketcap](https://coinmarketcap.com/) in project `.env` file:

```php
COIN_MARKET_CAP_API_KEY="${API_KEY}"
```

- #### Optional:

You can add [Algolia](https://www.algolia.com/) API key for cloud indexing.
Like in `.env.example` file.

```php
ALGOLIA_APP_ID="${APP_ID}"
ALGOLIA_SECRET="${AdminApiKey}"
MIX_ALGOLIA_SEARCH="${YourSearchOnlyAPIKey}"
```

- Run this command in project root folder. It will start localhost server:

```phpregexp
php artisan serve
```

- Open Chrome (The best UX) web browser, type and enter in address bar:

```php
localhost:8000
```

### This is how it should look and work.
