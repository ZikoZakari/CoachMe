# CoachMe project

### Setup to run the project
- #### Tools
    - Download composer from here : [Composer](https://getcomposer.org/download/)
    - Download xampp or any web server that handle `php` and `mysql` database
    - Download `git` command line utility from here : [Git](https://git-scm.com/download/win)
- #### Commands
    - `Git clone <repo-link.git>`
    - Check the `.env.examples`, rename it to `.env` and fill your database credentials
    - Run: `composer install` command

- #### Remarks
    - This project is built to only add 1 depth directory
    - If you need to add some new classes make sure to:
        - Edit `composer.json` by adding the right mapping `namespace` -> `directory name`
        - Reload with : `composer dump-autoload`