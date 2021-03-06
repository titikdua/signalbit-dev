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

/**
 * Login Admin Auth
 * 
 * @author K.Manjunath
 */
class Login_Adminauth {
	
	private function __construct() {
		// private - should not be used
	}
	
	public static function _getAdapter($adapter,$options) {
		
		if (empty($adapter) || empty($options) || !is_array($options)) {
            return false;
        }
        if (!in_array($adapter,array('ldap','db'))) {
        	return false;
        }
		if (!array_key_exists('username',$options) ||  !array_key_exists('user_password',$options)) {
			return false;
		} 
		
		$username= $options['username'];
		$password= $options['user_password'];
        switch ($adapter) {
        	case 'ldap' :
        		
        		$auth= new Zend_Auth_Adapter_Ldap($options['ldap'],$username,$password);
        		break;
        	case 'db' :
        		
				
				$password=md5($password);
        		$auth= new Zend_Auth_Adapter_DbTable($options['db'],
        									    	 'tbl_users',
        											 'email',
        											 'user_password');
        		
        		$auth->setIdentity($username)->setCredential($password);
        		break;
        }
        return $auth;
	}
}