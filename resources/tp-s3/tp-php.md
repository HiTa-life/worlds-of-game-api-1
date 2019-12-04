# 🎓  TP - PHP

You have 7 hours to realize the following case.

**You will be evaluated on your ability to meet the following 📝 functional goals.**

___

## `PHP and Web Services`

The job is about to `repeat endpoint creation` and provide `routing`:

* ➡️ You need to handle the `client request`: [@see w3.org request](https://www.w3.org/Protocols/rfc2616/rfc2616-sec5.html)

* 🌐 You need to follow REST `principles`: [@see wiki rest](https://fr.wikipedia.org/wiki/Representational_state_transfer#Appliqu%C3%A9_aux_services_web)

* ⬅️ You need to `send a response`: [@see w3.org response](https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html)


### 👪 Login endpoint
An uri with parameters for a method have to `provide an user`:

```
path: /login?email=USER_EMAIL&password=USER_PASSWORD
method: GET
controller: Wog\Controler\Api\LoginController
action: login
```

* 📝 The api must provide an `user` for the `route` described
* 📝 The api must repond with a `404` status code for non existing user
* 📝 The api must repond with a `200` status code for existing user
* 📝 The api must repond with a `json` body of the `retrieved user`


#### Password

**After you provide the user for his email and his password**, take care about `password` storage.

* 📝 At `creation`:
    * The api must `hash password` and do not store clear value
* 📝 At `login`:
    * The api must find user for a `hashed password`


[@see password-hash](https://www.php.net/manual/fr/function.password-hash.php)

[@see password-verify](https://www.php.net/manual/fr/function.password-verify.php)

#### Token

**After you provide hash the user password**, take care about `token` storage.

* 📝 At `creation`:
    * The api must hash token with the password value

[@see md5](https://www.php.net/manual/fr/function.md5.php)


### 🚦 Routing


> At the moment when you add an endpoint you must add code in your `entry point` 

You need to folow the `open/closed principle` for routing.

[@see open/closed](https://en.wikipedia.org/wiki/Open%E2%80%93closed_principle)

* An endpoint can be described by a route
* Routes can be stored in a configuration file
* Project can use this configuration file for trigger an controller action

*This principle can be described by the following deployment diagram:*
![diagram](https://raw.githubusercontent.com/seeren/worlds-of-game-api/master/resources/tp-s2/deployment.png)


[@see file_get_contents](https://www.php.net/manual/fr/function.file-get-contents.php)

[@see json_decode](https://www.php.net/manual/fr/function.json-decode.php)

*This principle can be described by the following activity diagram:*
![diagram](https://raw.githubusercontent.com/seeren/worlds-of-game-api/master/resources/tp-s2/activity.png)

* 📝 The api must use a configuration file for routing
* 📝 The configuration file must store a collection of route
* 📝 A route have a least a path, method, controller and action

#### Tips

Class identifier can be dynamic
```php
$className = "Foo";
$object = new $className();
```
Method identifier can be dynamic
```php
$methodName = "read";
$object->$methodName();
```
[@see dynamic language features](https://www.php.net/manual/fr/language.namespaces.dynamic.php)
___
## 🕕 Manage your time

You have one thematic, you need to create your ow api, focus and try to find solutions for improve your skill.

## 🎯 Let's focus
