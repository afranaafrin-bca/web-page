<?php  
$name = $email = $password = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
$name = trim($_POST['name']);  
$email = trim($_POST['email']);  
$password = trim($_POST['password']);   
if (empty($name) || empty($email) || empty($password)) { 
echo 'All fields are required';  
} 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
echo 'Invalid email format';  
} 
elseif (strlen($password) < 8) {  
echo 'Password must be at least 8 characters long';  
} 
else {  
$mysqli = new mysqli('localhost', 'root', '', 'studentdb');  
$mysqli->query("INSERT INTO registrationtbl (name, email, password) VALUES ('$name',  '$email', '$password')");  
$mysqli->close();  
echo 'Registration successful';  
}   
}  
?>  
<h2>Student Registration Form</h2>  
<form method="post">  
<label for="name">Name:</label>  
<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required>  
<br><br>  
<label for="email">Email Address:</label>  
<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>  
<br><br>  
<label for="password">Password:</label>  
<input type="password" name="password" required>  
<br><br>  
<input type="submit" value="Register">  
</form> 