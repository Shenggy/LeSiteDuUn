<?php
/**
 * Created by PhpStorm.
 * User: Shenggy
 * Date: 19/02/2018
 * Time: 14:11
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser; //Alias BaseUser pour la classe User du bundle FOS
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */


class User extends BaseUser //Héritage pour récupérer les attributs de BaseUser (voir BDD)
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $id;

    public function getId() {
        return $this->id;
    }

}