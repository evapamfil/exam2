<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 15/11/2018
 * Time: 13:37
 */

namespace App\Models;

class Task {

    protected $id;
    protected $complete;
    protected $description;
    protected $due;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * @param mixed $complete
     */
    public function setComplete($complete)
    {
        $this->complete = $complete;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDue()
    {
        $date = new \DateTime($this->due);
        return $date;
    }

    /**
     * @param mixed $due
     */
    public function setDue($due)
    {
        $this->due = $due;
    }

}