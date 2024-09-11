# Products Registration System

This project is a web application developed in PHP that interacts with a PostgreSQL database. The system allows the registration of products and contains a configuration file to facilitate the connection to the database.

![Desktop view](/assets/screenshot.png)

## Requirements

- PHP 8.3 or higher.
- **PostgreSQL** 14 or higher.
- **Apache Server** (or any other PHP compatible web server)
- Extension `pdo_pgsql` enabled for connections to PostgreSQL from PHP.

## Installation

1. Download or clone the repository in your local environment. Then enter the project folder.

  ```sh
  $ git clone https://github.com/heblopez/products-sys
  $ cd products-sys
  ```

2. Run the SQL script to create the database, tables and load test data. Access your PostgreSQL server and import the SQL script located in the `SQL/` folder. This can be done from the command line like this:

  ```sh
  $ psql -U [user] -f SQL/script.sql
  ```

Another option is to manually run the SQL script using database management software, such as DBeaver or DataGrip.

3. Configure the database credentials in the ``config.php`` file. Copy the sample file and adjust the parameters:

  ```sh
  $ cp config.php.example config.php
  ```

  Open `config.php` and edit the following lines with your PostgreSQL database credentials:

  ```php
  <?php
    putenv("DB_HOST=localhost");
    putenv("DB_PORT=5432");
    putenv("DB_NAME=products_sys");
    putenv("DB_USER=YOUR_DB_USER");
    putenv("DB_PASSWORD=YOUR_DB_PASSWORD");
  ?>
  ```

## Use

1. Access the application through the web browser using the URL configured on your local server.
2. Make sure that the tables have been created correctly and the test data is available.
