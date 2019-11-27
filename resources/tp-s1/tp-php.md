# 🎓  TP - PHP

You have 7 hours to realize the following case.

**You will be evaluated on your ability to meet the following 📝 functional goals.**

___

## `PHP and Web Services`

The job is about to provide `API` endpoint for `user` creation:
> You have an APP with a `register page` who need an `API` to `create users`.

### ➡️ Request

You need to handle the `client request` with at least:
* Method
* Uri
* Headers
* Body

[@see w3.org request](https://www.w3.org/Protocols/rfc2616/rfc2616-sec5.html)

### 🌐 REST
You need to follow REST `principles` for:
* Method
* Uri
* Request body format
* Status code:
    * 201 for creation success
    * 404 for not found uri
    * 405 for method not allowed
    * 409 for conflict
    * 422 for unprocessable entity
    * 500 for internal server error
* Response body format

[@see wiki rest](https://fr.wikipedia.org/wiki/Representational_state_transfer#Appliqu%C3%A9_aux_services_web)

### ⬅️ Response
You need to `send a response` with at least:
* Status code
* Reason phrase
* Headers
* Body

[@see w3.org response](https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html)


### 👪 User endpoint
An uri for a method have to `create an user`:

* 📝 The api must create an `user` for a `method` and an `uri`
* 📝 The api must repond with a `422` status code for incomplete input user
* 📝 The api must repond with a `409` status code for existing user
* 📝 The api must repond with a `201` status code for creation success
* 📝 The api must repond with a `json` body of the `created user`

[@see PDO](https://www.php.net/manual/fr/pdo.construct.php)

[@see PDO::prepare](https://www.php.net/manual/fr/pdo.prepare.php)

[@see PDOStatement::bindValue](https://www.php.net/manual/fr/pdostatement.bindvalue.php)

[@see PDOStatement::execute](https://www.php.net/manual/fr/pdostatement.execute.php)

Try to consume your endpoint with your app:
* 📝 The api must allow different host, method and header

[@see Access-Control-Allow-Origin](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Access-Control-Allow-Origin)

[@see Access-Control-Allow-Methods](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Access-Control-Allow-Methods)

[@see Access-Control-Allow-Headers](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Headers)
 
### 🔌 Deployment
The API must be on a production server:
* Subscribe to a free server hosting
* Create the database and migrate the table
* Transfert the php source code

Try to execute your script:

* Create and configure the .htaccess file

[@see ovh htaccess url rewrite](https://docs.ovh.com/fr/hosting/htaccess-reecriture-url-mod-rewrite/)

___
## 🕕 Manage your time

You have one thematic, you need to create your ow api, focus and try to find solutions for improve your skill.

## 🎯 Let's focus
