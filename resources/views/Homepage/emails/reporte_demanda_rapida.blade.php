<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Reporte de Demanda Rapida de Inmuebles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; border: 1px solid #cccccc;">
            <tr>
                <td align="center" bgcolor="#ffffff" style="padding: 40px 0 30px 0; padding: 20px 0 30px 0;">
                    <img src="http://www.realstate360.com/img/logo/rs_logo.png" alt="RealState360 Logo" width="300" style="display: block;" />
                </td>
                
            </tr> 
            <tr>
                <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                    <table border="0" cellpadding="5" cellspacing="5" width="100%">
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;">
                                <h2>¡Hola! {{ $user->name }}</h2>
                                <p style="">Un visitante de RealState360 ha realizado una búsqueda de inmuebles que tiene coincidencias con inmuebles publicados.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;">
                                <strong>Nombre:</strong> {{ $username }} {{ $lastname}}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;">
                                <strong>Corrreo Electrónico:</strong> {{ $email }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;">
                                <strong>Teléfono:</strong> {{ $telephone }}
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px;">
                                <h4><strong>Descripción:</strong></h4>
                                <p> 
                                    {{ $descripcion }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor="#104474" style="padding: 30px 30px 30px 30px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td width="75%" style="color: #FFFFFF; font-family: Arial, sans-serif; font-size: 18px;">
                                &reg; RealState360 2018
                            </td>
                            <td align="right">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>

