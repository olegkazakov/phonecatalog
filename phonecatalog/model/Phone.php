<?php
namespace phonecatalog\model;

/**
 * Description of Phone
 *
 * @author olegkazakov
 */
class Phone
{
    private $id;
    private $fio;
    private $phone;
    private $comment;
    public function getId()
    {
      return $this->id;
    }

    public function getFio()
    {
      return $this->fio;
    }

    public function getPhone()
    {
      return $this->phone;
    }

    public function getComment()
    {
      return $this->comment;
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function setFio($fio)
    {
      $this->fio = $fio;
    }

    public function setPhone($phone)
    {
      $this->phone = $phone;
    }

    public function setComment($comment) {
      $this->comment = $comment;
    }


}

