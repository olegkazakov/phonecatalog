<?php
namespace phonecatalog\service;

use phonecatalog\model\User;

/**
 *
 * @author olegkazakov
 */

interface UserService
{
    function find($id);
    function save(User $user);
    function authorize($name, $pass);
}
