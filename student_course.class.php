<?php 
require_once ('database.class.php');

class StudentCourse  extends DB{

    protected $table = 'student_courses';

    protected $db;
    public function __construct()
    {
       $this->db = self::getInstance();
       self::setCharsetEncoding();
    }

    public function get()
    {
        $query = "SELECT * FROM student_courses";
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($student_id, $course_id) 
    {
        $query = 'SELECT * FROM student_courses where student_id = ' . $student_id  . ' AND course_id = ' . $course_id;
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return (object) $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($array)
    {
        $array = (object) $array;

        $result = $this->find($array->student_id, $array->course_id);
        if (
            (isset($result->course_id) != $array->course_id)
            && 
            (isset($result->student_id) != $array->student_id)            
        ) {
            $query = "INSERT INTO student_courses (student_id, course_id, created_at) VALUES (?,?,?)";
            $stmt= $this->db->prepare($query);
            $result = $stmt->execute([
                $array->student_id, 
                $array->course_id,
                date('Y-m-d H:i:s'),
            ]);
    
            return $result;
        }

        return true;
    }

}