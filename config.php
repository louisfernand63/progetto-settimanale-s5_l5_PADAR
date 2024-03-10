<?php
/* 
progetto settimanale s5_l5_PADAR:
NomeDb : padar
Nome utente : root
Nome host: localhost
password: vu-86s7qLe-bDRW@
 */

/* Creare un pannello di amministrazione dati ad accesso riservato Descrizione del Progetto: Si richiede di sviluppare un'applicazione web in PHP che permetta agli utenti autorizzati di accedere a un pannello di amministrazione per gestire dati sensibili in un database. L'applicazione dovrà essere sviluppata utilizzando il paradigma di programmazione orientata agli oggetti.

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

return [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'padar',
    'port' => '3306',
    'user' => 'root',
    'password' => 'vu-86s7qLe-bDRW@'
];
