<?php 
  session_start();
  include_once "https://enigma-messenger.herokuapp.com/php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: https://enigma-messenger.herokuapp.com/login.php");
  }
?>
<?php include_once "https://enigma-messenger.herokuapp.com/header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: https://enigma-messenger.herokuapp.com/users.php");
          }
        ?>
        <a href="https://enigma-messenger.herokuapp.com/users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="https://enigma-messenger.herokuapp.com/php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="https://enigma-messenger.herokuapp.com/javascript/chat.js"></script>

</body>
</html>
