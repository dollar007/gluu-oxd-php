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
                        <a id="user-content-oxd-rp-php" class="anchor" href="#oxd-rp-php" aria-hidden="true"><span class="octicon octicon-link"></span></a>oxd-rp-php
                    </h1>
                    <p>Need to download and install gluu server in Your web server. For more information <a target="_blank" href="http://www.gluu.org/docs/">click me</a>.</p>
                    <p>Need to download and install OXD server in Your web server. For more information <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:rp">click me</a>.</p>
                    <p>For OXD server configuration <a target="_blank" href="http://ox.gluu.org/doku.php?id=oxd:home&s[]=mvn">click me</a>. </p>
                    <p>PHP Client Library for the <a target="_blank" href="https://github.com/GluuFederation/oxd-php/oxd-rp">Gluu OXD-RP Server</a>.</p>
                    <h2 class="sectionedit5" id="oxd_server_configuration">oxd-rp-php configuration</h2>
                    <div class="level2">
                        <p>
                            Configuration file is located in 'oxd-rp/oxd-rp-settings.json' file in distribution package.
                        </p>
                        <p>
                            (Save this as a file called <code>oxd-rp-settings.json</code>)
                        </p>
                        <dl class="file">
                            <dt>
                                oxd-rp-settings.json</dt>
                            <dd>
                            <pre class="code file json">
{
    "oxd_host_ip": "127.0.0.1",
    "oxd_host_port":8099,
    "authorization_redirect_uri" : "",
    "logout_redirect_uri" : "",
    "scope" : [ "openid", "profile" ],
    "application_type" : "web",
    "redirect_uris" : [ "" ],
    "response_types" : ["code"],
    "grant_types":"authorization_code",
    "acr_values" : [ "basic", "duo" ]
}
                        </pre>
                            </dd></dl>
                        <ul>
                            <li class="level1"><div class="li"> oxd_host_port - port of oxd socket</div>
                            </li>
                            <li class="level1"><div class="li"> oxd_host_ip - flag to restrict communication to localhost only (if false then it's not restricted to localhost only)</div>
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
                                    <a href="https://github.com/GluuFederation/oxd-php/oxd-rp">php-oxd-rp</a>) by web
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
                            Web <span class="search_hit">site</span> communicates with oxd via library (python/php-oxd-rp). Library must provide all convenient methods to web <span class="search_hit">site</span> code which will in background call oxd. Concrete library depends on programming language used by <span class="search_hit">site</span>. Here for simplicity we will PHP as sample.
                        </p>

                        <p>
                            First of all web <span class="search_hit">site</span> must <span class="search_hit">register</span> itself on oxd with registration command (via library (
                            <a href="https://github.com/GluuFederation/oxd-python" target="_blank">python</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                            <a href="https://github.com/GluuFederation/oxd-php">php</a>). With registration it gets oxd_id from oxd server. oxd_id must be passed to all commands.
                        </p>

                        <p>
                      </div>
                    <p>
                        <strong>php-oxd-rp</strong>
                        is a thin wrapper around the communication protocol of oxD server.
                        This can be used to access the OpenID connect &amp;
                        UMA Authorization end points of the Gluu Server via the oxD RP.
                        This library provides the function calls required by a website to access user information from a OpenID Connect Provider (OP) by using the OxD as the Relying Party (RP).
                    </p>
                    <div class="level2">

                        <p>
                            PHP classes for communicating with oxd.
                        </p>
                        <p>
                            Connecting to oxd server is doing via class Client_Socket_OXD_RP <a href="#Client_Socket_OXD_RP" title="oxd:communication_protocol ?" class="wikilink1">Client_Socket_OXD_RP.php</a>
                        </p>
                        <h3 class="sectionedit100" id="Client_Socket_OXD_RP">Client_Socket_OXD_RP.php</h3>

                        <div class="level100">
                            <p>
                                Client_Socket_OXD_RP class is base class for connecting to oxd server. It is given all parameters from oxd-rp-settings.json for connection and parameters saving to static values in class Oxd_RP_config
                                <a href="#Oxd_RP_config" title="oxd:communication_protocol ?" class="wikilink1">Oxd_RP_config.php</a></div>.
                            </p>
                            <p>Constructor accept folder base_url = string parameter</p>
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
                                            <h4>Name: oxd_socket_request;</h4>
                                            <p>Description: Sending request to oxd server;</p>
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
                        <h3 class="sectionedit100" id="Oxd_RP_config">Oxd_RP_config.php</h3>
                    <div class="level100">
                    <pre class="code">
class Oxd_RP_config
{
    public static $oxd_host_ip;
    public static $oxd_host_port;
    public static $authorization_redirect_uri;
    public static $logout_redirect_uri;
    public static $scope;
    public static $application_type;
    public static $redirect_uris;
    public static $response_types;
    public static $grant_types;
    public static $acr_values;
}
                        </pre>
                        </div>
                        <p>
                            Base class for protocols is abstract Client_OXD_RP.php, for which extends all protocols classes. <a href="#Client_OXD_RP" title="oxd:communication_protocol ?" class="wikilink1">Client_OXD_RP</a>
                        </p>
                        <ul>
                            <li class="level1"><div class="li"> <a href="#Register_site"  class="wikilink1">Register_site.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#Get_authorization_url" class="wikilink1">Get_authorization_url.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#Get_tokens_by_code" class="wikilink1">Get_tokens_by_code.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#Get_user_info" class="wikilink1">Get_user_info.php</a></div>
                            </li>
                            <li class="level1"><div class="li"> <a href="#Logout" class="wikilink1">Logout.php</a></div>
                                                        </li>
                        </ul>

                    <h3 class="sectionedit100" id="Client_OXD_RP">Clinet_OXD_RP.php</h3>

                    <div class="level100">
                        <p>
                            Client_OXD_RP class is abstract class,which extends from Client_Socket_OXD_RP class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Name: $command_types;</h4>
                                        <p>Type:array;</p>
                                        <p>Default value = array('register_site','get_logout_uri' 'get_authorization_url', 'get_tokens_by_code','get_user_info');</p>
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

                    <h3 class="sectionedit100" id="Register_site">Register_site.php</h3>

                    <div class="level100">

                        <p>
                            Register_site class extends from Clinet_OXD_RP class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request Register_site protocol;</h4>
                                        <p>$request_authorization_redirect_uri,$request_response_types,$request_client_logout_uri,$request_grant_types,$request_scope, $request_logout_redirect_uri, $request_application_type, $request_redirect_uris, $request_acr_values, $request_client_jwks_uri, $request_client_token_endpoint_auth_method, $request_client_request_uris, $request_contacts;</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_oxd_id</p>
                                        <p>Type:string;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class,response parameter getters and request parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Register_site_test:

session_start();
include_once '../Register_site.php';

$register_site = new Register_site('../');

$register_site->setRequestAcrValues(Oxd_RP_config::$acr_values);
$register_site->setRequestAuthorizationRedirectUri(Oxd_RP_config::$authorization_redirect_uri);
$register_site->setRequestRedirectUris(Oxd_RP_config::$redirect_uris);
$register_site->setRequestLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestContacts(["vlad@gluu.org"]);
$register_site->setRequestClientJwksUri("");
$register_site->setRequestClientRequestUris([]);
$register_site->setRequestClientTokenEndpointAuthMethod("");
$register_site->setRequestGrantTypes(Oxd_RP_config::$grant_types);
$register_site->setRequestResponseTypes(Oxd_RP_config::$response_types);
$register_site->setRequestClientLogoutUri(Oxd_RP_config::$logout_redirect_uri);
$register_site->setRequestScope(Oxd_RP_config::$scope);

$register_site->request();
$_SESSION['oxd_id'] = $register_site->getResponseOxdId();

print_r($register_site->getResponseObject());

                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="Get_authorization_url">Get_authorization_url.php</h3>

                    <div class="level100">

                        <p>
                            Get_authorization_url class extends from Clinet_OXD_RP class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request Get_authorization_url protocol;</h4>
                                        <p>$request_oxd_id, $request_acr_values</p>
                                        <p>Type:string;</p>
                                        <p>Default value = null;</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_authorization_url</p>
                                        <p>Type:string;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class,response parameter getters and request parameters setters and getters;</h4>
                                    </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Get_authorization_url_test:
session_start();
require_once '../Get_authorization_url.php';

$get_authorization_url = new Get_authorization_url('../');
$get_authorization_url->setRequestOxdId($_SESSION['oxd_id']);

$get_authorization_url->request();

echo $get_authorization_url->getResponseAuthorizationUrl();

                        </pre>
                    </div>

                    <h3 class="sectionedit100" id="Get_tokens_by_code">Get_tokens_by_code.php</h3>

                    <div class="level100">

                        <p>
                            Get_tokens_by_code class extends from Clinet_OXD_RP class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request Get_tokens_by_code protocol;</h4>
                                        <p>$request_oxd_id, $request_state, $request_scopes, $request_code Type:string;</p>
                                        <p>Default value = null;</p>
                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_access_token, $response_expires_in, $response_id_token = Type:string;</p>
                                        <p>$response_id_token_claims = Type:array;</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Extended functions from parent class,response parameter getters and request parameters setters and getters;</h4>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Get_tokens_by_code_test:
session_start();
require_once '../Get_tokens_by_code.php';

$get_tokens_by_code = new Get_tokens_by_code();

$get_tokens_by_code->setRequestOxdId($_SESSION['oxd_id']);

//getting code from redirecting url, when user allowed.
$get_tokens_by_code->setRequestCode($_GET['code']);
$get_tokens_by_code->setRequestState($_GET['state']);
$get_tokens_by_code->setRequestScopes($_GET['scope']);

$get_tokens_by_code->request();
$_SESSION['user_oxd_id_token'] = $get_tokens_by_code->getResponseIdToken();
$_SESSION['user_oxd_access_token'] = $get_tokens_by_code->getResponseAccessToken();
$_SESSION['state'] = $_REQUEST['state'];
$_SESSION['session_state'] = $_REQUEST['session_state'];
print_r($get_tokens_by_code->getResponseObject());

</pre>
                    </div>

                    <h3 class="sectionedit100" id="Get_user_info">Get_user_info.php</h3>

                    <div class="level100">

                        <p>
                            Get_user_info class extends from Clinet_OXD_RP class.
                        </p>
                        <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                        <ul>
                            <li class="level1">
                                <div class="li"> <h4>Parameters:</h4></div>
                                <ul>
                                    <li>
                                        <h4>Description: Parameters necessary for to request Get_user_info protocol;</h4>
                                        <p>Type:string: $request_oxd_id, $request_access_token</p>

                                    </li>
                                    <li>
                                        <h4>Description: Response parameters from oxd;</h4>
                                        <p>$response_claims</p>
                                        <p>Type:array;</p>

                                    </li>
                                </ul>
                            </li>
                            <li class="level1">
                                <div class="li"><h4> Functions:</h4></div>
                                <ul>
                                    <li>
                                                                            <h4>Extended functions from parent class,response parameter getters and request parameters setters and getters;</h4>
                                                                        </li>

                                </ul>
                            </li>
                        </ul>

                        <p>
                            <strong>Example</strong>
                        </p>
                        <pre class="code">
Get_user_info_test:
session_start();
require_once '../Get_tokens_by_code.php';
require_once '../Get_user_info.php';
echo 'Giving user information.</p>';

echo Get_tokens_by_code <br/>';
$get_tokens_by_code = new Get_tokens_by_code('../');

$get_tokens_by_code->setRequestOxdId($_SESSION['oxd_id']);
$get_tokens_by_code->setRequestCode($_GET['code']);
$get_tokens_by_code->setRequestState($_GET['state']);
$get_tokens_by_code->setRequestScopes($_GET['scope']);

$get_tokens_by_code->request();
$_SESSION['user_oxd_id_token'] = $get_tokens_by_code->getResponseIdToken();
$_SESSION['user_oxd_access_token'] = $get_tokens_by_code->getResponseAccessToken();
$_SESSION['state'] = $_REQUEST['state'];
$_SESSION['session_state'] = $_REQUEST['session_state'];
echo Access Token: '.$get_tokens_by_code->getResponseAccessToken();
echo Expires In: '.$get_tokens_by_code->getResponseExpiresIn();
echo Id Token: '.$get_tokens_by_code->getResponseIdToken();
echo Get_user_info <br/>';
$get_user_info = new Get_user_info('../');
$get_user_info->setRequestOxdId($_SESSION['oxd_id']);
$get_user_info->setRequestAccessToken($get_tokens_by_code->getResponseAccessToken());
$get_user_info->request();
echo '<span>Name: </span>'.$get_user_info->getResponseName();
echo '<span>Given Name: </span>'.$get_user_info->getResponseGivenName();
echo '<span>Family Name: </span>'.$get_user_info->getResponseFamilyName();
echo '<span>Middle Name: </span>'.$get_user_info->getResponseMiddleName();
echo '<span>Nickname: </span>'.$get_user_info->getResponseNickname();
echo '<span>Username: </span>'.$get_user_info->getResponsePreferredUsername();
echo '<span>Profile: </span>'.$get_user_info->getResponseProfile();
echo '<span>Picture: </span>'.$get_user_info->getResponsePicture();
echo '<span>Website: </span>'.$get_user_info->getResponseWebsite();
echo '<span>Gender: </span>'.$get_user_info->getResponseGender();
echo '<span>Birthdate: </span>'.$get_user_info->getResponseBirthdate();
echo '<span>Zoneinfo: </span>'.$get_user_info->getResponseZoneinfo();
echo '<span>Updated At: </span>'.$get_user_info->getResponseUpdatedAt();
                        </pre>
                    </div>
                    <h3 class="sectionedit100" id="Logout">Logout.php</h3>
                                    
                                                        <div class="level100">
                                    
                                                            <p>
                                                                Logout class extends from Clinet_OXD_RP class.
                                                            </p>
                                                            <p>Constructor accept parent constructor parameter ($base_url = string)</p>
                                                            <ul>
                                                                <li class="level1">
                                                                    <div class="li"> <h4>Parameters:</h4></div>
                                                                    <ul>
                                                                        <li>
                                                                            <h4>Description: Parameters necessary for to request Logout protocol;</h4>
                                                                            <p>Type:string: $request_oxd_id, $request_id_token, $request_post_logout_redirect_uri, $request_session_state, $request_state</p>
                                                                        </li>
                                                                        <li>
                                                                            <h4>Description: Parameters necessary for to request Logout protocol;</h4>
                                                                            <p>Type:boolean: $request_http_based_logout</p>
                                                                        </li>
                                                                        <li>
                                                                            <h4>Description: Response parameters from oxd;</h4>
                                                                            <p>$response_html</p>
                                                                            <p>Type:string;</p>
                                    
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="level1">
                                                                    <div class="li"><h4> Functions:</h4></div>
                                                                    <ul>
                                                                        <li>
                                                                            <h4>Extended functions from parent class,response parameter getters and request parameters setters and getters;</h4>
                                                                        </li>
                                    
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                    
                                                            <p>
                                                                <strong>Example</strong>
                                                            </p>
                                                            <pre class="code">
Logout_test:
session_start();
require_once '../Logout.php';

$logout = new Logout('../');
$logout->setRequestOxdId($_SESSION['oxd_id']);
$logout->setRequestPostLogoutRedirectUri(Oxd_RP_config::$logout_redirect_uri);
$logout->setRequestIdToken($_SESSION['user_oxd_access_token']);
$logout->setRequestSessionState($_SESSION['session_states']);
$logout->setRequestState($_SESSION['states']);
$logout->request();

echo $logout->getResponseHtml();


                        </pre>
                    </div>
                </div>
                 
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>