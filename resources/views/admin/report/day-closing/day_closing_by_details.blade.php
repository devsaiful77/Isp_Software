<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Invoice</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
                margin: 0;
            }
            table{
                border-spacing: 0;
            }
            td{
                padding: 0;
            }

            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
            .gray {
                background-color: lightgray
            }
            .font{
            font-size: 15px;
            }
            .authority {
                /*text-align: center;*/
                float: right
            }
            .authority h5 {
                margin-top: -10px;
                color: green;
                /*text-align: center;*/
                margin-left: 35px;
            }
            .thanks p {
                color: green;;
                font-size: 16px;
                font-weight: normal;
                font-family: serif;
                margin-top: 20px;
            }

            .main-border{
                border: 1px solid;
            }
            .table-border{
                border: 1px solid;
                font-size: 11px;
                text-align: center;
                padding: 5px 0px;
            }
            .single-padding{
                padding: 10px;
            }
            .single-paddingTwo{
                padding: 15px 0px;
            }
            .single-padding-three{
                padding: 5px;
            }
            table.main-body-border {
                border: 2px solid #000000;
                margin: 80px 0px 20px 80px;
                padding: 0px 0px 20px 0px;
            }
        </style>
    </head>
    <body>
        <table class="main-body-border">
            <tr>
                <td>

                    <table width="100%" style="margin: 15px 5px;">
                        <tr>
                            <td>
                                <table width="1100" valign="top">
                                    <tr>
                                        <td style="width: 366px;" valign="top" align="left">
                                            <div class="date__part">
                                                <p> Month : ------ </p>
                                            </div>
                                        </td>
                                        <td style="width: 366px;" valign="top" align="center">
                                            <div class="title__part">
                                                <div class="date__part">
                                                    <p> Address</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 366px;" valign="top" align="right">
                                            <div class="date__part">
                                                <p>Date:15-06-2022</p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" style="padding: 10px 5px 10px 5px;">
                        <tr>
                            <td width="1100" valign="top">
                                <p class="font" style="font-size: 13px;">Income:</p>
                            </td>
                        </tr>
                    </table>
                    <table width="1000" style="margin: 0px 0px 0px 50px;">
                        <tr>
                            <th class="table-border">Sl No.</th>
                            <th class="table-border">Title</th>
                            <th class="table-border">Remarks</th>
                            <th class="table-border">From Date</th>
                            <th class="table-border">To Date</th>
                            <th class="table-border">Amount</th>
                        </tr>
                        <tr>
                            <td class="table-border">1</td>
                            <td class="table-border">ABC</td>
                            <td class="table-border">Good</td>
                            <td class="table-border">14-06-2022</td>
                            <td class="table-border">14-05-2022</td>
                            <td class="table-border">2000</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="font-size: 14px;padding-top: 10px;" align="right">Sub Total =</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" style="padding: 10px 5px 10px 5px;">
                        <tr>
                            <td width="1100" valign="top">
                                <p class="font" style="font-size: 13px;">Expense:</p>
                            </td>
                        </tr>
                    </table>
                    <table width="1000" style="margin: 0px 0px 0px 50px;">
                        <tr>
                            <th class="table-border">Sl No.</th>
                            <th class="table-border">Title</th>
                            <th class="table-border">Remarks</th>
                            <th class="table-border">From Date</th>
                            <th class="table-border">To Date</th>
                            <th class="table-border">Amount</th>
                        </tr>
                        <tr>
                            <td class="table-border">1</td>
                            <td class="table-border">ABC</td>
                            <td class="table-border">Good</td>
                            <td class="table-border">14-06-2022</td>
                            <td class="table-border">14-05-2022</td>
                            <td class="table-border">2000</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="font-size: 14px;padding-top: 10px;" align="right">Sub Total =</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>