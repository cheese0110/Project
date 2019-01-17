<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>อยากกินต้องได้กิน</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">  
</head>

<body>
<div class="container" ng-app="apps">
  <div class="row">
    <div ui-view></div>
  </div>
 
 <script type="text/ng-template" id="login.html"/>
	<form class="form form--login framed"   name="testForm" ng-submit="formSubmit()" novalidate>
		<img  src="taskingtag.png"/>
		
		<input type="text" placeholder="Username" class="input input--top" ng-model="username" name="username" required/>
		<span style="color:red">
			<span>Username is required.</span>
		</span>
		
		<input type="password" placeholder="Password" class="input" ng-model="password" name="password" required/>
		<span style="color:red" ng-show="testForm.password.$touched && testForm.password.$invalid">
			<span ng-show="testForm.password.$error.required">Password is required.</span>
		</span>
		
		<button type="submit"  class="input input--submit" ng-disabled="testForm.$invalid" >Log in</button>
		 <span style="color:red">{{ error }}</span>
		 
	</form>
 </script>
 
 <script type="text/ng-template" id="home.html"/>
   <div align="center">
      <h3>Home</h3>
      <a ui-sref="login">Back</a>
    </div>
 </script>
 
 </div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.js'></script>
	<script src="login.js"></script>
	
</body>

</html>
