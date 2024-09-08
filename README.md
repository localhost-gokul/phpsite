# Student Management System

This project is a simple **Student Management System** built using PHP and MySQL. It allows users to add, view, and manage student details such as name, roll number, date of birth, and year of study. The data is stored in a MySQL database and can be accessed and manipulated through a web interface.

## Table of Contents

- [Project Overview](#project-overview)
- [Prerequisites](#prerequisites)
- [Setup Instructions](#setup-instructions)
  - [Installing XAMPP](#installing-xampp)
  - [Installing WAMP](#installing-wamp)
- [Running the Project](#running-the-project)
- [Usage](#usage)

## Project Overview

The project provides a user interface to add new students to the database, view all existing student records, and store this data in a structured format. The backend is written in PHP, and the database is handled using MySQL.

## Prerequisites

To run this project, you will need:

- A local server environment (such as [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/)).
- PHP 7.4 or higher.
- MySQL 5.7 or higher.
- A web browser (Edge, Chrome, Firefox, etc.).

## Setup Instructions

### Installing XAMPP

1. **Download XAMPP**:  
   Visit the [XAMPP official website](https://www.apachefriends.org/index.html) and download the version suitable for your operating system (Windows, Linux, or macOS).

2. **Run the Installer**:  
   Open the downloaded file and run the installer. Follow the setup wizard steps to install XAMPP on your system.

3. **Choose Components**:  
   During installation, choose the components you want to install. For this project, ensure that both **Apache** and **MySQL** are selected.

4. **Start Apache and MySQL**:  
   After installation, open the XAMPP Control Panel and click on **Start** for both Apache and MySQL.

5. **Verify Installation**:  
   Open a web browser and go to `http://localhost/`. You should see the XAMPP dashboard if everything is set up correctly.

### Installing WAMP

1. **Download WAMP**:  
   Visit the [WAMP official website](https://www.wampserver.com/) and download the WAMP Server suitable for your Windows operating system (32-bit or 64-bit).

2. **Run the Installer**:  
   Open the downloaded file and run the installer. Follow the setup wizard to install WAMP Server on your system.

3. **Choose Components**:  
   WAMP comes with Apache, MySQL, and PHP by default. Make sure all components are selected.

4. **Start WAMP Server**:  
   After installation, launch WAMP Server. You will see a green WAMP icon in your system tray if everything is working correctly.

5. **Verify Installation**:  
   Open a web browser and go to `http://localhost/`. You should see the WAMP Server dashboard if everything is set up correctly.

## Running the Project

Once you have installed XAMPP or WAMP and verified that Apache and MySQL are running, follow these steps to run the project:

1. **Download the Project as ZIP**:  
   Go to the [GitHub repository](https://github.com/localhost-gokul/phpsite) and click the **Code** button. Select **Download ZIP**.

2. **Extract the ZIP File**:  
   Extract the downloaded ZIP file to a folder on your system.

3. **Move Project Files to the Server Directory**:
   - For **XAMPP**, copy the extracted project folder to the `htdocs` folder located inside the XAMPP installation directory (e.g., `C:\xampp\htdocs\phpsite`).
   - For **WAMP**, copy the extracted project folder to the `www` folder located inside the WAMP installation directory (e.g., `C:\wamp\www\phpsite`).

4. **Set Up the Database**:  
   - Open PHPMyAdmin by navigating to `http://localhost/phpmyadmin/`.
   
   - **Create the Database**:
   Run the following SQL command to create the database:
   ```sql
     CREATE DATABASE IF NOT EXISTS student_db;
   ```
   ```sql
      USE student_db;
   ```
   - **Create the Table**:  
   - If the database `student_db` does not already contain the `students` table, execute the following SQL command to create it:

     ```sql
     CREATE TABLE IF NOT EXISTS students (
         id            INT(11)     AUTO_INCREMENT PRIMARY KEY,
         name          VARCHAR(50) NOT NULL,
         rollno        VARCHAR(20) NOT NULL,
         date_of_birth DATE        NOT NULL,
         year          ENUM('First', 'Second', 'Third')  NOT NULL,
         created_at    TIMESTAMP   DEFAULT CURRENT_TIMESTAMP
     );
     ```
   - If the database and the table are created in phpMyAdmin, the queries in index.php will not be executed.

5. **Configure Database Credentials**:  
   - Open `serv_cred.php` and set your MySQL username and password.
   ```php
   $hostname = "localhost";
   $username = "root";    
   $password = "";        
   $dbname = "student_db"; 

6. **Run the Application**:
    - Start your local server (Apache and MySQL) using XAMPP/WAMP.
    - Open a web browser and navigate to http://localhost/phpsite/index.php.

### Usage

- Adding a New Student: Fill in the student's name, roll number, date of birth, and year of study in the form provided and click "Submit"
- Viewing Student Records: Click "View Record" to see all student records stored in the database.