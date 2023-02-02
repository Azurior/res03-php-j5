<?php

class School {
    
    //Attribut
    private int $id;
    private User $teacher;
    private array $students;
    
    //Constructeur
    public function __construct(User $teacher){
        
        $this->id = -1;
        $this->teacher = $teacher;
        $this->students = [];
    }
    
    // Les Set et Get
    public function getId() : int
    {
        return $this->id;
    }
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function getTeacher() : User
    {
        return $this->teacher;
    }
    
    public function setTeacher(string $teacher) : void
    {
        $this->teacher = $teacher;
    }
    
    public function getStudents() : array
    {
        return $this->students;
    }
    
    public function setStudents(string $students) : void
    {
        $this->students = $students;
    }
    
    //Les méthodes
    
    public function addStudents(Student $students){
        
        $this->students.array_push($student);

        return $this->students;
        
    }
    
    public function removeStudents(Student $students){
        
        for($i = 0; $i < count($this->students); $i++){
            
            if($this->students[$i]->getId() === $students->getID()){
                
                unset($this->students[$i]);
            }
        }
    }
}

?>