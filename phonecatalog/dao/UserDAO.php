<?php
namespace phonecatalog\dao;

use phonecatalog\model\User;

/**
 *
 * @author olegkazakov
 */

interface UserDAO
{
    function find($id);
    function save(User $user);
    function findByNameAndPass($name, $pass);
}
