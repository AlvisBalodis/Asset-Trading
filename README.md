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

Optional:

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

https://user-images.githubusercontent.com/53913245/190859538-2ba20e5d-0cf1-4d33-8bf3-57d7f32f3729.mp4

https://user-images.githubusercontent.com/53913245/190859548-cfadd255-2b43-4f3a-9629-cf011fe4f59e.mp4

https://user-images.githubusercontent.com/53913245/190859555-c584986b-c299-498a-a7c9-17d3d68d7a3f.mp4

https://user-images.githubusercontent.com/53913245/190859609-377c0684-4e7f-40ce-9217-cb64141ea21e.mp4

https://user-images.githubusercontent.com/53913245/190859639-2ffacba0-8b90-494c-8afa-b8c4e478db60.mp4

https://user-images.githubusercontent.com/53913245/190859653-7485d021-d571-4ae3-879c-bf9b48412e71.mp4

https://user-images.githubusercontent.com/53913245/190859676-4e7731c6-d007-4499-8b53-93ec1f463817.mp4

https://user-images.githubusercontent.com/53913245/190859680-86c2b7c0-aa9b-43d7-8a77-956236a70d12.mp4

https://user-images.githubusercontent.com/53913245/190859685-30d964fe-0287-4080-9037-b99899395570.mp4

https://user-images.githubusercontent.com/53913245/190859692-3f643ff0-aa0f-4804-8909-c20c65977aee.mp4
