<?php
namespace API;
class Auth extends Module
{
    public function create($data)
    {
        if( ! array_key_exists('keyA', $data) || ! array_key_exists('keyB', $data) )
        {
           $this->error('Bad request. No data for you!');
        }

        if( strlen($data['keyA']) != strlen(time()) )
        {
           $this->error('Bad request. No data for you!');
        }

        if( strlen($data['keyB']) < strlen(time()) - 1 )
        {
           $this->error('Bad request. No data for you!');
        }

        if( Tokenizer::process_key($data['keyA']) != $data['keyB'] )
        {
           $this->error('Bad request. No data for you!');
        }

        $token = Tokenizer::generate($data['keyB']);

        $_SESSION['token'] = $token;

        $this->respond(array( 'token' => $token ), 'Token Generated.');
    }

    public function destroy()
    {
    }

}
?>