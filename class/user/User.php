<?php

require_once ROOT .'class/model/UserModel.php'; 

class User
{
    private string $id;

    private string $name;

    private string $email;

    private string $password;

    private int $lawLevel = 0;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }    

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Get the value of lawLevel
     */ 
    public function getLawLevel()
    {
        return $this->lawLevel;
    }

    /**
     * Set the value of lawLevel
     *
     * @return  self
     */ 
    public function setLawLevel($lawLevel)
    {
        $this->lawLevel = $lawLevel;

        return $this;
    }

    /**
     * Data send by user
     */
    public function edit (string $name,string $mail, int $id)
    {   
        $this->setName($name);
        $this->setEmail($mail);
        
        (new UserModel())->update($this, intval($id));
        (new Session())->set('alertUser', 'success', 'Modification enregistré');
        Tool::redirectTo('/user/profil.php');
    }

    /**
     * 
     */
    public function ifEmailExistWhenUserEdit(string $mail, string $currentUserData) : void
    {
        $emailExist = (new UserModel())->findOneBy('user', 'email_user', $mail);
        
        if($emailExist && $emailExist['email_user'] !== $currentUserData)
        {
            (new Session())->set('alertUser', 'error', 'Cet adresse mail est déjà utilisé');
            Tool::redirectTo('/user/profil.php');
        }
    }
}