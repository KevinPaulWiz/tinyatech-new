<?php 
/*class for historyLogs*/

/**
  this class is for history logs, insertion only
  @fredrick wampamba fredrickwampamba1@gmail.com
  @kevinPaul Nsibambi kevinpaulwiz@gmail.com
  **/
  class Historylogs
  {
    private $user_id;

    private $activity;

    private $submitteddate;

    private $stat_date;

    private $month;

    private $year;

    function __construct($user_id, $activity, $submitteddate, $stat_date, $month, $year)
    {
      $this->user_id = $user_id;
      $this->stat_date = $stat_date;
      $this->month = $month;
      $this->year = $year;
      $this->activity = $activity;
      $this->submitteddate = $submitteddate;
      self::perform();
    }

    public function perform(){
      try {
        include 'config/connection.php';
        $stmt = $pdo->prepare("INSERT INTO `history_log`( `user_id`, `action`, `date`, `stat_date`, `month`, `year`) VALUES (:user_id, :activity, :submitteddate, :stat_date, :month, :year)");
        $stmt->execute(array('user_id' => $this->user_id, 'activity' => $this->activity, 'submitteddate' => $this->submitteddate, 'stat_date' => $this->stat_date, 'month' => $this->month, 'year' => $this->year));
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
  

/*class for historyLogs*/
 ?>