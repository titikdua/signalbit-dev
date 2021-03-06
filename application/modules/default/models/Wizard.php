<?php
/********************************************************************************* 
 *  This file is part of Camhrms.
 *  Copyright (C) 2014 Camtech Indonesia
 *   
 *  Camhrms is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  Camhrms is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with Camhrms.
 *
 *  Camhrms Support <support@camtech-indonesia.co.id>
 ********************************************************************************/

class Default_Model_Wizard extends Zend_Db_Table_Abstract
{
    protected $_name = 'main_wizard';
    protected $_primary = 'id';
	
    
	
	public function getWizardData()
	{
	    $select = $this->select()
						->setIntegrityCheck(false)
						->from(array('w'=>'main_wizard'),array('w.*'));
		return $this->fetchRow($select)->toArray();
	
	}

	public function SaveorUpdateWizardData($data, $where)
	{ 
			$this->update($data, $where);
			return 'update';
	
	}
	
	
	
	
	
}