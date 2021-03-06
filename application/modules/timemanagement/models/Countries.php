<?php
/********************************************************************************* 
 *  This file is part of Camhrms.
 *  Copyright (C) 2014 AAP
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
 *  Camhrms Support <support@mareges.com>
 ********************************************************************************/

require_once 'Zend/Db/Table/Abstract.php';

class Timemanagement_Model_Countries extends Zend_Db_Table_Abstract
{
    protected $_name = 'tbl_countries';
    protected $_primary = 'id';
	
}