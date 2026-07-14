<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Reactivate Account</title>

</head>

<body style="font-family:Arial,sans-serif;background:#f8f9fa;padding:40px;">

    <div style="max-width:600px;margin:auto;background:#ffffff;padding:35px;border-radius:10px;">

        <h2 style="color:#0d6efd;">
            Hello {{ $user->name }},
        </h2>

        <p>
            We received a request to reactivate your
            <strong>Kaarigar</strong> account.
        </p>

        <p>
            Click the button below to reactivate your account.
        </p>

        <p style="margin:35px 0;">

            <a href="{{ $url }}"
               style="background:#0d6efd;color:white;text-decoration:none;padding:14px 28px;border-radius:8px;display:inline-block;">

                Reactivate My Account

            </a>

        </p>

        <p>

            This link will expire in <strong>60 minutes</strong>.

        </p>

        <p>

            If you didn't request this, simply ignore this email.

        </p>

        <hr>

        <p style="color:#666;">

            Regards,<br>

            <strong>Kaarigar Team</strong>

        </p>

    </div>

</body>

</html>