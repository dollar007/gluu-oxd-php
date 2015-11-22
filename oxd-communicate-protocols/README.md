<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<div id="dokuwiki__site">

    <div id="dokuwiki__top" class="dokuwiki site mode_show  ">
        <div class="">
            <div class="pad group">
                <div class="page group">
                    <!-- wikipage start -->

                    <h1>
                        <a id="user-content-oxd-php" class="anchor" href="#oxd-php" aria-hidden="true"><span class="octicon octicon-link"></span></a>oxd-php
                    </h1>
                    <p>Need to download and install gluu server in Your web server. For more information <a target="_blank" href="http://www.gluu.org/docs/">click me</a>.</p>
                    <p>Need to download and install OXD server in Your web server. For more information <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:rp">click me</a>.</p>
                    <p>For OXD server configuration <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:home&s[]=mvn">click me</a>. </p>
                    <p>PHP Client Library for the <a target="_blank" href="https://github.com/GluuFederation/oxd-php/oxd-communicate-protocols">Gluu oxD Server</a>.</p>
                    <h2 class="sectionedit5" id="oxd_server_configuration">oxd-php configuration</h2>
                    <div class="level2">

                        <p>
                            Configuration file is located in "oxd-php/oxd-communicate-protocols/oxd-configuration.json" file in distribution package.
                        </p>

                        <p>
                            (Save this as a file called <code>oxd-configuration.json</code>)
                        </p>
                        <dl class="file">
                            <dt>
                                oxd-configuration.json</dt>
                            <dd><pre class="code file json">{
    "ip": "127.0.0.1",
    "port":8099,
    "gluuServerUrl":"",
    "amHost":"",
    "userId":"",
    "userSecret":"",
    "clientId":"",
    "clientSecret":"",
    "clientRedirectURL":"",
    "logoutRedirectUrl":"",
    "authorizationRedirectUri":"",
    "appType":"web",
    "grantTypes":"authorization_code",
    "responseTypes":"code",
    "httpMethod":"DELETE"
}</pre>
                            </dd></dl>
                        <ul>
                            <li class="level1"><div class="li"> port - port of oxd socket</div>
                            </li>
                            <li class="level1"><div class="li"> ip - flag to restrict communication to localhost only (if false then it's not restricted to localhost only)</div>
                            </li>
                        </ul>

                    </div>
                    <div class="level1">
                        <p>
                            <strong>Goal</strong> :
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> It should be super simple to use library (
                                    <a href="https://github.com/GluuFederation/oxd-python" target="_blank">python</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                    <a href="https://github.com/GluuFederation/oxd-php">php</a>) by web
                                    <span class="search_hit">site</span>
                                </div>
                            </li>
                            <li class="level1"><div class="li"> implementation of new library (on any language) should be simplified</div>
                            </li>
                        </ul>

                        <p>
                            <a href="http://ox.gluu.org/lib/exe/detail.php?id=oxd%3Arp&amp;media=oxd:oxd-rp.png" class="media" title="oxd:oxd-rp.png">
                                <img src="http://ox.gluu.org/lib/exe/fetch.php?media=oxd:oxd-rp.png" class="media" alt=""></a>
                        </p>

                    </div>
                    <h2 class="sectionedit2" id="web_site">Web <span class="search_hit">site</span></h2>
                    <div class="level2">

                        <p>
                            Web <span class="search_hit">site</span> communicates with oxd via library (python/php). Library must provide all convenient methods to web <span class="search_hit">site</span> code which will in background call oxd. Concrete library depends on programming language used by <span class="search_hit">site</span>. Here for simplicity we will PHP as sample.
                        </p>

                        <p>
                            First of all web <span class="search_hit">site</span> must <span class="search_hit">register</span> itself on oxd with registration command (via library (
                            <a href="https://github.com/GluuFederation/oxd-python" target="_blank">python</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="https://github.com/GluuFederation/oxd-php/oxd-communicate-protocols">php</a>). With registration it gets oxd_id from oxd server. oxd_id must be passed to all commands.
                        </p>

                        <p>
                            Web <span class="search_hit">site</span> configuration:
                        </p>
<pre class="code">   oxd_address : localhost:8090
   oxd_id : 6F9619FF-8B86-D011-B42D-00CF4FC964FF</pre>

                        <p>
                            oxd_id (6F9619FF-8B86-D011-B42D-00CF4FC964FF) - GUID for web <span class="search_hit">site</span>. It can be any GUID that does not exist yet in oxd.
                        </p>

                    </div>
                    <p>
                        <strong>oxd-communicate-protocols-php</strong>
                        is a thin wrapper around the communication protocol of oxD server.
                        This can be used to access the OpenID connect &amp;
                        UMA Authorization end points of the Gluu Server via the oxD RP.
                        This library provides the function calls required by a website to access user information from a OpenID Connect Provider (OP) by using the OxD as the Relying Party (RP).
                    </p>
                    <div class="level2">

                        <p>
                            PHP classes for comunicating with oxd.
                        </p>
                        <p>
                            Connecting to oxd server is doing via class Client_Socket_OXD <a href="#Client_Socket_OXD" title="oxd:communication_protocol ?" class="wikilink1">Client_Socket_OXD.php</a>
                        </p>
                        <h3 class="sectionedit100" id="Client_Socket_OXD">Client_Socket_OXD.php</h3>

                        <div class="level100">
                            <p>
                                Client_Socket_OXD class is base class for connecting to oxd server. It is given all parameters from oxd-configuration.json for connection and parameters saving to static values in class Oxd_config
                                <a href="#Oxd_config" title="oxd:communication_protocol ?" class="wikilink1">Oxd_config.php</a></div>.
                            </p>
                            <ul>
                                <li class="level1">
                                    <div class="li"> <h4>Parameter:</h4></div>
                                    <ul>
                                        <li>
                                            <h4>Name: $socket;</h4>
                                            <p>Type: static object;</p>
                                            <p>Default value = null;</p>
                                            <p>Description: oxd socket connection;</p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="level1">
                                    <div class="li"><h4> Functions:</h4></div>
                                    <ul>
                                        <li>
                                            <h4>Name: static_variables;</h4>
                                            <p>Description: Setting configurations static parameters;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_connection;</h4>
                                            <p>Description: Setting configurations to oxd socket;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_request;</h4>
                                            <p>Description: Sending request to oxd server;</p>
                                        </li>
                                        <li>
                                            <h4>Name: oxd_socket_request;</h4>
                                            <p>Description: Getting response from oxd server;</p>
                                        </li>
                                        <li>
                                            <h4>Name: disconnect;</h4>
                                            <p>Description: Disconnecting open socket;</p>
                                        </li>
                                        <li>
                                            <h4>Name: error_message;</h4>
                                            <p>Description: Showing last error message;</p>
                                        </li>
                                        <li>
                                            <h4>Name: log;</h4>
                                            <p>Description: Saving process in log file every day(example logs/oxd-php-server-{date}.log);</p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <h3 class="sectionedit100" id="Oxd_config">Oxd_config.php</h3>
                    <div class="level100">
                    <pre class="code">
class Oxd_config
{
    public static $localhostIp;
    public static $localhostPort;
    public static $gluuServerUrl;
    public static $amHost;
    public static $userId;
    public static $userSecret;
    public static $clientId;
    public static $clientSecret;
    public static $clientRedirectURL;
    public static $logoutRedirectUrl;
    public static $discoveryUrl;
    public static $umaDiscoveryUrl;
    public static $jwks;
    public static $appType;
    public static $grantTypes;
    public static $responseTypes;
    public static $httpMethod;
}
                        </pre>
                        </div>
                        <p>
                            Base class for protocols is abstract Client_OXD.php, for which extends all protocols classes. <a href="#client_oxd" title="oxd:communication_protocol ?" class="wikilink1">Client_OXD</a>
                        </p>
                        <ul>
                            <li class="level1"><div class="li"> <a href="#register_client" title="oxd:communication_protocol ?" class="wikilink1">Register_client.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#client_read" title="oxd:communication_protocol ?" class="wikilink1">Client_read.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#obtain_pat" title="oxd:communication_protocol ?" class="wikilink1">Obtain_pat.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#obtain_aat" title="oxd:communication_protocol ?" class="wikilink1">Obtain_aat.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#obtain_rpt" title="oxd:communication_protocol ?" class="wikilink1">Obtain_rpt.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#register_resource" title="oxd:communication_protocol ?" class="wikilink1">Register_resource.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_rpt" title="oxd:communication_protocol ?" class="wikilink1">Rpt_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_id_token" title="oxd:communication_protocol ?" class="wikilink1">Id_token_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#check_status_of_access_token" title="oxd:communication_protocol ?" class="wikilink1">Access_token_status.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#register_permission_ticket" title="oxd:communication_protocol ?" class="wikilink1">Register_ticket.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#discovery" title="oxd:communication_protocol ?" class="wikilink1">Discovery.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#authorization_code_flow" title="oxd:communication_protocol ?" class="wikilink1">Authorization_code_flow.php</a></div>
                            </li>
                        </ul>

                    <h3 class="sectionedit100" id="client_oxd">Clinet_OXD.php</h3>

                    <div class="level100">
                        <p>
                            Client_oxd class is abstract class,which extends from Client_Socket_OXD class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Name: $command_types;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = array(
                                            'register_client', 'client_read', 'obtain_pat', 'obtain_aat',
                                            'obtain_rpt', 'authorize_rpt', 'register_resource', 'rpt_status',
                                            'id_token_status', 'access_token_status', 'register_ticket', 'discovery',
                                            'authorization_code_flow', 'get_authorization_url', 'get_tokens_by_code',
                                            'get_user_info', 'register_site',;</p>
                                        <p>Description: all protocol names. need for checking protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $command;</h4>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: request command to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $response_json;</h4>
                                        <p>Type:string(json);</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response, which coming from oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $response_object;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response object, which parsed from $response_json;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $response_status;</h4>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response status, can be Ok or Error;</p>
                                    </li>
                                    <li>
                                        <h4>Name: $data;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = null;</p>
                                        <p>Description: response data;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Name: setCommand;</h4>
                                        <p>Type:abstract;</p>
                                        <p>Param:string;</p>
                                        <p>Description: Setting protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getCommand;</h4>
                                        <p>Return:string;</p>
                                        <p>Description: Getting protocol type;</p>
                                    </li>
                                    <li>
                                        <h4>Name: setParams;</h4>
                                        <p>Type:abstract;</p>
                                        <p>Param:array;</p>
                                        <p>Description: Setting params for protocol;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getParams;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting  params for protocol;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getData;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting data for sanding to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: is_JSON;</h4>
                                        <p>Param:string;</p>
                                        <p>Description: Chaking is string is json;</p>
                                    </li>
                                    <li>
                                        <h4>Name: request;</h4>
                                        <p>Description: Sanding request to oxd;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getResponseJSON;</h4>
                                        <p>Return:string;</p>
                                        <p>Description: Getting response from oxD server, returning JSON object;</p>
                                    </li>
                                    <li>
                                        <h4>Name: getResponseObject;</h4>
                                        <p>Return:array;</p>
                                        <p>Description: Getting response from oxD server, returning array object;</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="sectionedit100" id="register_client">Register_client.php</h3>

                    <div class="level100">

                        <p>Register_client class extends from Clinet_OXD class.</p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request register_client protocol;</h4>
                                        <p>$request_discoveryUrl, $request_redirectUrl, $request_logout_redirect_url, $request_client_name, $request_response_types, $request_app_type, $request_grant_types, $request_contacts, $request_jwks_uri;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_client_id, $response_client_secret, $response_registration_access_token, $response_client_secret_expires_at, $response_registration_client_uri, $response_client_id_issued_at;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_client_test:
require_once '../Register_client.php';

$register_client = new Register_client('../');



$register_client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$register_client->setRequestLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setRequestClientName("Your name");
$register_client->setRequestResponseTypes(Oxd_config::$responseTypes);
$register_client->setRequestAppType(Oxd_config::$appType);
$register_client->setRequestGrantTypes(Oxd_config::$grantTypes);
$register_client->setRequestContacts("Your_email@test.test");
$register_client->setRequestJwksUri(Oxd_config::$jwks);

$register_client->request();

echo '<p>Registration</p><br/>Client Id: '.$register_client->getResponseClientId();
echo 'Client Secret: '.$register_client->getResponseClientSecret();
echo 'Registration Access Token: '.$register_client->getResponseRegistrationAccessToken();
echo 'Client Secret Expires At: '.$register_client->getResponseClientSecretExpiresAt();
echo 'Registration Client Uri: '.$register_client->getResponseRegistrationClientUri();
echo 'Client Id Issued At: '.$register_client->getResponseClientIdIssuedAt();

$register_client->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="client_read">Client_read.php</h3>

                    <div class="level100">

                        <p>
                            Client_read class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request client_read protocol;</h4>
                                        <p>$request_registration_client_uri, $request_registration_access_token</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_client_id, $response_client_secret, $response_registration_access_token, $response_client_secret_expires_at, $response_registration_client_uri, $response_client_id_issued_at</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Client_read_test:
require_once '../Client_read.php';
require_once '../Register_client.php';

$register_client = new Register_client('../');

$register_client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$register_client->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$register_client->setRequestLogoutRedirectUrl(Oxd_config::$logoutRedirectUrl);
$register_client->setRequestClientName("Your name");
$register_client->setRequestResponseTypes(Oxd_config::$responseTypes);
$register_client->setRequestAppType(Oxd_config::$appType);
$register_client->setRequestGrantTypes(Oxd_config::$grantTypes);
$register_client->setRequestContacts("Your_email@test.test");
$register_client->setRequestJwksUri(Oxd_config::$jwks);

$register_client->request();

$client_read = new Client_read('../');
$client_read->setRequestRegistrationAccessToken($register_client->getResponseRegistrationAccessToken());
$client_read->setRequestRegistrationClientUri($register_client->getResponseRegistrationClientUri());
$client_read->request();

echo '<p>Client Reading</p><br/>ClientId: '.$client_read->getResponseClientId();
echo 'ClientIdIssuedAt: '.$client_read->getResponseClientIdIssuedAt();
echo 'ClientSecret: '.$client_read->getResponseClientSecret();
echo 'ClientSecretExpiresAt: '.$client_read->getResponseClientSecretExpiresAt();
echo 'RegistrationAccessToken: '.$client_read->getResponseRegistrationAccessToken();
echo 'RegistrationClientUri: '.$client_read->getResponseRegistrationClientUri();

$client_read->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="Obtain_trait">Obtain_trait.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_trait is a trait  .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_pat, obtain_aat protocol;</h4>
                                        <p>$request_discovery_url, $request_uma_discovery_url, $request_redirect_url, $request_client_id, $request_client_secret, $request_user_id, $request_user_secret</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_expires_in_seconds, $response_authorization_code, $response_scope</p>
                                        <p>Type:string;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="sectionedit100" id="obtain_pat">Obtain_pat.php</h3>

                    <div class="level100">

                        <p>Obtain_pat class extends from Clinet_OXD class.</p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <p>
                            Obtain_pat class use <a href="#Obtain_trait">Obtain_trait.php</a> .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_pat protocol;</h4>
                                        <p>Obtain_trait request parameters;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Obtain_trait response parameters $request_registration_client_uri, $request_registration_access_token;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Obtain_pat_test:
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

echo 'Pat Token: '.$obtain_pat->getResponsePatToken();
echo 'Expires In Seconds: '.$obtain_pat->getResponseExpiresInSeconds();
echo 'Pat Refresh Token: '.$obtain_pat->getResponsePatRefreshToken();
echo 'Authorization Code: '.$obtain_pat->getResponseAuthorizationCode();
echo 'Scope: '.$obtain_pat->getResponseScope();

$obtain_pat->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="obtain_aat">Obtain_aat.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_aat class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <p>
                            Obtain_aat class use <a href="#Obtain_trait">Obtain_trait.php</a> .
                        </p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_aat protocol;</h4>
                                        <p>Obtain_trait request parameters;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Obtain_trait response parameters request parameters and $response_aat_token, $response_aat_refresh_token;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Obtain_pat_test:
require_once '../Obtain_aat.php';


$obtain_aat = new Obtain_aat('../');

$obtain_aat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setRequestClientId(Oxd_config::$clientId);
$obtain_aat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setRequestUserId(Oxd_config::$userId);
$obtain_aat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();

echo 'Pat Token: '.$obtain_aat->getResponseAatToken();
echo 'Expires In Seconds: '.$obtain_aat->getResponseExpiresInSeconds();
echo 'Pat Refresh Token: '.$obtain_aat->getResponseAatRefreshToken();
echo 'Authorization Code: '.$obtain_aat->getResponseAuthorizationCode();
echo 'Scope: '.$obtain_aat->getResponseScope();

$obtain_aat->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="register_resource">Register_resource.php</h3>

                    <div class="level100">

                        <p>
                            Register_resource class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request client_read protocol;</h4>
                                        <p>Type:string: $request_uma_discovery_url, $request_pat, $request_name</p>
                                        <p>Type:array: $request_scopes</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_resource_status, $response_id, $response_rev;</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_resource_test:
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

require_once '../Register_resource.php';

$register_resource = new Register_resource('../');

$register_resource->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_resource->setRequestPat($obtain_pat->getResponsePatToken());
$register_resource->setRequestName("My Resource Name");
$register_resource->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/all"
]);

$register_resource->request();

echo 'Resource Status: '.$register_resource->getResponseResourceStatus();
echo 'Id: '.$register_resource->getResponseId();
echo 'Rev: '.$register_resource->getResponseRev();

$register_resource->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="check_status_of_rpt">Rpt_status.php</h3>

                    <div class="level100">

                        <p>
                            Rpt_status class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request rpt_status protocol;</h4>
                                        <p>Type:string: $request_uma_discovery_url, $request_pat, $request_rpt</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_active, $response_expires_at, $response_issued_at;</p>
                                        <p>Type:array: $response_permissions;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Rpt_status_test:
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

require_once '../Obtain_aat.php';


$obtain_aat = new Obtain_aat('../');

$obtain_aat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setRequestClientId(Oxd_config::$clientId);
$obtain_aat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setRequestUserId(Oxd_config::$userId);
$obtain_aat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();

require_once '../Obtain_rpt.php';

$obtain_rpt = new Obtain_rpt('../');

$obtain_rpt->setRequestAatToken($obtain_aat->getResponseAatToken());
$obtain_rpt->setRequestAmHost(Oxd_config::$amHost);

$obtain_rpt->request();

require_once '../Rpt_status.php';

$rpt_status = new Rpt_status('../');

$rpt_status->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$rpt_status->setRequestPat($obtain_pat->getResponsePatToken());
$rpt_status->setRequestRpt($obtain_rpt->getResponseRptToken());

$rpt_status->request();


echo 'Active: '.$rpt_status->getResponseActive();
echo 'Expires At: '.$rpt_status->getResponseExpiresAt();
echo 'Issued At: '.$rpt_status->getResponseIssuedAt();
echo 'Permissions: '.$rpt_status->getResponsePermissions();

$rpt_status->disconnect();
                        </pre>
                    </div>
                    
                    <h3 class="sectionedit100" id="obtain_rpt">Obtain_rpt.php</h3>

                    <div class="level100">

                        <p>
                            Obtain_rpt class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request obtain_rpt protocol;</h4>
                                        <p>Type:string: $request_aat_token, $request_am_host</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_rpt_token;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Obtain_rpt_test:
require_once '../Obtain_aat.php';


$obtain_aat = new Obtain_aat('../');

$obtain_aat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_aat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_aat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_aat->setRequestClientId(Oxd_config::$clientId);
$obtain_aat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_aat->setRequestUserId(Oxd_config::$userId);
$obtain_aat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_aat->request();

require_once '../Obtain_rpt.php';

$obtain_rpt = new Obtain_rpt('../');

$obtain_rpt->setRequestAatToken($obtain_aat->getResponseAatToken());
$obtain_rpt->setRequestAmHost(Oxd_config::$amHost);

$obtain_rpt->request();

echo 'Rpt Token: '. $obtain_rpt->getResponseRptToken();

$obtain_rpt->disconnect();
                        </pre>
                    </div>
                    <h3 class="sectionedit100" id="check_status_of_id_token">Id_token_status.php</h3>

                    <div class="level100">

                        <p>
                            Id_token_status class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request id_token_status protocol;</h4>
                                        <p>Type:string: $request_discovery_url, $request_id_token</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_active, $response_expires_at, $response_issued_at,$response_claims(JSON);</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Id_token_status_test:
require_once '../Authorization_code_flow.php';

$authorization_code_flow = new Authorization_code_flow('../');
$authorization_code_flow->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$authorization_code_flow->setRequestClientId(Oxd_config::$clientId);
$authorization_code_flow->setRequestClientSecret(Oxd_config::$amHost);
$authorization_code_flow->setRequestUserId(Oxd_config::$userId);
$authorization_code_flow->setRequestUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setRequestNonce("409d-48a2-b793");
$authorization_code_flow->setRequestScope();
$authorization_code_flow->setRequestAcr();
$authorization_code_flow->request();

require_once '../Id_token_status.php';

$client = new Id_token_status('../');

$client->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$client->setRequestIdToken($authorization_code_flow->getResponseIdToken());

$client->request();


echo 'Active: '.$client->getResponseActive();
echo 'Expires At: '.$client->getResponseExpiresAt();
echo 'Issued At: '.$client->getResponseIssuedAt();
echo 'Claims: '.$client->getResponseClaims();

$client->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="check_status_of_access_token">Access_token_status.php</h3>

                    <div class="level100">

                        <p>
                            Access_token_status class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request access_token_status protocol;</h4>
                                        <p>Type:string: $request_discovery_url, $request_id_token, $request_access_token</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_active, $response_expires_at, $response_issued_at;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Access_token_status_test:
require_once '../Authorization_code_flow.php';

$authorization_code_flow = new Authorization_code_flow('../');
$authorization_code_flow->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$authorization_code_flow->setRequestClientId(Oxd_config::$clientId);
$authorization_code_flow->setRequestClientSecret(Oxd_config::$amHost);
$authorization_code_flow->setRequestUserId(Oxd_config::$userId);
$authorization_code_flow->setRequestUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setRequestNonce("409d-48a2-b793");
$authorization_code_flow->setRequestScope();
$authorization_code_flow->setRequestAcr();
$authorization_code_flow->request();

require_once '../Access_token_status.php';

$access_token_status = new Access_token_status('../');
$access_token_status->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$access_token_status->setRequestIdToken($authorization_code_flow->getResponseIdToken());
$access_token_status->setRequestAccessToken($authorization_code_flow->getResponseAccessToken());
$access_token_status->request();

echo 'Active: '.$access_token_status->getResponseActive();
echo 'Expires At:'.$access_token_status->getResponseExpiresAt();
echo 'Issued At: '.$access_token_status->getResponseIssuedAt();

$access_token_status->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="register_permission_ticket">Register_ticket.php</h3>

                    <div class="level100">

                        <p>
                            Register_ticket class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request register_ticket protocol;</h4>
                                        <p>Type:string: $request_uma_discovery_url, $request_pat, $request_am_host, $request_rs_host, $request_resource_set_id, $request_http_method, $request_url</p>
                                        <p>Type:array: $request_scopes</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_ticket;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_ticket_test:
require_once '../Obtain_pat.php';

$obtain_pat = new Obtain_pat('../');

$obtain_pat->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$obtain_pat->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$obtain_pat->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$obtain_pat->setRequestClientId(Oxd_config::$clientId);
$obtain_pat->setRequestClientSecret(Oxd_config::$clientSecret);
$obtain_pat->setRequestUserId(Oxd_config::$userId);
$obtain_pat->setRequestUserSecret(Oxd_config::$userSecret);

$obtain_pat->request();

require_once '../Register_ticket.php';

$register_ticket = new Register_ticket('../');

$register_ticket->setRequestUmaDiscoveryUrl(Oxd_config::$umaDiscoveryUrl);
$register_ticket->setRequestPat($obtain_pat->getResponsePatToken());
$register_ticket->setRequestAmHost(Oxd_config::$amHost);
$register_ticket->setRequestRsHost("rs.gluu.org");
$register_ticket->setRequestResourceSetId("1366810445313");
$register_ticket->setRequestScopes([
    "http://photoz.example.com/dev/scopes/view",
    "http://photoz.example.com/dev/scopes/add"
]);
$register_ticket->setRequestHttpMethod(Oxd_config::$httpMethod);
$register_ticket->setRequestUrl("http://example.com/object/1234");

$register_ticket->request();

echo 'Ticket: '.$register_ticket->getResponseTicket();

$register_ticket->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="discovery">Discovery.php</h3>

                    <div class="level100">

                        <p>
                            Discovery class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request discovery protocol;</h4>
                                        <p>Type:string: $request_discovery_url</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_issuer, $response_authorization_endpoint, $response_token_endpoint, $response_userinfo_endpoint,
                                            $response_clientinfo_endpoint, $response_check_session_iframe, $response_end_session_endpoint, $response_jwks_uri, $response_registration_endpoint,
                                            $response_validate_token_endpoint, $response_federation_metadata_endpoint, $response_federation_endpoint, $response_id_generation_endpoint,
                                            $response_service_documentation, $response_claims_locales_supported, $response_ui_locales_supported, $response_claims_parameter_supported,
                                            $response_request_parameter_supported, $response_request_uri_parameter_supported, $response_require_request_uri_registration,
                                            $response_op_policy_uri, $response_op_tos_uri;</p>
                                        <p>Type:array: $response_scopes_supported, $response_types_supported, $response_grant_types_supported, $response_subject_types_supported;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Discovery_test:
require_once '../Discovery.php';
$discovery = new Discovery('../');
$discovery->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$discovery->request();

echo $discovery->getResponseIssuer();
echo $discovery->getResponseTokenEndpoint();
echo $discovery->getResponseUserinfoEndpoint();
echo $discovery->getResponseClientinfoEndpoint();
echo $discovery->getResponseCheckSessionIframe();
echo $discovery->getResponseEndSessionEndpoint();
echo $discovery->getResponseJwksUri();
echo $discovery->getResponseRegistrationEndpoint();
echo $discovery->getResponseValidateTokenEndpoint();
echo $discovery->getResponseFederationMetadataEndpoint();
echo $discovery->getResponseFederationEndpoint();
echo $discovery->getResponseIdGenerationEndpoint();
echo '';
print_r($discovery->getResponseScopesSupported());
echo '';
print_r($discovery->getResponseTypesSupported());
echo '';
print_r($discovery->getResponseGrantTypesSupported());
echo '';
print_r($discovery->getResponseSubjectTypesSupported());
echo '';
print_r($discovery->getResponseServiceDocumentation());
echo '';
print_r($discovery->getResponseClaimsLocalesSupported());
echo '';
print_r($discovery->getResponseUiLocalesSupported());
echo $discovery->getResponseClaimsParameterSupported();
echo $discovery->getResponseRequestParameterSupported();
echo $discovery->getResponseRequestUriParameterSupported();
echo $discovery->getResponseRequireRequestUriRegistration();
echo $discovery->getResponseOpPolicyUri();
echo $discovery->getResponseOpTosUri();

$discovery->disconnect();
                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="authorization_code_flow">Authorization_code_flow.php</h3>

                    <div class="level100">

                        <p>
                            Authorization_code_flow class extends from Clinet_OXD class.</p>
<p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request authorization_code_flow protocol;</h4>
                                        <p>Type:string: $request_discovery_url, $request_redirect_url, $request_client_id, $request_client_secret, $request_user_id, $request_user_secret, $request_scope, $request_nonce, $request_acr</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>Type:string: $response_access_token, $response_expires_in_seconds, $response_id_token, $response_refresh_token, $response_authorization_code, $response_scope;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class, parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Authorization_code_flow_test:
require_once '../Authorization_code_flow.php';

$authorization_code_flow = new Authorization_code_flow('../');
$authorization_code_flow->setRequestDiscoveryUrl(Oxd_config::$discoveryUrl);
$authorization_code_flow->setRequestRedirectUrl(Oxd_config::$clientRedirectURL);
$authorization_code_flow->setRequestClientId(Oxd_config::$clientId);
$authorization_code_flow->setRequestClientSecret(Oxd_config::$amHost);
$authorization_code_flow->setRequestUserId(Oxd_config::$userId);
$authorization_code_flow->setRequestUserSecret(Oxd_config::$userSecret);
$authorization_code_flow->setRequestNonce("409d-48a2-b793");
$authorization_code_flow->setRequestScope();
$authorization_code_flow->setRequestAcr();
$authorization_code_flow->request();


echo 'Access Token: '.$authorization_code_flow->getResponseAccessToken();
echo 'Expires In Seconds: '.$authorization_code_flow->getResponseExpiresInSeconds();
echo 'Id Token: '.$authorization_code_flow->getResponseIdToken();
echo 'Refresh Token: '.$authorization_code_flow->getResponseRefreshToken();
echo 'Authorization Code: '.$authorization_code_flow->getResponseAuthorizationCode();
echo 'Scope: '.$authorization_code_flow->getResponseScope();

$authorization_code_flow->disconnect();
                        </pre>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>