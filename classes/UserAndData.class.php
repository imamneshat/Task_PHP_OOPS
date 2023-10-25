<?php
    include_once 'Database.class.php';

    class UserAndData extends Database
    {

        public function userRegistration($name, $email, $mobile, $dob, $sex)
        { 
            $sql = "SELECT COUNT(u_email) AS num FROM web_user WHERE u_email =:u_email";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(':u_email', $email);

            //Execute.
            $stmt->execute();
            //Fetch the row.
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['num'] > 0)
            {
                echo '<script type="text/javascript">';
                echo 'alert("That username already exists");';
                echo 'window.location.href = "index.php";';
                echo '</script>';
            }

            $date = date('Y-m-d');
            //Execute the statement and insert the new account.
            $sql = "INSERT INTO web_user (u_name, u_email, u_mobile, u_dob, u_sex, created_date)
                VALUES (:u_name, :u_email, :u_mobile, :u_dob, :u_sex, :created_date)";

                $stmt = $this->conn->prepare($sql);
          
                //Bind our variables.
                $stmt->bindValue(':u_name', $name);
                $stmt->bindValue(':u_email', $email);
                $stmt->bindValue(':u_mobile', $mobile);
                $stmt->bindValue(':u_dob', $dob);
                $stmt->bindValue(':u_sex', $sex);
                $stmt->bindValue(':created_date', $date);

                $result = $stmt->execute();
                return $result;
        }
 
        public function totalData()
        {
          $query ="SELECT * FROM web_user
          ORDER BY u_id DESC";
          $result = $this->conn->prepare($query);
          $ret = $result->execute();
          if (!$ret) 
          {
            echo 'PDO::errorInfo():';
            echo '<br />';
            echo 'error SQL: '.$query;
            die();
          }
          return $result;
        }

        public function mangeData($u_id)
        {
          $query ="SELECT * FROM web_user
          Where u_id = :u_id";
          $result = $this->conn->prepare($query);
          $result->bindValue(':u_id', $u_id);
          $ret = $result->execute();
          if (!$ret) 
          {
            echo 'PDO::errorInfo():';
            echo '<br />';
            echo 'error SQL: '.$query;
            die();
          }
          return $result;
        }

        public function dataDelete($u_id)
        {
          $query = "DELETE FROM web_user 
          WHERE u_id = :u_id";

          $result = $this->conn->prepare($query);
          $result->bindValue(':u_id', $u_id);
    
          $ret = $result->execute();
          if (!$ret) 
          {
            echo 'PDO::errorInfo():';
            echo '<br />';
            echo 'error SQL: '.$query;
            die();
          }
          return $result;
        }

        public function dataUpdate($u_id, $name, $email, $mobile, $dob, $sex)
        {
          try 
          {
            $modifed_date = date('Y-m-d');
            $status = 1;
            $sql = "UPDATE web_user 
            SET
            (u_name, u_email, u_mobile, u_dob, u_sex, modified_date, status)
            VALUES 
            (:u_name, :u_email, :u_mobile, :u_dob, :u_sex, :modified_date, :status) 
            WHERE
            u_id = :u_id";

            $stmt = $this->conn->prepare($sql);
            
            //Bind our variables.
            $stmt->bindValue(':u_name', $name);
            $stmt->bindValue(':u_email', $email);
            $stmt->bindValue(':u_mobile', $mobile);
            $stmt->bindValue(':u_dob', $dob);
            $stmt->bindValue(':u_sex', $sex);
            $stmt->bindValue(':modified_date', $modifed_date);
            $stmt->bindValue(':status', $status);

            $result = $stmt->execute(array(':u_id' => $u_id));
            
            return $result;      
          } 
          catch (Exception $e) 
          {
            echo "$e";
          }
        }
    
  }
?>