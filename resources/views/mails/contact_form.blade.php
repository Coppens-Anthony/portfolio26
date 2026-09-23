<!DOCTYPE html>
<html lang="{!! App::getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: 'Poppins', 'Nunito', Helvetica, sans-serif;
            margin: 0;
            padding: 40px 16px;
            background: #F8F8FB;
            color: #000;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 24px;
            overflow: hidden;
        }

        .header {
            background: #4F3FE0;
            padding: 40px 40px 36px;
            text-align: center;
        }

        .header p.eyebrow {
            margin: 0 auto 8px;
            width: fit-content;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #EEEEF5;
            opacity: 0.85;
        }

        .header h1 {
            margin: auto;
            font-size: 22px;
            font-weight: 600;
            color: white;
            width: fit-content;
        }

        .body {
            padding: 40px;
        }

        .intro {
            text-align: center;
            margin: 23px 0;
            font-size: 14px;
            line-height: 1.5;
            color: #555;
        }

        .box {
            background: #EEEEF5;
            width: 100%;
            border-collapse: separate;
            border-radius: 16px;
        }

        .box-cell {
            padding: 20px 24px;
        }

        .box-row + .box-row .box-cell {
            border-top: 1px solid #DEDEF0;
        }

        .label {
            font-weight: 600;
            font-size: 11px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #4F3FE0;
            margin: 0 0 6px;
        }

        .value {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: #000;
        }

        .cta {
            margin: 32px 0;
            text-align: center;
        }

        .cta a {
            display: inline-block;
            background: #4F3FE0;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 999px;
        }

        .footer {
            padding: 24px 40px 32px;
            text-align: center;
        }

        .footer p {
            margin: 16px 0;
            font-size: 12px;
            color: #9999A8;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <p class="eyebrow">Portfolio</p>
        <h1>Nouveau message de contact</h1>
    </div>

    <div class="body">
        <p class="intro">Vous avez reçu un message depuis le formulaire de contact de votre portfolio.</p>

        <table class="box">
            <tr class="box-row">
                <td class="box-cell">
                    <p class="label">Nom</p>
                    <p class="value">{{ $validated['name'] }}</p>
                </td>
            </tr>
            <tr class="box-row">
                <td class="box-cell">
                    <p class="label">Email</p>
                    <p class="value">{{ $validated['email'] }}</p>
                </td>
            </tr>
            <tr class="box-row">
                <td class="box-cell">
                    <p class="label">Sujet</p>
                    <p class="value">{{ $validated['subject'] }}</p>
                </td>
            </tr>
            <tr class="box-row">
                <td class="box-cell">
                    <p class="label">Message</p>
                    <p class="value">{{ $validated['message'] }}</p>
                </td>
            </tr>
        </table>

        <div class="cta">
            <a href="mailto:{{ $validated['email'] }}">Répondre à {{ $validated['name'] }}</a>
        </div>
    </div>

    <div class="footer">
        <p>Message envoyé automatiquement depuis le formulaire de contact.</p>
    </div>

</div>

</body>
</html>
