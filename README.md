# Taco Installer
<img alt="Taco Installer Image By Michael Herring" src="https://raw.githubusercontent.com/tacowordpress/taco-installer/master/image-taco-installer.gif?cachebust=234233242" width="300">
> Automate your WP / Taco Theme workflow setup.

Save time by using the taco-installer to get setup with a taco-theme wrapped in the latest WordPress, add salts, and keep DB creds private, all automated. Additional manual options include controlling httpd passwords on a server, using a .env file for DB creds, and more.

## Requirements
* [Composer](https://getcomposer.org/)

## Installing / Getting started

Getting started is easy.

Download the taco-installer, cd into it’s root and run

```shell
composer install
```

Running this command automates the following tasks:
* installs the latest version of WordPress
* installs and sets up the [Taco Theme](https://github.com/tacowordpress/taco-theme)
  * installs all necessary composer packages for Taco Theme to run correctly, most importantly, [TacoWordpress](https://github.com/tacowordpress/tacowordpress)
* applies salts to the wp-config.php file
* loads database credentials from a .env file for easy setup and obfuscation (ignored in .gitignore for better security)

Next,

1. update the .env file with your DB credentials, configure your localhost and create the empty database.
2. Complete the welcome to WP steps once visiting your localhost, login to the cms
3. before you do anything, activate the Taco Theme.

For information about getting started with the Taco Theme, view the theme’s [README.md file](http://google.com).

## More Features

The installer comes with a few other features:

* includes an .htaccess file with helpful variables for:
  * caching code
  * environment variables
* adding http password authentication configuration options

## Configuration

@Jasand TBD...

### HTTP Password Config Options
/* start config options instructions */

/* end config options instructions */

### Deploying / Publishing

@Jasand TBD...

/* start deploy instructions */

WordPress core files are left out of version control to allow for WP to auto-update on production servers, as specified in the .gitignore of this project. Setup your version control to deploy the taco-installer files to a new server.

1. deploy taco-installer to a new server
2. ssh onto new server and run, just once, `composer install` in the root of the taco-installer
  * This will perform all of the above actions on a new server,
  * If you run composer install more than once in the root of the taco-installer, there are security checks as to not override files if they’ve already been installed.
3. configure your .env file to point to the new server’s database
4. if the server is a staging environment, follow the configuration instructions for HTTP Password Config Options
5. for composer updates in the theme, cd into the theme’s `/app/core` directory,
  * run `composer update`

/* end deploy instructions */