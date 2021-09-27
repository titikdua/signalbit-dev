<?php
/********************************************************************************* 
 *  This file is part of Camhrms.
 *  Copyright (C) 2015 Camtech Indonesia
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
 *  along with Camhrms.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  Camhrms Support <support@camtech-indonesia.co.id>
 ********************************************************************************/

class Default_EmpsecuritycredentialsController extends Zend_Controller_Action
{

	private $options;
	public function preDispatch()
	{
	}

	public function init()
	{
		$this->_options= $this->getInvokeArg('bootstrap')->getOptions();
	}

	public function indexAction()
	{

	}

	public function editAction()
	{
		if(defined('EMPTABCONFIGS'))
		{
			$empOrganizationTabs = explode(",",EMPTABCONFIGS);

			if(in_array('emp_security',$empOrganizationTabs)){
				$auth = Zend_Auth::getInstance();
				if($auth->hasIdentity())
				{
					$loginUserId = $auth->getStorage()->read()->id;
				}
				$userid = $this->getRequest()->getParam('userid');
				$employeeModal = new Default_Model_Employee();
				$isrowexist = $employeeModal->getsingleEmployeeData($userid);
				if($isrowexist == 'norows')
				$this->view->rowexist = "norows";
				else
				$this->view->rowexist = "rows";

				$empdata = $employeeModal->getActiveEmployeeData($userid);
				if(!empty($empdata))
				{
					$empsecuritycredentialsModel = new Default_Model_Empsecuritycredentials();
					if($userid)
					{
						//To display Employee Profile information......
						$usersModel = new Default_Model_Users();
						$employeeData = $usersModel->getUserDetailsByIDandFlag($userid);
					}
					$this->view->id=$userid;
					$this->view->employeedata = $employeeData[0];

					if($this->getRequest()->getPost())
					{
					}
				}
				$this->view->empdata = $empdata;
		 }else{
		 	$this->_redirect('error');
		 }
		}else{
			$this->_redirect('error');
		}
	}


	public function viewAction()
	{
		if(defined('EMPTABCONFIGS'))
		{
			$empOrganizationTabs = explode(",",EMPTABCONFIGS);

		 if(in_array('emp_security',$empOrganizationTabs)){
		 	$auth = Zend_Auth::getInstance();
		 	if($auth->hasIdentity())
		 	{
		 		$loginUserId = $auth->getStorage()->read()->id;
		 	}
		 	$userid = $this->getRequest()->getParam('userid');
		 	$employeeModal = new Default_Model_Employee();
		 	$isrowexist = $employeeModal->getsingleEmployeeData($userid);
		 	if($isrowexist == 'norows')
		 	$this->view->rowexist = "norows";
		 	else
		 	$this->view->rowexist = "rows";

		 	$empdata = $employeeModal->getActiveEmployeeData($userid);
		 	if(!empty($empdata))
		 	{
		 		$empsecuritycredentialsModel = new Default_Model_Empsecuritycredentials();
		 		if($userid)
		 		{
		 			//To display Employee Profile information......
		 			$usersModel = new Default_Model_Users();
		 			$employeeData = $usersModel->getUserDetailsByIDandFlag($userid);
		 		}
		 		$this->view->id=$userid;
		 		$this->view->employeedata = $employeeData[0];

		 		if($this->getRequest()->getPost())
		 		{
		 		}
		 	}
		 	$this->view->empdata = $empdata;
		 }else{
		 	$this->_redirect('error');
		 }
		}else{
			$this->_redirect('error');
		}
	}



}
?>
