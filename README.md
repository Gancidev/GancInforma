# GanciInforma
Progetto nato all'inizio della quarantena quando in pochi fornivano questo servizio e bisognava controllare i report dai siti ufficiali con difficoltà in lettura a volte.
il progetto si basa su una WebApp e un Sito di appoggio entrambi ideati da me, lo stile è molto minimal per non compromettere leggibilità e immediatezza delle informazioni.

# Scopo
Dare alle persone la possibilità di avere a portata di mano le informazioni in modo chiaro e senza troppa difficoltà.

# Implementazione
Il progetto si divide in due parti:
  1) Sito Web: realizzato semplicemente con HTML, CSS, Javascript e PHP.
  2) WebApp: realizzata tramite l'applicativo Android Studio con linguaggio di programmazione Java.

# Sito Web
Molto minimal e semplice con stile arrotondato e differenti gradazioni del blu.<br>
Composto da 4 pagine:
  1) avv : semplice pagina di introduzione al contenuto del sito.
  2) num : riepilogo della situazione italiana.
  3) cond : riepilogo delle condizioni dei positivi.
  4) ripa : prima sezione con bottone per download diretto del file sommario per regione, seconda sezione con dropdown e possibilità di scelta della regione di cui mostrare il dettaglio.
  
L'utilizzo del Javascript è dovuto all'utilizzo del dropdown per garantire un aggiornamento dinamico della pagina.
L'utilizzo del PHP è dovuto alla richiesta dei dati.

# WebApp
Anche questa molto minimal suddivisa in 3 parti:
  1) info_button : un bottone in basso per dare un contatto di informazione.
  2) sidebar : piccolo menù laterale con i 3 bottoni che cambiano la pagina visualizzata nella sezione centrale.
  3) webview : una webview fullscreen che cambia pagina in base ai bottoni del menù.
  
 La scelta di Java deriva da una semplice scelta di sviluppo.

# Fonte
La fonte dei dati utilizzati è la repository della protezione civile, aggiornata ogni giorno alle 18 circa.

Link: https://github.com/pcm-dpc/COVID-19
