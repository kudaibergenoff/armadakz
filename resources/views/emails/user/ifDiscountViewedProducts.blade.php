@extends('emails._layout')

@section('title',"Скидка на недавно просмотренные товары" )

@section('content')
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center">
                <table cellspacing="0" cellpadding="0" style="width: 100%; max-width: 640px; background: #FFFFFF; border-radius: 20px;">
                    <tr>
                        <td>
                            <!-- HEADER STARTS -->
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-bottom: 1px solid #f1f1f1;">
                                <tr>
                                    <td align="left" style="padding: 1rem 2rem;">
                                        <img src="img/logo.png" width="150px" alt="ARMADA" class="header-logo">
                                    </td>
                                    <td align="right" style="font-size: 12px; padding: 1rem 2rem;">
                                        <p style="margin: 0">Торговый комплекс <br> Мебель. Интерьер. Стройматериалы</p>
                                    </td>
                                </tr>
                            </table>
                            <!-- HEADER END -->
                            <!-- CONTENT STARTS -->
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding: 1rem 2rem;">
                                        <h2 style="margin: 0">Здравствуйте, Дмитрий!</h2>
                                        <p>На товары которыеы вы недавно просматривали, действует скидка <b style="color: #d60019">до 25%</b></p>

                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 2.25rem">
                                            <tr>
                                                <td style="padding: 1rem;" width="50%" class="sm-width-100">
                                                    <div style="text-align: center; border: 1px solid #f1f1f1; padding: 1rem">
                                                        <img src="img/product.jpg" height="200px" style="margin: auto" alt="Product alt">
                                                    </div>
                                                    <h4 style="margin-bottom: 0">Диван-кровать Сириус Blue темно-голубого цвета</h4>
                                                    <h3 style="margin: .7rem 0"><b style="color: #d60019">15 000 грн</b></h3>
                                                    <a href="#">Перейти к товару</a>
                                                </td>
                                                <td style="padding: 1rem;" width="50%" class="sm-width-100">
                                                    <div style="text-align: center; border: 1px solid #f1f1f1; padding: 1rem">
                                                        <img src="img/product-2.png" height="200px" style="margin: auto" alt="Product alt">
                                                    </div>
                                                    <h4 style="margin-bottom: 0">Диван-кровать Сириус Blue темно-голубого цвета</h4>
                                                    <h3 style="margin: .7rem 0"><b style="color: #d60019">12 000 грн</b></h3>
                                                    <a href="#">Перейти к товару</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 1rem;" width="50%" class="sm-width-100">
                                                    <div style="text-align: center; border: 1px solid #f1f1f1; padding: 1rem">
                                                        <img src="img/product-2.png" height="200px" style="margin: auto" alt="Product alt">
                                                    </div>
                                                    <h4 style="margin-bottom: 0">Диван-кровать Сириус Blue темно-голубого цвета</h4>
                                                    <h3 style="margin: .7rem 0"><b style="color: #d60019">15 000 грн</b></h3>
                                                    <a href="#">Перейти к товару</a>
                                                </td>
                                                <td style="padding: 1rem;" width="50%" class="sm-width-100">
                                                    <div style="text-align: center; border: 1px solid #f1f1f1; padding: 1rem">
                                                        <img src="img/product.jpg" height="200px" style="margin: auto" alt="Product alt">
                                                    </div>
                                                    <h4 style="margin-bottom: 0">Диван-кровать Сириус Blue темно-голубого цвета</h4>
                                                    <h3 style="margin: .7rem 0"><b style="color: #d60019">12 000 грн</b></h3>
                                                    <a href="#">Перейти к товару</a>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 35px">
                                            <tr>
                                                <td colspan="2" style="padding: 20px 0; border-top: 1px solid #f1f1f1;">
                                                    <h2 style="margin: 0">Нужна помощь?</h2>

                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                        <tr valign="top">
                                                            <td width="45%" class="sm-width-100">
                                                                <p style="margin-bottom: 0">Круглосуточная поддержка по телефонам:</p>
                                                                <a href="tel:11111111111">+1 (111) 11 11 111</a><br>
                                                                <a href="tel:22222222222">+2 (222) 22 22 222</a>
                                                            </td>
                                                            <td width="45%" class="sm-width-100 sm-px-0" style="padding-left: 40px;">
                                                                <p style="margin-bottom: 15px">Консультация в мессенджерах:</p>
                                                                <a href="#"><img src="img/telegram.png" height="30px" alt="" style="margin-right: 10px"></a>
                                                                <a href="#"><img src="img/viber.png" height="30px" alt="" style="margin-right: 10px"></a>
                                                                <a href="#"><img src="img/whatsup.png" height="30px" alt=""></a>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                            <!-- CONTENT END -->
                            <!-- FOOTER STARTS -->
                            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="background: #535353; color: #FFFFFF; font-size: 12px; border-radius: 0 0 20px 20px;">
                                <tr>
                                    <td align="left" style="padding: 1rem 2rem;">
                                        <img src="img/logo--white.png" width="100px" alt="">
                                    </td>
                                    <td align="right" style="padding: 1rem 2rem;">
                                        <div>Алматы, ул. Каблова (Марченка) 1.8, ул. Саина</div>
                                        <div style="color: #bfbfbf;">© TK ARMADA, 2020</div>
                                    </td>
                                </tr>
                            </table>
                            <!-- FOOTER END -->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
