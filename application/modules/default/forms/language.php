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

class Default_Form_language extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post');
		$this->setAttrib('action',BASE_URL.'language/edit');
		$this->setAttrib('id', 'formid');
		$this->setAttrib('name', 'language');


        $id = new Zend_Form_Element_Hidden('id');
		
		$language = new Zend_Form_Element_Text('languagename');
        $language->setAttrib('maxLength', 20);
        $language->setRequired(true);
        $language->addValidator('NotEmpty', false, array('messages' => 'Please enter language.'));
		$language->addValidator("regex",true,array(                           
						   'pattern'=> '/^(?=.*[a-zA-Z])([^ ][a-zA-Z ]*)$/',
						   'messages'=>array(
							   'regexNotMatch'=>'Please enter valid language.'
						   )
				));	
        $language->addValidator(new Zend_Validate_Db_NoRecordExists(
                                              array('table'=>'main_language',
                                                        'field'=>'languagename',
                                                      'exclude'=>'id!="'.Zend_Controller_Front::getInstance()->getRequest()->getParam('id').'" and isactive=1',    
                                                 ) )  
                                    );
        $language->getValidator('Db_NoRecordExists')->setMessage('Language already exists.');    				
   	
		$description = new Zend_Form_Element_Textarea('description');
        $description->setAttrib('rows', 10);
        $description->setAttrib('cols', 50);
		$description ->setAttrib('maxlength', '200');

        $submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$submit->setLabel('Save');

		 $this->addElements(array($id,$language,$description,$submit));
         $this->setElementDecorators(array('ViewHelper')); 
	}
}