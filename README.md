# Deployer Hosting

> Deploy PHP application in shared hosting, e.g.: 1and1 hosting


## Version

```sh
$ dep --version
Deployer v6.3.0
```


## Requirements

- ssh access
- composer.phar


## Installing

Install [Deployer][1] in your machine

Add deployer to the project

```sh
$ git clone https://github.com/migueabellan/deployer-hosting.git

or

$ composer require deployer/deployer --dev
```

Install or update with composer

```sh
$ composer install

or 

$ composer update
```

Add your public ssh-keygen on the hosting

```sh
$ ssh-keygen
$ ssh-copy-id -i ~/.ssh/id_rsa.pub [user]@[host]
```

Deploy with ssh secure

```sh
$ dep deploy
```

[1]: https://deployer.org/docs/installation
