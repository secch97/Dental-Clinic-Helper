<div id="top"></div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <img src="/public/assets/frontend/images/core-img/logo.png" alt="Logo" width="300" height="50">
  <h3 align="center">Simple Dental Clinic Web System</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project
<div align="center">
    <img src="/public/assets/frontend/images/core-img/HomeClinic1.png" alt="Screenshot" width="1000" height="700">
</div>
<br>

This is a personal non-profit project, carried out by me to support the management of my mother's dental clinic back in my country, El Salvador.

This project represents what I have learned in the PHP framework, Laravel. I applied my basic knowledge to be able to create this web application with the sole reason of helping my mother to efficiently manage her dental clinic data, since she used to do it in a physical way and written by hand.

In this web application, people can create their account and book an appointment. Once the appointment arrives and the patient is present, the dentist will be in charge of entering the patient's personal data. The dentist will be able to assign a treatment plan and upcoming appointments for each of the patients

<p align="right">(<a href="#top">back to top</a>)</p>

### Built With

This project is being built with the following technologies:

* [Laravel Framework](https://laravel.com/)
* [PHP](https://www.php.net/) 
* [Javascript](https://www.javascript.com/)
* [jQuery](https://jquery.com/) 
* [Laragon](https://laragon.org/)
* [Bootstrap](https://getbootstrap.com)
* [MySQL](https://www.mysql.com/)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

In this section you will find the instructions to follow to be able to execute this project locally:

### Prerequisites

You need to have the following programs installed on your computer:
* Visual Studio Code.
* Laragon.
* MySQL.

### Installation
1. Clone the repo on Laragon Server C:\laragon\www
   ```sh
   git clone https://github.com/secch97/DentalClinic
   ```
2. Modify the file .env.example:
  * Change the file's name to .env
  
3. Open Laragon's terminal:
  * Change the folder location to the project's location.
  * Enter the following command:
       ```sh
       composer install
       ```
  * Then, proceed to enter the following command to generate a new .env key:
       ```sh
       php artisan key:migrate
       ```
4. Open the .env file and proceed to make the following changes:
   ```sh
   APP_URL=
   DB_DATABASE=dentalclinicdb
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=info.miramontedental@gmail.com
    MAIL_PASSWORD=testclinicadental
    MAIL_ENCRYPTION=ssl
    MAIL_FROM_ADDRESS=info.miramontedental@gmail.com
   ```
5. Open Laragon's MySQL. Once inside MySQL, create a database with the name of "dentalclinicdb"

6. Return to Laragon's terminal and proceed to enter the following commands:
  * DB's tables migration:
      ```sh
       php artisan migrate
      ```
  * Initialize the table values with the seeds created in the Laravel project:
      ```sh
       php artisan db:seed
      ```
7. You are good to go! Test the project locally with Laragon Server. 
  * Admin user is admin@proyecto.test, Admin password is: 123456. 

<p align="right">(<a href="#top">back to top</a>)</p>


<!-- USAGE EXAMPLES -->
## Usage

Here are some uses of this project:
* Registering new user:
<div align="center">
    <img src="/public/assets/frontend/images/core-img/Registro1.png" alt="Screenshot" width="500" height="500">
</div>

* User Account Data Screen:
<div align="center">
    <img src="/public/assets/frontend/images/core-img/Micuenta.png" alt="Screenshot" width="500" height="500">
</div>
<br>

* Book an appointment:
<div align="center">
    <img src="/public/assets/frontend/images/core-img/ReservarCita.png" alt="Screenshot" width="500" height="800">
</div>
<br>

* Admin Dashboard:
<div align="center">
    <img src="/public/assets/frontend/images/core-img/AdminDash.png" alt="Screenshot" width="1000" height="500">
</div>

Clone the project to see more functionalities!
<p align="right">(<a href="#top">back to top</a>)</p>

<p align="right">(<a href="#top">back to top</a>)</p>
