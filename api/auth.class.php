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
           $this->error('Bad request: A length does not match. No data for you!');
        }
        if( strlen($data['keyB']) < strlen(time()) - 1 )
        {
           $this->error('Bad request. B length does not match. No data for you!');
        }
        if( $this->process_key($data['keyA']) != $data['keyB'] )
        {
           $this->error('Bad request. No data for you!');
        }

        $_SESSION['key'] = $data['keyB'];
        $token = $this->generate_token();

        $this->respond(array( 'token' => $token ), 'Token Generated.');
    }
    private function process_key($time)
    {
       return ($time + 4) * 4 / 10;
    }
    private function generate_token()
    {
        if( ! array_key_exists( 'key', $_SESSION ) || ! $_SESSION['key'])
        {
            return false;
        }

        $bcrypt = new \Bcrypt(4);
        $value = $bcrypt->hash( time() );
        $raw = hash_hmac( 'sha256', $value, $_SESSION['key'] );

        $start = rand(0, 47);
        $left = substr($raw, $start, strlen($raw) / 8);
        $token = $this->process_token($left);
        $_SESSION['token'] = $token;
        return $token;
    } 

    private function process_token($chars)
    {
        $right_chars = str_split($chars);
        $right = "";

        foreach( $right_chars as $char)
        {
            $char = hexdec($char) * 3 + 1;
            $right .= dechex($char);
        }

        $right = substr(md5('Pudd}{1G' . $right), 0, strlen($chars));
        return $chars . $right;
    }
}
?>