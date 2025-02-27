function generic_login_error(){

  return ‘Login failed. Check your username and password.’;

}

add_filter( ‘login_errors’, ‘generic_login_error’ );
