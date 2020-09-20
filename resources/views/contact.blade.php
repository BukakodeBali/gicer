<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body {
            font-family: 'Arial';
            background-color: #f5f5f5;
        }
        .container {
            padding-top: 10%;
        }
        .row {
            width: 100%;
            display: inline-flex;
            margin-left: 15px;
            margin-right: 15px;
        }

        .col-3 {width: 25%;}
        .col-6 {width: 50%;}

        .card {
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .card-body {
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }
        p {
            color: #5d5d5d
        }
        .message-body {
            padding: 10px;
        }
        .card-footer {
            text-align: center;
            padding: 10px;
            padding-bottom: 30px;
        }
        .card-footer span {
            font-size: 12px;
            color: #8b8b8b;
        }
        @media only screen and (max-width: 768px) {
            .sm-0 {
                width: 0px;
            }
            .sm-12 {
                width: 100%
            }
            .container {
                padding-top: 10px;
            }
        }
    </style>
</head>
<body>
<span style="display: none">Pesan dari pengunjung website</span>
<div class="container">
    <div class="row">
        <div class="col-3 sm-0">
        </div>
        <div class="col-6 sm-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center" style="margin-bottom: 0.1em">
                        Contact Form
                    </h2>
                    <p class="text-center" style="margin-top: 0px">
                        Pesan dari pengunjung website
                    </p>
                    <div class="message-body">
                        <p>
                            <b>Nama &nbsp;&nbsp;&nbsp;:</b> {{ $data['name'] }}
                        </p>
                        <p>
                            <b>Email &nbsp;&nbsp;&nbsp;:</b>
                            <a href="mail-to:{{ $data['email'] }}"> {{ $data['email'] }}</a>
                        </p>
                        <p>
                            <b>Subject&nbsp;:</b> {{ $data['subject'] }}
                        </p>
                        <p>
                            <b>Pesan &nbsp;&nbsp;: </b> {{ $data['message'] }}
                        </p>
                    </div>
                </div>
                <div class="card-footer">
						<span>
							Jangan pernah lewatkan email pelanggan Anda :-)
						</span>
                    <br>
                    <span>
							ksmanajamen.com &copy; {{ date('Y') }}
						</span>
                </div>
            </div>
        </div>
        <div class="col-3 sm-0"></div>
    </div>
</div>
</body>
</html>
