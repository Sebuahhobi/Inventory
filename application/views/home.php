
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Arduino Web Server</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.structure-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.structure-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.theme-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.theme-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.external-png-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.external-png-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.icons-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.icons-1.4.5.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.inline-svg-1.4.5.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>mobile1/jquery.mobile.inline-svg-1.4.5.min.css" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
<body>
	<script type="text/javascript">
	var getId=document.getElementById('off1');
	alert('dd');
	</script>
	<div data-role="page" id="main">
		<div data-role="header"><h1>Control Your House</h1></div>
		<div data-role="content">
       			<form method="POST">
       			    <table class="table">
						<thead>
						    <tr style="text-align:center">
							    <th scope="col" width="350px">Name</th>
							    <th width="50px"></th>
							    <th scope="col">State</th>
						    </tr>
					  	</thead>
					  	<tbody>
	       					<tr>
	       						<td>
									<label for="flip-select">Control Water Level</label>
								</td>
								<td></td>
	       						<td>
		       						<select id="flip-select" name="flip-select" data-role="flipswitch">
								        <option><?php echo anchor(site_url('relay/1'),'Off');?></option>
								        <option>On</option>
								    </select>
								</td>
	       					</tr>
	       					<tr>
	       						<td>Lamp 1</td>
	       						<td></td>
	       						<td>
	       							<select id="flip-select" name="flip-select" data-role="flipswitch">
								        <option>Off</option>
								        <option>On</option>
								    </select>
	       						</td>
	       					</tr>
	       					<tr>
	       						<td>Lamp 2</td>
	       						<td></td>
	       						<td>
	       							<select id="flip-select" name="flip-select" data-role="flipswitch">
								        <option id='off1' name='off1'>Off</option>
								        <option>On</option>
								    </select>
	       						</td>
	       					</tr>
	       					<tr>
	       						<td>Lamp 3</td>
	       						<td></td>
	       						<td>
	       							<select id="flip-select" name="flip-select" data-role="flipswitch">
								        <option>Off</option>
								        <option>On</option>
								    </select>
	       						</td>
	       					</tr>
	       				</tbody>
       				</table>
       				<!-- Footer-->
       				<div data-role="footer" data-position="fixed">
						<div data-role="navbar">
							<ul>
								<li><a href="" data-icon="home" class="ui-btn-active">HOME</a></li>
								<li><a href="" data-icon="bars" data-theme="c">Data</a></li>
							</ul>
						</div>
					</div>
				</form>
		</div>
	</div>
<script src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url();?>mobile1/jquery.mobile-1.4.5.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


