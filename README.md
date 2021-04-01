# GanciInforma
Progetto nato all'inizio della quarantena quando in pochi fornivano questo servizio e bisognava controllare i report dai siti ufficiali con difficoltà in lettura a volte.
<br>Il progetto si basa su una WebApp e un Sito di appoggio entrambi ideati da me, lo stile è molto minimal per non compromettere leggibilità e immediatezza delle informazioni.

## Scopo
Dare alle persone la possibilità di avere a portata di mano le informazioni in modo chiaro e senza troppa difficoltà.

## Implementazione
Il progetto si divide in due parti:
  1) Sito Web: realizzato semplicemente con HTML, CSS, Javascript e PHP.
  2) WebApp: realizzata tramite l'applicativo Android Studio con linguaggio di programmazione Java.

## Sito Web
Molto minimal e semplice con stile arrotondato <br>
Composto da 1 pagina contenente:
  1) Sezione Presentativa : semplice pagina di introduzione al contenuto del sito.
  2) Numeri in Italia: riepilogo della situazione italiana.
  3) Condizioni dei Positivi : riepilogo sulle condizioni dei positivi.
  4) Ripartizione nelle Regioni : bottone per download diretto del file sommario per regione, dropdown e possibilità di scelta della regione di cui mostrare il dettaglio.
  
L'utilizzo del Javascript è dovuto all'utilizzo del dropdown per garantire un aggiornamento dinamico della pagina e al counter dinamico.
L'utilizzo del PHP è dovuto alla richiesta dei dati.

## WebApp
Anche questa molto minimal composta da un solo componente:
  1) webview : una webview fullscreen che mostra il sitoweb.
  
 L'utilizzo di Java deriva da una scelta di sviluppo.

## Fonte
La fonte dei dati utilizzati è la repository della protezione civile, aggiornata ogni giorno alle 18 circa.

Link: https://github.com/pcm-dpc/COVID-19
