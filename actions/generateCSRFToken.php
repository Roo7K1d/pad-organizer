<?php

session_start();

  function generate_token() {
    // Check if a token is present for the current session
    if (!isset($_SESSION["csrf_token"])) {
      // No token present, generate a new one
      $token = random_bytes(64);
      $_SESSION["csrf_token"] = $token;
    } else {
      // Reuse the token
      $token = $_SESSION["csrf_token"];
    }
    return $token;
  }

?>