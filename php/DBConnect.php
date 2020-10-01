<?php
class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "registration";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .$e->getMessage());
        }
        return $this->db;
    }

    public function auth(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: http://localhost/user");
        }
    }

    public function checkAuth(){
        session_start();
        if(isset($_SESSION['username'])){
            header("Location: http://localhost/user/home.php");
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: http://localhost/user");
    }

    public function addEmployee($username,$password,$firstName,$middleName,$lastName,$pcrNumber,$salary,$landline,$mobile,$doj){
        $stmt = $this->db->prepare("INSERT INTO employees (f_name,m_name,l_name,username,password,doj,salary,landline,mobile_nr, prc_nr)"
                . "VALUES (?,?,?,?,?,?,?,?,?,?)");
        if($stmt->execute([$firstName,$middleName,$lastName,$username,$password,$doj,$salary,$landline,$mobile,$pcrNumber]))
            return true;
        else
            return $this->db->errorInfo();
    }

    public function getEmployees(){
        $stmt = $this->db->prepare("SELECT * FROM employees");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEmployeeById($id){
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function updateEmployee($id,$username,$password,$firstName,$middleName,$lastName,$salary,$landline,$mobile,$doj){
        $query = "UPDATE employees SET username=?, password=?,f_name=?,m_name=?,l_name=?,salary=?,landline=?,mobile_nr=?,doj=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $flag = $stmt->execute([$username,$password,$firstName,$middleName,$lastName,$salary,$landline,$mobile,$doj, $id]);
        if($flag){
            return true;
        }else{
            return false;
        }
    }

    public function remove($id){
        $stmt = $this->db->prepare("DELETE FROM employees WHERE id=?");
        $flag = $stmt->execute([$id]);
        if($flag){
            return true;
        }else{
            return false;
        }
    }
    public function auth1(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: http://localhost/user/login/index.php");
          
        }
    }
    public function authLogin1(){
        session_start();
        if(isset($_SESSION['username'])){
            header("Location: http://localhost/user/login/home.php");
           
        }
    }


    public function checkAuth1(){
        session_start();
        if(! isset($_SESSION['username'])){
            return false;
        } else {
            return true;
        }
    }
    public function login($username, $password){
       $stmt = $this->db->prepare("SELECT * FROM employees WHERE username=? AND password=?");
       $stmt->execute([$username,$password]);
       if($stmt->rowCount() > 0){
           session_start();
           $emp = $stmt->fetchAll();
           foreach($emp as $e){
               $_SESSION['id'] = $e['id'];
               $_SESSION['username'] = $username;
               $_SESSION['password'] = $password;
               $_SESSION['firstName'] = $e['f_name'];
               $_SESSION['middleName'] = $e['m_name'];
               $_SESSION['lastName'] = $e['l_name'];
               $_SESSION['doj'] = $e['doj'];
               $_SESSION['pcrNumber'] = $e['prc_nr'];
               $_SESSION['salary'] = $e['salary'];
               $_SESSION['landline'] = $e['landline'];
               $_SESSION['mobile'] = $e['mobile'];

           }

           return true;
       } else {
           return false;
       }
   }


}
