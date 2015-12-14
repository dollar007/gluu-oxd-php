
<?php
/*
 * Created by Vlad Karapetyan
*/
session_start();

if (isset($_SESSION['oxd_id'])) {

    if (isset($_GET['code']) && isset($_GET['state']) && !empty($_GET['code']) && !empty($_GET['state'])) {

        echo '<p>User login process via OpenID.</p>';
        require_once '../Get_tokens_by_code.php';
        require_once '../Get_user_info.php';
        echo '<a href="https://client.example.com/logout">Logout</a>';
        echo '<p>Giving user information.</p>';

        echo '<br/>Get_tokens_by_code <br/>';
        $get_tokens_by_code = new Get_tokens_by_code('../');

        $get_tokens_by_code->setRequestOxdId($_SESSION['oxd_id']);
        $get_tokens_by_code->setRequestCode($_GET['code']);
        $get_tokens_by_code->setRequestState($_GET['state']);
        $get_tokens_by_code->setRequestScopes(["openid", "profile"]);

        $get_tokens_by_code->request();

        $_SESSION['id_token'] = $get_tokens_by_code->getResponseIdToken();
        echo '<br/>Access Token: '.$get_tokens_by_code->getResponseAccessToken();
        echo '<br/>Expires In: '.$get_tokens_by_code->getResponseExpiresIn();
        echo '<br/>Id Token: '.$get_tokens_by_code->getResponseIdToken();
        echo '<pre>';
        var_dump($get_tokens_by_code->getResponseObject());
        echo '</pre>';
        echo '<br/>Get_user_info <br/>';
        $get_user_info = new Get_user_info('../');
        $get_user_info->setRequestOxdId($_SESSION['oxd_id']);
        $get_user_info->setRequestAccessToken($get_tokens_by_code->getResponseRefreshToken());
        $get_user_info->request();
        echo '<pre>';
        var_dump($get_user_info->getResponseObject());
        echo '</pre>';
/*
        echo '<p><span>Name: </span>'.$get_user_info->getResponseName().'</p>';
        echo '<p><span>Given Name: </span>'.$get_user_info->getResponseGivenName().'</p>';
        echo '<p><span>Family Name: </span>'.$get_user_info->getResponseFamilyName().'</p>';
        echo '<p><span>Middle Name: </span>'.$get_user_info->getResponseMiddleName().'</p>';
        echo '<p><span>Nickname: </span>'.$get_user_info->getResponseNickname().'</p>';
        echo '<p><span>Username: </span>'.$get_user_info->getResponsePreferredUsername().'</p>';
        echo '<p><span>Profile: </span>'.$get_user_info->getResponseProfile().'</p>';
        echo '<p><span>Picture: </span>'.$get_user_info->getResponsePicture().'</p>';
        echo '<p><span>Website: </span>'.$get_user_info->getResponseWebsite().'</p>';
        echo '<p><span>Gender: </span>'.$get_user_info->getResponseGender().'</p>';
        echo '<p><span>Birthdate: </span>'.$get_user_info->getResponseBirthdate().'</p>';
        echo '<p><span>Zoneinfo: </span>'.$get_user_info->getResponseZoneinfo().'</p>';
        echo '<p><span>Updated At: </span>'.$get_user_info->getResponseUpdatedAt().'</p>';
*/
    }
    else {
        echo 'Email is not a valid 1.';
    }
} else {
    echo 'Email is not a valid 2.';
}
