<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insert
 *
 * @author Donald
 */
class insert 
{
    public function insert()
    {
        $sqlStmt = "INSERT INTO Employment(Employer,[Start Date],[Finish Date],Address,City,State,Position,Email,Phone) ";
        $sqlStmt = $sqlStmt . "VALUES (':emp',':sDate',':fdate',':address',':city',':state',:position,:email,:phone);";
        
        return $this->conn->exec($sqlStmt);
    }
}
