<table>
    <tr style="background-color:#3b475b; align-content: center ">
        <td style="padding: 20px;">
            <img src="https://innovationvillage.co.ug/wp-content/uploads/2022/09/White-logo-1.png" alt="Logo" width="100px" >
        </td>
    </tr>
    <tr>
        <td style="padding: 40px">
            <p>Hello Team,</p>

            <p>Hope you're doing great! I wanted to share a quick update on the Biometric captures that have happened in the field today. I've also attached some reports for your analysis and evaluation.</p>

            <p>
                <b>Profiles Captured:</b> {{ number_format($data['biometrics']['count']) }}</br>
                <b>Existing Count:</b> {{ number_format($data['existing']['count']) }}</br>
            </p>
            <p>
            Regards,</br>
            The Innovation Village
            </p>

        </td>
    </tr>
</table>
