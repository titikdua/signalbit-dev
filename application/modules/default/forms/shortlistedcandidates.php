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

class Default_Form_shortlistedcandidates extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post');
		$this->setAttrib('action',BASE_URL.'shortlistedcandidates/edit');
		$this->setAttrib('id', 'formid');
		$this->setAttrib('name', 'businessunits');
		
		$id = new Zend_Form_Element_Hidden('id');
		
		$selectionstatus = new Zend_Form_Element_Select('selectionstatus');
		$selectionstatus->setRequired(true)->addErrorMessage('Please change the candidate status.');
		$selectionstatus->addFilter('Int')->addValidator('NotEmpty',true, array('integer','zero'));
		$selectionstatus->setLabel('domain')
		->setMultiOptions(array(		
							'0'	=>	'Select status',
							'2'	=>	'Selected' ,
							'3'	=>	'Rejected'
							));
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$submit->setLabel('Update');
		
		$this->addElements(array($id,$selectionstatus,$submit));
        $this->setElementDecorators(array('ViewHelper')); 
	}
}