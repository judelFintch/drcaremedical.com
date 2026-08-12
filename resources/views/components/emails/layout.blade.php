<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRC CARE MEDICAL</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f5f7; font-family: -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; color:#101720;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f5f7; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" style="max-width:560px; background-color:#ffffff; border-radius:12px; overflow:hidden;">
                    <tr>
                        <td style="background-color:#0b2545; padding:24px 32px;">
                            <span style="display:inline-block; width:36px; height:36px; line-height:36px; text-align:center; background-color:#ffffff; color:#0b2545; font-weight:700; font-size:13px; border-radius:6px; vertical-align:middle;">DC</span>
                            <span style="color:#ffffff; font-weight:700; font-size:15px; margin-left:10px; vertical-align:middle;">DRC CARE MEDICAL</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            {{ $slot }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 32px; background-color:#f2f5f7; font-size:12px; color:#6b7785;">
                            DRC CARE MEDICAL — 196 Avenue Kapenda, Lubumbashi, RDC<br>
                            {{ implode(' · ', config('drc.company.phones')) }} · {{ config('drc.company.email') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
