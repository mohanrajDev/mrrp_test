<?php 
require_once ('database.class.php');

class Course  extends DB{

    protected $table = 'courses';

    protected $db;
    public function __construct()
    {
       $this->db = self::getInstance();
       self::setCharsetEncoding();
    }

    public function get()
    {
        $query = 'SELECT * FROM courses';
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) 
    {
        $query = 'SELECT * FROM courses where id = ' . $id;
        $statement = $this->db->prepare($query);
        $statement->execute();
	    return (object) $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($array)
    {
        $array = (object) $array;
        $query = "INSERT INTO courses (name, details, created_at) VALUES (?,?,?)";
        $stmt= $this->db->prepare($query);
        $result = $stmt->execute([
            $array->name, 
            $array->details,
            date('Y-m-d H:i:s'),
        ]);

        return $result;
    }

    public function update($id, $data)
    {
        $data = (object) $data;
        $sql = "UPDATE courses SET name=?, details=?,updated_at=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $result = $stmt->execute([
            $data->name, 
            $data->details, 
            date('Y-m-d H:i:s'),
            $id
        ]);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM courses WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}