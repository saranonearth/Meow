<h1 align="center">
Meow🐈
</h1>
Platform to share thoughts.😺😺 
```
ps: cats are meoww🐱!
```
<p align="center">
  <img src="https://i.ibb.co/yyqY2bX/main1.png" />
</p>

<p align="center">
  <img src="https://i.ibb.co/mcBgb7K/main2.png" />
</p>





## mysql config✔️
Add the DB details in .env file

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

```
## firebase storage config✔️

Add fireabse.js initializing firebase in /public/js

```
var firebaseConfig = {
    apiKey: "",
    authDomain: "",
    databaseURL: "",
    projectId: "",
    storageBucket: "",
    messagingSenderId: "",
    appId: "",
    measurementId: ""
};

const Firebase = firebase.initializeApp(firebaseConfig);
firebase.analytics();

```
## To create migrations✔️
```
php artisan migrate:fresh
```
In case if there is a need to update the migration to specific need then run the following commands over the exsisting migrations
```
php artisan migrate:rollback
php artisan migrate:fresh
```
## To serve the application🎃

```

php artisan serve 

```
