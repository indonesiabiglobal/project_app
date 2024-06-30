<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: #CCCCCC;margin: 0">
    <div align="center">
        <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="700" style="padding:25px">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                                <td>
                                    <h1>Fukusuke - Order Form</h1>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" border="1" cellpadding="3">
                            <tr>
                                <td>
                                    Tanggal Proses
                                </td>
                                <td>
                                    {{ $processdate }} - Nomor : 33
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PO Number
                                </td>
                                <td>
                                    {{ $po_no }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Order
                                </td>
                                <td>
                                    {{ $order_date }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nomor Order
                                </td>
                                <td>
                                    {{ $code }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Produk
                                </td>
                                <td>
                                    {{ $name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dimensi
                                </td>
                                <td>
                                    {{ $dimensi }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jumlah Order
                                </td>
                                <td>
                                    {{ $order_qty }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Stufing
                                </td>
                                <td>
                                    {{ $stufingdate }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal ETD
                                </td>
                                <td>
                                    {{ $etddate }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal ETA
                                </td>
                                <td>
                                    {{ $etadate }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nama Buyer
                                </td>
                                <td>
                                    {{ $namabuyer }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>