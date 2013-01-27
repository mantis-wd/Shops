<?php

require_once(dirname(__FILE__).'/ipl_xml_request.php');

/**
 * @author Jan Wehrs (jan.wehrs@billpay.de)
 * @copyright Copyright 2010 Billpay GmbH
 * @license commercial 
 */
class ipl_update_order_request extends ipl_xml_request {
	
	var $_update_params 	= array();
	var $_id_update_list 	= array();
	
	function add_id_update($articleid, $updateid) {
		$idUpdate = array();
		
		$idUpdate['articleid'] = $articleid;
		$idUpdate['updateid'] = $updateid;
		$this->_id_update_list[] = $idUpdate;
	}
	
	function set_update_params($bptid, $reference) {
		$this->_update_params['bptid'] = $bptid;
		$this->_update_params['reference'] = $reference;
	}
	
	function _send() {
		return ipl_core_send_update_order_request(
			$this->_ipl_request_url, 
			$this->_default_params, 
			$this->_update_params,
			$this->_id_update_list
		);
	}
	
	function _process_response_xml($data) {
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}
}

?>