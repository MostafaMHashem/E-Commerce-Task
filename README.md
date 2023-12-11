
# E-Commerce-Task

This project includes a dashboard and orders interface: 

- Dashboard: [http://127.0.0.1:8000/admin/signIn](http://127.0.0.1:8000/admin/signIn)
- Orders: [http://127.0.0.1:8000/admin/orders](http://127.0.0.1:8000/admin/orders)


### Admin Credentials (For Testing):

- **Phone:** '123456789'
- **Password:** 'password'


## Packages

### Yajra DataTable for Data Tables

We utilize the Yajra DataTable package, and you can create a data table using the artisan command:

and the artisan command is [php artisan dataTable:make the-dataTable-path-or-name]
ex. [php artisan dataTable:make OrderDataTable]

### for notification we use laravel webSocket

-   **[the backend config]**

    -   we uncommented the App\Providers\BroadcastServiceProvider::class,
    -   and we pusher channel package **composer require pusher/pusher-php-server for**
    -   and in the .env we set BROADCAST_DRIVER=pusher
    -   **in the .env we added this pusher channel variables**
        - **PUSHER_APP_ID = "1722961"**
        - **PUSHER_APP_KEY = "75cd3997ad9794e60acc"**
        - **PUSHER_APP_SECRET = "f5ae739ea82c5e71fffe"**
        - **PUSHER_APP_CLUSTER = "eu"**
    - we created OrderCreated event class 

-   **[the frontend config]**
    -   we use laravel echo to listen to the events and subscribe to the channels and install it with this command
        **npm install** to make sure the npm is installed
        
        **npm install --save-dev laravel-echo pusher-js**


    -   in bootstrap.js file we uncommented the code for laravle echo

### customer api

-   **[path][http://127.0.0.1:8000/api/]**
-   **[login]**
