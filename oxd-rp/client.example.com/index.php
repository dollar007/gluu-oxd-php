<p>OXD login page.</p>

<?php

/**
 * Created by  Vlad Karapetyan
 */
session_start();
if(!$_SESSION['oxd_id']){
    require_once './Register_site.php';
    $register_site = new Register_site('./');

    $register_site->setRequestAcrValues(["basic"]);
    $register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
    $register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
    $register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
    $register_site->setRequestContacts([$_POST['your_mail']]);

    $register_site->request();
    $_SESSION['oxd_id'] = $register_site->getResponseOxdId();
}
if(isset($_POST['submit']) && isset($_POST['your_mail']) && !empty($_POST['your_mail'])){


    require_once './Get_authorization_url.php';
    require_once './Get_authorization_code.php';

    echo '<br/>Get_authorization_code <br/>';
    $get_authorization_code = new Get_authorization_code('./');
    $get_authorization_code->setRequestUsername('admin');
    $get_authorization_code->setRequestPassword('ubuntu');
    $get_authorization_code->setRequestOxdId($_SESSION['oxd_id']);
    $get_authorization_code->setRequestAcrValues(Oxd_RP_config::$acr_values);
    $get_authorization_code->request();
    echo $get_authorization_code->getResponseJSON();

    echo '<br/>Get_authorization_url <br/>';
    $get_authorization_url = new Get_authorization_url('./');
    $get_authorization_url->setRequestOxdId($_SESSION['oxd_id']);
    $get_authorization_url->setRequestAcrValues(Oxd_RP_config::$acr_values);
    $get_authorization_url->request();
    header("Location: ".$get_authorization_url->getResponseAuthorizationUrl());


}
else{
    ?>
        <form method="post" action="/">
            <label for="your_mail">Your OpenID email. </label>
            <input type="email" name="your_mail" placeholder="Enter your OpenID email." />
            <input type="submit" name="submit" value="Login" />
        </form>
    <?php
}

