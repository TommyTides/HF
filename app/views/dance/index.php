<!-- include header -->
<?php

use App\Services\LocationService;

include __DIR__ . '/../jazz_header.php';
?>
<div id="landing-container">
        <?= $html ?>
    </div>
<!-- Start description section -->
<section class="dance_fullwidth dance_smooth_scroll dance_franklin_gothic">
  <section class="dance_padding_large">
    <p id="lineup" class="dance_header">LINEUP</p>
    <hr class="dance_fullwidth dance_thick_hr">
    <div class="dance_box_container">
  <?php
  foreach ($artists as $artist) {
    if ($artist->getEventType() == 1) {
      $name = $artist->getArtistName();
      $filepath = str_replace(' ', '', $name);
  ?>
      <div class="dance_box">
        <div class="dance_artist_card">
          <div class="dance_imgBx">
            <a href="/dance/artistPage?id=<?= $artist->getArtistId() ?>"><img src="/img/dance/thumbnail-<?= $filepath ?>.png" alt="<?= $name ?>"></a>
          </div>
          <div class="dance_artist_details">
            <h2><?= $name ?></a><br><span>TRANCE</span></h2>
          </div>
        </div>
      </div>
  <?php
    }
  }
  ?>
</div>

    <!-- Venues -->
    <div id="venues" class="dance_venue_height">
      <div class="dance_zero_height"></div>
      <p class="dance_header">VENUES</p>
      <hr class="dance_fullwidth dance_thick_hr">
      <div id="venues-display" class="dance_flex_row dance_justify_space_between dance_padding_vertical">
        <?php
        foreach ($venues as $venue) { ?>
          <a href="/dance/location?id=<?= $venue->getId() ?>" class="dance_link_reset">
            <div class="dance_venue_container">
              <button class="dance_expand_info_button"><img src="/img/<?= $venue->getImage() ?>" class="dance_venue_image"></button>
              <div id="info">
                <div class="dance_info_padding">
                  <span><b><?= $venue->getName() ?></b>
                    <p class="dance_info_text"><?= strtoupper($venue->getAddress()) ?></p>
                    <p class="dance_info_text">OPENING HOURS: <?= $venue->getOpening_time() ?>-<?= $venue->getClosing_time() ?></p>
                    <p class="dance_info_text">WHEELCHAIR-ACCESS: <b id="wheelchair-access-indicator" class="dance_info_text"><?php if ($venue->getWheelchair_access()) {
                                                                                                                                echo "YES";
                                                                                                                              } else {
                                                                                                                                echo "NO";
                                                                                                                              } ?></b></p>
                  </span>
                </div>
              </div>
            </div>
          </a>
        <?php
        }
        ?>
      </div>
    </div>
    <div id="schedule" class="dance_fullwidth">
      <div class="dance_space_top"></div>
      <p class="dance_header">SCHEDULE</p>
      <hr class="dance_fullwidth dance_thick_hr">
      <div class="dance_schedule_flex">
        <?php
        for ($i = 0; $i < count($festivalDays); $i++) {
          $date = $festivalDays[$i];
          $dateTime = DateTime::createFromFormat('Y-m-d', $date);
          $day = $dateTime->format('d');
          $monthName = $dateTime->format('F');
        ?>
          <div class="dance_schedule_column">
            <h1 class="dance_day_header"><?= $day; ?></h1>
            <h1 class="dance_month_header"><?= strtoupper($monthName) ?></h1>
            <hr class="dance_hr_90">
            <div class="dance_schedule_item">
              <?php
              foreach ($events as $event) {
                if (substr($event->getStartTime(), 0, 10) == $date) {
              ?>
                  <div class="dance_event" onmouseover="increaseFontSize(this)" onmouseout="resetFontSize(this)">
                    <a href="/dance/event?id=<?= $event->getEventId() ?>" class="dance_link_reset">
                      <div id="event-info center" class="dance_event_info">
                        <?= substr($event->getStartTime(), 10, -3) ?><br>
                        <div class="dance_event_dot_container">
                          <div class="dance_event_dot"></div>
                        </div>
                        <div>
                          <b id="artist-name"><?= strtoupper($event->getName()) ?></b>
                          <p><?= $event->getDescription() ?></p>
                        </div>
                      </div>
                    </a>
                  </div>
              <?php
                }
              }
              ?>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
</section>

<!-- End description section -->

<!-- include footer -->
<?php
include __DIR__ . '/../footer.php';
?>

<script>

</script>