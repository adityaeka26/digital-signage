<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon2.png" title="favicon">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/datatables.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/style.css" />
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col {
            flex: 1;
            height: 200px;
            border: 1px solid red;
            margin: 10px;
            display: flex;
            padding: 0;
        }
        .photo {
            flex: 30%;
            background: yellow;
        }
        .desc {
            flex: 70%;
            background: green;
        }
        #col1 {
            /* background: purple; */
        }
        #col2 {
            /* background: green; */
        }
        #col3 {
            /* background: red; */
        }
        #col4 {
            /* background: yellow; */
        }
    </style>
</head>
<body>
    <div class="main mx-auto container">
        <div class="row">
            <div class="col" id="col1">
                <div class="photo">
                    <img style="width:100%;" src="<?=base_url()?>assets/img/profilepict.png" alt="">
                </div>
                <div class="desc">

                </div>
            </div>
            <div class="col" id="col2">

            </div>
        </div>
        <div class="row">
            <div class="col" id="col3">

            </div>
            <div class="col" id="col4">

            </div>
        </div>
    </div>
</body>
</html>