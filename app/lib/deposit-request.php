<html lang="en">
<body style="background: #eee; font-size: 12px; text-align: center;">
    <div style="background-color: white; min-width: 200px; max-width: 600px; margin: auto; padding: 10px; border-radius: 7px;">
        <img src="{LOGO}" width="150px" style="margin: auto;" alt="Zilextrade.com">
        <div style="background-color: #eee; padding: 5px; color: black; font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <span>Hi, {FNAME}</span>
            <br>
            <h2>{TITLE}</h2>
            <p>You have requested for a deposit of <code style="background-color: #fff; border-radius: 4px; padding: 5px;">${AMOUNT}</code> to <code style="background-color: #fff; border-radius: 4px; padding: 5px;">{ADDRESS}</code></p>
            <p>Thank you for choosing us. Once you have completed the deposit sequence. Log back into your dashboard. With the span of 15 mins its will reflect.</p>
            <p>If you have any questions, please reply to this email. I’m always happy to help!</p>
            <br>
            <span style="text-decoration: underline;">Receipt</span><br><br>
            <table cellspacing="0" style="background-color: rgb(179, 179, 179); font-family: 'Courier New', Courier, monospace; padding: 0px; color: white; width: 90%; margin: auto; text-align: left; font-size: 15px;">
                <thead style="border: 2px solid white;">
                    <tr>
                        <th style="padding: 4px 10px;">Header</th>
                        <th style="padding: 4px 10px;">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color: rgb(219, 219, 219); color: black;">
                        <td style="border: none; padding: 3px 10px;">First Name</td>
                        <td style="padding: 4px 10px;">{FNAME}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 10px;">Last Name</td>
                        <td style="padding: 4px 10px;">{LNAME}</td>
                    </tr>
                    <tr style="background-color: rgb(219, 219, 219); color: black;">
                        <td style="border: none; padding: 3px 10px; background-color: rgb(219, 219, 219);">Amount</td>
                        <td style="padding: 4px 10px;">${AMOUNT}</td>
                    </tr>
                    <tr>
                        <td style="padding: 4px 10px;">Address</td>
                        <td style="padding: 4px 10px;">{ADDRESS}</td>
                    </tr>
                    <tr style="background-color: rgb(219, 219, 219); color: black;">
                        <td style="border: none; padding: 3px 10px; background-color: rgb(219, 219, 219);">Transaction ID</td>
                        <td style="padding: 4px 10px;">{TRANS_ID}</td>
                    </tr>
                </tbody>
            </table>
            <h4 style="margin-bottom: 5px;">{O_NAME}</h4>
            <small>CEO</small>
            <p>Thanks! - <a href="https://zilextrade.com" style="color: rgb(37, 116, 1); font-size: 15px;">Zilextrade</a> Team</p>
        </div>
    </div>
</body>

</html>