<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment 5</title>
</head>

<body>

  <!-- Task 1 -->

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br />
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br />
    <input type="submit" value="Submit">
  </form>


  <!-- Task 2 -->
  <h2>Sample Name and Email</h2>
  <?php
  class Person
  {
    private $name;
    private $email;

    public function setName($name)
    {
      $this->name = $name;
    }

    public function setEmail($email)
    {
      $this->email = $email;
    }

    public function getName()
    {
      return $this->name;
    }

    public function getEmail()
    {
      return $this->email;
    }
  }

  $person = new Person();

  $person->setName("John Doe");
  $person->setEmail("johndoe@example.com");

  echo "Name: " . $person->getName() . "<br />";
  echo "Email: " . $person->getEmail() . "<br />";

  ?>


  <!-- Task 3 -->

  <h2>Input Result</h2>

  <?php

  $name = $email = "";
  $nameErr = $emailErr = "Input Required";

  $person2 = new Person();
  $nameErr = $person2->setName($nameErr);
  $emailErr = $person2->setEmail($emailErr);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      $person2->setName($nameErr);
    } else {
      $name = test_input($_POST["name"]);
      $person2->setName($name);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      $person2->setEmail($emailErr);
    } else {
      $email = test_input($_POST["email"]);
      $person2->setEmail($email);
    }
  }
  echo "Name: " . $person2->getName() . "<br />";
  echo "Email: " . $person2->getEmail() . "<br />";
  ?>
</body>

</html>