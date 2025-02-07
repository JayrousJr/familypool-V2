<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">


    <!-- Fonts -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <style media="all">
    @page {
        size: A4;
        margin: 10px 15px;
    }

    footer {
        position: fixed;
        bottom: 20px;
        left: 0px;
        right: 0px;
        display: inline;
        border-top: 1px solid black;
    }

    .footer1 {
        float: left;
        font-size: 12px;
        text-align: left;
        font-weight: 500;
    }

    .footer2 {
        float: right;
        display: block;
        font-size: 12px;
        text-align: right;
        margin-left: 250px;
    }



    @media print {

        html,
        body {
            font-family: 'dejavusans';
            width: 210mm;
            height: 297mm
        }
    }

    body {
        font-family: 'dejavusans';
    }

    .header-section {
        text-align: center;
    }

    .header-text {
        font-size: 22px;
        color: black;
    }


    .sub-header {
        font-size: 18px;
        color: black;
    }

    .lower-part {
        display: inline;
        /* margin-bottom: 15px; */
    }

    .company-section {
        border-bottom: 7px solid #389ad2;
        margin-top: 105px;
    }

    .address {
        float: left;
        font-size: 14px;
    }

    .image-part {
        float: right;
        margin-left: 80%;
        width: 120px;
    }

    .table-container {
        margin-top: 15px;
    }

    .tables-row {
        display: inline;
    }

    .left {
        float: left;
    }

    .right {
        float: right;
        margin-left: 37%;
    }



    table {
        color: #fff;
        font-family: 'dejavusans';
        font-size: 12px;
        background-color: #fff;
        margin-bottom: 5px;
    }

    th {
        border: 1px solid #1381ce;
        background-color: #389ad2;
        text-align: center;
    }

    td {
        color: #000;
        border: 1px solid #138ace;
        background-color: #fff;
    }
    </style>
</head>

<body>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 header-section">
                <h2 class="header-text">FAMILY POOL SERVICE</h2>
                <h3 class="sub-header">CUSTOMER SERVICE FORM</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 lower-part">
                <p class="address">
                    FAMILY POOL SERVICE<br>
                    3529 TALL OAKS CIRCLE APT 5,<br>
                    38118 MEMPHIS TENNESSEE, USA.<br>
                    WEB: https://thefamilypool.com/<br>
                    Email: familypoolservice2020@gmail.com<br>
                    Tel: +1 (901) 297 7812</p>
                <div class="image-part">
                    <!-- <img src="{{public_path(url('/assets/logo/logo.jpg'))}}" width="120px"> -->
                    <!-- <img src="/assets/logo/logo.jpg" width="120px"> -->
                </div>
            </div>
        </div>
    </div>
    <div class="company-section"></div>

    <div class="container-fluid table-container">
        <div class="row tables-row">
            <div class="left">
                <table cellpadding="3" cellspacing="0">
                    <tr>
                        <th width="123px" style="text-align: center;" colspan="3"><b>CLARITY</b></th>
                        <th width="123px" style="text-align: center;" colspan="3"><b>COLOR</b></th>
                    </tr>
                    <tr>
                        <td width="123px" style="text-align: center;" colspan="3">&nbsp;</td>
                        <td width="123px" style="text-align: center;" colspan="3"> </td>
                    </tr>
                </table>

                <table cellpadding="2" cellspacing="0">
                    <tr>
                        <th width="240px" style="text-align: center;" colspan="4"><b>MEASUREMENTS</b></th>
                    </tr>
                    <tr>
                        <td width="90px" style="text-align: left;">Free Chlorine
                        </td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">Cyanuric Acid
                        </td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td width="90px" style="text-align: left;">Total Chlorine
                        </td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">Phosphate</td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>

                    <tr>
                        <td width="90px" style="text-align: left;">Ph</td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">Salt</td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>

                    <tr>
                        <td width="90px" style="text-align: left;">Ph Demand</td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">Borates</td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td width="90px" style="text-align: left;">Alkalinity</td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">TDS</td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td width="90px" style="text-align: left;">Calcium</td>
                        <td width="30px" style="text-align: left;"></td>
                        <td width="90px" style="text-align: left;">Temperature</td>
                        <td width="30px" style="text-align: left;"></td>
                    </tr>
                    <tr>
                        <td width="90px">Arrival PSI</td>
                        <td width="30px"></td>
                        <td width="90px">Departure PSI
                        </td>
                        <td width="30px"></td>
                    </tr>
                </table>

                <table cellpadding="3" cellspacing="0">
                    <tr>
                        <th width="252px" style="text-align: center"><b>CHECK LIST</b></th>
                    </tr>
                    <tr colspan="2">
                        <td width="252px"> Water
                            Level <strong></strong></td>
                    </tr>
                    <tr colspan="2">
                        <td width="252px"> Water
                            Faucent <strong></strong></td>
                    </tr>
                    <!--Check boxes here-->
                    <tr>
                        <td width="252px">[ ] Skim
                            Pool </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Check Equipments </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] Gate
                            Closed Blow </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Valves are propely Set </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] Deck
                            Empty </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] MPV
                            Setting </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Skimmers </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] Back
                            Wash </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Brush Pool </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Rinse Cartridge </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Empty Pump Basket </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] Test
                            Water </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Recharge DE </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ] Add
                            Chemical </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Check Clorinator </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Vacuum Pool </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Chlorinator Setting </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Surface Algae </td>
                    </tr>
                    <tr>
                        <td width="252px">[ ]
                            Check pool Cleaner </td>
                    </tr>
                </table>
                <table cellpadding="3" cellspacing="0">
                    <tr>

                        <th width="123px" colspan="">
                            <strong>Description</strong>
                        </th>

                        <th width="123px">
                            <strong>Cost</strong>
                        </th>
                    </tr>
                    <tr>

                        <td width="123px">Labor </td>
                        <td width="123px"></td>
                    </tr>
                    <tr>

                        <td width="123px">Chemicals </td>
                        <td width="123px"> </td>
                    </tr>
                    <tr>

                        <td width="123px">Materials </td>
                        <td width="123px"></td>
                    </tr>
                    <tr>

                        <td width="123px">Sub total</td>
                        <td width="123px"> </td>
                    </tr>
                    <tr>

                        <td width="123px">Sales Tax</td>
                        <td width="123px"> </td>
                    </tr>
                    <tr>

                        <td width="123px">Adjustments
                        </td>

                        <td width="123px"></td>
                    </tr>
                    <tr>

                        <td width="123px" style="background-color: #b8d9ed">Invoice amaount</td>

                        <td width="123px" style="background-color: #b8d9ed">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="right">
                <table cellpadding="2" cellspacing="0">
                    <tr>

                        <td width="220px" colspan="2">Work Order/
                            Invoice <b>
                            </b></td>

                        <td width="220px" colspan="4">Type
                            &nbsp;&nbsp; <b>Service</b></td>
                    </tr>
                    <tr>
                        <td width="220px" colspan="2">Customer&nbsp;&nbsp;
                            <b> {{ $record->name }}</b>
                        </td>

                        <td width="220px" colspan="4">Date&nbsp;&nbsp;
                            <b>{{ date('D M d, Y') }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td width="220px" colspan="2">Address/Zip&nbsp;&nbsp;
                            <b>{{ $record->street }} {{ $record->zip }}</b>
                        </td>

                        <td width="220px" colspan="4">Route&nbsp;&nbsp;
                            <b></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="220px" colspan="2"></td>
                        <td width="220px" colspan="4">Terms&nbsp;&nbsp;
                            <b></b>
                        </td>
                    </tr>
                    <tr>
                        <td width="220px" colspan="2">&nbsp;</td>
                        <td width="220px" colspan="4"></td>
                    </tr>
                    <tr>
                        <th width="165px">
                            <strong>Labour</strong>
                        </th>

                        <th width="56px">
                            <strong>Qty</strong>
                        </th>

                        <th width="72px" colspan="2">
                            <strong>Unit</strong>
                        </th>

                        <th width="72px">
                            <strong>Price</strong>
                        </th>

                        <th width="75px">
                            <strong>Amount</strong>
                        </th>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">&nbsp;
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">&nbsp;
                        </td>

                        <td style="text-align:center" width="72px">&nbsp;
                        </td>

                        <td style="text-align:center" width="75px">&nbsp;
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">&nbsp;
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">&nbsp;
                        </td>

                        <td style="text-align:center" width="72px">&nbsp;
                        </td>

                        <td style="text-align:center" width="75px">&nbsp;
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>

                    <tr>
                        <th width="165px">
                            <strong>Chemicals</strong>
                        </th>

                        <th width="56px">
                            <strong>Cost</strong>
                        </th>

                        <th width="36px">
                            <strong>Qty</strong>
                        </th>

                        <th width="36px">
                            <strong>Unit</strong>
                        </th>

                        <th width="72px">
                            <strong>Price</strong>
                        </th>

                        <th width="75px">
                            <strong>Amount</strong>
                        </th>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Cal
                            Hypo 1#</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">lb</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Chlorine Tab </td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">tab</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Sodium Bicarb #</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">lb</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Acid Qt</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">qt</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Soda Ash</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">lb</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Calcium Chloride
                            Flake #</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">lb</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">Sea
                            Klear Blue Clarifier</td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">oz</td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:center" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>

                    <tr>

                        <td style="text-align:center" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>

                    <tr>

                        <td style="text-align:center" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:center" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px" style="background-color: #b8d9ed">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="36px">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>

                    <tr>

                        <th width="165px">
                            <strong>Chemicals</strong>
                        </th>

                        <th width="56px">
                            <strong>Qty</strong>
                        </th>

                        <th width="72px" colspan="2">
                            <strong>Unit</strong>
                        </th>

                        <th width="72px">
                            <strong>Price</strong>
                        </th>

                        <th width="75px">
                            <strong>Amount</strong>
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>
                    <tr>

                        <td style="text-align:left" width="165px">&nbsp;
                        </td>

                        <td style="text-align:center" width="56px">
                        </td>

                        <td style="text-align:center" width="72px" colspan="2">
                        </td>

                        <td style="text-align:center" width="72px">
                        </td>

                        <td style="text-align:center" width="75px">
                        </td>
                    </tr>

                </table>

                <table cellpadding="2" cellspacing="0">
                    <tr>
                        <th width="100px"><b>Technician 1</b></th>

                        <th width="100px"><b>Technician 2</b></th>

                        <th width="86px"><b>Date</b></th>
                        <th width="80px"><b>Arrive</b></th>

                        <th width="80px"><b>Departure</b></th>
                    </tr>
                    <tr>
                        <td width="100px">&nbsp;</td>
                        <td width="100px">&nbsp;</td>
                        <td width="86px">&nbsp;</td>
                        <td width="80px">&nbsp;</td>
                        <td width="80px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100px">&nbsp;</td>
                        <td width="100px">&nbsp;</td>
                        <td width="86px">&nbsp;</td>
                        <td width="80px">&nbsp;</td>
                        <td width="80px">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="434px" colspan="5">Work Startus</td>
                    </tr>
                </table>

                <table cellpadding="3" cellspacing="0">
                    <tr>

                        <th width="440px"><b>For
                                Customer</b></th>
                    </tr>
                    <tr>

                        <td width="462px">

                            <p>I declare that all Services described on this work order have been completed to my
                                satisfaction </p>
                            <p>Paid By __________________________________ Check If ______________________
                            </p>
                            <p> Amount paid _____________________
                            </p>

                            <p>Signature __________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date:
                                _____________________</p>

                        </td>
                    </tr>
                </table>

                <table cellpadding="3" cellspacing="0">
                    <tr>

                        <th width="462px" style="text-align: center">
                            <h3><b>** USE
                                    CUSTOMER CHEMICALS FIRST **</b>
                            </h3>
                        </th>
                    </tr>
                    <tr>

                        <td width="462px" height="80px">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <footer>
            <div class="footer1">
                <p>FAMILY POOL SERVICE</p>
            </div>
            <div class="footer2">
                <span style="margin-right: 100px;">Page 1 of 1</span><span style="margin-left: 80px;">ONILINE
                    INVOICING SYSTEM</span>

            </div>
        </footer>
    </div>
</body>

</html>