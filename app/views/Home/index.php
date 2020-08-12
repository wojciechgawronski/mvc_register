<main>
      <div class="container">
            <p class="orange lead">
                  Try: home / index / [ <b>name</b> ] / [ <b>mood</b> ]
            </p>
            <p>
                  <?php
                  if (!empty($data['name'])) echo "Hey <b>{$data['name']}!</b>";
                  if (!empty($data['mood'])) echo " Your mood is: <b>{$data['mood']}.</b>";
                  ?>
            </p>
            <?php
            // pas from View Class
            if ($user) echo "<p class='gray i'> {$user->email}</p>"; ?>
      </div>
</main>