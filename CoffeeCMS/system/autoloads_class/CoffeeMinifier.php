<?php 

class CoffeeMinifier
{
	public static $isDelete=false;
	public static function load($listFiles=[],$ouputName='')
	{
        $result='';


		$total=count($listFiles);

		$filePath='';

		$modTime='';

		for ($i=0; $i < $total; $i++) { 

			if(strlen($listFiles[$i]) > 3)
			{
				$filePath=$listFiles[$i];
				if(file_exists($filePath))
				{
					$modTime.=filemtime($filePath).$filePath;
				}
			}
			
		}

		$oldFile=PUBLIC_PATH.'caches/minifier_'.md5($modTime).'.cache';

		$result=SITE_URL.'public/caches/minifier_'.$ouputName;

		if(!file_exists($oldFile))
		{
			$content='';

			for ($i=0; $i < $total; $i++) { 
				if(strlen($listFiles[$i]) > 3)
				{
					$filePath=$listFiles[$i];

					if(file_exists($filePath))
					{
						$content.=file_get_contents($filePath)."\r\n";
					}
				}
				
			}

			if(self::$isDelete==false)
			{
				$listOldFiles=glob(PUBLIC_PATH.'caches/minifier_*');

				$total=count($listOldFiles);

				for ($i=0; $i < $total; $i++) { 
					unlink($listOldFiles[$i]);
				}

				self::$isDelete=true;				
			}


			create_file($oldFile,'');
			create_file(ROOT_PATH.'public/caches/minifier_'.$ouputName,$content);

		}

		return $result;
	}
}