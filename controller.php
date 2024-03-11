<?php
/* Creare un pannello di amministrazione dati ad accesso riservato 
Descrizione del Progetto: 
Si richiede di sviluppare un'applicazione web in PHP che permetta agli utenti autorizzati di accedere a un pannello di amministrazione per gestire dati sensibili in un database. L'applicazione dovrà essere sviluppata utilizzando il paradigma di programmazione orientata agli oggetti.

Requisiti Funzionali: 

Autenticazione Utente: 
✔Gli utenti dovranno poter accedere al pannello di amministrazione inserendo un nome utente e una password. 
✔Il sistema dovrà autenticare gli utenti rispetto alle credenziali memorizzate in un database. 

Gestione dei Dati: 
✔Una volta autenticati, gli utenti potranno eseguire operazioni CRUD (Create, Read, Update, Delete) sui dati sensibili presenti nel database. ✔Le operazioni CRUD dovranno essere gestite tramite appositi form o interfaccia utente. 

Accesso Riservato: 
✔L'accesso al pannello di amministrazione e alle operazioni CRUD dovrà essere riservato agli utenti autorizzati.
✔Gli utenti non autorizzati che tentano di accedere al pannello di amministrazione dovranno essere reindirizzati ad una pagina di login.

Struttura dell'Applicazione: 
Classe Utente (User): Deve gestire l'autenticazione degli utenti e le relative informazioni (nome utente, password). 

Classe Database: 
Deve gestire la connessione al database e le operazioni CRUD sui dati sensibili. Le operazioni CRUD dovranno essere gestite tramite appositi form o interfaccia utente. 

Interfaccia Utente (UI): 
Deve fornire un'interfaccia intuitiva per l'autenticazione degli utenti e la gestione dei dati sensibili. 

Script di Avvio (index.php): 
Deve gestire il routing delle richieste e inizializzare l'applicazione.

Requisiti Tecnici: 
✔Utilizzare PHP per la logica di backend. 
✔Utilizzare HTML e CSS per la parte di frontend. 
✔Utilizzare un database MySQL per memorizzare i dati sensibili. 
✔Utilizzare PDO per gestire le query al database in modo sicuro e parametrizzato. 
✔Utilizzare sessioni PHP per gestire l'autenticazione degli utenti. 

Note: 
Seguire le best practices della programmazione orientata agli oggetti per garantire una struttura modulare, manutenibile e scalabile dell'applicazione.
*/


require_once('database.php');

// inizio sessione
session_start();

print_r($_REQUEST);

// Verifica del formato della mail
$regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
$email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();

// Verifica del formato della password
$regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);
$pass = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();
//$password = password_hash($pass , PASSWORD_DEFAULT);

/* if(strlen($email) < 3 || strlen($password) < 3) {
    $_SESSION['error'] = 'Email e Password errati!!!';
    header('Location: http://localhost/S5L2_PHP/login.php');
} */

// Lettura dati in una tabella
$sql = "SELECT * FROM users WHERE email = '" . $email . "'";
$res = $mysqli->query($sql); // return un mysqli result

if($row = $res->fetch_assoc()) { 
    if(password_verify($pass, $row['password'])){
        $_SESSION['userLogin'] = $row;
        session_write_close();
        // Verifico se durante il login è stata messa la spunto sulla checkbox Remember me
        if(isset($_REQUEST['check'])) {
            // Setting a cookie
            setcookie("useremail", $row['email'], time()+20*24*60*60);
            setcookie("userpassword", $row['password'], time()+20*24*60*60);
        }
        header('Location: http://localhost/S5L2_PHP/Pratica/');
        exit;
    } else {
        $_SESSION['error'] = 'Password errata!!!';
        header('Location: http://localhost/S5L2_PHP/Pratica/login.php');
    }
} else {
    $_SESSION['error'] = 'Email e Password errati!!!';
    header('Location: http://localhost/S5L2_PHP/Pratica/login.php');
}
