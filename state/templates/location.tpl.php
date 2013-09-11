<div class="country-name">
  <?php if($country == 'us' && !empty($province)): ?>
    <?php print $province_name . ", USA"; ?>
  <?php elseif(!empty($country_name)): ?>
    <?php print $country_name; ?>
  <?php endif; ?>
</div>
