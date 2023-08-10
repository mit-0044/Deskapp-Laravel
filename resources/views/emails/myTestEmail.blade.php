<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        body {
            background-color: #ffffff;
            color: #718096;
            height: 100%;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        .wrapper,
        .content {
            background-color: #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .logo {
            max-width: 100%;
            border: none;
            height: 100px;
            max-height: 100px;
            width: 100px;
        }

        .body,
        .header,
        .footer {
            background-color: #edf2f7;
            /* background-color: #bbc2c9; */
            border-bottom: 1px solid #edf2f7;
            border-top: 1px solid #edf2f7;
            margin: 0;
            padding: 0;
            width: 100%;
            border: hidden !important;
        }

        .inner-body {
            background-color: #ffffff;
            border-color: #e8e5ef;
            border-radius: 5px;
            border-width: 1px;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
            margin: 28px auto 20px auto;
            padding: 15px 25px 15px 25px;
            width: 570px;
        }

        .browser span {
            display: flex;
            margin-top: -22px;
            padding: 0px 55px 0px 100px;
        }

        .footer {
            margin: 0 auto;
            justify-items: center;
            padding: 30px;
            text-align: center;
            width: 570px;
        }

        .label {
            display: inline !important;
            margin-left: 30px;
            font-size: 15px;
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        @media screen and (min-device-width : 320px) and (max-device-width : 480px) {

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="col-md-12 body my-auto text-center p-0" width="100%" style="margin: auto;">
            <div class="col-md-12 header" style=" padding: 25px 0; text-align: center;">
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            </div>
            <div class="col-md-12 inner-body text-center">
                <h2 class="font-18 weight-500 mt-0 text-left" style="color: #3d4852;">Hello!</h2>
                <p>Your account logged in from a new device.</p>
                <div class="main-content" style="margin-top: 20px; margin-bottom: 20px;">
                    <div style="col-md-8">
                        <div class="form-group">
                            <h3 class="label">Account:</h3> <span class="weight-500">Example@gmail.com</span>
                        </div>
                    </div>
                    <div style="col-md-8">
                        <div class="form-group">
                            <h3 class="label">Time:</h3> <span class="weight-500">Saturday, July 8th 2023, 10:48:04 AM, IST</span>
                        </div>
                    </div>
                    <div style="col-md-8">
                        <div class="form-group">
                            <h3 class="label">IP Address:</h3> <span class="weight-500">127.0.0.1</span>
                        </div>
                    </div>
                    <div style="col-md-8">
                        <div class="form-group browser">
                            <h3 class="label">Browser:</h3> <span class="weight-500">Mozilla/5.0 (Windows NT 10.0;
                                Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36</span>
                        </div>
                    </div>
                    <div style="col-md-8">
                        <div class="form-group">
                            <h3 class="label">Location:</h3> <span class="weight-500">{{ 'New Haven, United States' }}</span>
                        </div>
                    </div>
                </div>
                <p>If this was you, you can ignore this alert. if you susspect any suspicious activity on your
                    account, please change your password.</p>
                <p>Regards,<br>Laravel</p>
            </div>
            <div class="col-md-12 footer text-center">
                <p>© 2023 Laravel. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
