<?php
/** 
 * Class Auth untuk melakukan login dan registrasi user baru 
 */
class LoginRegister{

    private $db; //Menyimpan Koneksi database 
    private $error; //Menyimpan Error Message 

    ## Contructor untuk class Auth, membutuhkan satu parameter yaitu koneksi ke database ## 
    function __construct($db_conn) {

        $this->db = $db_conn;

        // Mulai session  
        session_start();
    }

    ### Start : Registrasi User baru
    public function register($usser, $email, $username, $password) {
        try {

            // buat hash dari password yang dimasukkan 
            $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

            //Masukkan user baru ke database 
            $stmt = $this->db->prepare("INSERT INTO users(usser, email, username, password) VALUES(:usser, :email, :username, :pass)");

            $stmt->bindParam(":usser", $usser);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":pass", $hashPasswd);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {

            // Jika terjadi error 
            if ($e->errorInfo[0] == 23000) {

                //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan 
                //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique 
                $this->error = "Email already in use!";

                return false;
            } else {

                echo $e->getMessage();

                return false;
            }
        }
    }

    ### End : Registrasi User baru ###  
    ### Start : fungsi login user ###  

    public function login($username, $password) {
        try {

            // Ambil data dari database 
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");

            $stmt->bindParam(":username", $username);

            $stmt->execute();

            $data = $stmt->fetch();

            // Jika jumlah baris > 0 
            if ($stmt->rowCount() > 0) {

                // jika password yang dimasukkan sesuai dengan yg ada di database 

                if (password_verify($password, $data['password'])) {

                    $_SESSION['user_session'] = $data['id_user'];

                    return true;
                } else {

                    $this->error = "Username atau Password Is Wrong !";

                    return false;
                }
            } else {

                $this->error = "Username atau Password Is Wrong !";

                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }

    ### End : fungsi login user ### 

    ### Start : fungsi cek login user ###  

    public function isLoggedIn()
    {

        // Apakah user_session sudah ada di session 

        if (isset($_SESSION['user_session'])) {

            return true;
        }
    }

    ### End : fungsi cek login user ###  

    ### Start : fungsi ambil data user yang sudah login ###   

    public function getUser()
    {

        // Cek apakah sudah login 
        if (!$this->isLoggedIn()) {

            return false;
        }
        try {

            // Ambil data user dari database 

            $stmt = $this->db->prepare("SELECT * FROM users WHERE id_user = :id_user");

            $stmt->bindParam(":id_user", $_SESSION['user_session']);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }

    ### End : fungsi ambil data user yang sudah login ###  

    ### Start : fungsi Logout user ###  

    public function logout()
    {

        // Hapus session 

        session_destroy();

        // Hapus user_session 

        unset($_SESSION['user_session']);

        return true;
    }

    ### End : fungsi Logout user ###  

    ### Start : fungsi ambil error terakhir yg disimpan di variable error ###  

    public function getLastError()
    {

        return $this->error;
    }

    ### End : fungsi ambil error terakhir yg disimpan di variable error ###  

}
?>