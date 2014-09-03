<?php
namespace phonecatalog\dao;

use phonecatalog\model\Phone;

/* 
 * Description of PhoneDAO
 * 
 * @author olegkazakov
*/
interface PhoneDAO
{
    function save(Phone $phone);
    function findAll();
    function find($id);
    function delete($id);
    function update(Phone $phone);
}
