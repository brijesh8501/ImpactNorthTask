<?php
// generate CSRF token
function generateToken( $formName ) 
{
    $secretKey = 'gsfhs154aergz2#';
    if ( !session_id() ) {
        session_start();
    }
    $sessionId = session_id();

    return sha1( $formName.$sessionId.$secretKey );

}
// check CSRF token
function checkToken( $token, $formName ) 
{
    return $token === generateToken( $formName );
}
?>