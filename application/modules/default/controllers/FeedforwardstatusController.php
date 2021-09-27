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

class Default_FeedforwardstatusController extends Zend_Controller_Action
{
    private $options;
    public function preDispatch()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('getffstatusemps', 'html')->initContext();
        $ajaxContext->addActionContext('getfeedforwardstatus', 'html')->initContext();
    }
	
    public function init()
    {
        $this->_options= $this->getInvokeArg('bootstrap')->getOptions();
    }
    
	public function indexAction()
    {
    	$auth = Zend_Auth::getInstance();
     	if($auth->hasIdentity())
        {
            $loginUserId = $auth->getStorage()->read()->id;
            $businessunit_id = $auth->getStorage()->read()->businessunit_id;
            $department_id = $auth->getStorage()->read()->department_id; 
            $loginuserRole = $auth->getStorage()->read()->emprole;
            $loginuserGroup = $auth->getStorage()->read()->group_id;
        }	

        $ffinitModel = new Default_Model_Feedforwardinit();
        $ffDataArr = $ffinitModel->getFFbyBUDept('','yes');
        $this->view->ffdataarr = $ffDataArr;
    }
    
    public function getffstatusempsAction()
    {
    	$id = $this->_request->getParam('id');
    	
    	$ffEmpRatModel = new Default_Model_Feedforwardemployeeratings;
    	$ffEmpsStatusData = $ffEmpRatModel->getEmpsFFStatus($id);
    	
    	$this->view->ffEmpsStatusData = $ffEmpsStatusData;
    }
    
	public function getfeedforwardstatusAction()
    {
    	$id = $this->_request->getParam('id');
    	$ffstatus = $this->_request->getParam('ffstatus');
    	
    	$ffEmpRatModel = new Default_Model_Feedforwardemployeeratings;
    	$ffEmpsStatusData = $ffEmpRatModel->getfeedforwardstatus($id,$ffstatus);
    	
    	$this->view->ffEmpsStatusData = $ffEmpsStatusData;
    }
}