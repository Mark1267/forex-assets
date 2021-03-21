
<body style="background: #eee; font-size: 12px;">
    <div style="background-color: white; max-width: 600px; margin: auto; border-radius: 7px;">
        <div style="padding: 5px; background-color: rgb(255, 255, 255); margin-bottom: 5px; text-align: center;">
            <h2 style="margin-top: 0px; padding: 0px; margin-bottom: 0px; font-family: Arial, Helvetica, sans-serif;">{TITLE}</h2>
        </div>
        <center><img src="{LOGO}" width="250px" style="margin: auto; height: 50px;" alt="ZilexTrade.COM"></center>
        <div style="padding: 10px; color: black; font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <center><h2>{TITLE}</h2></center>
            <span>Hi, {FNAME}</span><br><br>
            {MESSAGE}
            <p>Thank you for choosing us. Once you have logged in your bonus will be added. Log back into your <a style="color: rgb(22, 130, 253);" href="https://zilextrade.com/auth-signin.php">dashboard.</a></p>
            <p>If you have any questions, please reply to this email. I’m always happy to help!</p>
            <br>
            <center><span style="text-decoration: underline;">Account Details</span><br><br>
            </center>
            <table cellspacing="2" style="background-color: rgb(255, 255, 255); padding: 0px; color: white; width: 99%; margin: auto; text-align: left; font-size: 11px;">
                <tbody style="color: black;">
                    <tr style="background-color: rgb(161, 161, 161);">
                        <td style="border: none; padding: 3px 10px; font-weight: 700;">Client's Name</td>
                        <td style="padding: 4px 10px;">{FNAME} {LNAME}</td>
                    </tr>
                    <tr style=" background-color: rgb(206, 206, 206);">
                        <td style="padding: 4px 10px; font-weight: 700;">Current Balance</td>
                        <td style="padding: 4px 10px;">{C_BALANCE}</td>
                    </tr>
                    <tr style="background-color: rgb(161, 161, 161);">
                        <td style="border: none; padding: 3px 10px; font-weight: 700;">Available Balance</td>
                        <td style="padding: 4px 10px;">${A_BALANCE}</td>
                    </tr>
                    <tr style=" background-color: rgb(206, 206, 206);">
                        <td style="padding: 4px 10px; font-weight: 700;">Pending Deposits</td>
                        <td style="padding: 4px 10px;">${P_DEPOSIT}</td>
                    </tr>
                    <tr style="background-color: rgb(161, 161, 161);;">
                        <td style="border: none; padding: 3px 10px; font-weight: 700;">Deposits</td>
                        <td style="padding: 4px 10px;">${T_DEPOSIT}</td>
                    </tr>
                    <tr style=" background-color: rgb(206, 206, 206);">
                        <td style="padding: 4px 10px; font-weight: 700;">Pending Withdrawals</td>
                        <td style="padding: 4px 10px;">${P_WITHDRAWALS}</td>
                    </tr>
                    <tr style="background-color: rgb(161, 161, 161);;">
                        <td style="border: none; padding: 3px 10px; font-weight: 700;">Withdrawals</td>
                        <td style="padding: 4px 10px;">${T_WITHDRAWALS}</td>
                    </tr>
                    <tr style=" background-color: rgb(206, 206, 206);">
                        <td style="padding: 4px 10px; font-weight: 700;">Transaction Narration</td>
                        <td style="padding: 4px 10px;">{REASON}</td>
                    </tr>
                </tbody>
            </table>
            <center>
                <p>Thanks! - <a href="https://zilextrade.com" style="color: rgb(37, 116, 1); font-size: 15px;">Zilextrade</a> Team</p>
            </center>
        </div>
        <div style="padding: 20px; background-color: rgb(64, 212, 18); margin-bottom: 5px; color: white;">
            <center><span> 7941 Henri-Bourassa West, Montreal Quebec H4S 1P7, Canada</span>
                <span style="display: block;">Mon - Fri : 09:00 - 17:00</span>
                <span style="display: block;">+8 800 256 35 87 // support@zilextrade.com</span>
            </center>
        </div>
    </div>
</body>

</html>