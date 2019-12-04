# 🎓  TP - PHP

You have 7 hours to realize the following case.

**You will be evaluated on your ability to meet the following 📝 functional goals.**

___

## `Open/Closed`

You need to folow the `open/closed principle`.

[@see open/closed](https://en.wikipedia.org/wiki/Open%E2%80%93closed_principle)


### 🚦 Routing

You need to enforce your routing.

#### 👪 User endpoint

An uri for a method have to `provide an user`:

```bash
uri: /users/4
method: GET
```

* 📝 The api must provide an `user` for an id
* 📝 The api must repond with a `404` status code for non existing user
* 📝 The api must repond with a `200` status code for existing user
* 📝 The api must repond with a `json` body of the `retrieved user`


An uri for a method have to `delete an user`:

```bash
uri: /users/4?token=USER_TOKEN
method: DELETE
```

* 📝 The api must delete an `user` for an id
* 📝 The api must repond with a `401` status code if there is no token
* 📝 The api must repond with a `403` status code if the token does not belong to the user
* 📝 The api must repond with a `202` status code for delete success
* 📝 The api must repond with a `json` body of the `deleted user`

**You have to capture parts of regular expressions:**

[@see preg_match ](https://www.php.net/manual/fr/function.preg-match.php)

> Look at third optionnal parameters and capture parenthesis

Example
```php
preg_match("#(\d)#", "Hello 2 World", $match);
var_dump($matches);
```
Output
``` php
array(2) {
  [0]=>
  string(1) "2"
  [1]=>
  string(1) "2"
}
```

**You should pass method arguments from an array**

[@see splat operator](https://www.php.net/manual/en/functions.arguments.php#functions.variable-arg-list)

Example
```php
function foo($a, $b) {
    var_dump($a, $b);
}
foo(... ["Hello", "World"]);
```
Output
``` php
string(5) "Hello"
string(5) "World"
```

**You have to implements following interface.**

![diagram](https://raw.githubusercontent.com/seeren/worlds-of-game-api/master/resources/tp-s3/class.png)

### 🛢️ Database

You need to enforce your database configuration.

* 📝 The Manager must use a configuration file to construct PDO

![diagram](https://raw.githubusercontent.com/seeren/worlds-of-game-api/master/resources/tp-s3/deployment.png)

___
## 🕕 Manage your time

You need to enforce your own api, these manipulations do not open on others.

## 🎯 Let's focus
