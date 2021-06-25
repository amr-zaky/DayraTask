 <!DOCTYPE html>
    <html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>
        <!--[if mso]>
        <style>
            table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
            div, td {padding:0;}
            div {margin:0 !important;}
        </style>
        <noscript>
            <xml>
                <o:OfficeDocumentSettings>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
            </xml>
        </noscript>
        <![endif]-->
        <style>
            table, td, div, h1, p {
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
    <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">

        <p>Dear {{$data['name']}},</p>

        <p>I hope This mail find you well ,this is your Invoice Details</p>

        Name: {{$data['name']}}
        <br>
        Mobile: {{$data['mobile']}}
        <br>
        Invoice Amount: {{$data['amount']}}
        <br>
        Date : {{$data['date']}}
        <br>
        Thanks,<br>
        {{ config('app.name') }}

    </div>
    </body>
    </html>
