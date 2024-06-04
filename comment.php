<!-- 
registrazione 
login 
logout
con validazione dati

controlli sulla homepage se sono loggato altrimenti non puoi andare OK
integrare con database e quindi checkare nel database gli utenti che metto OK

// validazione dei DATI client(username già in uso, password con una struttura ben definita -
 (ad esempio, vincoli sulla lunghezza minima, sulla presenza di maiuscole, numeri, simboli, ecce) OK 
 
SERVER 
username gia in uso REGITRAZIONE  e pw OK

 injection , error handling , sessioni e robe da controllare per bene 
(se sei loggato il tasto accedi diventa logout) 



-------


home page carica con api rest( js chiedee a php -> php chiede a db -> restituisce a js che costruisce -
 la pagina e il contenuto
) OK
fare pagine articoli e caricarle nel db(? una o piu? )

facciamo che faccio 3 diverse strutture? pagine php con struttura definita che prendono dal database
(alemno 3 ).
la home mi manda al percorso della pagina che carico . se ne faccio uno solo mando i par get che mi cercano nel db.

nel mio caso faccio 3 pagine diverse a cui vado con il path, ognuna diversa in base all'articolo ma che prende dal db


1) RICHIESTE FETCH DA INDEX (sito.js) A INDEX_FETCH.PHP OK 
2) RISPOSTE DA INDEX_FETCH.PHP A INDEX OK 


MI MANCA GESTIRE IL MOSTRA ALTRI. OK 
MI MANCA : capire come fare tre pagine diverse e la nav bar.
probabilmente tolgo la seconda navbar e creo una pagina html che mi carica solo monografie o recensioni o roba 
chiedere come fare la SPA se sono richieste tre html 


togliere robe in piu secondo homework
cambiare immagine in mezzo , articoli in caso se mi vengono idee 






SPOSTARE fetch esterne su php e integrare in js 

integrare nel db e nelle fetch la data dell'articolo, e la TAG .  (N a N)


un po di frontend sulle immagini che fittano bene senza stretchare . 




------------------------------



pagine con contenuti caricati tramite api rest ( 3 pg min)



homepage interazione: o la ricerca di contenuto o una reading list di preferiti o i commenti . devo decidere.
    se ci arrivo faccio i commenti agli articoli. se no la lista dei preferiti ma poi devo mettere la pagina per visualizzarli



ricercare contenuti tramite api rest (es. spotify o igdb . vedremo. magari integro l'accesso con twitch)


meglio js che ricaricamenti 






hw1
index.php
database .sql


--> 