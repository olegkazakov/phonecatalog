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
    function save();
    function findAll();
    function find();
    function delete();
    function update();
}
