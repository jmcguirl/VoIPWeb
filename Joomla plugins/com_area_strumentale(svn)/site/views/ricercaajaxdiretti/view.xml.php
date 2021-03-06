<?php
/*
 * Vista per la pagina con il form di ricerca dei bandi indiretti.
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');
/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 */
class AreaStrumentaleViewRicercaajaxdiretti extends JView {
    
/*
 *display � la funzione che serve per visualizzare la view.
 */
	function display($tpl = null) {
		
		$tpl = "xml";
		//si ottiene il model da cui prendere i dati che servono
		$model =& $this->getModel( 'gestione' );
		$action = JRequest::getVar('action');
		$direzione = JRequest::getVar('direzione');
		$programma = JRequest::getVar('programma');
		$scadenza = JRequest::getVar('scadenza');
		$scaduti = JRequest::getVar('scaduti');
		$currdate = time();
		$currdate = mktime(0,0,0,date("m", $currdate),date("d", $currdate),date("Y", $currdate));
		if( $scaduti == null && $scadenza < $currdate ) {
			$scadenza = $currdate;
		}
		if( $action == "getCount" ) 
			$this->assignRef( 'count', $model->direttiCount( $direzione,
												$programma,
												$scadenza ) );
		else {
			$bandi = $model->direttiRicerca( 	$direzione,
												$programma,
												$scadenza,
												JRequest::getVar('lower'),
												JRequest::getVar('upper') );
	        $this->assignRef( 'bandi', $bandi );
		}
        //visualizzo il template
		parent::display( $tpl );
	}
}
?>
