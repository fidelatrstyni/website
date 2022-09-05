<?php

namespace App\Controllers;

use App\Models\M_User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Register extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();
        $data = [
            'tittle' => 'Register | Khalila Enterprise',
            'session' => $session->get("username"),
            'session' => $session->get("id_user"),
            'validation' => $this->validator,
            'isi' => 'Auth/v_register'
        ];
        echo view('Auth/v_wrapperauth', $data);
    }

    public function save()
    {

        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password'      => 'required|min_length[5]|max_length[200]'
        ];

        if ($this->validate($rules)) {
            $mail = new PHPMailer(true);

            $alamatPenerima = $this->request->getVar('email');
            $namaPenerima =  $this->request->getVar('nama');

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.googlemail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'fideltrstyni01@gmail.com';                     //SMTP username
                $mail->Password   = 'raonkzkxrepebube';                               //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('fideltrstyni01@gmail.com', 'Admin Khalila Enterprise');
                $mail->addAddress($alamatPenerima, $namaPenerima);     //Add a recipient
                $mail->addReplyTo('fideltrstyni01@gmail.com', 'Admin Khalila Enterprise');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Verifikasi Email';
                $mail->Body    = '
                    <form action="http://localhost/event_organizer/public/register/verifikasi" method="post">
                        <label>Verifikasi Email Anda</label>
                        <input type="hidden" class="form-control" name="email" value='.$alamatPenerima.'>
                                <button type="submit" class="btn"
                                >Click Verifikasi</button>
                    </form>
                ';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


            $role = 3;
            $status = 'Tidak Aktif';
            $model = new M_User();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'email'    => $this->request->getVar('email'),
                'roles'    => $role,
                'status'    => $status
            ];
            $model->save($data);
            session()->setFlashdata('success', 'Akun Berhasil Dibuat, Silakan Cek Email !');
            return redirect()->to('/Register');
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function verifikasi()
    {
        $emailUser = $this->request->getVar('email');
        // var_dump($emailUser);
        $idUser = '';
        $cekUser = $this->M_User->getAll();
        // echo '<pre>';
        // var_dump($cekUser[7]['email']);
        for($i=0; $i < count($cekUser);){
            // echo $cekUser[$i]['email'];
            if($cekUser[$i]['email'] == $emailUser){
                $idUser = $cekUser[$i]['id_user'];
            }
            $i++;
        }
        
        // var_dump($idUser);
        // die;

        if (!empty($cekUser)) {
            $model = new M_User();

            $data = [
                'status'    => 'aktif'
            ];

            $model->updateUser($data, $idUser);
            session()->setFlashdata('success', 'Akun Berhasil Diverifikasi, Silakan Login !');
            return redirect()->to('Login');
        }
    }
}
