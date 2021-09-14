@extends('emails._layout')

@section('title',"Рассылка" )

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
                                        <img src="{{ asset('img/logo.png') }}" width="150px" alt="ARMADA" class="header-logo">
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

                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td>
                                                    {!! $mailing->text !!}
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
                                        <img src="{{ asset('img/logo--white.png') }}" width="100px" alt="">
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
