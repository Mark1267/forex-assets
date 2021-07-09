TOP
            <div class="col-12" style="width: 100% !important; font-size: 30px;">
                <h4 style="text-align: center; text-transform: capitalize; margin: 0;">{EMAIL_TITLE}</h4>
            </div>
            <div class="col-10 mx-auto " style="width: 93.33%; display: block; margin: 0px auto;">
                <h5>Hi #fullname#,</h5>
            </div>
            <div class="col-12" style="padding: 10px; word-wrap: break-word;">
                <span style="line-height: 20px;">{MESSAGE}</span>
                <a href="https://wievatrade.com/signin" class="btn" style="margin: 15px auto; display: block; text-align: center; padding: 16px 30px; border-radius: 4px; color: white; background-color: #ffcc29;; text-decoration: none;">Dashboard</a>
                <center style="margin-top: 40px;"><span style="margin-top: 30px;">Account Update</span></center>
                <table cellspacing="3" style="width: 100%; text-align: left; border: 2px dashed #373435; color: #ffff;">
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #373435; color: #ffff; width: 40%;">Client Name</th>
                        <td style="padding: 10px;">{TO_NAME}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #8e8b8c; width: 40%;">Current Investment</th>
                        <td style="padding: 10px;">${C_BALANCE}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #373435; color: #ffff; width: 40%;">Available Balance</th>
                        <td style="padding: 10px;">${A_BALANCE}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #8e8b8c; width: 40%;">Pending Deposits</th>
                        <td style="padding: 10px;">${P_DEPOSIT}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #373435; color: #ffff; width: 40%;">Deposits</th>
                        <td style="padding: 10px;">${T_DEPOSIT}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #8e8b8c; width: 40%;">Pending Withdrawals</th>
                        <td style="padding: 10px;">${P_WITHDRAWALS}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #373435; color: #ffff; width: 40%;">Withdrawals</th>
                        <td style="padding: 10px;">${T_WITHDRAWALS}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #8e8b8c; width: 40%;">Transaction Narration</th>
                        <td style="padding: 10px;">{REASON}</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color:  #373435; color: #ffff; width: 40%;">Transaction Remarks</th>
                        <td style="padding: 10px;">#remarks#</td>
                    </tr>
                    <tr style="padding: 10px; background-color:  #c7c1c3;">
                        <th style="padding: 10px; background-color: #8e8b8c; width: 40%;">Date and Time</th>
                        <td style="padding: 10px;">#datetime#</td>
                    </tr>
                </table>
            </div>
        BOTTOM