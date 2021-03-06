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
/**
 *
 * @model Configuration Model
 * @author sagarsoft
 *
 */
class Timemanagement_Model_Cronjobstatus extends Zend_Db_Table_Abstract
{
	protected $_name = 'tm_cronjob_status';
	protected $_primary = 'id';

	public function checkCronRunning()
	{
		$select = $this->select()
		->setIntegrityCheck(false)
		->from(array('c'=>$this->_name),array('c.*'))
		->where("c.cronjob_status = 'running'");
		return $this->fetchAll($select)->toArray();

	}

	public function saveorUpdateCronjobStatusData($data, $where)
	{
		if($where != ''){
			$this->update($data, $where);
			return 'update';
		} else {
			$this->insert($data);
			$id=$this->getAdapter()->lastInsertId($this->_name);
			return $id;
		}
	}

}