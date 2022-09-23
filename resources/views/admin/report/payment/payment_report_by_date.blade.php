<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Reports</title>



    <!-- style -->
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-right: 16px solid green;
            border-bottom: 16px solid red;
            border-left: 16px solid pink;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }






        body {
            overflow: hidden;
        }


        /* Preloader */

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            /* change if the mask should have another color then white */
            z-index: 99;
            /* makes sure it stays on top */
        }

        #status {
            width: 200px;
            height: 200px;
            position: absolute;
            left: 50%;
            /* centers the loading animation horizontally one the screen */
            top: 50%;
            /* centers the loading animation vertically one the screen */
            background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
            /* path to your loading animation */
            background-repeat: no-repeat;
            background-position: center;
            margin: -100px 0 0 -100px;
            /* is width and height divided by two */

            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-right: 16px solid green;
            border-bottom: 16px solid red;
            border-left: 16px solid pink;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        * {
            margin: 0;
            padding: 0;
            outline: 0;
        }


        @media print {
            .container {
                max-width: 98%;
                margin: 0 auto 10px;

            }


            @page {
                size: A4 landscape;
                margin: 15mm 0mm 10mm 0mm;
                /* top, right,bottom last value was= 10, left */

            }

            a[href]:after {
                content: none !important;
            }
        }


        .main__wrap {
            width: 90%;
            margin: 20px auto;
        }

        .header__part {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .title__part {
            text-align: center;
        }

        .table__part {
            display: flex;
        }

        table {
            width: 100%;
            padding: 5px;
        }

        table,
        tr {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        table th {
            font-size: 13px;
        }

        table td {
            text-align: left;
            font-size: 13px;

        }

        th,
        td {
            padding: 5px 2px;
            /* Top,Right,Bottom,left */
        }

        .td__left {

            text-align: left
        }

        .td__center {
            text-align: center
        }

        .td__right {
            text-align: right
        }

        .td__name {
            padding-bottom: 25px;
        }

        .td__bold {
            font-weight: 700;
        }

        .td__emplyoeeId {
            font-size: 14px;
            padding-bottom: 25px;
            color: blue;
            font-weight: 900;
            text-align: center
        }

        .td__sponser {
            color: green;
            font-weight: 300;
            text-align: center;

        }

        .sponser__name {
            font-size: 10px;
            font-weight: 100;

        }

        .country {
            color: red;
            text-align: center;
            font-size: 10px;
        }

        .employe__trade {
            color: red;
            text-align: center;
            font-size: 10px;
        }

        .td__project {
            font-size: 8px;
            padding-bottom: 5px;
            color: red;
            font-weight: 100;
            text-align: center;

        }


        .td__multi__project {
            font-size: 10px;
            color: red;
            text-align: center
        }


        .td__red__color {
            color: red;
            text-align: center;
        }

        .td__total {
            font-weight: bold;
            text-align: center;
            color: black;
            font-size: 14px;
        }

        .box__signature {
            width: 200px;
            height: 30px;
            border: 1px solid gray;
            margin-top: 5px;
            margin-left: 0px;
        }

        .td__gross_salary {
            font-size: 14px;
            color: navy;
            font-weight: 900;
            text-align: center
        }
        .table-margin-top{
            margin-top:20px
        }
    </style>
    <!-- style -->
</head>

<body>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>


    <div class="main__wrap">
        <!-- header part-->
        <section class="header__part">
            <!-- date -->
            <div class="date__part">
                <p> Payment Collected Date : <strong class="td__red__color"> {{ $date }} </strong> </p>
            </div>
            <!-- title -->
            <div class="title__part">

                <!-- preloder -->
                <!-- <div class="loader"></div> -->
                <!-- preeloder -->


                <h4>{{ $companyRecords->ComNameEnlish }}</h4>
                <address class="address">
                    {{ $companyRecords->Address }}
                </address>
            </div>
            <!-- print button -->
            <div class="print__part">
                <p> <strong>Print Date</strong> {{ Carbon\Carbon::now()->format('d/m/Y') }} </p>

                <button type="" onclick="window.print()" class="print__button">Print</button>
            </div>
        </section>

        <section class="table__part">
            <table>
                <thead>
                    <tr>
                        <th> Customer Name </th>
                        <th> Payment Date </th>
                        <th> Pay Month </th>
                        <th> Collected By </th>
                        <th> Amount </th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $totalAmount = 0;
                    @endphp

                    @foreach($paymentRecords as $aRecord)

                        @php 
                            $totalAmount += $aRecord->amount;
                        @endphp
                        <tr style="border:0; padding:0">
                            <td class="td__center">{{ $aRecord->customerName }}</td>
                            <td class="td__center">{{ $aRecord->paymentDate }}</td>
                            <td class="td__center">{{ $aRecord->month_name }}</td>
                            <td class="td__center">{{ $aRecord->name }}</td>
                            <td class="td__center">{{ $aRecord->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="table__part table-margin-top" style="width:250px;float:right">
            <table>
                <thead>
                    <tr>
                        <th>Total = </th>
                        <td>{{ $totalAmount }}</td>
                    </tr>
                </thead>
            </table>
        </section>

        </section>
        {{-- Officer Signature --}}
        <div class="row" style="padding-top: 100px;">
            <div class="officer-signature" style="display: flex; justify-content:space-between">
                <p>Accountant</p>
                <p>Verified</p>
                <p>General Manager</p>
            </div>
        </div>
        {{-- Officer Signature --}}
        <section>
            
    </div>
</body>

<script>
    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    })
</script>

</html>