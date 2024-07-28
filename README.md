# Product Catalog

This is a simple product catalog application developed using PHP and MySQL.

## Features
- Filter products by price range, category, and sale status.
- Pagination to display 12 products per page.

## Setup Instructions

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/product-catalog.git
   cd product-catalog
   ```

2. Set up the MySQL database:

   ```sql
   CREATE DATABASE product_catalog;
   USE product_catalog;

   CREATE TABLE products (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100),
       price DECIMAL(10, 2),
       category VARCHAR(50),
       sale_status ENUM('on_sale', 'not_on_sale'),
       description TEXT
   );
   ```

3. Update the database connection details in `db.php`:

   ```php
   <?php
    $servername = "sql306.infinityfree.com";
   $username = "username";
   $password = "password";
   $dbname = "db_name";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

4. Start the web server and navigate to `index.html` to use the application.

## Hosting
The application is hosted at: [Your Hosted Link]
