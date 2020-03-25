<?php

   $url = 'present1.php';
   include 'scripts.php';
   displayContent($url);
   ?>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="pages.js" charset="utf-8"></script>

<br>
<br>
<form id="topicForm" method="post">
      <textarea name="comment" id="commentField"></textarea>
      <br>
      <input type="submit" value="Post" name="submitTopic" onclick="sendToServer()">
</form>
<button onclick="goBack()">Back</button>
   
   
   