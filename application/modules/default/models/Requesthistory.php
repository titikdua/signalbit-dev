<?php

/* * ******************************************************************************* 
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
 * ****************************************************************************** */

/**
 * Requesthistory will track every step of the request
 *
 * @author ramakrishna
 */
class Default_Model_Requesthistory extends Zend_Db_Table_Abstract 
{
    protected $_name = 'main_request_history';
    protected $_primary = 'id';
    
    /*
     * This function is used to save/update data in database.
     * @parameters
     * @data  =  array of form data.
     * @where =  where condition in case of update.
     *
     * returns  Primary id when new record inserted,'update' string when a record updated.
     */
    public function SaveorUpdateRhistory($data, $where)
    {    
        if($where != '')
        {
            $this->update($data, $where);
            return 'update';
        } 
        else 
        {
            $this->insert($data);
            $id=$this->getAdapter()->lastInsertId($this->_name);
            return $id;
        }
    }//end of SaveorUpdateRhistory
}//end of Default_Model_Requesthistory class
