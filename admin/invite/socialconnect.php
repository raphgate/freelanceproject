<?php
session_start();
include 'config.php';
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <title></title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="//socialinviter.com/assets/js/src/socialinviter.js"></script>
    <style type="text/css">
        .hiddenBtn{width:0;height:0;position:absolute;left:-2000px}
        .rowHeader{background-color:#eee;color:#000;font-weight:700;line-height:30px;padding-left:10px;font-size:16px;margin-top:40px;margin-bottom:20px}
        body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;padding-bottom:10px;color:#5a5a5a;font-size:14px}
        .label{width:120px}.text{width:300px;border-radius:4px;border:1px solid #DDD;padding:5px}
        .text-lg,textarea{width:400px;border-radius:4px}
        .text-lg{border:1px solid #DDD;padding:5px}
        table tr td{padding-top:3px;padding-bottom:3px;padding-right:10px}
        .btn{background-color:#2154B0;cursor:pointer;color:#fff;border:0;padding:5px 10px;border-radius:4px;line-height:21px}
        textarea{height:200px;border:1px solid #D0CDCD}
        .select{width:200px;border-radius:4px;border:1px solid #DDD;padding:5px}
        .fr{float:right}
        .fl{float:left}
        .posrel{position:relative}
        .posabs{position:absolute}
        .text-primary{color:Orange}
        .center{margin:0 auto;text-align:center}
        .backholder{width:200px;right:0;top:-30px}
        .backholder a{color:Red}.outlook{display:none}
        .loading{background-image:url(blueloading.gif);position:fixed;width:100%;height:100%;background-repeat:no-repeat;background-position:center;display:none;}
    </style>
    <script type="text/javascript">
        var focusStep = function (dom) {
            $(document).ready(function(){
                $('body,html').animate({
                    scrollTop: $("." + dom).offset().top - 30
                }, 600);
                $(".loading").hide();
            });
            
        }
        var changeService = function () {
            if (document.getElementById("ddnservice").value == "outlook") {
                $(".outlook").show();
                $(".nonoutlook").hide();
            }
            else {
                $(".outlook").hide();
                $(".nonoutlook").show();
            }
        }
        var setService = function (service) {
            $(document).ready(function(){
                document.getElementById("ddnservice").value = service;
                $("#ddnservice").change();
            });
        }
    </script>
</head>
<body>
            <?php
                //DECLARATION STARTS
                $license = $sclicense;
                $APIKey = 'Your api key';
                $APISecretKey = 'Your api secret';
                $RedirectUrl = 'http://localhost/socialinviter-source/REST/php/socialconnect.php';
                $service = 'googleplus';
                $token='';
                $tokensecret = '';
                $tokenverifier = '';
                $userid = '';
                $authurl = '';
                $authrequest ='';
                $authresponse = '';
                $uploadedfile = '';
                //DECLARATION ENDS

               if($_SERVER['REQUEST_METHOD']=='GET')
               {
                    //PAGE LOAD
                    if($_GET['code']!='' || $_GET['oauth_token']!=''){
                        if($_GET['code']!=''){
                            $token = $_GET['code'];    
                        }
                        else if($_GET['oauth_token']!=''){
                            $token = $_GET['oauth_token'];    
                            $tokenverifier = $_GET['oauth_verifier'];    
                            $tokensecret = $_SESSION["tokensecret"];
                        }

                        //Restoring values from session
                        $authrequest = $_SESSION["authrequest"];
                        $authresponse = $_SESSION["authresponse"];
                        $authurl = $_SESSION["authurl"];
                        $service = $_SESSION["service"];

                        //Focusing the section
                        echo "<script>focusStep('step3');</script>";
                    }
               } 
               else if($_SERVER['REQUEST_METHOD']=='POST')
               {
                    if($_POST['reqtype']=='getauthurl'){
                        //GET AUTHENTICATION URL
                        $authRequestUrl = "http://socialinviter.com/api/connect.aspx?";
                        $authRequestUrl .= "service=" . $_POST['ddnservice'];
                        $authRequestUrl .= "&type=authenticationurl";
                        $authRequestUrl .= "&consumerkey=" . $_POST['authConsumerKey'];
                        $authRequestUrl .= "&consumersecret=" . $_POST['authConsumerSecret'];
                        $authRequestUrl .= "&returnurl=" . $_POST['authRedirectUrl'];
                        $authRequestUrl .= "&signaturekey=" . $_POST['formattedKey'];
                        $authrequest = $authRequestUrl;

                        //Making the API call
                        $authresponse = file_get_contents($authRequestUrl);
                        
                        //Parsing
                        $data = json_decode($authresponse);
                        $dataObj = $data->data;
                        $authurl = $dataObj->authurl;

                        //Storing values in session
                        $_SESSION["service"] = $_POST['ddnservice'];
                        $_SESSION["authrequest"] = $authRequestUrl;
                        $_SESSION["authresponse"] = $authresponse;
                        $_SESSION["authurl"] = $authurl;
                        $_SESSION["token"] = $dataObj->token;
                        $_SESSION["tokensecret"] = $dataObj->tokensecret;

                        //Focusing the section
                        echo "<script>focusStep('step2');</script>";
                    }
                    else if($_POST['reqtype']=='getaccesstoken'){
                        //GET ACCESS TOKEN
                        $accessRequestUrl = "http://socialinviter.com/api/connect.aspx?";
                        $accessRequestUrl .= "service=" . $_POST['ddnservice'];
                        $accessRequestUrl .= "&type=accesstoken";
                        $accessRequestUrl .= "&consumerkey=" . $_POST['authConsumerKey'];
                        $accessRequestUrl .= "&consumersecret=" . $_POST['authConsumerSecret'];
                        $accessRequestUrl .= "&returnurl=" . urlencode($_POST['authRedirectUrl']);
                        $accessRequestUrl .= "&token=" . urlencode($_POST['accToken']);
                        $accessRequestUrl .= "&tokensecret=" . $_POST['accTokenSecret'];
                        $accessRequestUrl .= "&tokenverifier=" . $_POST['accTokenVerifier'];
                        $accessRequestUrl .= "&signaturekey=" . $_POST['formattedKey'];

                        //Making the API call
                        $accessresponse = file_get_contents($accessRequestUrl);

                        //Parsing
                        $data = json_decode($accessresponse);
                        $dataObj = $data->data;
                        $token = $dataObj->token;
                        $tokensecret = $dataObj->tokensecret;
                        $tokenverifier = $dataObj->tokenverifier;
                        $userid = $dataObj->userid;

                        //Storing values in session
                        $_SESSION["accessrequest"] = $accessRequestUrl;
                        $_SESSION["accessresponse"] = $accessresponse;
                        $_SESSION["token"] = $token;
                        $_SESSION["tokensecret"] = $tokensecret;
                        $_SESSION["tokenverifier"] = $tokenverifier;
                        $_SESSION["userid"] = $userid;

                        //Restoring values from session
                        $authrequest = $_SESSION["authrequest"];
                        $authresponse = $_SESSION["authresponse"];
                        $authurl = $_SESSION["authurl"];
                        $service = $_SESSION["service"];

                        //Focusing the section
                        echo "<script>focusStep('step4');</script>";
                    }
                    else if($_POST['reqtype']=='getcontacts'){
                        //GET CONTACTS
                        $conRequestUrl = "http://socialinviter.com/api/connect.aspx?";
                        $conRequestUrl .= "service=" . $_POST['ddnservice'];
                        $conRequestUrl .= "&type=userinfo";
                        $conRequestUrl .= "&consumerkey=" . $_POST['authConsumerKey'];
                        $conRequestUrl .= "&consumersecret=" . $_POST['authConsumerSecret'];
                        $conRequestUrl .= "&returnurl=" . urlencode($_POST['authRedirectUrl']);
                        $conRequestUrl .= "&token=" . urlencode($_POST['conToken']);
                        $conRequestUrl .= "&tokensecret=" . $_POST['conTokenSecret'];
                        $conRequestUrl .= "&tokenverifier=" . $_POST['conTokenVerifier'];
                        $conRequestUrl .= "&userid=" . $_POST['conUserId'];
                        $conRequestUrl .= "&signaturekey=" . $_POST['formattedKey'];
                        $contactsrequest = $conRequestUrl;

                        //Make API call
                        $contactsresponse = file_get_contents($conRequestUrl);

                        //Restoring values from session
                        $accessrequest = $_SESSION["accessrequest"];
                        $accessresponse = $_SESSION["accessresponse"];
                        $token = $_SESSION["token"];
                        $tokensecret = $_SESSION["tokensecret"];
                        $tokenverifier = $_SESSION["tokenverifier"];
                        $userid = $_SESSION["userid"];
                        $authrequest = $_SESSION["authrequest"];
                        $authresponse = $_SESSION["authresponse"];
                        $authurl = $_SESSION["authurl"];
                        $service = $_SESSION["service"];

                        //Focusing the section
                        echo "<script>focusStep('step4');</script>";
                    }
                    else if($_POST['reqtype']=='getoutlookcontacts'){
                        //GET OUTLOOK CONTACTS
                        $conRequestUrl = "http://socialinviter.com/api/contacts.aspx?";
                        $conRequestUrl .= "service=" . $_POST['ddnservice'];
                        $conRequestUrl .= "&type=contacts";
                        $conRequestUrl .= "&uploadedfile=" . $_POST['txtcsvurl'];
                        $conRequestUrl .= "&signaturekey=" . $_POST['formattedKey'];
                        $csvrequest = $conRequestUrl;

                        //Make API call
                        $csvresponse = file_get_contents($conRequestUrl);

                        //Restoring values from session
                        $service = $_POST['ddnservice'];
                        $uploadedfile = $_POST['txtcsvurl'];

                        //Focusing the section
                        echo "<script>focusStep('step4');</script>";
                        echo "<script>setService('outlook');</script>";
                    }
               }
            ?>
            <form method="POST" action="socialconnect.php">
            <div class="loading"></div>
            <h1 class="text-primary center">
                Check out our demo</h1>
            <div class="fr posrel">
                <div class="posabs backholder">
                    <a href="index.php">Back to products</a></div>
            </div>
            <div class="enguser center">
                <h2>Promote Your website with the Best Social Tools on the Web.</h2>
            </div>
            <hr />
            <h2 class="text-primary">Contact Importer REST API example</h2>
            <div class="rowHeader nonoutlook">
                Step1 : Getting Authentication Url
            </div>
            <div class="rowHeader outlook">
                Step1 : Get Outlook Contacts
            </div>
            
                <input type="hidden" name="reqtype" id="reqtype" value="getauthurl">
                <table>
                    <tr>
                        <td class="label">
                            Service
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <select class="select" onchange="changeService()" id="ddnservice" name="ddnservice">
                                <option value="googleplus" <?php if ($service=="googleplus") echo 'selected="selected"';?>>Google +</option>
                                <option value="yahoo" <?php if ($service=="yahoo") echo 'selected="selected"';?>>Yahoo</option>
                                <option value="hotmail" <?php if ($service=="hotmail") echo 'selected="selected"';?>>Windowslive</option>
                                <option value="google" <?php if ($service=="google") echo 'selected="selected"';?>>Google</option>
                                <option value="facebook" <?php if ($service=="facebook") echo 'selected="selected"';?>>Facebook</option>
                                <option value="twitter" <?php if ($service=="twitter") echo 'selected="selected"';?>>Twitter</option>
                                <option value="linkedin" <?php if ($service=="linkedin") echo 'selected="selected"';?>>Linkedin</option>
                                <option value="foursquare" <?php if ($service=="foursquare") echo 'selected="selected"';?>>Foursquare</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="nonoutlook">
                        <td>
                            Consumer key
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" class="text" id="authConsumerKey" name="authConsumerKey" value='<?php echo @$APIKey;?>' />
                        </td>
                    </tr>
                    <tr class="nonoutlook">
                        <td>
                            Consumer secret
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" class="text" name="authConsumerSecret" id="authConsumerSecret" value='<?php echo @$APISecretKey;?>' />
                        </td>
                    </tr>
                    <tr class="nonoutlook">
                        <td>
                            Redirect Url
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" class="text" name="authRedirectUrl" id="authRedirectUrl" value="<?php echo @$RedirectUrl;?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Formatted key
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" class="text" id="formattedKey" name="formattedKey"/>
                        </td>
                    </tr>
                    <tr class="nonoutlook">
                        <td colspan="2">
                        </td>
                        <td>
                            <input type="submit" class="btn" value="Get authentication url" />
                        </td>
                    </tr>
                    <tr class="outlook">
                        <td>
                            CSV file url
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" class="text" id="txtcsvurl" name="txtcsvurl" value="<?php echo @$uploadedfile;?>" />
                            <div>
                                (cannot be a localhost file, please provide the url of an online file eg: http://yourdomain.com/xxxx.csv)</div>
                        </td>
                    </tr>
                    <tr class="outlook">
                        <td colspan="2">
                        </td>
                        <td>
                            <input type="submit" class="btn" value="Get contacts" onclick="getOutlookContacts()" />
                        </td>
                    </tr>
                    <tr class="nonoutlook">
                        <td colspan="3">
                            <table>
                                <tr>
                                    <td>
                                        API Request
                                    </td>
                                    <td>
                                        API Response
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea id="authRequest"><?php echo @$authrequest;?></textarea>
                                    </td>
                                    <td>
                                        <textarea id="authResponse"><?php echo @$authresponse;?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="outlook">
                        <td colspan="3">
                            <table>
                                <tr>
                                    <td>
                                        API Request
                                    </td>
                                    <td>
                                        API Response
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea id="csvRequest"><?php echo @$csvrequest;?></textarea>
                                    </td>
                                    <td>
                                        <textarea id="csvResponse"><?php echo @$csvresponse;?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            
            
            <div class="rowHeader nonoutlook step2">
                Step2 : Authenticating User
            </div>
            <table class="nonoutlook">
                <tr>
                    <td class="label">
                        Authentication Url
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" class="text-lg" id="txtAuthUrl" name="txtAuthUrl" value="<?php echo @$authurl;?>" disabled="disabled" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td>
                        <input type="button" class="btn" value="Authentication user" onclick="authUser()" />
                    </td>
                </tr>
            </table>
            <div class="rowHeader nonoutlook step3">
                Step3 : Getting Access Token
            </div>
            <table class="nonoutlook">
                <tr>
                    <td class="label">
                        Token
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" class="text" id="accToken" name="accToken" value='<?php echo @$token;?>'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Token secret
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" class="text" id="accTokenSecret" name="accTokenSecret" value='<?php echo @$tokensecret;?>' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Token Verifier
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <input type="text" class="text" id="accTokenVerifier" name="accTokenVerifier" value='<?php echo @$tokenverifier;?>' />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td>
                        <input type="submit" class="btn" value="Get access token" onclick="javascript:return getAccTok()" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table>
                            <tr>
                                <td>
                                    API Request
                                </td>
                                <td>
                                    API Response
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea id="accessRequest"><?php echo @$accessrequest;?></textarea>
                                </td>
                                <td>
                                    <textarea id="accessResponse"><?php echo @$accessresponse;?></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="rowHeader nonoutlook step4">
                Step4 : Getting Profile
            </div>
            <table class="nonoutlook">
    <tr>
        <td class="label">Token</td>
        <td>:</td>
        <td><input type="text" class="text" id="conToken" name="conToken" value='<?php echo @$token;?>' /></td>
    </tr>
    <tr>
        <td>Token secret</td>
        <td>:</td>
        <td><input type="text" class="text" id="conTokenSecret" name="conTokenSecret" value='<?php echo @$tokensecret;?>' /></td>
    </tr>
    <tr>
        <td>Token Verifier</td>
        <td>:</td>
        <td><input type="text" class="text" id="conTokenVerifier" name="conTokenVerifier" value='<?php echo @$tokenverifier;?>' /></td>
    </tr>
    <tr>
        <td>User Id</td>
        <td>:</td>
        <td><input type="text" class="text" id="conUserId" name="conUserId" value='<?php echo @$userid;?>' /></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td>
            <input type="submit" class="btn" value="Get contacts" onclick="javascript:return getContacts()"/>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <table>
                <tr>
                    <td>
                        API Request
                    </td>
                    <td>
                        API Response
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea id="conRequest"><?php echo @$contactsrequest;?></textarea>
                    </td>
                    <td>
                        <textarea id="conResponse"><?php echo @$contactsresponse;?></textarea>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>
   
    <script type="text/javascript">
        /*
        *
        *   PREREQUESITE STEP 1: Formatting the license key
        *
        */

        //Code to Format the license key
        var licenses = "<?php echo @$license ?>"; //comma seperated
        SI.initialize({
            //Your original license key here
            license: licenses,
            callback: function (sigData) {
                //Get your formatted signature key here
                document.getElementById("formattedKey").value = sigData[licenses];
            }
        });

        
        var getAuthUrl = function () {
            $("#reqtype").val("getauthurl");
            $(".loading").show();
            return true;
        }
        var authUser = function () {
            window.location.href = $("#txtAuthUrl").val();
        }
        var getAccTok = function () {
            $("#reqtype").val("getaccesstoken");
            $(".loading").show();
            return true;
        }
        var getContacts = function () {
            $("#reqtype").val("getcontacts");
            $(".loading").show();
            return true;
        }
        var getOutlookContacts = function () {
            $("#reqtype").val("getoutlookcontacts");
            $(".loading").show();
            return true;
        }



    </script>

    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</body>
</html>

