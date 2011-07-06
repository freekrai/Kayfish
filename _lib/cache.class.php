<?php
	define('CACHE_PATH', realpath('.').'/_cache/');
	class Cache {
		public $sFile;
		public $sFileLock;
		public $iCacheTime;
		public $oCacheObject;
		function __construct($sKey, $iCacheTime) {
			$this->sFile = CACHE_PATH.md5($sKey).".txt";
			$this->sFileLock = "$this->sFile.lock";
			$iCacheTime >= 10 ? $this->iCacheTime = $iCacheTime : $this->iCacheTime = 10;
		}
		function Check() {
			$val = 0;
			if (file_exists($this->sFileLock)) return true;
			$val = ( file_exists($this->sFile) && ($this->iCacheTime == -1 || time() - filemtime($this->sFile) <= $this->iCacheTime) );
			if( !$val ){ if (file_exists($this->sFile)) { unlink($this->sFile); } }
			return 0;
		}
		function Reset(){ if (file_exists($this->sFile)) { unlink($this->sFile); } }
		function Exists() { return (file_exists($this->sFile) || file_exists($this->sFileLock)); }
		function Set($vContents) {
			if (!file_exists($this->sFileLock)) {
				if (file_exists($this->sFile)) { copy($this->sFile, $this->sFileLock); }
				$oFile = fopen($this->sFile, 'w');
				fwrite($oFile, serialize($vContents));
				fclose($oFile);
				if (file_exists($this->sFileLock)) {unlink($this->sFileLock);}
				return true;
			}
			return false;
		}
		function Get() {
			if (file_exists($this->sFileLock)) {
				return unserialize(file_get_contents($this->sFileLock));
			} else {
				return unserialize(file_get_contents($this->sFile));
			}
		}
		function ReValidate() { touch($this->sFile); }
	}
?>