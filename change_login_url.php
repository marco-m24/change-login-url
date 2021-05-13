/*
* Inserisci la seguente riga nel file .htaccess subito sotto la riga "RewriteBase /"
* Inserisci al posto di "accedi" lo slug che intendi usare come login del tuo sito
*/
RewriteRule ^accedi$ wp-login.php

/*
* Inserisci questo filtro dentro il file functions.php del tuo tema child
* Oppure all'interno di un plugin
* Inserisci al posto di "accedi" lo slug che intendi usare come login del tuo sito
* Oppure inserisci "/" se vuoi nascondere completamente il vecchio url
*/
add_filter('site_url',  'mrc_wplogin_filter', 10, 3);
function mrc_wplogin_filter( $url, $path, $orig_scheme )
{
 $old  = array( "/(wp-login\.php)/");
 $new  = array( "accedi");
 return preg_replace( $old, $new, $url, 1);
}
