<?php
namespace API;
class Auth extends Module
{
    public function create($data)
    {
        if( ! array_key_exists('keyA', $data) || ! array_key_exists('keyB', $data) )
        {
           $this->error('Bad request. No data for you!', 0);
        }

        if( strlen($data['keyA']) != strlen(time()) )
        {
           $this->error('Bad request. No data for you!', 1);
        }

        if( strlen($data['keyB']) < strlen(time()) - 1 )
        {
           $this->error('Bad request. No data for you!', 2);
        }

        if( Tokenizer::process_key($data['keyA']) != $data['keyB'] )
        {
           $this->error('Bad request. No data for you!', 3);
        }

        $token = Tokenizer::generate($data['keyB']);

        $_SESSION['token'] = $token;

        $this->respond(array( 'token' => $token ), 'Token Generated.');
    }

    public function destroy()
    {
        $_SESSION['token'] = 0;
        $this->respond(array( 'logged_out' => 1 ), 'Successfully logged out.');
    }

}
?>