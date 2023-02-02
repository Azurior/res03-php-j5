<?php

class Student{
    
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private array $grades;
    
    public function  __construct(string $firstname, string $lastname, string $email)
    {
        $this->id = -1;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->grades = [];
    }
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getFirstname() : string
    {
        return $this->firstname;
    }
    
    public function setFirstname(string $firstname) : void
    {
        $this->firstname = $firstname;
    }
    
    public function getLastname() : string
    {
        return $this->lastname;
    }
    
    public function setLastname(string $lastname) : void
    {
        $this->lastname = $lastname;
    }
    
    public function getEmail() : string
    {
        return $this->email;
    }
    
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
    public function getGrades() : array
    {
        return $this->grades;
    }
    
    public function setGrades(array $grades) : void
    {
        $this->grades = $grades;
    }
    
    // Methode
    
    public function getFullName() : string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    
    public function addGrade(int $nb) : array
    {
        // array_push($grades, $nb);
        $this->grades[] = $nb;
        return $this->grades;
    }
    
    public function removeGrade(int $nb) : array
    {
        for($i = 0; $i < count($this->grades); $i++){
            if($this->grades[$i] === $nb){
                unset($this->grades[$i]);
                return $this->grades;
            }
        }
    }
    
    public function getAverage() : ? float
    {
        $total = 0;
    
        foreach($this->grades as $key=>$grade) {
            $total = $total + $grade;
        }
        
        $count = count($this->grades);
        
        if($count === 0)
        {
            return null;
        }else 
        {
            return  round($total / count($count), 1);
        }
    }
}


?>