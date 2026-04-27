Përshkrimi i Projektit
 
RevGT është një aplikacion web i orientuar drejt industrisë automobilistike, i cili u mundëson përdoruesve të:
Shfletojnë automjete
Personalizojnë vetura sipas preferencave
Ndërveprojnë me platformën në mënyrë dinamike
Ky projekt është zhvilluar në kuadër të lëndës Programimi në Ueb nga ana e Serverit.



Qëllimi i projektit është ndërtimi i një aplikacioni web funksional duke përdorur:
PHP (server-side)
HTML, CSS, JavaScript (frontend)
Koncepte të OOP
Sessions & Cookies


 Teknologjitë e përdorura
HTML5
CSS3
JavaScript
PHP
Git & GitHub


 Struktura e Projektit
RevGT/
│
├── pages/          
├── includes/     
├── classes/        
├── assets/         
├── login.php
├── logout.php
└── index.php



Funksionalitetet Kryesore

Login / Logout
Login me kredenciale statike (hardcoded)
Ruajtja e user-it përmes sessions
Logout me session_destroy()
Role të përdoruesve
Admin – qasje e plotë
User – qasje e kufizuar


 PHP & Logjika
Variabla dhe superglobals ($_POST, $_SESSION)
Kushte dhe cikle
Arrays (numeric, associative, multidimensional)
Funksione



OOP (Object-Oriented Programming)
Minimum 2 klasa (p.sh. User, Car)
Konstruktorë
Getter/Setter
Enkapsulim
Trashëgimi


Validimi me RegEx
Validimi bëhet server-side, p.sh:
if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,}$/", $username)) {
    $error = "Username i pavlefshëm";
}



Sessions & Cookies

Sessions për login dhe role
Cookies për personalizim




Si të ekzekutohet projekti

1. Klono repository
git clone https://github.com/hanahiseni/Ueb_g23
2. Vendose në server lokal
Përdor:
XAMPP / MAMP / Laragon
Vendose projektin në:
htdocs/
3. Starto serverin
Apache ON
4. Hap në browser
http://localhost/RevGT



Kredencialet për login
Admin:
username: admin
password: 1234

User:
username: user
password: 1234
