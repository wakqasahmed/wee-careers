<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Install WeeCareers on your website</title>

		<style type="text/css">
		  body {
		    font-size: 75%;
		    font-family: Helvetica,Arial,sans-serif;
		    width: 300px;
		    margin: 0 auto;
		  }
		  input, label {
		    display: block;
		    font-size: 18px;
		    margin: 0;
		    padding: 10px;
		    border-radius:10px;
		  }
		  label {
		    margin-top: 20px;
		  }
		  input.input_text {
		    width: 270px;
		  }
		  input#submit {
		    margin: 25px auto 0;
		    font-size: 25px;
		  }
		  fieldset {
		    padding: 15px;
		    border-radius:10px;
		  }
		  legend {
		    font-size: 18px;
		    font-weight: bold;
		  }
		  .error {
		    background: #ffd1d1;
		    border: 1px solid #ff5858;
        padding: 4px;
		  }
		</style>
	</head>
	<body>

    <center><h1>Final Step</h1></center>

		  <form id="install_form" method="post" action="add_options">
        <fieldset>
          <legend>Other settings</legend>          
          <label for="company">Company</label><input type="text" id="company" class="input_text" name="company" placeholder="Wee Careers Co." required />           
          <label for="from_email">Email (Admin From)</label><input type="email" id="from_email" class="input_text" name="from_email" placeholder="noreply@yourcompany.com" required /> for auto-generated email to send to job applicant when applies for a job
          <label for="to_email">Email (Admin To)</label><input type="email" id="to_email" class="input_text" name="to_email" placeholder="you@youremail.com" required /> for auto-generated email to send to you when job applicant applies for a job         
          <label for="cv_path">CV Path</label><input type="text" id="cv_path" class="input_text" name="cv_path" placeholder="http://www.yoursite.com/wee_careers/uploads/" required /> absolute path of upload folder with trailing slash                    
          <input type="submit" value="Update" id="submit" />
        </fieldset>
		  </form>


	</body>
</html>