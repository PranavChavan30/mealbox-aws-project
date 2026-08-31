# 🍱 MealBox - AWS Food Ordering Application

MealBox is a cloud-deployed food ordering web application built as an AWS learning project. Customers can browse the menu, place orders, and orders are stored in a MySQL database on Amazon RDS.

## Architecture

Internet → Route 53 → ALB → EC2 (Auto Scaling Group) → RDS MySQL
                                    ↓
                              S3 (Images)

## AWS Services Used

- **VPC** - Isolated network with public/private subnets across 2 AZs
- **EC2** - Web servers running Nginx + PHP
- **RDS (MySQL)** - Stores customer orders
- **S3** - Stores food images
- **AMI** - Reusable image of configured web server
- **ALB (Application Load Balancer)** - Distributes traffic across web servers
- **Auto Scaling Group** - Maintains 2-4 healthy instances automatically

## Tech Stack

- Frontend: HTML, CSS
- Backend: PHP
- Database: MySQL (Amazon RDS)
- Web Server: Nginx + PHP-FPM

## Setup Instructions

1. Clone this repository
2. Copy `db_connect.example.php` to `db_connect.php`
3. Update `db_connect.php` with your RDS endpoint, username, and password
4. Deploy to an EC2 instance with Nginx and PHP installed
5. Create the `orders` table in your MySQL database:

\`\`\`sql
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    mobile VARCHAR(15),
    email VARCHAR(100),
    food_item VARCHAR(50),
    quantity INT,
    address TEXT,
    total_price DECIMAL(10,2),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
\`\`\`

## Author

Pranav Chavan
