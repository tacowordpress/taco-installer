# Taco Installer
<img alt="Taco Installer Image By Michael Herring" src="https://raw.githubusercontent.com/tacowordpress/taco-installer/master/image-taco-installer.gif?cachebust=234233242" width="300">
> Automate your WP / Taco Theme workflow setup.

Save time by using the taco-installer to get setup with a Taco Theme wrapped in the latest WordPress, add salts, and keep DB creds private, all automated. More features include: manual control of httpd passwords on a server, using a non-committed .env file for DB creds, and a robust .htaccess file.

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
  * (installs all necessary composer packages for Taco Theme to run correctly, most importantly, [tacowordpress](https://github.com/tacowordpress/tacowordpress))
* applies salts to the `wp-config.php` file
* loads database credentials from a `.env` file for easy setup and obfuscation
  * (ignored in .gitignore for better security)

After running `composer install`, complete the following:

1. update the `.env` file with your DB credentials and update table prefix variable, then configure your localhost and setup an empty database
2. Complete the welcome to WordPress steps once visiting your localhost, login to the CMS
3. before you do anything, activate the Taco Theme under Appearance -> Themes.

For information about getting started with the Taco Theme's frontend task runners, view the theme’s [README.md file](https://github.com/tacowordpress/taco-theme/tree/master/src).

For information on how to use tacowordpress, check out the [repo](https://github.com/tacowordpress/tacowordpress). For complete documentation, see the [wiki](https://github.com/tacowordpress/tacowordpress/wiki).

## More Features

The taco-installer comes with a few other features:

* includes an `.htaccess` file with helpful variables for:
  * caching
  * environment variables
* adding http password authentication configuration options

### HTTP Password Configuration Options

If you are running your site on an environment that requires password protection via the browser (htpasswd), you can set up authentication through a php script provided in the tools directory of this repo. Please follow these steps.

1. ssh onto the server, and cd into the directory above "html". This will reflect the root folder of this repo.
2. cd into "tools"
3. type "`php htpass.php`" and follow follow the prompt

Note: This script will not work if there is already something in "html/.htaccess" pointing to a password file or a "htpasswd" file already exists.

## Deployment Instructions

@Jasand TBD...

WordPress core files are left out of version control to allow for WP to auto-update on production servers by default, as specified in the `.gitignore` of this project. Auto-updating DB option is specified on the `.env` file. Setup your version control to deploy the taco-installer files to a new server.

1. deploy taco-installer to a new server
2. ssh onto new server and run, just once, `composer install` in the root of the taco-installer
  * This will perform all of the above actions on a new server,
  * If you run composer install more than once in the root of the taco-installer, there are security checks as to not override files if they’ve already been installed.
3. configure your `.env` file to point to the new server’s database
4. if the server requires password authentication through the browser (staging/dev environments), follow the configuration instructions for HTTP Password Config Options
5. for composer updates in the theme, cd into the theme’s `/app/core` directory,
  * run `composer update`

## Gitlab Integration
Gitlab can build and run integrations automatically when you push to it.  Currently, the boilerplate file is set up to handle pushes to the `develop` branch automatically and `master` manually.

1. Edit the .gitlab-ci.yaml and put appropriate ssh paths into both the `STAGING_PATH` and `PRODUCTION_PATH` fields.
2. Set up the Gitlab integration on both the server and Gitlab project.  Go to the runners tab under your Gitlab project, and follow the instructions to set up your runner.  In general, you want to log into the staging server as `root`, run gitlab-runner register, and follow the prompts.  You generally want to enter `lofiiterstate/node` as the image, and `docker` as the executor.
