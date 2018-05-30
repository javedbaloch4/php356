<?php
require_once 'DB_Connection.php';
class User extends DB_Connection {

    private $id;
    private $user_name;
    private $password;
    private $email;
    private $loggedin;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $contact_number;
    private $gender;
    private $date_of_birth;
    private $street_address;
    private $city_id;
    private $state_id;
    private $country_id;

    public function __construct() {
        $this->id = 0;
        $this->user_name = "";
        $this->password = "";
        $this->email = "";
        $this->loggedin = FALSE;
        $this->first_name = "";
        $this->middle_name = "";
        $this->last_name = "";
        $this->contact_number = "";
        $this->gender = "";
        $this->date_of_birth = "";
        $this->street_address = "";
        $this->city_id = 0;
        $this->state_id = 0;
        $this->country_id = 0;
    }

    public function __set($name, $value) {
        $method = "set$name";
        if (!method_exists($this, $method)) {
            throw new Exception("SET Property $name does not exist");
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    private function setID(int $id) {

        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("*Invalid/Missing User ID");
        }
        $this->id = $id;
    }

    private function getID(): int {
        return $this->id;
    }

    private function getLoggedin(): bool {
        return $this->loggedin;
    }

    private function setEmail(string $email) {

        $reg = "/^([0-9a-zA-Z]([-.\q]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $email)) {
            throw new Exception("*Invalid/Missing Email");
        }
        $this->email = $email;
    }

    private function getEmail(): string {
        return $this->email;
    }

    private function setUser_Name(string $user_name) {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $user_name)) {
            throw new Exception("*Invalid/Missing User Name");
        }
        $this->user_name = $user_name;
    }

    private function getUser_Name(): string {
        return $this->user_name;
    }

    private function setPassword(string $password) {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("*Invalid/Missing Password");
        }

        $this->password = sha1($password);
    }

    private function getPassword(): string {
        return $this->password;
    }

    private function setFirst_Name(string $first_name) {
        $first_name = trim($first_name);

        $reg = "/^[a-z]+$/i";

        if (!preg_match($reg, $first_name)) {
            throw new Exception("Invalid/Missing First Name");
        }
        $this->first_name = ucfirst(strtolower($first_name));
    }

    private function getFirst_Name(): string {
        return $this->first_name;
    }

    private function setMiddle_Name(string $middle_name) {

        $middle_name = trim($middle_name);
        if (!empty($middle_name)) {
            $reg = "/^[a-z]+$/i";

            if (!preg_match($reg, $middle_name)) {
                throw new Exception("Invalid Middle Name");
            }
        }
        $this->middle_name = ucfirst(strtolower($middle_name));
    }

    private function getMiddle_Name(): string {
        return $this->middle_name;
    }

    private function setLast_Name(string $last_name) {

        $last_name = trim($last_name);
        $reg = "/^[a-z]+$/i";

        if (!preg_match($reg, $last_name)) {
            throw new Exception("Invalid/Missing Last Name");
        }
        $this->last_name = ucfirst(strtolower($last_name));
    }

    private function getLast_Name(): string {
        return $this->last_name;
    }

    private function setContact_Number(string $contact_number) {
        $contact_number = trim($contact_number);

        $reg = "/^\d{1,4}\-\d{3}\-\d{7}$/";

        if (!preg_match($reg, $contact_number)) {
            throw new Exception("Invalid/Missing Contact Number");
        }
        $this->contact_number = $contact_number;
    }

    private function getContact_Number(): string {
        return $this->contact_number;
    }

    private function setGender(string $gender) {
        $genders = array("Male", "Female");
        if (!in_array($gender, $genders)) {
            throw new Exception("MIssing Gender");
        }

        $this->gender = $gender;
    }

    private function getGender(): string {
//        echo($this->gender);
//        die;
        return $this->gender;
    }

    private function setDate_Of_Birth(string $date_of_birth) {
        $this->date_of_birth = $date_of_birth;
    }

    private function getDate_Of_Birth(): string {
        return $this->date_of_birth;
    }

    private function setStreet_Address(string $street_address) {
        $street_address = trim($street_address);

        if (strlen($street_address) < 10) {
            throw new Exception("Missing/Too Short Street Address");
        }
        $this->street_address = $street_address;
    }

    private function getStreet_Address(): string {
        return $this->street_address;
    }

    private function setCity(int $city_id) {
        $query = "select id from cities "
                . " where id = $city_id";

        $obj_db = $this->obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("City missing");
        }
        $this->city_id = $city_id;
    }

    private function getCity(): string {
        $obj_db = $this->obj_db();
        $query = "select city_name from cities "
                . " where id = $this->city_id";
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }
        $data = $result->fetch_object();
        return $data->city_name;
    }

    private function getCity_ID(): int {

        return $this->city_id;
    }

    private function setState(int $state_id) {
        $query = "select id from states "
                . " where id = $state_id";

        $obj_db = $this->obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("State missing");
        }
        $this->state_id = $state_id;
    }

    private function getState(): string {
        $obj_db = $this->obj_db();
        $query = "select state_name from states "
                . " where id = $this->state_id";
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }
        $data = $result->fetch_object();
        return $data->state_name;
    }

    private function getState_ID(): int {

        return $this->state_id;
    }

    private function setCountry(int $country_id) {
        $query = "select id from countries "
                . " where id = $country_id";

        $obj_db = $this->obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("Country missing");
        }
        $this->country_id = $country_id;
    }

    private function getCountry(): string {
        $query = "select country_name from countries "
                . " where id = $this->country_id";
        $obj_db = $this->obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }

        $data = $result->fetch_object();
        return $data->country_name;
    }

    private function getCountry_ID(): int {
        return $this->country_id;
    }

    
    public function add_user() {

        $obj_db = $this->get_db_conn();

        $now = date("Y-m-d H:i:s");
//        $query_insert = "insert into users "
//                . " (id, email, user_name, password, signup_date_time, status) "
//                . " values "
//                . " (NULL, '$this->email', '$this->user_name', '$this->password', "
//                . " '$now', 1 ) ";

        $query_insert = "insert into users "
                . " values "
                . " (NULL, '$this->email', '$this->user_name', '$this->password', "
                . " '$now', 1 ) ";

        $obj_db->query($query_insert);

        if ($obj_db->errno) {
            throw new Exception("Failed to insert new user "
            . " - $obj_db->errno - $obj_db->error");
        }
    }

    /*
      public function signup() {

      $obj_db = $this->obj_db();
      $now = date("Y-m-d H:i:s");
      $query_insert_user = "insert into users "
      . " (id, user_name, email, password, "
      . " signup_date_time) "
      . " values "
      . " (NULL, '$this->user_name', '$this->email', "
      . " '$this->password', '$now') ";

      $obj_db->query($query_insert_user);
      if ($obj_db->errno) {
      throw new Exception("New User Insert Error - "
      . " $obj_db->error - $obj_db->errno");
      }

      $user_id = $obj_db->insert_id;

      $query_insert_profile = "insert into userprofiles "
      . " (id, user_id) "
      . " values "
      . " ( NULL, $user_id)";
      $obj_db->query($query_insert_profile);
      }

      public function login($remember) {
      $obj_db = $this->obj_db();

      $query_select_user = "select users.id user_id, users.user_name, "
      . " users.email, users.password code, "
      . " users.signup_date_time,  users.status "
      . "  from users "
      . " where user_name = '$this->user_name'";
      $result = $obj_db->query($query_select_user);
      if ($obj_db->errno) {
      throw new Exception("Select Login Error - "
      . " $obj_db->error - $obj_db->errno");
      }

      if (!$result->num_rows) {
      throw new Exception("*User Not Found");
      }

      $user_data = $result->fetch_object();
      if ($user_data->code != $this->password) {
      throw new Exception("Login Failed");
      }

      if (!$user_data->status) {
      throw new Exception("*Your account is disabled. Contact Admin");
      }

      $this->user_id = $user_data->user_id;
      $this->user_name = $user_data->user_name;
      $this->email = $user_data->email;
      $this->password = NULL;
      $this->loggedin = TRUE;

      $str_data = serialize($this);

      $_SESSION['obj_user'] = $str_data;
      if ($remember) {
      $expire = time() + (60 * 60 * 24 * 15);
      setcookie("obj_user", $str_data, $expire, "/");
      }
      }

      public function logout() {
      if (isset($_SESSION['obj_user'])) {
      unset($_SESSION['obj_user']);
      }
      if (isset($_COOKIE['obj_user'])) {
      setcookie("obj_user", "aaa", 1, "/");
      }
      }

      public function profile() {

      $obj_db = $this->obj_db();

      $query_select = "select users.id user_id, "
      . " users.user_name, users.email, "
      . " users.status, up.id profile_id, up.first_name,  "
      . " up.middle_name, "
      . " up.last_name, up.gender, "
      . " up.city_id, up.state_id, "
      . " up.country_id "
      . " from users "
      . " join userprofiles up "
      . " on users.id = up.user_id "
      . " where users.id = $this->user_id";
      //mysql resource
      $result = $obj_db->query($query_select);
      if ($obj_db->errno) {
      throw new Exception("Profile Select User Error - $obj_db->error - $obj_db->errno");
      }

      if (!$result->num_rows) {
      throw new Exception("*User Not Found");
      }

      $data = $result->fetch_object();

      if (!$data->status) {
      throw new Exception("*Your account is disabled. Contact Admin");
      }
      //        $this->user_id = $data->user_id;
      $this->user_name = $data->user_name;
      $this->email = $data->email;
      $this->gender = $data->gender;
      $this->first_name = $data->first_name;
      $this->middle_name = $data->middle_name;
      $this->last_name = $data->last_name;
      $this->last_name = $data->last_name;
      $this->state_id = $data->state_id;
      $this->city_id = $data->city_id;
      $this->country_id = $data->country_id;
      }

      public function update_profile() {
      $obj_db = $this->obj_db();

      $query_update = "update userprofiles set "
      . " first_name = '$this->first_name', "
      . " middle_name = '$this->middle_name', "
      . " last_name = '$this->last_name', "
      . " country_id = '$this->country_id', "
      . " state_id = '$this->state_id', "
      . " city_id = '$this->city_id', "
      . " gender = '$this->gender' "
      . " where user_id = $this->user_id";
      //        echo($query_update);
      //        die;
      $result = $obj_db->query($query_update);
      if ($obj_db->errno) {
      throw new Exception("Update Profile User Error - $obj_db->error - $obj_db->errno");
      }
      }

      public function send_mail($subject, $msg) {
      //          mail($this->email, $subject, $msg);
      //        /**
      //         * https://www.sitepoint.com/advanced-email-php/
      //         * http://stackoverflow.com/questions/15250140/php-mail-header
      //         * https://www.tutorialspoint.com/php/php_sending_emails.htm
      //         * https://www.lifewire.com/how-to-send-email-with-extra-headers-in-php-1171196
      //         * http://www.htmlite.com/php029.php
      //         * https://css-tricks.com/sending-nice-html-email-with-php/
      //         * http://php.net/manual/en/function.mail.php
      // */
    /*
      $header = "To: The Receiver <$this->email>\n" .
      "From: The Sender <admin@php350.net>\n" .
      "MIME-Version: 1.0\n" .
      "Content-type: text/html; charset=iso-8859-1";
      mail($this->email, $subject, $msg, $header);
      }
     */
}

?>