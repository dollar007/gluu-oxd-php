<p>OXD login page.</p>

<?php
/**
 * Created by  Vlad Karapetyan
 */
if(isset($_POST['submit']) && isset($_POST['your_mail']) && !empty($_POST['your_mail']) && empty($_SESSION['oxd_id'])){
    session_start();
    require_once './Register_site.php';
    require_once './Get_authorization_url.php';

    echo '<br/>Register_site <br/>';
    $register_site = new Register_site('./');

    $register_site->setRequestAcrValues([""]);
    $register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
    $register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
    $register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
    $register_site->setRequestContacts([$_POST['your_mail']]);
    $register_site->setRequestClientJwksUri("");
    $register_site->setRequestClientRequestUris([]);
    $register_site->setRequestClientTokenEndpointAuthMethod("");

    $register_site->request();
    $_SESSION['oxd_id'] = $register_site->getResponseOxdId();
    echo '<br/>Oxd Id: '.$register_site->getResponseOxdId();
    echo '<br/>';
    $register_site->disconnect();

    echo '<br/>Get_authorization_url <br/>';
    $get_authorization_url = new Get_authorization_url('./');
    $get_authorization_url->setRequestOxdId($register_site->getResponseOxdId());

    $get_authorization_url->request();
    $get_authorization_url->disconnect();
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

