<?php 
require_once ('database.class.php');

class Student  extends DB{

    protected $table = 'students';

    protected $db;
    public function __construct()
    {
       $this->db = self::getInstance();
       self::setCharsetEncoding();
    }

    public function get()
    {
        $query = 'SELECT * FROM students';
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) 
    {
        $query = 'SELECT * FROM students where id = ' . $id;
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return (object) $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($array)
    {
        $array = (object) $array;
        $query = "INSERT INTO students (first_name, last_name, dob, contact_no, created_at) VALUES (?,?,?,?,?)";
        $stmt= $this->db->prepare($query);
        $result = $stmt->execute([
            $array->first_name, 
            $array->last_name,
            $array->dob, 
            $array->contact_no,
            date('Y-m-d H:i:s'),
        ]);

        return $result;
    }

    public function update($id, $data)
    {
        $data = (object) $data;
        $sql = "UPDATE students SET first_name=?, last_name=?, dob=?, contact_no=?, updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([
            $data->first_name, 
            $data->last_name, 
            $data->dob, 
            $data->contact_no, 
            date('Y-m-d H:i:s'),
            $id
        ]);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getCourseList()
    {
        $query = 'SELECT s.id as student_id, c.id as course_id,
         s.first_name as student_first_name,
         s.last_name as student_last_name,
         c.name as course_name FROM students as s 
        JOIN student_courses as sc on sc.student_id = s.id
        JOIN courses as c on sc.course_id = c.id
        ';
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}