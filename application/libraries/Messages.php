<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages {



    function head()
    {

        echo"<html>

<head>
<meta charset=\"utf-8\" />
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"theme-color\" content=\"#1A2B49\"> 
    <meta name=\"msapplication-navbutton-color\" content=\"#1A2B49\">
    <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#1A2B49\">  
    <meta name=\"msapplication-TileColor\" content=\"#1A2B49\">

<title>Blue Eye</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: -apple-system,BlinkMacSystemFont,
        \"Segoe UI\",Roboto,Oxygen-Sans,Ubuntu,Cantarell,
        \"Helvetica Neue\",sans-serif;
    background-color: #edb8ba;
    background: url('../assets/pattern.jpg') repeat;
}
.kutu{
    width: 100vw;
    padding: 64px 0;
    margin: 50px auto 0 auto;
    text-align: center;
    background-color: rgba(0,0,0,.8);
    -webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    -moz-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.kutu h3{
    margin: 0;
    color: #fff;
    font-size: 1.5em;
}
</style>
<body>
<div class=\"kutu\">

";

    }


    function foot()
    { 

        echo"

    </div>
</body>

</html>";




    }




    function True_Add($url)
    {

        $msg=new messages();
        $msg->head();

        echo"<h3>Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }

    function False_Add($url)
{

    $msg=new messages();
    $msg->head();

    echo"<h3>Operation failed ...</h3>";
    echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
    $msg->foot();

}

   function True_Pay($url)
    {
        $msg=new messages();
        $msg->head();

        echo"<h3>Operation succesfull ...</h3>";

        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }

    function False_Pay($url)
    {
        $msg=new messages();
        $msg->head();

        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();

    }

    function True_Delete($url)
    {
        $msg=new messages();
        $msg->head();

        echo"<h3>Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }

    function False_Delete($url)
    {
        $msg=new messages();
        $msg->head();

        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();

    }


    function True_Add_Message($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
  function True_Add_user_Message($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull , Please check your mail inbox....</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	
	 function New_Pass($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull, password recovery mail has been sent...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	 function New_Pass_True($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	 function New_Pass_False($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed ...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	 function Wishlist_false($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3> Operation failed ...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }	
	
		 function Wishlist_true($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3> Operation succesfull ...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }	
	
		 
	
		 function Wishlist_remove_false($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3> Operation failed ...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }	
	
		 function Wishlist_remove_true($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3> Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="3;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	
	 function Dondur_False($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
	 function Dondur_True($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
		 function Message_Ok($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
			 function Message_False($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
    function False_Add_Message($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
	
    function False_Register_Message($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Username or mail registered...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }	
	

    function True_Onay_Message($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation succesfull...</h3>";

        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }
	
	    function False_Onay_Message($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
	    function False_Bulunamadi($url)
    {

        $msg=new messages();
        $msg->head();
        echo"<h3>No such mail address found...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();
		

    }	
	
	
    function Empty_Add_Message_Admin($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Please fill empty space...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }


    function Empty_Add_Message_User($url)
    {

        $msg=new messages();
        $msg->head();

        echo"<h3>Please fill empty space...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();


    }



    function Pass_Error($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Your passwords must be the same...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	
	   function Pass_Error_2($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Please check the password length...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }
	

    function Pass_Check()
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Please check the password...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }



    function File_Error($url)
    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Operation failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();

    }




    function Welcome($url,$online)


    {

        $msg=new messages();
        $msg->head();
        echo"<h3>Welcome ".$online." redirecting...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }

    function Welcome_User($url,$user)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Welcome ".$user." redirecting...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }

    function Welcome_False($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Login failed...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }


    function Logout($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Logout succesfull, redirecting...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();

    }



    function config($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>Redirecting...</h3>";
        echo '<meta http-equiv="refresh" content="0;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }



    function search_error($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>The word length must be at least 3 letters, try again...</h3>";
        echo '<meta http-equiv="refresh" content="2;url='.base_url().''.$url.'"/>';
        $msg->foot();
    }





 
    function To_Login($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>You must login first...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';

        $msg->foot();
    }


    function To_Register($url)


    {
        $msg=new messages();
        $msg->head();
        echo"<h3>
You must register first...</h3>";
        echo '<meta http-equiv="refresh" content="1;url='.base_url().''.$url.'"/>';
        $msg->foot();

    }




   






}

?>