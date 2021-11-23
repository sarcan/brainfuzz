# Brainfuzz 🧠

#### Author: Sarah Can
#### Version: 1.0.0
#### Module WBD 5204 - Web Application
#### 11. Oktober 2021

<br>

> Introduction

This project is a web application for people diagnosed with ADHD. Users can register or login to the web application. They can fill out a journal entry and edit/update today's entry, display all previous entries aswell as update their name and Email adress.

<br>

> Design

Since ADHD is a neurodevelopmental condition I tried to design the website accordingly. <br>
Neurodiverse readers generally understand sans-serif fonts better, such as Helvetica, Verdana, Arial etc. I chose to use Helvetica for this project. <br>
Furthermore I decided to use a neutral background color and reduced the intensity of colors.
I've also tried to seperate certain sections, like the text on the landingpage, with different colors.

<br>

> Contents

🔵 Landing Page <br>
🔵 Articles We 🖤 <br>
🔵 Resources <br>
🔵 About me <br>
🔵 Login Form & Registration Form <br>

Additional Contents for loggedin Users: <br>
🟠 Additional Rescources <br>
🟠 Timer <br>
🟠 Journal <br>
🟠 My Account <br>

<br>

> Login for registred Users
- Username: `test@test.com`
- Password: `test1234`

<br>

> Database Connection Details

All information on establishing a database connection is stored under `prefs/Credentials.php`:

MAMP:

```php
$servername = "localhost";
$dbname = "brainfuzz";
$username = "root";
$password = "root";
 
try {
      $connection = new PDO (
        "mysql:host=$servername;dbname=$dbname",
        $username, $password );
   
      // Set the PDO error mode
      // to exception
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
      echo "Connection failed: " . $error->getMessage();
}
```
Please change the code to the following, if you use Xampp:
```php
$servername = "localhost";
$dbname = "brainfuzz";
$username = "root";
$password = "";
 
try {
      $connection = new PDO (
        "mysql:host=$servername;dbname=$dbname",
        $username, $password );
   
      // Set the PDO error mode
      // to exception
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
      echo "Connection failed: " . $error->getMessage();
}
```

<br>

> Note

Please note, that the volume function in ressources -> audio (mindfulness exercise, progressive muscle relaxation) does not work yet.

<br>

> Recognition

The timer ⏲️ is based on `https://github.com/CynthiaLixinLee/pomodoro-timer`.