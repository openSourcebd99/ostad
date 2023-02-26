<!DOCTYPE html>
<html>

<head>
  <title>Task 1</title>
</head>

<body>
  <?php
  $name = $email = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    if (empty($_POST["name"])) {
      $name = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
      $email = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }

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

    $person->setName($name);
    $person->setEmail($email);
  }
  ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <input type="submit" value="Submit">
  </form>

  <?php
  if (isset($person)) {
    echo "Name: " . $person->getName() . "</br>";
    echo "Email: " . $person->getEmail() . "<br>";
  }
  ?>
</body>

</html>