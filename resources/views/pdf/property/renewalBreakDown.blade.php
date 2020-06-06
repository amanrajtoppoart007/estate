<html lang="en">

<head>

    <style>

    </style>
</head>

<body>


<div>
    <div style="font-family: serif;">
        <table style="margin-bottom:2px;width: 100%;text-align: center;">
            <tbody>
            <tr>
                <td style="padding:5px 10px;border: unset;">
                    <h4><strong>RENEWAL BREAKDOWN</strong></h4>
                </td>
            </tr>
            </tbody>
        </table>
        <table style="width: 100%;border-spacing: 10;text-align: left;">
            <tbody>
            <tr>
                <th style="text-decoration: underline;"><strong>Sunlight</strong></th>
                <td style=""><strong><span style="float:right;">15/04/2020</span></strong></td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">Name :</th>
                <td style="border: 1px solid #000;">{{$tenant->name}}</td>
            </tr>
            <tr>
                <th colspan="1" style="text-decoration: underline;">
                    Mobile number :
                </th>
                <td>
                    <table style="border-spacing: 0; width: 100%;">
                        <tr>
                            <td colspan="4" style="border: 1px solid #000;color:blue;">{{$tenant->mobile}}</td>
                            <th colspan="4" style="border: 1px solid #000;background: #46d346;">
                                Family
                            </th>
                            <td colspan="4" style="border: 1px solid #000;">Bachelor</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Email :
                </th>
                <td>
                    <table style="border-spacing: 0; width: 100%;">
                        <tr>
                            <td colspan="3" style="border: 1px solid #000;color:blue;">najreenk.786@gmail.com</td>
                            <th colspan="3" style="border: 1px solid #000;">
                                Nationality
                            </th>
                            <td colspan="3" style="border: 1px solid #000;">Indian</td>
                            <th colspan="3" style="border: 1px solid #000;">
                                PO BOX :
                            </th>
                            <td colspan="3" style="border: 1px solid #000;">0125454</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">Flat  Information</th>
                <td></td>
            </tr>
            <tr>
                <td style="">
                    <table  style="border-spacing: 0; width: 80%; float:left;">
                        <tr>
                            <th style="border: 1px solid #000; width:50%;">
                                Flat  No :
                            </th>
                            <td style="border: 1px solid #000; width:50%;">456</td>
                        </tr>
                    </table>
                </td>
                <td style="">
                    <table style="border-spacing: 0; width: 70%;">
                        <tr>
                            <td style="border: 1px solid #000;">1 BR</td>
                            <td style="border: 1px solid #000; background: #46d346;">2 BR</td>
                            <th style="border: 1px solid #000;">
                                Studio
                            </th>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Rent Amount
                </th>
                <td style="">
                    <table  style="border-spacing: 0; width: 70%;">
                        <tr>
                            <td style=" text-transform: uppercase;">AED</td>
                            <td style="border: 1px solid #000;text-align:center;">
                                30,000
                            </td>
                            <th style="border: 1px solid #000;text-align:center;">
                                Payments
                            </th>
                            <td style="border: 1px solid #000;text-align:center;">4</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Rent Period :
                </th>
                <td style="">
                    <table  style="border-spacing:0;width: 70%; text-align:left;">
                        <tr>
                            <td style="border: 1px solid #000;">15/04/2020</td>
                            <td style="border: 1px solid #000;">15/04/2020</td>
                            <th> 2nd </th>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Parking :
                </th>
                <td style="">
                    <table  style="border-spacing:0;width: 70%; text-align:left;">
                        <tr>
                            <td style="border: 1px solid #000;background: #46d346;">Yes</td>
                            <td style="border: 1px solid #000;">No</td>
                            <td style="border: 1px solid #000;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <table style="width: 100%;border-spacing: 10;text-align: left;background: url({{asset('img/pdf-bg-image.png')}}) no-repeat center;">
            <tbody>
            <tr>
                <th style="text-decoration: underline;">
                    Details of  Cash  First  Payment
                </th>
                <td style="border: 1px solid; text-transform: uppercase;text-align: right;">AED</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Security Deposit :
                </th>
                <td style="border: 1px solid;text-align: right;"> </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Municipality Fees (4%AED from Rent Value ) :
                </th>
                <td style="border: 1px solid; text-align: right;">1,200.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Commission :
                </th>
                <td style="border: 1px solid; text-align: right;">1,575.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Contract :
                </th>
                <td style="border: 1px solid; text-align: right;">173.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    SEWA DEPOSIT :
                </th>
                <td style="border: 1px solid; text-align: right;"> </td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    First Installment :
                </th>
                <td style="border: 1px solid; text-align: right;">7,500.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Total First Payment :
                </th>
                <td style="border: 1px solid; text-align: right;background: yellow;">7,500.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Advance
                </th>
                <td style="border: 1px solid; text-align: right;">7,500.00</td>
            </tr>
            <tr>
                <th style="text-decoration: underline;">
                    Balance
                </th>
                <td style="border: 1px solid; text-align: right;">7,500.00</td>
            </tr>
            </tbody>
        </table>

        <table style="border-collapse: collapse; text-align: center;" width="100%" border="1">
            <thead>
            <tr>
                <th>Amount</th>
                <th>Bank Name</th>
                <th>Cheque No</th>
                <th>Cheque date </th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <tr style="">
                <td>7,500.0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>15/04/2020</td>
            </tr>
            <tr style="">
                <td>7,500.0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>15/04/2020</td>
            </tr>
            <tr style="">
                <td>7,500.0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>15/04/2020</td>
            </tr>
            <tr style="">
                <td>7,500.0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>15/04/2020</td>
            </tr>
            <tr style="">
                <td>7,500.0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>15/04/2020</td>
            </tr>
            </tbody>
        </table>
        <p style="margin-top: 15px;">Documents Required <span style="color:red;"> (renewal)</span> </p>
        <table>
            <tbody>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">1</td>
                <td colspan="9">Lessee Passport Copy For First Page & Residence Page With Valid Date </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">2</td>
                <td colspan="9">Lessee VISA  Copy  Page With Valid Date</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">3</td>
                <td colspan="9">UAE IDENTITY CARD ( ID )</td>
            </tr>
            </tbody>
        </table>

        <p style="margin-top: 15px;">TERMS & CONDITIONS <span style="color:red;"> (renewal)</span> </p>
        <table>
            <tbody>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">1</td>
                <td colspan="9">In case of first payment by cheque , contract will be register after the cheque is cleared.</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">2</td>
                <td colspan="9">The tenant must notify if he will renew or vacte the flat atleast two months before the contract expires.</td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">3</td>
                <td colspan="9">If the tenant fails to notify within two months,  it means the tenat agrees to renew on the same terms and conditon</td>
            </tr>
            <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">4</td>
            <td colspan="9">If you will choose terminate your lease after renewal, Two month penalty will be applied.</td>
            </tr>
            <td colspan="3" style="border: 1px solid;text-align: center;padding: 5px 10px;">5</td>
            <td colspan="9">Management fee of  1500 + vat will be applied every renewal</td>
            </tr>
            </tbody>
        </table>


        <p>
            <strong><span style="color:red;">Note: </span> <span style="background: yellow;">Please prepare the management fee in a separate cheque.</span></strong>
        </p>
    </div>
</div>

</body>

</html>
