<div class="single-team-member-08">
   <div class="thumb">
         <img src="<?php echo $team_image['url'];?>" alt="<?php echo $team_name;?>">
         <span class="post"><?php echo $team_designation;?></span>
      </div>
   <div class="content">
      <h4 class="title"><?php echo $team_name;?></h4>
      <ul class="social-icon">
         <?php
                foreach($team_socials as $social) {
            ?>
                <li><a href="<?php echo $social['team_social_link']['url'];?>"><i class="<?php echo $social['team_social_icon']['value'];?>"></i></a></li>
            <?php
                }
            ?>
      </ul>
   </div>
</div>