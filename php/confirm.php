<?php

include("file.php");

$experiment = new Experiment($_REQUEST['exp'], True);

$user = new User($experiment->owner);

$page_header = $experiment->getName();

if ($experiment->getStatus() != 'open') {
  $page = 'fully_subscribed';
}
else {

  $excluded_email_addresses = $experiment->getExclusionEmails();
  foreach ($experiment->getExclusions() as $exclusion) {
    $alt_experiment = new Experiment($exclusion);
    $excluded_email_addresses = array_merge($excluded_email_addresses, $alt_experiment->getExclusionEmails());
  }
  if (in_array(strtolower($_REQUEST['email']), $excluded_email_addresses)) {
    $page = 'not_eligible';
  }

  else {
    foreach ($experiment->getCalendar() as $date=>$slots) {
      foreach ($slots as $slot) {
        if ($slot[1] == $_REQUEST['timeslot']) {
          $slot_date = date('l jS F', strtotime($date));
          $slot_time = $slot[0];
        }
      }
    }

    // Double check that the timeslot is still free
    if (count($experiment->getSlot($_REQUEST['timeslot'])) < $experiment->getPerSlot()) {
      $experiment->setSlot($_REQUEST['timeslot'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['phone']);
      $experiment->addExclusionEmails(array($_REQUEST['email']));
      if ($experiment->saveExperimentData() == False) {
        $page = 'error';
        $error = '100';
      }
    }
    else {
      // If not, send back to calendar page
      $page = 'calendar';
      $warning_message = True;
    }

    //$a = mail($_REQUEST['email'], $experiment->getName(), "Dear Jon", "From: {$user->getName()} <{$user->getEmail()}>");
  }
}

?>
