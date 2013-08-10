<?php

/*-----------------------------------------------------------------------------
  UserCounter (Yii-Portierung von pCounter)
  -----------------------------------------
  Besucherzähler auf Basis von MySQL
  -----------------------------------
  Lizenz:

    Copyright (C) 2009 Armin Pfäffle

    UserCounter ist Freeware und darf ausdrücklich weitergegeben werden,
    sofern dies kostenlos und in unveränderter Form des Scripts geschieht.

    Der Autor haftet nicht für Schäden, die durch die Nutzung dieses Scripts
    entstanden sind!

  Author:

    Armin Pfäffle
    http://www.armin-pfaeffle.de
    All Rights reserved.

  Pluginseite:
    http://www.yiiframework.com/extension/usercounter/
  -----------------------------------------------------------------------------
  UserCounter basiert auf dem PHP Script pCounter in Version 2.1
  --------------------------------------------------------------
  Lizenz:

    Copyright (C) 2004 - 2009 Andreas "Pr0g" Droesch

    pCounter ist Freeware und darf ausdrücklich weitergegeben werden, sofern
    dies kostenlos und in unveränderter Form des Scripts geschieht.

    Der Autor haftet nicht für Schäden, die durch die Nutzung dieses Scripts
    entstanden sind!

  Author:

    Andreas "Pr0g" Droesch
    http://andreas.droesch.de
    All Rights reserved.

  Projektseite:
    http://andreas.droesch.de/projekte/pcounter/
-----------------------------------------------------------------------------*/

class UserCounter extends CComponent
{
	// Übergabeparameter für den Aufruf des Counters
	public $action;
    public $data;

	private $cfg_tbl_users		= 'pcounter_users';
	private $cfg_tbl_save		= 'pcounter_save';
	private $cfg_online_time	= 10;

	private $user_total			= -1;
	private $user_online		= -1;
	private $user_today			= -1;
	private $user_yesterday		= -1;
	private $user_max_count		= -1;
	private $user_time			= -1;


	/**
	 * Konstruktor. (optional)
	 **/
	public function __construct()
	{
	}

	/**
	 * Diese Methode wird aus seltsamen Gründen benötigt oO
	 **/
	public function init()
	{
	}

	/**
	 * Diese Methode aktualisiert die Zähler in der Datenbank und übergibt an
	 * die lokalen Variablen alle nötigen Daten.
	 **/
    public function refresh()
    {

        
$cfg = require  dirname(__FILE__).'/../config/main.php';
//print '<pre>';
//print_r($cfg['components']['db']);

if (preg_match("/^mysql:host=(\w.*);dbname=(\w.*)/i", $cfg['components']['db']['connectionString'],$match))
{
    //print_r($match);    
}
//$db_name = "myphotos";
//$db_server = "localhost";
//$db_user = "root";
//$db_pass = "";

$db_name = $match[2];
$db_server = $match[1];

$db_user = $cfg['components']['db']["username"];
$db_pass = $cfg['components']['db']["password"];
        
        
        
		$cfg_tbl_users		= $this->cfg_tbl_users;
		$cfg_tbl_save		= $this->cfg_tbl_save;
		$cfg_online_time	= $this->cfg_online_time;

		// Daten aus DB auslesen
		$sql = 'SELECT save_name, save_value FROM ' . $cfg_tbl_save;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$data = array();
		while (($row = $dataReader->read()) !== false)
		{
			$data[$row['save_name']] = $row['save_value'];
		}
                unset($dataReader);
                unset($command);

		// Aktuellen Tag als julianisches Datum
		$today_jd = GregorianToJD(date('m'), date('j'), date('Y'));

		// Prüfen ob wir schon einen neuen Tag haben
		if ($today_jd != $data['day_time'])
		{
			// Anzahl der Besucher von heute auslesen
			$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
			$command = Yii::app()->db->createCommand($sql);
			$dataReader = $command->query();
			$row = $dataReader->read();
			$today_count = $row['user_count'];
                        unset($dataReader);
                        unset($command);

			// Anzahl der Tage zum letzten Update ermitteln
			$days_between = $today_jd - $data['day_time'];

			// Zählerwert von heute auf gestern setzen
                        $sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . ($days_between == 1 ? $today_count : 0) . ' WHERE save_name="yesterday"';
			//$command = Yii::app()->db->createCommand($sql);
			//$command->execute();
                        $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();

			// Auf neuen Besucherrekord prüfen
			if ($today_count >= $data['max_count'])
			{
				// Daten aktualisieren
				$data['max_time']  = mktime(12, 0, 0, date('n'), date('j'), date('Y')) - 86400;
				$data['max_count'] = $today_count;

				// Rekordwerd speichern
				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_count . ' WHERE save_name="max_count"';
				//$command = Yii::app()->db->createCommand($sql);
				//$command->execute();
                                $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();

				// Aktuellen Tag als neuen Rekordtag speichern
				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $data['max_time'] . ' WHERE save_name="max_time"';
				//$command = Yii::app()->db->createCommand($sql);
				//$command->execute();
                                $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
			}

			// Gesamtzähler erhöhen
			$sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=save_value+' . $today_count . ' WHERE save_name="counter"';
			//$command = Yii::app()->db->createCommand($sql);
			//$command->execute();
                        $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();

			// Alte Besucherdaten aus Tabelle entfernen
			$sql = 'TRUNCATE TABLE ' . $cfg_tbl_users;
			//$command = Yii::app()->db->createCommand($sql);
			//$command->execute();
                        $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();

			// Datum aktualisieren
			$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_jd . ' WHERE save_name="day_time"';
			//$command = Yii::app()->db->createCommand($sql);
			//$command->execute();
                        $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();

			// Daten aktualisieren
			$data['counter'] += $today_count;
			$data['yesterday'] = ($days_between == 1 ? $today_count : 0);
		}

		// IP des Besuchers ermitteln
		$user_ip = Yii::app()->db->quoteValue(isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

		// Besucher speichern oder aktualisieren
		$sql = 'INSERT INTO ' . $cfg_tbl_users . ' VALUES ("' . $user_ip . '", ' . time() . ') ON DUPLICATE KEY UPDATE user_time=' . time();
		//$command = Yii::app()->db->createCommand($sql);
		//$command->execute();
                $dbh = new PDO('mysql:host='.$db_server.';port=3306;dbname='.$db_name, $db_user, $db_pass, array( PDO::ATTR_PERSISTENT => false));
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

		// Rückgabearray initialisieren
		$output = array();

		// Anzahl der heutigen Besucher auslesen
		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['today'] = $row['user_count'];
                unset($dataReader);
                unset($command);

		// Gesamte Besucherzahl und Besucher vom Vortag zurückgeben
		$output['counter']   = $data['counter'] + $output['today'];
		$output['yesterday'] = $data['yesterday'];

		// Aktuelle Besucher der letzten x Minuten auslesen
		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users . ' WHERE user_time>=' . (time() - $cfg_online_time * 60);
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['online'] = $row['user_count'];
                unset($dataReader);
                unset($command);

		// Wurde der aktuelle Besucherrekord heute überschritten?
		if ($output['today'] >= $data['max_count'])
		{
			// Heutigen Tag als Rekord zurückgeben
			$output['max_count'] = $output['today'];
			$output['max_time']  = time();
		}
		else
		{
			// Alten Rekord zurückgeben
			$output['max_count'] = $data['max_count'];
			$output['max_time']  = $data['max_time'];
		}

		$this->user_total		= $output['counter'];
		$this->user_online		= $output['online'];
		$this->user_today		= $output['today'];
		$this->user_yesterday	= $output['yesterday'];
		$this->user_max_count	= $output['max_count'];
		$this->user_time		= $output['max_time'];
   	}

/**
     * Getter für die Anzahl aller Besucher.
     **/
    public function getTotal($drawValue=false,$style='',$ext='')
    {
        if ($drawValue)
            $this->drawValue($this->user_total,$style,$ext);
        else
            return $this->user_total;
    }
 
    /**
     * Getter für die Anzahl der User, die gerade Online sind.
     **/
    public function getOnline($drawValue=false,$style='',$ext='')
    {
        if ($drawValue)
            $this->drawValue($this->user_online,$style,$ext);
        else
            return $this->user_online;
    }
 
    /**
     * Getter für die Anzahl der User, die heute online waren.
     **/
    public function getToday($drawValue=false,$style='',$ext='')
    {
        if ($drawValue)
            $this->drawValue($this->user_today,$style,$ext);
        else
            return $this->user_today;
    }
 
    /**
     * Getter für die Anzahl der User, die Gestern online waren.
     **/
    public function getYesterday($drawValue=false,$style='',$ext='')
    {
        if ($drawValue)
            $this->drawValue($this->user_yesterday,$style,$ext);
        else
            return $this->user_yesterday;
    }
 
    /**
     * Getter für die maximale Anzahl der User, die an einem Tag online war.
     **/
    public function getMaximal($drawValue=false,$style='',$ext='')
    {
        if ($drawValue)
            $this->drawValue($this->user_max_count,$style,$ext);
        else
            return $this->user_max_count;
    }
 
    /**
     * Getter für den Zeitpunkt, an dem die maximale Anzahl der User online war.
     **/
    public function getMaximalTime()
    {
        return $this->user_time;
    }
 
    /**
     * Draw image for each digit.
     * $value: the number to be drawn.
     * $st: style name.
     * $ex: digit image extension.
     */
    public function drawValue($value,$st,$ex)
    {
        $base_url = "images/";
        $default_style = 'blue';
        $style      = (strlen(trim($st)) > 0) ? $st : $default_style;
        $style_dir  = 'counterstyles/' . $style . '/';
        $default_ext = 'gif';
        $ext        = (strlen(trim($ex)) > 0) ? $ex : $default_ext;
 
        /* Print out Javascript code and exit */
        $len = strlen($value);
        for ($i=0;$i<$len;$i++)
        {
            echo '<img src="'.$base_url . $style_dir . substr($value,$i,1) . '.' . $ext .'" border="0">';
        }
    }
}