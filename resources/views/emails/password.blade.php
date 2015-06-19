<html><head>
<style>
    body, table.body, h1, h2, h3, h4, h5, h6, p, td { 
  color: #222222;
  font-family: "Helvetica", "Arial", sans-serif; 
  font-weight: normal; 
  padding:0; 
  margin: 0;
  text-align: left; 
  line-height: 1.3;
}
</style>
    </head>
        <body>
<p>Hello! We have received a request to reset your password for <a href="http://candojax.com">http://candojax.com</a></p>
<p>If you did not make this request, you may disregard this email.</p>
<p>Click here to reset your password: {{ url('password/reset/'.$token) }}</p>
<p>Please note that the above link will only be valid for one hour.</p>
<hr>
<small><p>If you have any questions feel free to contact us at <a href="mailto:support@candojax.com">support@candojax.com</a>. Thank you.</p></small>
        </body>
</html>