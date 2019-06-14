# Textlocal-laravel
[![Latest Stable Version]()](https://innotec.co.uk)
[![Total Downloads]()]()
[![Build Status]()]()

A package for Text Local. [https://innotec.co.uk]

## Installation via Composer

### Require the package

```
$ composer require innotecscotlandltd/textlocal-laravel
```
```json
{
    "require": {
        "innotecscotlandltd/textlocal-laravel": "dev-master"
    }
}
```
Put this as psr4 in main composer.json
```
"TextLocal\\": "path-to-package/textlocal-laravel/src/"
```
Put this as repositories object
```
"repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/InnotecScotlandLtd/textlocal-laravel"
    }
  ],
```
Add the Service Provider to your config/app.php under providers

```
\TextLocal\Laravel\TextLocalServiceProvider::class,
```

Publish the configuration file
```
php artisan vendor:publish
```
This will create a textlocal.php within your config directory. Edit the relevant values in the textlocal.php file.

## Usage
You can create new object by using TextLocal service in your file passing default 3 parameters like, 
1) $mobileNumbers (This can be array or single number) 
2) $message (Message which needs to send withing SMS)
3) $case (Case object)

### Send Text message
This function helps you to send Text Message.

### Add case call entry to database
This function will allow user to put entry in case calls table or any given table which can be passed as 3rd argument. This function will accept 3 arguments.
1) $template (Required)
2) $contactLinks (Required, Links to contact)
3) $table (Optional, default it will take case_calls table)

## Docs
[https://innotec.co.uk](https://innotec.co.uk)
## Security contact information
To report a security vulnerability, please use the
[Innotec Website](https://innotec.co.uk).
## Credits
### Contributors
This project exists thanks to all the people who <a href="https://github.com/InnotecScotlandLtd/textlocal-laravel/graphs/contributors" target="_blank">contribute</a>.
