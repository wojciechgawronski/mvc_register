<main>
      <?php
      echo "<div class='container'>";
      foreach ($data as $post) {
            $created = date("Y.m.d, H:i", strtotime($post['created_at']));

            echo "<div class='border p-3 mb-4'>";
            echo "<h2 class='orange'>{$post['title']}</h2>";
            echo "<p>{$post['content']}</p>";
            echo "<p class='small text-info'>{$created}</p>";
            echo "</div>";
      }
      echo "</div>";
      ?>
</main>